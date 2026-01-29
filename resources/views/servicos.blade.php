@extends('layouts.app')
@section('title', 'Castel Serviços • Castel')
@section('description', 'Serviços e obras de infraestrutura.')

@section('head')
  <style>
    .service-card {
      position: relative;
      border-radius: var(--radius-md);
      overflow: hidden;
      display: block;
      cursor: pointer;
    }

    .service-card figure {
      margin: 0;
      padding: 0;
      position: relative;
      width: 100%;
      height: 100%;
    }

    .service-card::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: linear-gradient(to top, rgba(18, 29, 49, 0.9) 0%, rgba(18, 29, 49, 0.4) 50%, transparent 100%);
      z-index: 1;
      transition: background .3s ease;
    }

    .service-card:hover::after {
      background: linear-gradient(to top, rgba(18, 29, 49, 0.7) 0%, transparent 80%);
    }

    .service-card img {
      display: block;
      width: 100%;
      height: 300px;
      object-fit: cover;
      object-position: center;
      transition: transform .3s ease;
    }

    .service-card:hover img {
      transform: scale(1.1);
    }

    .service-card figcaption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 1.25rem;
      color: #fff;
      z-index: 2;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      justify-content: flex-end;
    }

    .service-card h3 {
      margin: 0 0 .5rem;
      font-size: 1.5rem;
      color: #fff;
    }

    .form-group {
      margin-bottom: 1.25rem;
    }

    .form-group label {
      display: block;
      margin-bottom: .5rem;
      font-weight: 500;
      color: var(--text-color-light);
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: .75rem 1rem;
      border: 1px solid #ddd;
      border-radius: var(--radius-sm, 6px);
      background-color: #f9f9f9;
      font-size: 1rem;
      color: var(--text-color);
      transition: border-color .2s, box-shadow .2s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
      outline: none;
      border-color: var(--brand-blue);
      box-shadow: 0 0 0 3px rgba(18, 29, 49, 0.1);
    }

    .form-group input[readonly] {
      background-color: #eee;
      font-weight: 500;
      color: var(--brand-blue);
    }

    .actions {
      margin-top: 2rem;
      text-align: right;
    }
  </style>
@endsection

@section('content')
  <section class="section">
    <div class="container">

      <div style="text-align:center; max-width:70ch; margin:2rem auto;">
        <h2>Nossos Serviços</h2>
        <p class="muted">Soluções completas para a sua obra. Clique em um serviço para solicitar um orçamento.</p>
      </div>

      <div class="grid cols-3">
        @foreach($servicos as $servico)
          <div class="service-card" data-service="{{ $servico->title }}">
            <figure><img src="{{asset('storage/' . $servico->image_url) }}" alt="Serviço de {{ $servico->title }}" />
              <figcaption>
                <h3>{{ $servico->title }}</h3><span class="btn">Orçamento</span>
              </figcaption>
            </figure>
          </div>
        @endforeach
      </div>

    </div>
  </section>

  <section id="orcamento-form-section" class="section" style="padding-top:0;">
    <div class="container" style="max-width: 70ch; margin: auto;">
      <div class="card" style="padding: 2rem;">
        <div style="text-align:center; margin-bottom: 2rem;">
          <h2>Pedido de Orçamento</h2>
          <p class="muted">Preencha o formulário abaixo para solicitar um orçamento para o serviço desejado.</p>
        </div>

        <form id="orcamento-form">
          <div class="form-group">
            <label for="servico">Serviço</label>
            <input type="text" id="servico" name="servico" readonly required>
          </div>
          <div class="form-group">
            <label for="nome">Seu nome</label>
            <input type="text" id="nome" name="nome" required>
          </div>
          <div class="form-group">
            <label for="email">Seu e-mail</label>
            <input type="email" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="telefone">Seu telefone</label>
            <input type="tel" id="telefone" name="telefone">
          </div>
          <div class="form-group">
            <label for="mensagem">Mensagem</label>
            <textarea id="mensagem" name="mensagem" rows="5"
              placeholder="Forneça mais detalhes sobre sua necessidade..."></textarea>
          </div>
          <div class="actions">
            <button type="submit" class="btn red">Enviar pedido</button>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const servicoCards = document.querySelectorAll('.service-card');
      const servicoInput = document.getElementById('servico');
      const formSection = document.getElementById('orcamento-form-section');
      const orcamentoForm = document.getElementById('orcamento-form');

      // Clicar no card de serviço
      servicoCards.forEach(card => {
        card.addEventListener('click', () => {
          const servicoName = card.dataset.service;
          servicoInput.value = servicoName;

          // Rola a tela até o formulário
          formSection.scrollIntoView({ behavior: 'smooth' });
        });
      });

      // Envio do formulário
      orcamentoForm.addEventListener('submit', function (e) {
        e.preventDefault();

        // Coleta os dados
        const servico = document.getElementById('servico').value;
        const nome = document.getElementById('nome').value;
        const email = document.getElementById('email').value;
        const telefone = document.getElementById('telefone').value;
        const mensagem = document.getElementById('mensagem').value;

        // Validação simples
        if (!servico || !nome || !email) {
          Swal.fire('Atenção!', 'Por favor, preencha o serviço, nome e e-mail.', 'warning');
          return;
        }

        // Monta a mensagem para o WhatsApp
        let waMessage = `Olá! Gostaria de solicitar um orçamento para o serviço de *${servico}*.\n\n`;
        waMessage += `*Nome:* ${nome}\n`;
        waMessage += `*E-mail:* ${email}\n`;
        if (telefone) waMessage += `*Telefone:* ${telefone}\n`;
        if (mensagem) waMessage += `*Mensagem:* ${mensagem}\n`;

        const waURL = `https://wa.me/{{ preg_replace('/[^0-9]/', '', $home['whatsapp_business']) }}?text=${encodeURIComponent(waMessage)}`;

        // Exibe a confirmação com SweetAlert2
        Swal.fire({
          title: 'Confirmar Envio',
          text: "Você será redirecionado para o WhatsApp para enviar sua solicitação.",
          icon: 'info',
          showCancelButton: true,
          confirmButtonColor: '#25D366',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Sim, Enviar via WhatsApp!',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            window.open(waURL, '_blank');
            // Opcional: Limpar o formulário após o envio
            orcamentoForm.reset();
          }
        });
      });
    });
  </script>
@endsection