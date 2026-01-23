<?php

namespace App\Filament\Resources\Empreendimentos\Schemas;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
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

                Select::make('tipo_imovel_id')
                    ->label('Tipo de Imóvel')
                    ->relationship('tipoImovel', 'nome')
                    ->searchable()
                    ->preload()
                    ->native(false)
                    ->createOptionForm([
                        TextInput::make('nome')
                            ->label('Nome do Tipo')
                            ->placeholder('Ex: Flat, Kitnet, Galpão...')
                            ->required()
                            ->maxLength(100)
                            ->unique('tipos_imoveis', 'nome'),
                    ])
                    ->createOptionModalHeading('Criar Novo Tipo de Imóvel')
                    ->editOptionForm([
                        TextInput::make('nome')
                            ->label('Nome do Tipo')
                            ->required()
                            ->maxLength(100)
                            ->unique('tipos_imoveis', 'nome', ignoreRecord: true),
                    ])
                    ->editOptionModalHeading('Editar Tipo de Imóvel')
                    ->helperText('Selecione um tipo, crie novo (+) ou edite o selecionado (lápis)'),

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

                // Imagens - Upload direto para o storage
                FileUpload::make('foto_capa')
                    ->label('Foto de Capa')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('16:9')
                    ->imageResizeTargetWidth('1200')
                    ->imageResizeTargetHeight('675')
                    ->directory('empreendimentos/capas')
                    ->disk('public')
                    ->visibility('public')
                    ->maxSize(5120) // 5MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->helperText('Envie a imagem principal do empreendimento (JPG, PNG ou WebP, máx. 5MB)'),

                // Galeria de Fotos
                Repeater::make('fotos')
                    ->relationship('fotos')
                    ->label('Galeria de Fotos')
                    ->helperText('Adicione fotos extras para a galeria do empreendimento')
                    ->schema([
                        FileUpload::make('file_name')
                            ->label('Foto')
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageResizeTargetWidth('1200')
                            ->imageResizeTargetHeight('800')
                            ->directory('empreendimentos/galeria')
                            ->disk('public')
                            ->visibility('public')
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
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
