<?php

namespace App\Filament\Resources\Servicos\Schemas;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class ServicoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('image_url')
                    ->label('URL da Imagem')
                    ->url()
                    ->live(onBlur: true)
                    ->required(),
                Placeholder::make('image_preview')
                    ->label('Prévia da Imagem')
                    ->content(function ($get) {
                        $url = $get('image_url');
                        if ($url) {
                            return new HtmlString('<img src="' . e($url) . '" style="max-width: 200px; max-height: 200px;">');
                        }
                        return null;
                    })
                    ->visible(fn ($get) => (bool) $get('image_url')),
            ]);
    }
}
