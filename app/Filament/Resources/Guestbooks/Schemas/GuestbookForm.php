<?php

namespace App\Filament\Resources\Guestbooks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GuestbookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('message')
                    ->required()
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->default(null),
                Toggle::make('is_approved')
                    ->required(),
            ]);
    }
}
