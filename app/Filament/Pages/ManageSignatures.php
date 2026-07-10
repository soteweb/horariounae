<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Actions\Action;
use App\Models\Setting;
use Filament\Notifications\Notification;

class ManageSignatures extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-pencil-square';
    protected static \UnitEnum|string|null $navigationGroup = 'Configuración';
    protected static ?string $navigationLabel = 'Firmas Institucionales';
    protected static ?string $title = 'Firmas Institucionales';
    protected static ?int $navigationSort = 3;

    protected string $view = 'filament.pages.manage-signatures';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill([
            'secretary_name' => Setting::where('key', 'secretary_name')->value('value') ?? 'Lic. Jéssica Ibáñez',
            'secretary_signature' => Setting::where('key', 'secretary_signature')->value('value'),
            'director_name' => Setting::where('key', 'director_name')->value('value') ?? 'Mgtr. Gabriel Sotelo',
            'director_signature' => Setting::where('key', 'director_signature')->value('value'),
            'academic_director_name' => Setting::where('key', 'academic_director_name')->value('value') ?? 'Dra. Laura Arévalos',
            'academic_director_signature' => Setting::where('key', 'academic_director_signature')->value('value'),
            'approval_date' => Setting::where('key', 'approval_date')->value('value') ?? '___/___/2026',
        ]);
    }

    public function form(\Filament\Schemas\Schema $schema): \Filament\Schemas\Schema
    {
        return $schema
            ->schema([
                Section::make('Configuración de Firmas')
                    ->description('Estos nombres e imágenes aparecerán en la parte inferior del Horario de Clases.')
                    ->schema([
                        TextInput::make('secretary_name')
                            ->label('Nombre de Secretario/a')
                            ->required(),
                        FileUpload::make('secretary_signature')
                            ->label('Firma de Secretario/a (Imagen)')
                            ->image()
                            ->disk('public')
                            ->directory('signatures'),
                        
                        TextInput::make('director_name')
                            ->label('Nombre de Director/a')
                            ->required(),
                        FileUpload::make('director_signature')
                            ->label('Firma de Director/a (Imagen)')
                            ->image()
                            ->disk('public')
                            ->directory('signatures'),
                            
                        TextInput::make('academic_director_name')
                            ->label('Nombre de Directora Académica General')
                            ->required(),
                        FileUpload::make('academic_director_signature')
                            ->label('Firma de Directora Académica General (Imagen)')
                            ->image()
                            ->disk('public')
                            ->directory('signatures'),
                            
                        TextInput::make('approval_date')
                            ->label('Fecha de Aprobación (Texto)')
                            ->placeholder('Ej. ___/___/2026 o 15/03/2026')
                            ->required(),
                    ])->columns(2)
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $data = $this->form->getState();

        Setting::updateOrCreate(['key' => 'secretary_name'], ['value' => $data['secretary_name']]);
        Setting::updateOrCreate(['key' => 'secretary_signature'], ['value' => $data['secretary_signature'] ?? null]);
        Setting::updateOrCreate(['key' => 'director_name'], ['value' => $data['director_name']]);
        Setting::updateOrCreate(['key' => 'director_signature'], ['value' => $data['director_signature'] ?? null]);
        Setting::updateOrCreate(['key' => 'academic_director_name'], ['value' => $data['academic_director_name']]);
        Setting::updateOrCreate(['key' => 'academic_director_signature'], ['value' => $data['academic_director_signature'] ?? null]);
        Setting::updateOrCreate(['key' => 'approval_date'], ['value' => $data['approval_date']]);

        Notification::make()
            ->title('Firmas guardadas exitosamente')
            ->success()
            ->send();
    }
}
