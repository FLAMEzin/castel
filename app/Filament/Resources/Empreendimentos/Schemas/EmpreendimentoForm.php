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
            ->components([
                // Informações Principais
                TextInput::make('title')
                    ->label('Nome do Empreendimento')
                    ->placeholder('Ex: Residencial Atlântico')
                    ->required()
                    ->maxLength(255),

                Select::make('tipo')
                    ->label('Tipo de Imóvel')
                    ->options([
                        'apartamento' => 'Apartamento',
                        'casa' => 'Casa',
                        'terreno' => 'Terreno/Lote',
                        'comercial' => 'Comercial',
                        'cobertura' => 'Cobertura',
                        'studio' => 'Studio',
                    ])
                    ->native(false),

                TextInput::make('area')
                    ->label('Área (m²)')
                    ->placeholder('Ex: 85')
                    ->numeric()
                    ->helperText('Área em metros quadrados'),

                TextInput::make('quartos')
                    ->label('Quartos')
                    ->placeholder('Ex: 3')
                    ->numeric(),

                TextInput::make('valor')
                    ->label('Valor (R$)')
                    ->placeholder('Ex: 350000')
                    ->numeric()
                    ->helperText('Valor do imóvel em reais (somente números)'),

                Checkbox::make('destaque_home')
                    ->label('Destacar na página inicial'),

                // Descrição e Tags
                RichEditor::make('descricao')
                    ->label('Descrição do Empreendimento')
                    ->placeholder('Descreva o empreendimento, suas características e diferenciais...')
                    ->toolbarButtons([
                        'bold',
                        'italic',
                        'underline',
                        'bulletList',
                        'orderedList',
                        'h2',
                        'h3',
                        'redo',
                        'undo',
                    ]),

                TagsInput::make('tags')
                    ->label('Tags / Características')
                    ->placeholder('Digite e pressione Enter')
                    ->helperText('Ex: Piscina, Academia, Churrasqueira, Portaria 24h')
                    ->suggestions([
                        'Piscina',
                        'Academia',
                        'Churrasqueira',
                        'Playground',
                        'Portaria 24h',
                        'Pet Friendly',
                        'Salão de Festas',
                        'Coworking',
                        'Varanda Gourmet',
                        'Vista Mar',
                        'Elevador',
                        'Garagem Coberta',
                    ]),

                // Endereço Completo
                TextInput::make('rua')
                    ->label('Rua / Logradouro')
                    ->placeholder('Ex: Av. das Palmeiras')
                    ->helperText('Nome da rua ou avenida'),

                TextInput::make('numero')
                    ->label('Número')
                    ->placeholder('Ex: 1500'),

                TextInput::make('cidade')
                    ->label('Cidade')
                    ->placeholder('Ex: Natal'),

                Select::make('estado')
                    ->label('Estado')
                    ->options([
                        'AC' => 'Acre',
                        'AL' => 'Alagoas',
                        'AP' => 'Amapá',
                        'AM' => 'Amazonas',
                        'BA' => 'Bahia',
                        'CE' => 'Ceará',
                        'DF' => 'Distrito Federal',
                        'ES' => 'Espírito Santo',
                        'GO' => 'Goiás',
                        'MA' => 'Maranhão',
                        'MT' => 'Mato Grosso',
                        'MS' => 'Mato Grosso do Sul',
                        'MG' => 'Minas Gerais',
                        'PA' => 'Pará',
                        'PB' => 'Paraíba',
                        'PR' => 'Paraná',
                        'PE' => 'Pernambuco',
                        'PI' => 'Piauí',
                        'RJ' => 'Rio de Janeiro',
                        'RN' => 'Rio Grande do Norte',
                        'RS' => 'Rio Grande do Sul',
                        'RO' => 'Rondônia',
                        'RR' => 'Roraima',
                        'SC' => 'Santa Catarina',
                        'SP' => 'São Paulo',
                        'SE' => 'Sergipe',
                        'TO' => 'Tocantins',
                    ])
                    ->native(false)
                    ->searchable()
                    ->placeholder('Selecione o estado'),

                // Imagens
                TextInput::make('foto_capa')
                    ->label('Foto de Capa (URL)')
                    ->placeholder('https://exemplo.com/imagem-capa.jpg')
                    ->helperText('Cole a URL da imagem principal do empreendimento'),

                TextInput::make('foto_planta')
                    ->label('Foto da Planta Baixa (URL)')
                    ->placeholder('https://exemplo.com/planta.jpg')
                    ->helperText('Cole a URL da imagem da planta baixa'),

                // Galeria de Fotos
                Repeater::make('fotos')
                    ->relationship('fotos')
                    ->label('Galeria de Fotos')
                    ->helperText('Adicione fotos extras para a galeria do empreendimento')
                    ->schema([
                        TextInput::make('file_name')
                            ->label('URL da Foto')
                            ->placeholder('https://exemplo.com/foto.jpg')
                            ->required(),
                        TextInput::make('sub_title')
                            ->label('Legenda')
                            ->placeholder('Ex: Vista da fachada'),
                    ])
                    ->grid(2)
                    ->addActionLabel('+ Adicionar foto')
                    ->reorderable()
                    ->collapsible()
                    ->itemLabel(fn(array $state): ?string => $state['sub_title'] ?? 'Nova foto'),
            ]);
    }
}
