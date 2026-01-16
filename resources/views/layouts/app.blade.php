<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Castel Construções e Incorporações')</title>
  <meta name="theme-color" content="#143a7b" />
  <meta name="description" content="@yield('description', 'Construtora Castel — empreendimentos com qualidade e seriedade no RN.')" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/style.css" />

  @yield('head')
</head>
<body>
  <!-- Header -->
  <header class="header" role="banner">
    <div class="topbar" aria-label="Informações de contato">
      <div class="container">
        <span>{{ $home['horario_atendimento'] }}</span>
        <span class="sep">•</span>
        <a href="https://wa.me/{{ $home['whatsapp_business'] }}" style="color:#fff">{{ $home['phone'] }}</a>
        <span class="sep">•</span>
        <a href="mailto:{{ $home['email'] }}" style="color:#fff">{{ $home['email'] }}</a>
      </div>
    </div>
    <div class="container navbar" role="navigation" aria-label="Principal">
      <a class="brand" href="/index" aria-label="Castel - Início"><img src="/img/Logo.png" width="150" alt="Castel Logo" /></a>
      <nav class="nav" aria-label="Navegação do site">
        <a href="/index" class="@if(request()->is('index')) active @endif">Início</a>
        <a href="/sobre" class="@if(request()->is('sobre')) active @endif">Sobre Nós</a>
        <a href="/empreendimentos" class="@if(request()->is('empreendimentos')) active @endif">Empreendimentos</a>
        <a href="/servicos" class="@if(request()->is('servicos')) active @endif">Serviços</a>
        <a href="/simulador" class="@if(request()->is('simulador')) active @endif">Simulador</a>
        <a href="/contato" class="@if(request()->is('contato')) active @endif">Contato</a>
        <a href="https://castel.acadeone.com.br/vendas/" class="ctb">Corretores</a>
        <a class="cta" href="https://www.instagram.com/castelconstrutora" target="_blank" rel="noopener">Instagram</a>
      </nav>
      <button class="hamburger" aria-label="Abrir menu"><span></span></button>
    </div>
  </header>

  <main>
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="footer section" role="contentinfo">
    <div class="container">
      <div class="grid"> 
        <div>
          <a class="brand" href="/index"><img src="/img/Logo.png" width="150" alt="Castel Logo" /></a>
          <p class="muted" style="max-width:48ch">Construções e Incorporações. Qualidade, transparência e ética em cada empreendimento.</p>
        </div>
        <div>
          <h3 style="margin:.25rem 0;">Contato</h3>
          <p><a href="mailto:{{ $home['email'] }}">{{ $home['email'] }}</a><br /><a href="https://wa.me/{{ $home['whatsapp_business'] }}">{{ $home['phone'] }}</a></p>
          <p>{{ $home['endereco'] }}</p>
        </div>
        <div>
          <h3 style="margin:.25rem 0;">Navegação</h3>
          <p><a href="/sobre">Sobre Nós</a><br /><a href="/empreendimentos">Empreendimentos</a><br /><a href="/reservas">Reservas</a><br /><a href="/servicos">Serviços</a><br /><a href="/contato">Contato</a></p>
        </div>
      </div>
      <div class="subfooter">© <span id="year"></span> Castel Construções e Incorporações — Todos os direitos reservados.</div>
    </div>
  </footer>

  <!-- WhatsApp FAB -->
  <a id="wa-fab" class="whatsapp-fab" aria-label="Fale no WhatsApp" target="_blank" rel="noopener" href="https://wa.me/{{ $home['whatsapp_business'] }}">
    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.52 3.48A11.8 11.8 0 0012 0C5.39 0 .03 5.36.03 12a11.9 11.9 0 001.6 6L0 24l6.2-1.62a11.9 11.9 0 005.8 1.48h.01c6.61 0 11.97-5.36 11.97-12 0-3.2-1.25-6.2-3.46-8.38zM12 22.03h-.01a9.96 9.96 0 01-5.08-1.4l-.36-.21-3.68.96.98-3.58-.24-.37A9.97 9.97 0 012.03 12C2.03 6.5 6.5 2.03 12 2.03c2.65 0 5.14 1.03 7.01 2.9a9.86 9.86 0 012.92 7.07c0 5.5-4.47 9.97-9.93 9.97zm5.49-7.43c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07a8.08 8.08 0 01-2.38-1.47 9 9 0 01-1.67-2.06c-.18-.3 0-.46.14-.61.14-.15.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.57-.49-.5-.67-.5h-.57c-.2 0-.52.08-.8.37s-1.04 1.02-1.04 2.5 1.07 2.9 1.22 3.1c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.5 1.69.64.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.32.17-1.45-.07-.13-.27-.2-.57-.35z"/></svg>
  </a>

  <!-- Scripts -->
  <script src="/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Alerta para links do WhatsApp
      const waLinks = document.querySelectorAll('a[href*="wa.me"]');
      waLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();
          const url = this.href;
          Swal.fire({
            title: 'Abrir WhatsApp?',
            text: "Você será redirecionado para o WhatsApp para conversar com um de nossos especialistas.",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#25D366',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, abrir!',
            cancelButtonText: 'Cancelar'
          }).then((result) => {
            if (result.isConfirmed) {
              window.open(url, '_blank');
            }
          });
        });
      });

      // Preenche o ano no footer
      document.getElementById('year').textContent = new Date().getFullYear();
    });
  </script>

  @yield('scripts')
</body>
</html>
