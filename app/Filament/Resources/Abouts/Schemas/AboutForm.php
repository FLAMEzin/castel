<?php

namespace App\Filament\Resources\Abouts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AboutForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('sub_title')
                    ->required(),
                TextInput::make('anos_historia')
                    ->required()
                    ->numeric(),
                TextInput::make('obras_entregues')
                    ->required()
                    ->numeric(),
                Textarea::make('text_about')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
