@extends('layouts.app')
@section('title', 'Simulador de Financiamento • Castel')

@section('content')
<style>
  .simulador-container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    min-height: 80vh;
    align-items: center;
    background-color: #f4f7f6;
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
    background: rgba(18, 29, 49, 0.7);
  }
  .simulador-info > * {
    position: relative;
    z-index: 1;
  }
  .simulador-info h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
  }
  .simulador-info .lead {
      font-size: 1.15rem;
      opacity: 0.9;
  }
  .simulador-tag {
    background-color: #facc15; /* Corrigido: var(--brand-yellow) não existia */
    color: #143a7b; /* Usando o valor de --brand-blue diretamente */
    padding: .25rem .75rem;
    border-radius: 6px; /* Corrigido: var(--radius-sm) não existia */
    font-weight: bold;
    font-size: .8rem;
    margin-bottom: 1rem;
    display: inline-block;
  }
  .simulador-form-container {
    padding: 3rem;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  .simulador-form.card {
    width: 100%;
    max-width: 480px;
    background-color: #fff;
    border-radius: 8px; /* Corrigido: var(--radius-md) não existia */
    padding: 2.5rem;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
  }
  .simulador-form.card:hover {
    transform: none;
    box-shadow: 0 10px 25px rgba(0,0,0,0.08);
  }
  .simulador-form h3 {
      text-align: center;
      margin-bottom: 2rem;
      font-size: 1.75rem;
      color: #333;
  }
  .form-group {
    margin-bottom: 1.5rem;
  }
  .form-group > label {
    display: block;
    margin-bottom: .6rem;
    font-weight: 600;
    font-size: 0.9rem;
    color: #555;
  }
  .form-group input, .form-group select {
    width: 100%;
    padding: .85rem 1rem;
    border: 1px solid #ccc;
    border-radius: 6px; /* Corrigido: var(--radius-sm) não existia */
    font-size: 1rem;
  }
  .form-group input:focus, .form-group select:focus {
      outline: none;
      border-color: #ccc;
  }
  .radio-group {
    display: flex;
    gap: 1.5rem;
    margin-top: 0.75rem;
  }
  .radio-group label {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-weight: 500;
      cursor: pointer;
  }
  .radio-group input[type="radio"] {
      width: auto;
      accent-color: #1E3A8A; /* Corrigido: var(--brand-blue) */
  }
  .actions .btn {
      width: 100%;
      padding: 1rem;
      font-size: 1rem;
      font-weight: bold;
      letter-spacing: .5px;
      text-transform: uppercase;
  }

  @media (max-width: 992px) {
    .simulador-container { grid-template-columns: 1fr; }
    .simulador-info { min-height: 50vh; text-align: center; }
    .simulador-form-container { padding: 2rem; }
    .simulador-form.card { padding: 2rem; }
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
        <h3>Vamos começar?</h3>
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
            <button type="submit" class="btn red">INICIAR SIMULAÇÃO</button>
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
