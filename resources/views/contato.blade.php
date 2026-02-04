@extends('layouts.app')
@section('title', 'Contato • Castel Construções e Incorporações')
@section('description', 'Fale com a Castel: endereço, telefone/WhatsApp e formulário de contato.')

@section('content')
  <section class="section">
    <div class="container">
      <h1 style="margin:0 0 .5rem;">Contato</h1>
      <p class="muted" style="margin-top:.25rem">{{ $home['contato_text'] }}</p>

      <div class="grid" style="grid-template-columns: 1fr 1fr; align-items:start;">
        <!-- Formulário -->
        <div>
          <form id="form-contato" class="card" style="padding:1rem;" novalidate>
            <div class="form-grid">
              <div class="full">
                <label for="ct-assunto">Assunto</label>
                <select id="ct-assunto" name="assunto" class="input" required>
                  <option value="Orçamento / Proposta">Orçamento / Proposta</option>
                  <option value="Dúvida sobre empreendimento">Dúvida sobre empreendimento</option>
                  <option value="Pós-venda / Garantia">Pós-venda / Garantia</option>
                  <option value="Outros">Outros</option>
                </select>
              </div>

              <div>
                <label for="ct-nome">Nome</label>
                <input id="ct-nome" class="input" name="nome" autocomplete="name" required>
              </div>
              <div>
                <label for="ct-email">E-mail</label>
                <input id="ct-email" class="input" name="email" type="email" autocomplete="email" required>
              </div>

              <div>
                <label for="ct-telefone">Telefone/WhatsApp</label>
                <input id="ct-telefone" class="input" name="telefone" type="tel" inputmode="tel" autocomplete="tel"
                  required>
              </div>
              <div>
                <label for="ct-cidade">Cidade</label>
                <input id="ct-cidade" class="input" name="cidade" placeholder="Ex.: Mossoró/RN">
              </div>

              <div class="full">
                <label for="ct-mensagem">Mensagem</label>
                <textarea id="ct-mensagem" class="input" name="mensagem" rows="6" required></textarea>
              </div>

              <div class="full">
                <label><input id="ct-consent" type="checkbox" required> Autorizo o contato da Castel.</label>
              </div>
            </div>

            <div style="display:flex; gap:.5rem; flex-wrap:wrap; margin-top:.5rem;">
              <button class="btn" type="submit" data-send="whatsapp">Enviar por WhatsApp</button>
            </div>

            <p class="form-ok muted" hidden>Mensagem preparada! Abrimos seu app para envio.</p>
            <p class="form-err" style="color:var(--brand-red); display:none;">Confira os campos obrigatórios.</p>
          </form>

          <!-- Ações rápidas -->
          <div class="card" style="margin-top:1rem;">
            <div class="body" style="display:flex; gap:1rem; flex-wrap:wrap;">
              <a class="btn red" target="_blank" rel="noopener"
                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $home['whatsapp_business']) }}?text=Ol%C3%A1!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es.">
                Falar no WhatsApp
              </a>
              <a class="btn secondary" href="tel:{{ $home['phone'] }}">Ligar agora</a>
            </div>
          </div>
        </div>

        <!-- Endereço + mapa -->
        <div>
          <div class="card">
            <div class="body">
            {{-- Mapa de Localização --}}
            @php
              $enderecoUrl = urlencode($home['endereco']);

              // Link para abrir no Google Maps
              $googleMapsLink = "https://www.google.com/maps/search/" . $enderecoUrl;
            @endphp
            <section style="margin-top: 3rem;">
              <h3 class="section-title">Localização</h3>
              <p style="margin-bottom: 1rem; color: #666;">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                  style="vertical-align: middle; margin-right: 0.5rem;">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                  <circle cx="12" cy="10" r="3" />
                </svg>
                {{ $home['endereco'] }}
              </p>
              <div class="mapa-container">
                <iframe src="https://www.google.com/maps?q={{ $enderecoUrl }}&z=17&output=embed" width="100%" height="400"
                  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
              </div>
              <a href="{{ $googleMapsLink }}" target="_blank" rel="noopener"
                style="display: inline-flex; align-items: center; gap: 0.5rem; margin-top: 1rem; color: #133876; font-weight: 500;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6" />
                  <polyline points="15 3 21 3 21 9" />
                  <line x1="10" y1="14" x2="21" y2="3" />
                </svg>
                Abrir no Google Maps
              </a>
            </section>
              <strong>Nosso endereço</strong>
              <p style="margin:.25rem 0 0">
                {{ $home['endereco'] }}<br>
                Tel: <a href="tel:{{ $home['phone'] }}">{{ $home['phone'] }}</a> •
                <a href="mailto:{{ $home['email'] }}">{{ $home['email'] }}</a>
              </p>
            </div>
          </div>

          <div class="card" style="margin-top:1rem;">
            <div class="body">
              <strong>Horário de atendimento</strong>
              <p class="muted" style="margin:.25rem 0 0">{{ $home['horario_atendimento'] }}</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
@endsection

@section('scripts')
  <script>
    // Contato: escolhe WhatsApp ou E-mail conforme botão clicado
    (function () {
      const form = document.getElementById('form-contato');
      if (!form) return;

      const ok = form.querySelector('.form-ok');
      const err = form.querySelector('.form-err');

      // guarda qual botão foi clicado
      form.addEventListener('click', (e) => {
        const btn = e.target.closest('button[type="submit"][data-send]');
        if (btn) { form.dataset.send = btn.getAttribute('data-send'); }
      });

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        err.style.display = 'none';

        // validação simples
        const ids = ['ct-assunto', 'ct-nome', 'ct-email', 'ct-telefone', 'ct-consent'];
        for (const id of ids) {
          const el = document.getElementById(id);
          if (!el) continue;
          const valid = (el.type === 'checkbox') ? el.checked : !!String(el.value || '').trim();
          if (!valid) { err.style.display = 'block'; el.focus(); return; }
        }

        const data = {
          assunto: form.assunto.value,
          nome: form.nome.value,
          email: form.email.value,
          telefone: form.telefone.value,
          cidade: form.cidade.value || '',
          mensagem: form.mensagem.value || ''
        };

        const texto =
          `*Contato via site — Castel*
  Assunto: ${data.assunto}
  Nome: ${data.nome}
  E-mail: ${data.email}
  Telefone: ${data.telefone}
  Cidade: ${data.cidade}

  Mensagem:
  ${data.mensagem}`;

        const modo = form.dataset.send || 'whatsapp';

        if (modo === 'email') {
          const mailto = 'mailto:{{ $home['email'] }}'
            + '?subject=' + encodeURIComponent('Contato — ' + data.assunto)
            + '&body=' + encodeURIComponent(texto);
          window.location.href = mailto;
        } else {
          const wa = 'https://wa.me/{{ preg_replace('/[^0-9]/', '', $home['whatsapp_business']) }}?text=' + encodeURIComponent(texto);
          window.open(wa, '_blank', 'noopener');
        }

        ok.hidden = false;
        form.reset();
        // opcional: rolar até o feedback
        ok.scrollIntoView({ behavior: 'smooth', block: 'center' });
      });
    })();
  </script>
@endsection