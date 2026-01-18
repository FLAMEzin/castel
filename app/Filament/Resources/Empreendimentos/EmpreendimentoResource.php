<?php

namespace App\Filament\Resources\Empreendimentos;

use App\Filament\Resources\Empreendimentos\Pages\CreateEmpreendimento;
use App\Filament\Resources\Empreendimentos\Pages\EditEmpreendimento;
use App\Filament\Resources\Empreendimentos\Pages\ListEmpreendimentos;
use App\Filament\Resources\Empreendimentos\Schemas\EmpreendimentoForm;
use App\Filament\Resources\Empreendimentos\Tables\EmpreendimentosTable;
use App\Models\Empreendimento;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class EmpreendimentoResource extends Resource
{
    protected static ?string $model = Empreendimento::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Empreendimentos';

    public static function form(Schema $schema): Schema
    {
        return EmpreendimentoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmpreendimentosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmpreendimentos::route('/'),
            'create' => CreateEmpreendimento::route('/create'),
            'edit' => EditEmpreendimento::route('/{record}/edit'),
        ];
    }
}
