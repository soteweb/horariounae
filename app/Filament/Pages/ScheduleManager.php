<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Actions\Action;

class ScheduleManager extends Page implements HasForms
{
    use InteractsWithForms;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-clipboard-document-list';
    }
    
    public static function getNavigationLabel(): string
    {
        return 'Gestión de Planificación';
    }

    protected static ?int $navigationSort = 2;

    public static function getNavigationGroup(): ?string
    {
        return 'Panel de Administración';
    }

    public function getTitle(): string
    {
        return 'Gestión de Planificación';
    }

    protected string $view = 'filament.pages.schedule-manager';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(\Filament\Schemas\Schema $form): \Filament\Schemas\Schema
    {
        return $form
            ->components([
                \Filament\Forms\Components\Select::make('career_id')
                    ->label('Seleccionar Carrera')
                    ->options(\App\Models\Career::pluck('name', 'id'))
                    ->placeholder('-- Seleccionar Carrera --')
                    ->live(),
                \Filament\Forms\Components\Select::make('course_id')
                    ->label('Seleccionar Curso / Semestre')
                    ->options(\App\Models\Course::pluck('name', 'id'))
                    ->placeholder('-- Seleccionar Curso / Semestre --')
                    ->live(),
            ])
            ->columns(2)
            ->statePath('data');
    }

    public function getSchedules()
    {
        $careerId = $this->data['career_id'] ?? null;
        $courseId = $this->data['course_id'] ?? null;

        if (!$careerId || !$courseId) {
            return collect();
        }

        return \App\Models\Schedule::with(['subject', 'teacher', 'classroom', 'turn'])
            ->where('career_id', $careerId)
            ->where('course_id', $courseId)
            ->orderBy('start_time')
            ->get();
    }

    /**
     * Returns the ordered list of time slots for the selected career.
     * Falls back to default Noche slots if none are configured.
     */
    public function getCareerSlots(): \Illuminate\Support\Collection
    {
        $careerId = $this->data['career_id'] ?? null;

        if ($careerId) {
            $slots = \App\Models\CareerTimeSlot::where('career_id', $careerId)
                ->orderBy('sort_order')
                ->orderBy('start_time')
                ->get();

            if ($slots->isNotEmpty()) {
                return $slots->map(fn($s) => $s->start_time . ' - ' . $s->end_time);
            }
        }

        // Default Noche slots
        return collect([
            '18:20:00 - 19:05:00',
            '19:05:00 - 19:50:00',
            '20:00:00 - 20:45:00',
            '20:45:00 - 21:30:00',
        ]);
    }

    /**
     * Returns slot options for the horario_slot select in create/edit forms.
     */
    public function getSlotOptions(): array
    {
        return $this->getCareerSlots()
            ->mapWithKeys(function ($slot) {
                [$start, $end] = explode(' - ', $slot);
                $key   = $start . '|' . $end;
                $label = \Carbon\Carbon::parse($start)->format('H:i')
                       . ' – '
                       . \Carbon\Carbon::parse($end)->format('H:i');
                return [$key => $label];
            })
            ->toArray();
    }

    public function createScheduleAction(): Action
    {
        return Action::make('createSchedule')
            ->label('Añadir Clase / Horario')
            ->modalHeading('Añadir Clase a la Planificación')
            ->color('warning')
            ->icon('heroicon-o-plus-circle')
            ->form([
                \Filament\Forms\Components\Select::make('horario_slot')
                    ->label('Bloque Horario')
                    ->options(fn() => $this->getSlotOptions())
                    ->required(),
                \Filament\Forms\Components\Select::make('day_of_week')
                    ->label('Día de la semana')
                    ->options([
                        'Lunes'     => 'Lunes',
                        'Martes'    => 'Martes',
                        'Miércoles' => 'Miércoles',
                        'Jueves'    => 'Jueves',
                        'Viernes'   => 'Viernes',
                        'Sábado'    => 'Sábado',
                    ])
                    ->required(),
                \Filament\Forms\Components\Select::make('subject_id')
                    ->label('Materia')
                    ->options(\App\Models\Subject::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                \Filament\Forms\Components\Select::make('teacher_id')
                    ->label('Docente')
                    ->options(\App\Models\Teacher::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                \Filament\Forms\Components\Select::make('classroom_id')
                    ->label('Aula')
                    ->options(\App\Models\Classroom::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
            ])
            ->action(function (array $data) {
                if (empty($this->data['career_id']) || empty($this->data['course_id'])) {
                    \Filament\Notifications\Notification::make()
                        ->title('Faltan datos')
                        ->body('Debes seleccionar la Carrera y Semestre arriba primero.')
                        ->danger()
                        ->send();
                    return;
                }

                // Extraer start_time y end_time del slot seleccionado
                [$start, $end] = explode('|', $data['horario_slot']);

                \App\Models\Schedule::create([
                    'career_id'   => $this->data['career_id'],
                    'course_id'   => $this->data['course_id'],
                    'turn_id'     => 1, // Siempre Noche
                    'day_of_week' => $data['day_of_week'],
                    'start_time'  => $start,
                    'end_time'    => $end,
                    'subject_id'  => $data['subject_id'],
                    'teacher_id'  => $data['teacher_id'],
                    'classroom_id'=> $data['classroom_id'],
                ]);

                \Filament\Notifications\Notification::make()
                    ->title('Clase añadida exitosamente')
                    ->success()
                    ->send();
            });
    }

    public function editScheduleAction(): Action
    {
        return Action::make('editSchedule')
            ->modalHeading('Editar Clase')
            ->icon('heroicon-o-pencil-square')
            ->color('info')
            ->fillForm(function (array $arguments): array {
                $schedule = \App\Models\Schedule::find($arguments['id'] ?? null);
                if (!$schedule) return [];
                $slotKey = rtrim($schedule->start_time, '') . '|' . rtrim($schedule->end_time, '');
                return [
                    'horario_slot' => $slotKey,
                    'day_of_week'  => $schedule->day_of_week,
                    'subject_id'   => $schedule->subject_id,
                    'teacher_id'   => $schedule->teacher_id,
                    'classroom_id' => $schedule->classroom_id,
                ];
            })
            ->form([
                \Filament\Forms\Components\Select::make('horario_slot')
                    ->label('Bloque Horario')
                    ->options(fn() => $this->getSlotOptions())
                    ->required(),
                \Filament\Forms\Components\Select::make('day_of_week')
                    ->label('Día de la semana')
                    ->options([
                        'Lunes'     => 'Lunes',
                        'Martes'    => 'Martes',
                        'Miércoles' => 'Miércoles',
                        'Jueves'    => 'Jueves',
                        'Viernes'   => 'Viernes',
                        'Sábado'    => 'Sábado',
                    ])
                    ->required(),
                \Filament\Forms\Components\Select::make('subject_id')
                    ->label('Materia')
                    ->options(\App\Models\Subject::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                \Filament\Forms\Components\Select::make('teacher_id')
                    ->label('Docente')
                    ->options(\App\Models\Teacher::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
                \Filament\Forms\Components\Select::make('classroom_id')
                    ->label('Aula')
                    ->options(\App\Models\Classroom::pluck('name', 'id'))
                    ->required()
                    ->searchable(),
            ])
            ->action(function (array $data, array $arguments) {
                $schedule = \App\Models\Schedule::find($arguments['id'] ?? null);
                if (!$schedule) return;
                [$start, $end] = explode('|', $data['horario_slot']);
                $schedule->update([
                    'day_of_week'  => $data['day_of_week'],
                    'start_time'   => $start,
                    'end_time'     => $end,
                    'subject_id'   => $data['subject_id'],
                    'teacher_id'   => $data['teacher_id'],
                    'classroom_id' => $data['classroom_id'],
                ]);
                \Filament\Notifications\Notification::make()
                    ->title('Clase actualizada exitosamente')
                    ->success()
                    ->send();
            });
    }

    public function deleteScheduleAction(): Action
    {
        return Action::make('deleteSchedule')
            ->requiresConfirmation()
            ->modalHeading('¿Eliminar esta clase?')
            ->modalDescription('Esta acción no se puede deshacer.')
            ->modalSubmitActionLabel('Sí, eliminar')
            ->color('danger')
            ->action(function (array $arguments) {
                $schedule = \App\Models\Schedule::find($arguments['id'] ?? null);
                if ($schedule) {
                    $schedule->delete();
                    \Filament\Notifications\Notification::make()
                        ->title('Clase eliminada')
                        ->success()
                        ->send();
                }
            });
    }
}
