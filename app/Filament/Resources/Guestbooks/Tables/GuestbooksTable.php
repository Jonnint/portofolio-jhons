<?php

namespace App\Filament\Resources\Guestbooks\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GuestbooksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                \Filament\Tables\Columns\ImageColumn::make('photo'),
                IconColumn::make('is_approved')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                \Filament\Tables\Actions\Action::make('approve')
                    ->action(fn (\App\Models\Guestbook $record) => $record->update(['is_approved' => true]))
                    ->color('success')
                    ->icon('heroicon-o-check')
                    ->requiresConfirmation()
                    ->hidden(fn (\App\Models\Guestbook $record) => $record->is_approved),
                \Filament\Tables\Actions\Action::make('reject')
                    ->action(fn (\App\Models\Guestbook $record) => $record->update(['is_approved' => false]))
                    ->color('danger')
                    ->icon('heroicon-o-x-mark')
                    ->requiresConfirmation()
                    ->visible(fn (\App\Models\Guestbook $record) => $record->is_approved),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
