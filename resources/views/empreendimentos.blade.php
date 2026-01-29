@extends('layouts.app')
@section('title', 'Empreendimentos • Castel')
@section('description', 'Lançamentos, em construção, avulsos e entregues da Castel.')

@push('styles')
    <style>
        .busca-container {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .busca-principal {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .busca-input-wrapper {
            flex: 1;
            position: relative;
        }

        .busca-input-wrapper svg {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        .busca-input {
            width: 100%;
            padding: 1rem 1rem 1rem 3rem;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .busca-input:focus {
            outline: none;
            border-color: #133876;
            box-shadow: 0 0 0 3px rgba(19, 56, 118, 0.1);
        }

        .btn-filtros {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 1rem 1.5rem;
            background: #133876;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-filtros:hover {
            background: #1a4a9e;
        }

        .btn-filtros.active {
            background: #E31E24;
        }

        .filtros-avancados {
            display: none;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e0e0e0;
        }

        .filtros-avancados.open {
            display: block;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .filtros-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .filtro-grupo {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filtro-grupo label {
            font-weight: 600;
            color: #333;
            font-size: 0.9rem;
        }

        .filtro-grupo select,
        .filtro-grupo input {
            padding: 0.75rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .filtro-grupo select:focus,
        .filtro-grupo input:focus {
            outline: none;
            border-color: #133876;
        }

        .tags-filter-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.5rem;
        }

        .tag-filter {
            display: inline-flex;
            align-items: center;
            padding: 0.4rem 0.8rem;
            background: #f0f0f0;
            border: 2px solid transparent;
            border-radius: 20px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .tag-filter:hover {
            background: #e0e0e0;
        }

        .tag-filter.active {
            background: #133876;
            color: white;
        }

        .filtros-actions {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
            justify-content: flex-end;
        }

        .btn-limpar {
            padding: 0.75rem 1.5rem;
            background: #f0f0f0;
            color: #333;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-limpar:hover {
            background: #e0e0e0;
        }

        .resultados-info {
            margin-bottom: 1rem;
            color: #666;
            font-size: 0.95rem;
        }

        .resultados-info strong {
            color: #133876;
        }

        .no-results {
            text-align: center;
            padding: 3rem;
            color: #666;
        }

        .no-results svg {
            width: 64px;
            height: 64px;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        @media (max-width: 768px) {
            .busca-principal {
                flex-direction: column;
            }

            .btn-filtros {
                width: 100%;
                justify-content: center;
            }

            .filtros-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@section('content')
    <section class="section">
        <div class="container">
            <h2>Empreendimentos</h2>
            <p class="muted">Use a busca para encontrar o imóvel ideal.</p>

            {{-- Sistema de Busca --}}
            <div class="busca-container">
                <div class="busca-principal">
                    <div class="busca-input-wrapper">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.35-4.35" />
                        </svg>
                        <input type="text" id="busca-nome" class="busca-input"
                            placeholder="Buscar por nome do empreendimento...">
                    </div>
                    <button type="button" id="btn-toggle-filtros" class="btn-filtros">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <line x1="4" y1="21" x2="4" y2="14" />
                            <line x1="4" y1="10" x2="4" y2="3" />
                            <line x1="12" y1="21" x2="12" y2="12" />
                            <line x1="12" y1="8" x2="12" y2="3" />
                            <line x1="20" y1="21" x2="20" y2="16" />
                            <line x1="20" y1="12" x2="20" y2="3" />
                            <line x1="1" y1="14" x2="7" y2="14" />
                            <line x1="9" y1="8" x2="15" y2="8" />
                            <line x1="17" y1="16" x2="23" y2="16" />
                        </svg>
                        Filtros
                    </button>
                </div>

                {{-- Filtros Avançados --}}
                <div id="filtros-avancados" class="filtros-avancados">
                    <div class="filtros-grid">
                        <div class="filtro-grupo">
                            <label>Tipo de Imóvel</label>
                            <select id="filtro-tipo">
                                <option value="">Todos os tipos</option>
                                @foreach($tiposImoveis as $tipo)
                                    <option value="{{ $tipo->nome }}">{{ $tipo->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="filtro-grupo">
                            <label>Cidade</label>
                            <select id="filtro-cidade">
                                <option value="">Todas as cidades</option>
                                @php
                                    $cidades = $empreendimentos->pluck('cidade')->unique()->filter()->sort();
                                  @endphp
                                @foreach($cidades as $cidade)
                                    <option value="{{ $cidade }}">{{ $cidade }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="filtro-grupo">
                            <label>Quartos (mínimo)</label>
                            <select id="filtro-quartos">
                                <option value="">Qualquer</option>
                                <option value="1">1+</option>
                                <option value="2">2+</option>
                                <option value="3">3+</option>
                                <option value="4">4+</option>
                            </select>
                        </div>

                        <div class="filtro-grupo">
                            <label>Preço Máximo</label>
                            <select id="filtro-preco">
                                <option value="">Qualquer valor</option>
                                <option value="150000">Até R$ 150.000</option>
                                <option value="300000">Até R$ 300.000</option>
                                <option value="500000">Até R$ 500.000</option>
                                <option value="750000">Até R$ 750.000</option>
                                <option value="1000000">Até R$ 1.000.000</option>
                            </select>
                        </div>
                    </div>

                    <div class="filtro-grupo" style="margin-top: 1rem;">
                        <label>Características</label>
                        <div class="tags-filter-container" id="tags-container">
                            @php
                                $todasTags = collect();
                                foreach ($empreendimentos as $emp) {
                                    if ($emp->tags) {
                                        $todasTags = $todasTags->merge($emp->tags);
                                    }
                                }
                                $todasTags = $todasTags->unique()->sort();
                            @endphp
                            @foreach($todasTags as $tag)
                                <span class="tag-filter" data-tag="{{ $tag }}">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>

                    <div class="filtros-actions">
                        <button type="button" id="btn-limpar" class="btn-limpar">Limpar filtros</button>
                    </div>
                </div>
            </div>

            <p class="resultados-info" id="resultados-info">
                Mostrando <strong id="count-resultados">{{ $empreendimentos->count() }}</strong> empreendimentos
            </p>

            <div id="grid-empreendimentos" class="grid cols-3" aria-live="polite">
                @forelse ($empreendimentos as $empreendimento)
                    <article class="card" data-nome="{{ strtolower($empreendimento->title) }}"
                        data-tipo="{{ $empreendimento->tipoImovel?->nome }}" data-cidade="{{ $empreendimento->cidade }}"
                        data-quartos="{{ $empreendimento->quartos ?? 0 }}" data-valor="{{ $empreendimento->valor ?? 0 }}"
                        data-tags="{{ is_array($empreendimento->tags) ? implode(',', $empreendimento->tags) : '' }}">
                        <a class="thumb-link" href="{{ route('empreendimento', ['id' => $empreendimento->id]) }}"
                            aria-label="Ver {{ $empreendimento->title }}">
                            @if($empreendimento->foto_capa)
                                @if(Str::startsWith($empreendimento->foto_capa, 'http'))
                                    <img class="thumb" src="{{ $empreendimento->foto_capa }}"
                                        alt="Empreendimento {{ $empreendimento->title }}" />
                                @else
                                    <img class="thumb" src="{{ asset('storage/' . $empreendimento->foto_capa) }}"
                                        alt="Empreendimento {{ $empreendimento->title }}" />
                                @endif
                            @else
                                <img class="thumb" src="https://via.placeholder.com/600x400?text=Sem+Imagem"
                                    alt="Empreendimento {{ $empreendimento->title }}" />
                            @endif
                        </a>
                        <div class="body">
                            <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
                                @if($empreendimento->tipoImovel)
                                    <span class="badge red">{{ $empreendimento->tipoImovel->nome }}</span>
                                @endif
                                @if($empreendimento->cidade)
                                    <span
                                        class="badge">{{ $empreendimento->cidade }}{{ $empreendimento->estado ? '/' . $empreendimento->estado : '' }}</span>
                                @endif
                                @if($empreendimento->quartos)
                                    <span class="badge">{{ $empreendimento->quartos }} quartos</span>
                                @endif
                                @if($empreendimento->area)
                                    <span class="badge">{{ $empreendimento->area }} m²</span>
                                @endif
                            </div>
                            <h3 style="margin:.5rem 0 0;">{{ $empreendimento->title }}</h3>
                            <p class="muted" style="margin:0;">A partir de <strong>R$
                                    {{ number_format($empreendimento->valor ?? 0, 2, ',', '.') }}</strong></p>
                            <div style="margin-top:.75rem; display:flex; gap:.5rem; flex-wrap:wrap;">
                                <a class="btn" href="{{ route('empreendimento', ['id' => $empreendimento->id]) }}">Ver
                                    detalhes</a>
                                <a class="btn red"
                                    href="https://wa.me/5584994618126?text={{ urlencode('Olá! Tenho interesse no ' . $empreendimento->title . '.') }}"
                                    target="_blank" rel="noopener">Tenho interesse</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <p class="muted">Nenhum empreendimento encontrado.</p>
                @endforelse
            </div>

            <div id="no-results" class="no-results" style="display: none;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.35-4.35" />
                    <path d="M8 8l6 6M14 8l-6 6" />
                </svg>
                <h3>Nenhum empreendimento encontrado</h3>
                <p>Tente ajustar os filtros ou termo de busca.</p>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buscaNome = document.getElementById('busca-nome');
            const btnToggle = document.getElementById('btn-toggle-filtros');
            const filtrosAvancados = document.getElementById('filtros-avancados');
            const filtroTipo = document.getElementById('filtro-tipo');
            const filtroCidade = document.getElementById('filtro-cidade');
            const filtroQuartos = document.getElementById('filtro-quartos');
            const filtroPreco = document.getElementById('filtro-preco');
            const btnLimpar = document.getElementById('btn-limpar');
            const grid = document.getElementById('grid-empreendimentos');
            const countResultados = document.getElementById('count-resultados');
            const noResults = document.getElementById('no-results');

            let tagsAtivas = new Set();

            // Toggle filtros avançados
            btnToggle.addEventListener('click', function () {
                filtrosAvancados.classList.toggle('open');
                btnToggle.classList.toggle('active');
            });

            // Tags filter
            document.querySelectorAll('.tag-filter').forEach(tag => {
                tag.addEventListener('click', function () {
                    const tagValue = this.dataset.tag;
                    if (tagsAtivas.has(tagValue)) {
                        tagsAtivas.delete(tagValue);
                        this.classList.remove('active');
                    } else {
                        tagsAtivas.add(tagValue);
                        this.classList.add('active');
                    }
                    filtrar();
                });
            });

            // Função de filtrar
            function filtrar() {
                const nome = buscaNome.value.toLowerCase().trim();
                const tipo = filtroTipo.value;
                const cidade = filtroCidade.value;
                const quartos = parseInt(filtroQuartos.value) || 0;
                const precoMax = parseInt(filtroPreco.value) || Infinity;

                const cards = grid.querySelectorAll('.card');
                let visibleCount = 0;

                cards.forEach(card => {
                    const cardNome = card.dataset.nome || '';
                    const cardTipo = card.dataset.tipo || '';
                    const cardCidade = card.dataset.cidade || '';
                    const cardQuartos = parseInt(card.dataset.quartos) || 0;
                    const cardValor = parseInt(card.dataset.valor) || 0;
                    const cardTags = card.dataset.tags ? card.dataset.tags.split(',') : [];

                    let show = true;

                    // Filtro por nome
                    if (nome && !cardNome.includes(nome)) {
                        show = false;
                    }

                    // Filtro por tipo
                    if (tipo && cardTipo !== tipo) {
                        show = false;
                    }

                    // Filtro por cidade
                    if (cidade && cardCidade !== cidade) {
                        show = false;
                    }

                    // Filtro por quartos (mínimo)
                    if (quartos > 0 && cardQuartos < quartos) {
                        show = false;
                    }

                    // Filtro por preço máximo
                    if (precoMax !== Infinity && cardValor > precoMax) {
                        show = false;
                    }

                    // Filtro por tags
                    if (tagsAtivas.size > 0) {
                        const hasAllTags = [...tagsAtivas].every(tag => cardTags.includes(tag));
                        if (!hasAllTags) {
                            show = false;
                        }
                    }

                    card.style.display = show ? '' : 'none';
                    if (show) visibleCount++;
                });

                countResultados.textContent = visibleCount;
                noResults.style.display = visibleCount === 0 ? 'block' : 'none';
                grid.style.display = visibleCount === 0 ? 'none' : '';
            }

            // Event listeners
            buscaNome.addEventListener('input', filtrar);
            filtroTipo.addEventListener('change', filtrar);
            filtroCidade.addEventListener('change', filtrar);
            filtroQuartos.addEventListener('change', filtrar);
            filtroPreco.addEventListener('change', filtrar);

            // Limpar filtros
            btnLimpar.addEventListener('click', function () {
                buscaNome.value = '';
                filtroTipo.value = '';
                filtroCidade.value = '';
                filtroQuartos.value = '';
                filtroPreco.value = '';
                tagsAtivas.clear();
                document.querySelectorAll('.tag-filter').forEach(tag => tag.classList.remove('active'));
                filtrar();
            });
        });
    </script>
@endsection