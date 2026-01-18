<?php

namespace App\Filament\Resources\Empreendimentos\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Table;

class EmpreendimentosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->label('Título'),
                TextColumn::make('tipo')->label('Tipo'),
                TextColumn::make('cidade')->label('Cidade'),
                BooleanColumn::make('destaque_home')->label('Destaque na Home'),
            ]);
    }
}
