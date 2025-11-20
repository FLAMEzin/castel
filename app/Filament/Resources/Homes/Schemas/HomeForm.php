<?php

namespace App\Filament\Resources\Homes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HomeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required(),
                TextInput::make('endereco')
                    ->required(),
                TextInput::make('whatsapp_business')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('sub_title')
                    ->required(),
                TextInput::make('horario_atendimento')
                    ->required(),
            ]);
    }
}
