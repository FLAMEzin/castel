<?php

namespace App\Filament\Resources\Servicos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServicoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('image_url')
                    ->label('Imagem do Serviço')
                    ->image()
                    ->required()
                    ->imageResizeMode('cover')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('600')
                    ->directory('servicos/capas')
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(5120) // 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->helperText('Envie uma imagem para o serviço (JPG, PNG ou WebP, máx. 5MB)'),
            ]);
    }
}
