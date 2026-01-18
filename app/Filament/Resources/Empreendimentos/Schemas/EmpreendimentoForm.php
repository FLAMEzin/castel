<?php

namespace App\Filament\Resources\Empreendimentos\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class EmpreendimentoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->label('Título')
                    ->required(),
                Select::make('tipo')
                    ->label('Tipo')
                    ->options([
                        'apartamento' => 'Apartamento',
                        'casa' => 'Casa',
                        'terreno' => 'Terreno',
                        'comercial' => 'Comercial',
                    ]),
                TextInput::make('area')
                    ->label('Área')
                    ->helperText('Em metros quadrados')
                    ->numeric(),
                TextInput::make('quartos')
                    ->label('Quartos')
                    ->numeric(),
                TextInput::make('cidade')
                    ->label('Cidade'),
                TextInput::make('valor')
                    ->label('Valor')
                    ->numeric(),
                TagsInput::make('tags')
                    ->label('Tags'),
                TextInput::make('local_lat')
                    ->label('Latitude')
                    ->numeric(),
                TextInput::make('local_long')
                    ->label('Longitude')
                    ->numeric(),
                RichEditor::make('descricao')
                    ->label('Descrição'),
                Checkbox::make('destaque_home')
                    ->label('Destaque na Home'),
                TextInput::make('foto_capa')
                    ->label('Foto da Capa (URL)'),
                TextInput::make('foto_planta')
                    ->label('Foto da Planta (URL)'),
                Repeater::make('fotos')
                    ->relationship('fotos')
                    ->label('Fotos do Empreendimento (Galeria)')
                    ->schema([
                        TextInput::make('file_name')
                            ->label('URL da Foto')
                            ->required(),
                        TextInput::make('sub_title')
                            ->label('Legenda'),
                    ])
                    ->grid(2)
            ]);
    }
}
