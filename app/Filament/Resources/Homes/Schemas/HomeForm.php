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
                    ->label('Título da Home')
                    ->required(),
                TextInput::make('sub_title')
                    ->label('Subtítulo da Home')
                    ->required(),
                TextInput::make('horario_atendimento')
                    ->required(),

                TextInput::make('video_capa')
                    ->label('URL do Vídeo de Capa')
                    ->placeholder('Link do video do youtube.')
                    ->helperText('Cole a URL do vídeo de fundo da página inicial. Deixe vazio para usar o vídeo padrão.'),
            ]);
    }
}
