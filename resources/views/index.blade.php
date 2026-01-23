@extends('layouts.app')

@section('title', 'Início • Castel Construções e Incorporações')
@section('description', 'Construtora Castel — empreendimentos com qualidade e seriedade no RN.')

@push('styles')
  <style>
    /* Carrossel de Destaques */
    .carousel-container {
      position: relative;
      overflow: hidden;
      margin: 0 -1rem;
      padding: 0 1rem;
    }

    .carousel-track {
      display: flex;
      gap: 1.5rem;
      transition: transform 0.5s ease;
      padding: 1rem 0;
    }

    .carousel-track .card {
      flex: 0 0 calc(33.333% - 1rem);
      min-width: 300px;
    }

    .carousel-controls {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 1.5rem;
    }

    .carousel-btn {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 48px;
      height: 48px;
      background: #133876;
      color: white;
      border: none;
      border-radius: 50%;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .carousel-btn:hover {
      background: #1a4a9e;
      transform: scale(1.1);
    }

    .carousel-btn:disabled {
      background: #ccc;
      cursor: not-allowed;
      transform: none;
    }

    .carousel-dots {
      display: flex;
      justify-content: center;
      gap: 0.5rem;
      margin-top: 1rem;
    }

    .carousel-dot {
      width: 12px;
      height: 12px;
      background: #ddd;
      border: none;
      border-radius: 50%;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .carousel-dot.active {
      background: #133876;
      transform: scale(1.2);
    }

    .carousel-dot:hover {
      background: #E31E24;
    }

    @media (max-width: 992px) {
      .carousel-track .card {
        flex: 0 0 calc(50% - 0.75rem);
      }
    }

    @media (max-width: 576px) {
      .carousel-track .card {
        flex: 0 0 100%;
      }
    }
  </style>
@endpush

@section('content')
  <section class="hero" role="region" aria-label="Apresentação">
    @php
      // Garantir acesso seguro seja objeto ou array
      $videoUrl = is_array($home) ? ($home['video_capa'] ?? null) : ($home->video_capa ?? null);

      // Se ainda for nulo, tenta fallback do model
      if (!$videoUrl && $home instanceof \App\Models\Home) {
        $videoUrl = $home->video_capa;
      }

      $isYoutube = $videoUrl && (str_contains($videoUrl, 'youtube.com') || str_contains($videoUrl, 'youtu.be'));
      $youtubeId = null;

      if ($isYoutube) {
        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $videoUrl, $matches)) {
          $youtubeId = $matches[1];
        }
      }
    @endphp
    @if($isYoutube && $youtubeId)
      <div class="youtube-bg-wrapper">
        <iframe
          src="https://www.youtube.com/embed/{{ $youtubeId }}?autoplay=1&mute=1&loop=1&playlist={{ $youtubeId }}&controls=0&showinfo=0&rel=0&modestbranding=1&iv_load_policy=3&disablekb=1&playsinline=1"
          frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
        </iframe>
      </div>
    @else
      <video src="{{ $videoUrl ?: '/media/VideoCastelHome.mp4' }}" autoplay muted loop playsinline></video>
    @endif
    <div class="content">
      <h1 style="color:var(--brand-blue); text-shadow:none">{{ $home['title'] }}</h1>
      <p class="lead">{{ $home['sub_title'] }}</p>
      <div class="actions">
        <a class="cta" href="/empreendimentos">Ver Empreendimentos</a>
        <a class="cta" style="background:var(--brand-blue)" href="/contato">Fale Conosco</a>
      </div>
    </div>
  </section>

  <section class="section" id="destaques">
    <div class="container">
      <h2>Destaques</h2>
      <p class="muted">Conheça nossos empreendimentos em destaque.</p>

      @if($destaques->count() > 0)
        <div class="carousel-container">
          <div class="carousel-track" id="carousel-track">
            @foreach ($destaques as $empreendimento)
              <article class="card">
                <a class="thumb-link" href="{{ route('empreendimento', ['id' => $empreendimento->id]) }}"
                  aria-label="Ver {{ $empreendimento->title }}">
                  @if($empreendimento->foto_capa)
                    @if(Str::startsWith($empreendimento->foto_capa, 'http'))
                      <img class="thumb" src="{{ $empreendimento->foto_capa }}"
                        alt="Empreendimento {{ $empreendimento->title }}" />
                    @else
                      <img class="thumb" src="{{ asset('storage/' . $empreendimento->foto_capa) }}"
                        alt="Empreendimento {{ $empreendimento->title }}" />
                    @endif
                  @else
                    <img class="thumb" src="https://via.placeholder.com/600x400?text=Sem+Imagem"
                      alt="Empreendimento {{ $empreendimento->title }}" />
                  @endif
                </a>
                <div class="body">
                  <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
                    @if($empreendimento->tipoImovel)
                      <span class="badge red">{{ $empreendimento->tipoImovel->nome }}</span>
                    @endif
                    <span
                      class="badge">{{ $empreendimento->cidade }}{{ $empreendimento->estado ? '/' . $empreendimento->estado : '' }}</span>
                  </div>
                  <h3 style="margin:.5rem 0;">{{ $empreendimento->title }}</h3>
                  <p class="muted" style="margin:0 0 .5rem;">A partir de <strong>R$
                      {{ number_format($empreendimento->valor ?? 0, 2, ',', '.') }}</strong></p>
                  <a class="cta" href="{{ route('empreendimento', ['id' => $empreendimento->id]) }}">Saiba mais</a>
                </div>
              </article>
            @endforeach
          </div>
        </div>

        @if($destaques->count() > 3)
          <div class="carousel-controls">
            <button type="button" class="carousel-btn" id="carousel-prev" aria-label="Anterior">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="15 18 9 12 15 6" />
              </svg>
            </button>
            <button type="button" class="carousel-btn" id="carousel-next" aria-label="Próximo">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="9 18 15 12 9 6" />
              </svg>
            </button>
          </div>

          <div class="carousel-dots" id="carousel-dots">
            {{-- Dots serão gerados via JS --}}
          </div>
        @endif
      @else
        <p class="muted">Nenhum empreendimento em destaque no momento.</p>
      @endif
    </div>
  </section>

@endsection

@section('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const track = document.getElementById('carousel-track');
      const prevBtn = document.getElementById('carousel-prev');
      const nextBtn = document.getElementById('carousel-next');
      const dotsContainer = document.getElementById('carousel-dots');

      if (!track || !prevBtn || !nextBtn) return;

      const cards = track.querySelectorAll('.card');
      const totalCards = cards.length;

      // Calcular quantos cards visíveis por vez
      function getVisibleCards() {
        const width = window.innerWidth;
        if (width <= 576) return 1;
        if (width <= 992) return 2;
        return 3;
      }

      let currentIndex = 0;
      let visibleCards = getVisibleCards();
      let maxIndex = Math.max(0, totalCards - visibleCards);

      // Criar dots
      function createDots() {
        if (!dotsContainer) return;
        dotsContainer.innerHTML = '';
        const numDots = maxIndex + 1;
        for (let i = 0; i < numDots; i++) {
          const dot = document.createElement('button');
          dot.className = 'carousel-dot' + (i === 0 ? ' active' : '');
          dot.setAttribute('aria-label', `Ir para slide ${i + 1}`);
          dot.addEventListener('click', () => goToSlide(i));
          dotsContainer.appendChild(dot);
        }
      }

      // Atualizar dots
      function updateDots() {
        if (!dotsContainer) return;
        const dots = dotsContainer.querySelectorAll('.carousel-dot');
        dots.forEach((dot, index) => {
          dot.classList.toggle('active', index === currentIndex);
        });
      }

      // Mover carrossel
      function updateCarousel() {
        const cardWidth = cards[0].offsetWidth + 24; // width + gap
        track.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        updateDots();

        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= maxIndex;
      }

      function goToSlide(index) {
        currentIndex = Math.max(0, Math.min(index, maxIndex));
        updateCarousel();
      }

      prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
          currentIndex--;
          updateCarousel();
        }
      });

      nextBtn.addEventListener('click', () => {
        if (currentIndex < maxIndex) {
          currentIndex++;
          updateCarousel();
        }
      });

      // Recalcular ao redimensionar
      window.addEventListener('resize', () => {
        visibleCards = getVisibleCards();
        maxIndex = Math.max(0, totalCards - visibleCards);
        currentIndex = Math.min(currentIndex, maxIndex);
        createDots();
        updateCarousel();
      });

      // Auto-play (opcional)
      let autoPlay = setInterval(() => {
        if (currentIndex < maxIndex) {
          currentIndex++;
        } else {
          currentIndex = 0;
        }
        updateCarousel();
      }, 5000);

      // Pausar autoplay ao hover
      track.addEventListener('mouseenter', () => clearInterval(autoPlay));
      track.addEventListener('mouseleave', () => {
        autoPlay = setInterval(() => {
          if (currentIndex < maxIndex) {
            currentIndex++;
          } else {
            currentIndex = 0;
          }
          updateCarousel();
        }, 5000);
      });

      createDots();
      updateCarousel();
    });
  </script>
@endsection