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
                    ->label('Título da Página Sobre')
                    ->required(),
                TextInput::make('sub_title')
                    ->label('Subtítulo')
                    ->required(),
                TextInput::make('anos_historia')
                    ->label('Anos de História')
                    ->required()
                    ->numeric(),
                TextInput::make('obras_entregues')
                    ->label('Obras Entregues')
                    ->required()
                    ->numeric(),
                Textarea::make('text_about')
                    ->label('Texto Sobre a Empresa')
                    ->required()
                    ->columnSpanFull(),

                TextInput::make('video_capa')
                    ->label('URL do Vídeo de Capa')
                    ->placeholder('https://exemplo.com/video.mp4 ou /media/video.mp4')
                    ->helperText('Cole a URL do vídeo de fundo da página Sobre. Deixe vazio para usar o vídeo padrão.'),
            ]);
    }
}
