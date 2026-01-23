@extends('layouts.app')
@section('title', 'Avulsos • Castel Construções e Incorporações')
@section('description', 'Imóveis avulsos disponíveis na Castel.')

@section('content')
  <section class="section">
    <div class="container">
      <h2>Imóveis Avulsos</h2>
      <p class="muted">Selecionamos oportunidades especiais. Para filtros completos, acesse <a
          href="{{ route('empreendimentos') }}">Empreendimentos</a>.</p>
      <div id="grid-empreendimentos" class="grid cols-3">
        {{-- JavaScript popula isso --}}
        <div style="grid-column: 1/-1; text-align: center; padding: 2rem;">
          <p>Carregando imóveis...</p>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script src="/assets/js/empreendimentos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Render apenas os 'avulso'
      // Verifica se EMPREENDIMENTOS existe (vem do arquivo js acima)
      if (typeof EMPREENDIMENTOS !== 'undefined') {
        const only = EMPREENDIMENTOS.filter(e => e.status === 'avulso');
        if (typeof renderLista === 'function') {
          renderLista(only);
        } else {
          console.error('Função renderLista não encontrada.');
        }
      }
    });
  </script>
@endsection