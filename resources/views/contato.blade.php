@extends('layouts.app')
@section('title','Contato • Castel Construções e Incorporações')
@section('description','Fale com a Castel: endereço, telefone/WhatsApp e formulário de contato.')

@section('content')
<section class="section">
  <div class="container">
    <h1 style="margin:0 0 .5rem;">Contato</h1>
    <p class="muted" style="margin-top:.25rem">Diga como podemos ajudar. Respondemos rapidinho 🙂</p>

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
              <input id="ct-telefone" class="input" name="telefone" type="tel" inputmode="tel" autocomplete="tel" required>
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
            <button class="btn secondary" type="submit" data-send="email">Enviar por E-mail</button>
          </div>

          <p class="form-ok muted" hidden>Mensagem preparada! Abrimos seu app para envio.</p>
          <p class="form-err" style="color:var(--brand-red); display:none;">Confira os campos obrigatórios.</p>
        </form>

        <!-- Ações rápidas -->
        <div class="card" style="margin-top:1rem;">
          <div class="body" style="display:flex; gap:1rem; flex-wrap:wrap;">
            <a class="btn red" target="_blank" rel="noopener"
               href="https://wa.me/5584994618126?text=Ol%C3%A1!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informa%C3%A7%C3%B5es.">
              Falar no WhatsApp
            </a>
            <a class="btn" href="mailto:contato@castel.com.br">Enviar e-mail</a>
            <a class="btn secondary" href="tel:+5584988004885">Ligar agora</a>
          </div>
        </div>
      </div>

      <!-- Endereço + mapa -->
      <div>
        <div class="card">
          <div class="body">
            <strong>Nosso endereço</strong>
            <p style="margin:.25rem 0 0">
              Logradouro: Rua Seis de Janeiro, 1837<br>
              Bairro: Santo Antonio<br>
              Município/UF: Mossoró, RN<br>
              Tel: <a href="tel:+5584988004885">(84) 98800-4885</a> •
              <a href="mailto:contato@castel.com.br">contato@castel.com.br</a>
            </p>
          </div>
          <div style="padding:0 1rem 1rem;">
            <div style="position:relative; width:100%; aspect-ratio:16/9; overflow:hidden; border-radius:12px;">
              <iframe
                title="Mapa Castel"
                loading="lazy"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q=-5.187,-37.344&z=14&output=embed"
                style="position:absolute; inset:0; width:100%; height:100%; border:0;">
              </iframe>
            </div>
          </div>
        </div>

        <div class="card" style="margin-top:1rem;">
          <div class="body">
            <strong>Horário de atendimento</strong>
            <p class="muted" style="margin:.25rem 0 0">Seg a Sex, 8h às 18h • Sáb, 8h às 12h</p>
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
  (function(){
    const form = document.getElementById('form-contato');
    if(!form) return;

    const ok  = form.querySelector('.form-ok');
    const err = form.querySelector('.form-err');

    // guarda qual botão foi clicado
    form.addEventListener('click', (e)=>{
      const btn = e.target.closest('button[type="submit"][data-send]');
      if(btn){ form.dataset.send = btn.getAttribute('data-send'); }
    });

    form.addEventListener('submit', (e)=>{
      e.preventDefault();
      err.style.display = 'none';

      // validação simples
      const ids = ['ct-assunto','ct-nome','ct-email','ct-telefone','ct-mensagem','ct-consent'];
      for(const id of ids){
        const el = document.getElementById(id);
        if(!el) continue;
        const valid = (el.type === 'checkbox') ? el.checked : !!String(el.value||'').trim();
        if(!valid){ err.style.display = 'block'; el.focus(); return; }
      }

      const data = {
        assunto: form.assunto.value,
        nome: form.nome.value,
        email: form.email.value,
        telefone: form.telefone.value,
        cidade: form.cidade.value || '',
        mensagem: form.mensagem.value
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

      if(modo === 'email'){
        const mailto = 'mailto:contato@castel.com.br'
          + '?subject=' + encodeURIComponent('Contato — ' + data.assunto)
          + '&body=' + encodeURIComponent(texto);
        window.location.href = mailto;
      }else{
        const wa = 'https://wa.me/5584994618126?text=' + encodeURIComponent(texto);
        window.open(wa, '_blank', 'noopener');
      }

      ok.hidden = false;
      form.reset();
      // opcional: rolar até o feedback
      ok.scrollIntoView({behavior:'smooth', block:'center'});
    });
  })();
</script>
@endsection
