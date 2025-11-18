@extends('layouts.app')
@section('title','Empreendimentos • Castel')
@section('description','Lançamentos, em construção, avulsos e entregues da Castel.')

@section('content')
<section class="section">
  <div class="container">
    <h2>Empreendimentos</h2>
    <p class="muted">Use os filtros para encontrar o imóvel ideal.</p>

    <div id="busca-container" class="form-grid">
        <input id="f-busca" class="input" placeholder="Pesquise por nome, cidade ou bairro" />
        <button id="btn-filtro" class="btn">Filtros</button>
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
        } else {
            formFiltro.style.display = 'none';
        }
    });
});
</script>
@endsection
