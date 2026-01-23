@extends('layouts.app')
@section('title', 'Resultado da Simulação • Castel')

@section('content')
  <style>
    /* Estilos para o breadcrumb de progresso */
    .progress-breadcrumb {
      display: flex;
      justify-content: center;
      gap: 1rem;
      padding: 1.5rem 0;
      background-color: #f7f7f7;
      border-bottom: 1px solid #eee;
    }

    .progress-step {
      display: flex;
      align-items: center;
      gap: .5rem;
      color: #aaa;
    }

    .progress-step.active {
      color: var(--brand-blue);
      font-weight: bold;
    }

    .progress-step .number {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      background-color: #ddd;
      color: #fff;
      display: grid;
      place-content: center;
      font-size: .9rem;
    }

    .progress-step.active .number {
      background-color: var(--brand-blue);
    }

    /* Estilos para o conteúdo do resultado */
    .resultado-grid {
      display: grid;
      grid-template-columns: 1.5fr 1fr;
      gap: 3rem;
      align-items: flex-start;
      max-width: 1100px;
      margin: 3rem auto;
    }

    .resultado-info h2 {
      font-size: 2.5rem;
      margin-bottom: .5rem;
    }

    .resultado-card {
      border: 1px solid #ddd;
      border-radius: var(--radius-md);
    }

    .resultado-card .tabs {
      display: flex;
    }

    .resultado-card .tab {
      flex: 1;
      padding: .75rem 1rem;
      text-align: center;
      background: #f1f1f1;
      border-bottom: 1px solid #ddd;
      cursor: pointer;
    }

    .resultado-card .tab.active {
      background: #fff;
      border-bottom-color: transparent;
      font-weight: 500;
    }

    .resultado-valor {
      padding: 2rem;
      text-align: center;
    }

    .resultado-valor .valor {
      font-size: 3rem;
      font-weight: bold;
      color: var(--brand-blue);
      margin: .5rem 0;
    }

    .resultado-detalhes {
      padding: 0 1.5rem 1.5rem;
      font-size: .9rem;
    }

    .detalhe-item {
      display: flex;
      justify-content: space-between;
      padding: .75rem 0;
      border-bottom: 1px solid #eee;
    }

    .detalhe-item:last-child {
      border-bottom: 0;
    }

    .corretor-card {
      display: flex;
      align-items: center;
      gap: 1.5rem;
      margin-top: 2rem;
    }

    .corretor-card img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
    }

    .corretor-actions {
      margin-top: 2rem;
      display: flex;
      flex-direction: column;
      gap: .75rem;
    }

    @media (max-width: 992px) {
      .resultado-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>

  <main>
    <div class="progress-breadcrumb">
      <div class="progress-step completed"><span class="number">1</span> Dados da Simulação</div>
      <div class="progress-step completed"><span class="number">2</span> Dados Adicionais</div>
      <div class="progress-step completed"><span class="number">3</span> Dados Pessoais</div>
      <div class="progress-step active"><span class="number">4</span> Resultado</div>
    </div>

    <section class="section">
      <div class="container">
        <div class="resultado-grid">
          <div class="resultado-info">
            <h2>Simulação Finalizada!</h2>
            <p class="lead">Fale com um de nossos especialistas e consulte a possibilidade de compor sua renda e aplicar
              subsídios de programas estaduais e federais.</p>

            <div class="corretor-card">
              <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?q=80&w=300" alt="Foto do corretor">
              <div>
                <h4>Fale agora com um corretor!</h4>
                <p class="muted">Tire todas as suas dúvidas sobre parcelas e prazos.</p>
              </div>
            </div>

            <div class="corretor-actions">
              <a href="{{ route('contato') }}" class="btn ghost">Agendar uma visita</a>
              <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $home['whatsapp_business']) }}?text=Ol%C3%A1!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es."
                class="btn red" target="_blank" rel="noopener">Falar pelo WhatsApp</a>
            </div>
          </div>

          <div class="resultado-card">
            <div class="tabs">
              <div class="tab active">Tabela Price</div>
              <div class="tab">Tabela SAC</div>
            </div>
            <div class="resultado-valor">
              <small>Valor estimado da parcela</small>
              <p class="valor">R$ 28,95</p>
            </div>
            <div class="resultado-detalhes">
              <p class="muted small">Na Tabela Price, as parcelas são todas iguais, de valor fixo, da primeira à última.
              </p>
              <div class="detalhe-item">
                <span>Taxa de juros</span>
                <strong>5.116% a.a.</strong>
              </div>
              <div class="detalhe-item">
                <span>Seguro DFI</span>
                <strong>0.0143%</strong>
              </div>
              <div class="detalhe-item">
                <span>Valor original do imóvel</span>
                <strong>R$ 190.000,00</strong>
              </div>
              <div class="detalhe-item">
                <span>Valor de entrada</span>
                <strong>R$ 20,00</strong>
              </div>
              <div class="detalhe-item">
                <span>FGTS</span>
                <strong>R$ 0,00</strong>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection