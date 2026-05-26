<?php
require 'vendor/autoload.php';

$classes = [
    'Filament\Tables\Actions\BulkActionGroup',
    'Filament\Tables\Actions\DeleteBulkAction',
    'Filament\Tables\Actions\EditAction',
    'Filament\Tables\Columns\TextColumn',
    'Filament\Tables\Columns\IconColumn',
    'Filament\Tables\Columns\ImageColumn',
    'Filament\Tables\Table',
    'Filament\Actions\EditAction',
    'Filament\Actions\BulkActionGroup',
    'Filament\Actions\DeleteAction',
    'Filament\Actions\DeleteBulkAction',
    'Filament\Schemas\Schema',
    'Filament\Forms\Components\TextInput',
    'Filament\Resources\Resource',
];

foreach ($classes as $c) {
    echo $c . ': ' . (class_exists($c) ? 'EXISTS' : 'NOT FOUND') . PHP_EOL;
}
