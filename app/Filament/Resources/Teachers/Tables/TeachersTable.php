<?php

namespace App\Filament\Resources\Teachers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TeachersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('')
                    ->circular(),
                TextColumn::make('name')
                    ->label('DOCENTE')
                    ->weight('bold')
                    ->description(fn (\App\Models\Teacher $record): string => 'ID: ' . $record->identifier)
                    ->searchable(),
                TextColumn::make('department')
                    ->label('ESPECIALIDAD / DPTO.')
                    ->badge()
                    ->color('gray')
                    ->default('-')
                    ->searchable(),
                TextColumn::make('contact')
                    ->label('INFORMACIÓN DE CONTACTO')
                    ->html()
                    ->getStateUsing(function (\App\Models\Teacher $record) {
                        return '<div class="text-sm">
                                    <div class="flex items-center gap-1 text-gray-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                        ' . ($record->email ?? '-') . '
                                    </div>
                                    <div class="flex items-center gap-1 text-gray-600 mt-1">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                        ' . ($record->phone ?? '-') . '
                                    </div>
                                </div>';
                    }),
                TextColumn::make('status')
                    ->label('ESTADO')
                    ->badge()
                    ->alignCenter()
                    ->color(fn (string $state): string => match (strtolower($state)) {
                        'activo' => 'success',
                        'en licencia' => 'warning',
                        'inactivo' => 'danger',
                        default => 'primary',
                    }),
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('department')
                    ->label('Especialidad / Dpto.')
                    ->options(fn () => \App\Models\Teacher::whereNotNull('department')->pluck('department', 'department')->toArray()),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
