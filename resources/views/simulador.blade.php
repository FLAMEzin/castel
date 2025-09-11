@extends('layouts.app')
@section('title','Simulador de Financiamento • Castel')
@section('description','Simule parcelas do financiamento do seu imóvel.')

@section('content')
<section class="section">
  <div class="container">
    <h2>Simulador de Financiamento</h2>
    <p class="muted">Estimativa (Tabela Price). Para proposta oficial, fale com nossa equipe.</p>

    <form id="form-simulador" class="card" style="padding:1rem;">
      <div class="form-grid">
        <div><label>Valor do imóvel (R$)</label><input class="input" name="valor" type="number" value="300000" step="1000" min="0"></div>
        <div><label>Entrada (R$)</label><input class="input" name="entrada" type="number" value="30000" step="1000" min="0"></div>
        <div><label>Juros a.a. (%)</label><input class="input" name="juros" type="number" value="9.5" step=".1" min="0"></div>
        <div><label>Prazo (meses)</label><input class="input" name="meses" type="number" value="360" step="12" min="12" max="420"></div>
      </div>
    </form>
    <div id="sim-out"></div>
  </div>
</section>
@endsection
