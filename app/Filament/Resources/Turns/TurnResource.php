<?php

namespace App\Filament\Resources\Turns;

use App\Filament\Resources\Turns\Pages\CreateTurn;
use App\Filament\Resources\Turns\Pages\EditTurn;
use App\Filament\Resources\Turns\Pages\ListTurns;
use App\Filament\Resources\Turns\Schemas\TurnForm;
use App\Filament\Resources\Turns\Tables\TurnsTable;
use App\Models\Turn;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TurnResource extends Resource
{
    protected static ?string $model = Turn::class;

    protected static ?string $modelLabel = 'Turno';
    protected static ?string $pluralModelLabel = 'Turnos';
    protected static ?string $navigationLabel = 'Turnos';
    protected static \UnitEnum|string|null $navigationGroup = 'Recursos';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TurnForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TurnsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTurns::route('/'),
            'create' => CreateTurn::route('/create'),
            'edit' => EditTurn::route('/{record}/edit'),
        ];
    }
}
