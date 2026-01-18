@extends('layouts.app')
@section('title','Empreendimentos • Castel')
@section('description','Lançamentos, em construção, avulsos e entregues da Castel.')

@section('content')
<section class="section">
  <div class="container">
    <h2>Empreendimentos</h2>
    <p class="muted">Use os filtros para encontrar o imóvel ideal.</p>

    {{-- Estrutura de filtros que pode ser implementada no futuro --}}
    <div class="busca-controls" style="margin-bottom: 1rem;">
        {{-- Deixando a estrutura preparada para filtros --}}
    </div>

    <div id="grid-empreendimentos" class="grid cols-3" aria-live="polite">

        @forelse ($empreendimentos as $empreendimento)
            {{-- Card de Imóvel Dinâmico, baseado no seu placeholder --}}
            <a href="{{ route('empreendimento', ['id' => $empreendimento->id]) }}" class="card-imovel">
                
                {{-- Imagem de capa vinda do banco de dados --}}
                <img src="{{ asset('storage/' . $empreendimento->foto_capa) }}" alt="Foto de capa do empreendimento {{ $empreendimento->title }}" />
                
                <div class="card-body">
                    <div class="tags">
                        {{-- Tags dinâmicas baseadas nos dados do empreendimento --}}
                        @if($empreendimento->status)
                           <span class="tag">{{ str_replace('_', ' ', $empreendimento->status) }}</span>
                        @endif
                        @if($empreendimento->cidade)
                           <span class="tag">{{ $empreendimento->cidade }}</span>
                        @endif
                        @if($empreendimento->quartos)
                            <span class="tag">{{ $empreendimento->quartos }} quartos</span>
                        @endif
                        @if($empreendimento->area)
                            <span class="tag">{{ $empreendimento->area }}m²</span>
                        @endif
                    </div>
                    
                    {{-- Título vindo do banco de dados --}}
                    <h4>{{ $empreendimento->title }}</h4>
                    
                    {{-- Preço vindo do banco de dados, formatado como moeda --}}
                    <p class="price">A partir de R$ {{ number_format($empreendimento->valor, 2, ',', '.') }}</p>
                    
                    <p class="details-link">Ver detalhes</p>
                </div>
            </a>
        @empty
            {{-- Mensagem que aparece se não houver empreendimentos --}}
            <div class="col-span-3">
                <p>Nenhum empreendimento encontrado no momento.</p>
            </div>
        @endforelse

    </div>
  </div>
</section>
@endsection
