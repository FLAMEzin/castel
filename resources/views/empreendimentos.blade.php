@extends('layouts.app')
@section('title','Empreendimentos • Castel')
@section('description','Lançamentos, em construção, avulsos e entregues da Castel.')

@section('content')
<section class="section">
  <div class="container">
    <h2>Empreendimentos</h2>
    <p class="muted">Use os filtros para encontrar o imóvel ideal.</p>

    <div class="busca-controls">
      <div class="actions-bar">
        <button id="btn-filtro" class="btn orange-btn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"></path></svg>
            Filtros
        </button>
      </div>
      <div class="search-bar">
        <input id="f-busca" class="input" placeholder="Pesquise por imóveis...">
        <button class="search-btn">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </button>
      </div>
    </div>

    <form id="form-filtro" class="card" aria-label="Filtros de busca" style="padding:1rem; margin-bottom:1rem; display: none;">
      <div class="form-grid">
        <div>
          <label for="f-status">Status</label>
          <select id="f-status" name="status">
            <option value="">Todos</option>
            <option value="lancamento">Lançamentos</option>
            <option value="em_construcao">Em construção</option>
            <option value="avulso">Avulsos</option>
            <option value="entregue">Entregues</option>
          </select>
        </div>
        <div>
          <label for="f-tipo">Tipo</label>
          <select id="f-tipo" name="tipo">
            <option value="Casa/Apartamento">Casa/Apartamento</option>
            <option value="Lote">Lote</option>
          </select>
        </div>
        <div>
          <label for="f-cidade">Cidade</label>
          <input id="f-cidade" class="input" placeholder="Ex.: Natal" />
        </div>
        <div>
          <label for="f-quartos">Quartos</label>
          <select id="f-quartos">
            <option value="">Todos</option>
            <option>1</option><option>2</option><option>3</option><option>4</option>
          </select>
        </div>
        <div>
          <label for="f-preco-min">Preço mín. (R$)</label>
          <input id="f-preco-min" class="input" type="number" min="0" step="10000" />
        </div>
        <div>
          <label for="f-preco-max">Preço máx. (R$)</label>
          <input id="f-preco-max" class="input" type="number" min="0" step="10000" />
        </div>
        <div>
          <label for="f-area-min">Metragem mín. (m²)</label>
          <input id="f-area-min" class="input" type="number" min="0" step="1" />
        </div>
        <div>
          <label for="f-area-max">Metragem máx. (m²)</label>
          <input id="f-area-max" class="input" type="number" min="0" step="1" />
        </div>
      </div>
    </form>

    <div id="grid-empreendimentos" class="grid cols-3" aria-live="polite"></div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const btnFiltro = document.getElementById('btn-filtro');
    const formFiltro = document.getElementById('form-filtro');

    btnFiltro.addEventListener('click', function() {
        if (formFiltro.style.display === 'none') {
            formFiltro.style.display = 'block';
            btnFiltro.classList.add('active');
        } else {
            formFiltro.style.display = 'none';
            btnFiltro.classList.remove('active');
        }
    });
});
</script>
@endsection
