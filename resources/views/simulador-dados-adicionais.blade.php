@extends('layouts.app')
@section('title', 'Dados Adicionais • Simulador Castel')

@section('content')
<style>
  .progress-breadcrumb {
    display: flex; justify-content: center; gap: 1rem; padding: 1.5rem 0;
    background-color: #f7f7f7; border-bottom: 1px solid #eee;
  }
  .progress-step { display: flex; align-items: center; gap: .5rem; color: #aaa; position: relative; }
  .progress-step:not(:last-child)::after { content: ''; position: absolute; left: 100%; top: 50%; transform: translateY(-50%);
    width: 20px; height: 2px; background-color: #ddd; margin-left: .5rem; }
  .progress-step.completed:not(:last-child)::after { background-color: var(--brand-blue); }
  .progress-step.active, .progress-step.completed { color: var(--brand-blue); font-weight: bold; }
  .progress-step .number { width: 28px; height: 28px; border-radius: 50%; background-color: #ddd;
    color: #fff; display: grid; place-content: center; font-size: .9rem; z-index: 1; }
  .progress-step.active .number, .progress-step.completed .number { background-color: var(--brand-blue); }
  .form-container { max-width: 500px; margin: 3rem auto; padding: 2.5rem; }
  .form-group { margin-bottom: 1.25rem; }
  .form-group label { display: block; margin-bottom: .5rem; font-weight: 500; }
  .form-group input, .form-group select { width: 100%; padding: .75rem 1rem; border: 1px solid #ddd; border-radius: var(--radius-sm, 6px); font-size: 1rem; }
</style>

<main>
  <div class="progress-breadcrumb">
    <div class="progress-step completed"><span class="number">1</span> Dados da Simulação</div>
    <div class="progress-step active"><span class="number">2</span> Dados Adicionais</div>
    <div class="progress-step"><span class="number">3</span> Dados Pessoais</div>
    <div class="progress-step"><span class="number">4</span> Resultado</div>
  </div>

  <div class="container">
    <div class="card form-container">
      <div style="text-align:center; margin-bottom: 2rem;">
        <h3>Dados Adicionais</h3>
        <p class="muted">Precisamos de mais algumas informações.</p>
      </div>

      <form action="{{ route('simulador.dados-pessoais') }}" method="GET">
        <input type="hidden" name="cidade" value="{{ request('cidade') }}">
        <input type="hidden" name="renda" value="{{ request('renda') }}">
        <input type="hidden" name="fgts" value="{{ request('fgts') }}">
        <input type="hidden" name="entrada" value="{{ request('entrada') }}">
        <input type="hidden" name="idade" value="{{ request('idade') }}">

        <div class="form-group">
          <label for="estado_civil">Estado Civil</label>
          <select id="estado_civil" name="estado_civil" required>
            <option value="solteiro">Solteiro(a)</option>
            <option value="casado">Casado(a)</option>
            <option value="divorciado">Divorciado(a)</option>
            <option value="viuvo">Viúvo(a)</option>
          </select>
        </div>
        <div class="form-group">
            <label for="dependentes">Possui dependentes?</label>
            <select id="dependentes" name="dependentes" required>
                <option value="nao">Não</option>
                <option value="sim">Sim</option>
            </select>
        </div>

        <div class="actions" style="margin-top:2rem;">
          <button type="submit" class="btn red" style="width:100%">PRÓXIMO PASSO</button>
        </div>
      </form>
    </div>
  </div>
</main>
@endsection
