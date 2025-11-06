@extends('layouts.app')
@section('title', 'Simulador de Financiamento • Castel')

@section('content')
<style>
  .simulador-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 80vh;
    align-items: center;
  }
  .simulador-info {
    padding: 3rem;
    background: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?q=80&w=1973&auto=format&fit=crop') center/cover;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: #fff;
    position: relative;
  }
  .simulador-info::before {
    content: '';
    position: absolute; top:0; left:0; right:0; bottom:0;
    background: rgba(18, 29, 49, 0.6);
  }
  .simulador-info > * {
    position: relative;
    z-index: 1;
  }
  .simulador-tag {
    background-color: var(--brand-yellow);
    color: var(--brand-blue);
    padding: .25rem .75rem;
    border-radius: var(--radius-sm);
    font-weight: bold;
    font-size: .8rem;
    margin-bottom: 1rem;
    display: inline-block;
  }
  .simulador-form-container {
    padding: 3rem;
    display: flex;
    justify-content: center;
  }
  .simulador-form {
    width: 100%;
    max-width: 450px;
  }
  .form-group {
    margin-bottom: 1.25rem;
  }
  .form-group label {
    display: block;
    margin-bottom: .5rem;
    font-weight: 500;
  }
  .form-group input, .form-group select {
    width: 100%;
    padding: .75rem 1rem;
    border: 1px solid #ddd;
    border-radius: var(--radius-sm, 6px);
    font-size: 1rem;
  }
  .radio-group {
    display: flex; gap: 1rem;
  }
  @media (max-width: 992px) {
    .simulador-container { grid-template-columns: 1fr; }
    .simulador-info { min-height: 40vh; }
  }
</style>

<section class="section" style="padding:0;">
  <div class="simulador-container">
    <div class="simulador-info">
      <span class="simulador-tag">SIMULADOR CASTEL</span>
      <h1>Faltam poucos passos para a sua nova conquista</h1>
      <p class="lead">Construa novas histórias e transforme seu sonho em realidade.</p>
    </div>

    <div class="simulador-form-container">
      <div class="simulador-form card">
        <h3 style="margin-bottom:1.5rem">Vamos começar?</h3>
        <form action="{{ route('simulador.dados-adicionais') }}" method="GET">
          <div class="form-group">
            <select id="cidade" name="cidade" required>
              <option value="">Selecione a cidade desejada</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" name="renda" placeholder="Qual a sua renda familiar mensal?" required>
          </div>
          <div class="form-group">
            <label>Você pretende usar o seu saldo do FGTS?</label>
            <div class="radio-group">
              <label><input type="radio" name="fgts" value="sim" checked> Vou usar</label>
              <label><input type="radio" name="fgts" value="nao"> Não vou usar</label>
            </div>
          </div>
          <div class="form-group">
            <input type="text" name="entrada" placeholder="Valor de entrada (opcional)">
          </div>
          <div class="form-group">
            <input type="text" name="idade" placeholder="Qual a sua idade?" required>
          </div>
          <div class="actions">
            <button type="submit" class="btn red" style="width:100%">INICIAR SIMULAÇÃO</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection

@section('scripts')
<script src="/empreendimentos.data.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const cidades = [...new Set(EMPREENDIMENTOS.map(item => item.cidade))];
    const cidadeSelect = document.getElementById('cidade');
    cidades.sort().forEach(cidade => {
      const option = new Option(cidade, cidade);
      cidadeSelect.add(option);
    });
  });
</script>
@endsection
