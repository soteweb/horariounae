<?php

namespace App\Filament\Resources\Schedules\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class ScheduleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('career_id')
                    ->label('Carrera')
                    ->relationship('career', 'name')
                    ->required(),
                Select::make('course_id')
                    ->label('Curso')
                    ->relationship('course', 'name')
                    ->required(),
                Select::make('turn_id')
                    ->label('Turno')
                    ->relationship('turn', 'name')
                    ->required(),
                Select::make('teacher_id')
                    ->label('Profesor')
                    ->relationship('teacher', 'name')
                    ->required(),
                Select::make('subject_id')
                    ->label('Materia')
                    ->relationship('subject', 'name')
                    ->required(),
                Select::make('classroom_id')
                    ->label('Aula')
                    ->relationship('classroom', 'name')
                    ->required(),
                Select::make('day_of_week')
                    ->label('Día de la semana')
                    ->options([
                        'Lunes' => 'Lunes',
                        'Martes' => 'Martes',
                        'Miércoles' => 'Miércoles',
                        'Jueves' => 'Jueves',
                        'Viernes' => 'Viernes',
                        'Sábado' => 'Sábado',
                        'Domingo' => 'Domingo',
                    ])
                    ->required(),
                TimePicker::make('start_time')
                    ->label('Hora de inicio')
                    ->required(),
                TimePicker::make('end_time')
                    ->label('Hora de fin')
                    ->required(),
                Select::make('status')
                    ->label('Estado')
                    ->options([
                        'en curso' => 'En curso',
                        'programado' => 'Programado',
                        'cancelado' => 'Cancelado',
                    ])
                    ->default('programado')
                    ->required(),
            ]);
    }
}
