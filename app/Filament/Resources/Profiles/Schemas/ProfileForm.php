<?php

namespace App\Filament\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('subtitle')
                    ->required(),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('about_details')
                    ->required()
                    ->columnSpanFull(),
                \Filament\Forms\Components\FileUpload::make('avatar')
                    ->image()
                    ->default(null),
                \Filament\Forms\Components\FileUpload::make('cv_path')
                    ->default(null),
                TextInput::make('experience_years')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('completed_projects')
                    ->required()
                    ->numeric()
                    ->default(5),
                TextInput::make('education')
                    ->required(),
                TextInput::make('location')
                    ->required(),
            ]);
    }
}
