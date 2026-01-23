@extends('layouts.app')

@section('title', ($empreendimento->title ?? 'Empreendimento') . ' • Castel')
@section('description', Str::limit(strip_tags($empreendimento->descricao ?? ''), 160))

@push('styles')
  <style>
    /* Estilos específicos para página de empreendimento */
    .empreendimento-header {
      position: relative;
      margin-bottom: 2rem;
    }

    .empreendimento-capa {
      width: 100%;
      height: 450px;
      object-fit: cover;
      border-radius: 16px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .empreendimento-title {
      font-size: 2.5rem;
      font-weight: 700;
      margin: 1.5rem 0 1rem;
      color: var(--brand-text, #1a1a2e);
    }

    .badge-container {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-bottom: 1.5rem;
    }

    .badge-premium {
      display: inline-flex;
      align-items: center;
      gap: 0.4rem;
      padding: 0.5rem 1rem;
      border-radius: 50px;
      font-size: 0.85rem;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .badge-premium.tipo {
      background: #133876;
      color: white;
    }

    .badge-premium.cidade {
      background: #E31E24;
      color: white;
    }

    .badge-premium.info {
      background: rgba(0, 0, 0, 0.08);
      color: var(--brand-text, #333);
    }

    .badge-premium:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .tags-container {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin: 1.5rem 0;
    }

    .tag-premium {
      display: inline-flex;
      align-items: center;
      padding: 0.4rem 0.9rem;
      background: #133876;
      color: white;
      border-radius: 20px;
      font-size: 0.8rem;
      font-weight: 500;
      transition: all 0.3s ease;
    }

    .tag-premium:hover {
      transform: scale(1.05);
      background: #1a4a9e;
      box-shadow: 0 4px 15px rgba(19, 56, 118, 0.4);
    }

    .descricao-content {
      font-size: 1.1rem;
      line-height: 1.8;
      color: var(--brand-text-muted, #555);
      margin: 1.5rem 0;
    }

    .descricao-content p {
      margin-bottom: 1rem;
    }

    .section-title {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 1rem;
      color: var(--brand-text, #1a1a2e);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .section-title::before {
      content: '';
      width: 4px;
      height: 24px;
      background: #E31E24;
      border-radius: 2px;
    }

    /* Galeria estilo Amazon */
    .gallery-amazon {
      margin-bottom: 2rem;
    }

    .gallery-main {
      position: relative;
      width: 100%;
      height: 450px;
      border-radius: 16px;
      overflow: hidden;
      cursor: zoom-in;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
    }

    .gallery-main img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .gallery-main:hover img {
      transform: scale(1.02);
    }

    .gallery-main .zoom-hint {
      position: absolute;
      bottom: 1rem;
      right: 1rem;
      background: rgba(0, 0, 0, 0.7);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      font-size: 0.85rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .gallery-main:hover .zoom-hint {
      opacity: 1;
    }

    .gallery-thumbnails {
      display: flex;
      gap: 0.75rem;
      margin-top: 1rem;
      overflow-x: auto;
      padding-bottom: 0.5rem;
    }

    .gallery-thumbnails::-webkit-scrollbar {
      height: 6px;
    }

    .gallery-thumbnails::-webkit-scrollbar-track {
      background: #f1f1f1;
      border-radius: 3px;
    }

    .gallery-thumbnails::-webkit-scrollbar-thumb {
      background: #133876;
      border-radius: 3px;
    }

    .gallery-thumb {
      flex-shrink: 0;
      width: 80px;
      height: 60px;
      border-radius: 8px;
      overflow: hidden;
      cursor: pointer;
      border: 3px solid transparent;
      transition: all 0.3s ease;
      opacity: 0.7;
    }

    .gallery-thumb:hover {
      opacity: 1;
      border-color: #133876;
    }

    .gallery-thumb.active {
      opacity: 1;
      border-color: #E31E24;
      box-shadow: 0 4px 12px rgba(227, 30, 36, 0.3);
    }

    .gallery-thumb img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .gallery-counter {
      position: absolute;
      top: 1rem;
      left: 1rem;
      background: rgba(0, 0, 0, 0.7);
      color: white;
      padding: 0.4rem 0.8rem;
      border-radius: 6px;
      font-size: 0.85rem;
      font-weight: 500;
    }

    /* Modal Lightbox */
    .lightbox-modal {
      display: none;
      position: fixed;
      inset: 0;
      z-index: 9999;
      background: rgba(0, 0, 0, 0.95);
      align-items: center;
      justify-content: center;
      padding: 1rem;
    }

    .lightbox-modal.active {
      display: flex;
      animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
      }
    }

    .lightbox-content {
      position: relative;
      max-width: 90vw;
      max-height: 90vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .lightbox-content img {
      max-width: 100%;
      max-height: 80vh;
      object-fit: contain;
      border-radius: 8px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .lightbox-caption {
      margin-top: 1rem;
      color: white;
      font-size: 1.1rem;
      text-align: center;
    }

    .lightbox-close {
      position: absolute;
      top: -50px;
      right: 0;
      background: none;
      border: none;
      color: white;
      font-size: 2rem;
      cursor: pointer;
      padding: 0.5rem;
      transition: transform 0.3s ease;
    }

    .lightbox-close:hover {
      transform: scale(1.2);
    }

    .lightbox-nav {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(255, 255, 255, 0.2);
      border: none;
      color: white;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .lightbox-nav:hover {
      background: rgba(255, 255, 255, 0.4);
    }

    .lightbox-prev {
      left: -80px;
    }

    .lightbox-next {
      right: -80px;
    }

    .lightbox-counter {
      position: absolute;
      top: -50px;
      left: 0;
      color: rgba(255, 255, 255, 0.7);
      font-size: 0.9rem;
    }

    @media (max-width: 768px) {
      .lightbox-nav {
        width: 40px;
        height: 40px;
      }

      .lightbox-prev {
        left: 10px;
      }

      .lightbox-next {
        right: 10px;
      }
    }

    .sidebar-card {
      background: white;
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 2rem;
    }

    .price-display {
      font-size: 2rem;
      font-weight: 800;
      color: #133876;
      margin: 0.5rem 0 1rem;
    }

    .btn-interesse {
      display: block;
      width: 100%;
      padding: 1rem;
      background: #E31E24;
      color: white;
      text-align: center;
      border-radius: 12px;
      font-weight: 700;
      font-size: 1rem;
      text-decoration: none;
      transition: all 0.3s ease;
      margin-bottom: 1rem;
    }

    .btn-interesse:hover {
      transform: translateY(-2px);
      background: #c91a1f;
      box-shadow: 0 10px 30px rgba(227, 30, 36, 0.4);
    }

    .btn-whatsapp {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      width: 100%;
      padding: 1rem;
      background: #25D366;
      color: white;
      text-align: center;
      border-radius: 12px;
      font-weight: 700;
      font-size: 1rem;
      text-decoration: none;
      transition: all 0.3s ease;
    }

    .btn-whatsapp:hover {
      background: #128C7E;
      transform: translateY(-2px);
      box-shadow: 0 10px 30px rgba(37, 211, 102, 0.4);
    }

    .details-list {
      list-style: none;
      padding: 0;
      margin: 1.5rem 0;
    }

    .details-list li {
      display: flex;
      justify-content: space-between;
      padding: 0.75rem 0;
      border-bottom: 1px solid rgba(0, 0, 0, 0.08);
    }

    .details-list li:last-child {
      border-bottom: none;
    }

    .details-list .label {
      color: var(--brand-text-muted, #666);
    }

    .details-list .value {
      font-weight: 600;
      color: var(--brand-text, #1a1a2e);
    }

    .mapa-container {
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
      margin-top: 1rem;
    }

    .mapa-container iframe {
      display: block;
    }

    .back-link {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      color: #133876;
      text-decoration: none;
      font-weight: 500;
      margin-bottom: 1.5rem;
      transition: all 0.3s ease;
    }

    .back-link:hover {
      gap: 0.75rem;
    }

    @media (max-width: 768px) {
      .empreendimento-grid {
        grid-template-columns: 1fr !important;
      }

      .empreendimento-capa {
        height: 300px;
      }

      .empreendimento-title {
        font-size: 1.8rem;
      }

      .sidebar-card {
        position: relative;
        top: 0;
      }
    }
  </style>
@endpush

@section('content')
  <main class="section">
    <div class="container" id="detalhe-empreendimento">

      <a href="{{ route('empreendimentos') }}" class="back-link">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M19 12H5M12 19l-7-7 7-7" />
        </svg>
        Voltar para empreendimentos
      </a>

      <div class="empreendimento-grid grid" style="grid-template-columns: 1.5fr 1fr; align-items: start; gap: 2.5rem;">

        {{-- Coluna Principal --}}
        <div class="col-main">

          {{-- Galeria de Fotos estilo Amazon --}}
          @php
            // Construir array de todas as imagens (capa + galeria)
            $todasImagens = collect();

            if ($empreendimento->foto_capa) {
              $capaUrl = Str::startsWith($empreendimento->foto_capa, 'http')
                ? $empreendimento->foto_capa
                : asset('storage/' . $empreendimento->foto_capa);
              $todasImagens->push(['url' => $capaUrl, 'caption' => 'Foto principal']);
            }

            foreach ($empreendimento->fotos as $foto) {
              $fotoUrl = Str::startsWith($foto->file_name, 'http')
                ? $foto->file_name
                : asset('storage/' . $foto->file_name);
              $todasImagens->push(['url' => $fotoUrl, 'caption' => $foto->sub_title ?? '']);
            }
          @endphp

          @if($todasImagens->count() > 0)
            <div class="gallery-amazon">
              {{-- Imagem Principal --}}
              <div class="gallery-main" onclick="openLightbox(currentGalleryIndex)">
                <img id="gallery-main-image" src="{{ $todasImagens->first()['url'] }}" alt="{{ $empreendimento->title }}">
                <span class="gallery-counter" id="gallery-counter">1 / {{ $todasImagens->count() }}</span>
                <span class="zoom-hint">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="11" cy="11" r="8" />
                    <path d="m21 21-4.35-4.35" />
                    <path d="M11 8v6M8 11h6" />
                  </svg>
                  Clique para ampliar
                </span>
              </div>

              {{-- Miniaturas --}}
              @if($todasImagens->count() > 1)
                <div class="gallery-thumbnails">
                  @foreach($todasImagens as $index => $imagem)
                    <div class="gallery-thumb {{ $index === 0 ? 'active' : '' }}" onclick="setMainImage({{ $index }})"
                      data-url="{{ $imagem['url'] }}" data-caption="{{ $imagem['caption'] }}">
                      <img src="{{ $imagem['url'] }}" alt="{{ $imagem['caption'] ?: 'Foto ' . ($index + 1) }}">
                    </div>
                  @endforeach
                </div>
              @endif
            </div>
          @endif

          <h1 class="empreendimento-title">{{ $empreendimento->title }}</h1>

          {{-- Badges de Informações --}}
          <div class="badge-container">
            @if($empreendimento->tipoImovel)
              <span class="badge-premium tipo">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                </svg>
                {{ $empreendimento->tipoImovel->nome }}
              </span>
            @endif
            @if($empreendimento->cidade)
              <span class="badge-premium cidade">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                  <circle cx="12" cy="10" r="3" />
                </svg>
                {{ $empreendimento->cidade }}
              </span>
            @endif
            @if($empreendimento->area)
              <span class="badge-premium info">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <rect x="3" y="3" width="18" height="18" rx="2" ry="2" />
                </svg>
                {{ $empreendimento->area }} m²
              </span>
            @endif
            @if($empreendimento->quartos)
              <span class="badge-premium info">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M2 4v16M22 4v16M12 4v16M2 12h20" />
                </svg>
                {{ $empreendimento->quartos }} {{ $empreendimento->quartos > 1 ? 'quartos' : 'quarto' }}
              </span>
            @endif
          </div>

          {{-- Descrição --}}
          @if($empreendimento->descricao)
            <div class="descricao-content">
              {!! $empreendimento->descricao !!}
            </div>
          @endif

          {{-- Tags --}}
          @if($empreendimento->tags && count($empreendimento->tags) > 0)
            <div class="tags-container">
              @foreach($empreendimento->tags as $tag)
                <span class="tag-premium">{{ $tag }}</span>
              @endforeach
            </div>
          @endif



          {{-- Mapa de Localização --}}
          @if($empreendimento->rua && $empreendimento->cidade)
            @php
              // Montar o endereço completo para o Google Maps
              $enderecoParts = [];
              if ($empreendimento->rua)
                $enderecoParts[] = $empreendimento->rua;
              if ($empreendimento->numero)
                $enderecoParts[] = $empreendimento->numero;
              if ($empreendimento->cidade)
                $enderecoParts[] = $empreendimento->cidade;
              if ($empreendimento->estado)
                $enderecoParts[] = $empreendimento->estado;
              $enderecoParts[] = 'Brazil';

              $enderecoCompleto = implode(', ', $enderecoParts);
              $enderecoUrl = urlencode($enderecoCompleto);

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
                {{ $enderecoCompleto }}
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
          @endif

        </div>

        {{-- Coluna Sidebar --}}
        <div class="col-sidebar">
          <div class="sidebar-card">
            <p style="margin: 0; color: var(--brand-text-muted, #666); font-size: 0.9rem;">A partir de</p>
            @if($empreendimento->valor)
              <p class="price-display">R$ {{ number_format($empreendimento->valor, 2, ',', '.') }}</p>
            @else
              <p class="price-display">Consulte-nos</p>
            @endif



            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $home['whatsapp_business']) }}?text={{ urlencode('Olá! Tenho interesse no empreendimento ' . $empreendimento->title . '. Pode me ajudar?') }}"
              target="_blank" rel="noopener" class="btn-whatsapp">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
              </svg>
              Chamar no WhatsApp
            </a>

            <hr style="margin: 1.5rem 0; border: none; border-top: 1px solid rgba(0,0,0,0.08);">

            <h4 style="margin: 0 0 0.5rem; font-size: 1rem; color: var(--brand-text, #1a1a2e);">Detalhes do Imóvel</h4>
            <ul class="details-list">
              @if($empreendimento->tipoImovel)
                <li>
                  <span class="label">Tipo</span>
                  <span class="value">{{ $empreendimento->tipoImovel->nome }}</span>
                </li>
              @endif
              @if($empreendimento->cidade)
                <li>
                  <span class="label">Localização</span>
                  <span
                    class="value">{{ $empreendimento->cidade }}{{ $empreendimento->estado ? '/' . $empreendimento->estado : '' }}</span>
                </li>
              @endif
              @if($empreendimento->area)
                <li>
                  <span class="label">Área</span>
                  <span class="value">{{ $empreendimento->area }} m²</span>
                </li>
              @endif
              @if($empreendimento->quartos)
                <li>
                  <span class="label">Quartos</span>
                  <span class="value">{{ $empreendimento->quartos }}</span>
                </li>
              @endif
            </ul>
          </div>
        </div>

      </div>
  </main>

  {{-- Modal Lightbox --}}
  @if(isset($todasImagens) && $todasImagens->count() > 0)
    <div id="lightbox-modal" class="lightbox-modal" onclick="closeLightbox(event)">
      <div class="lightbox-content" onclick="event.stopPropagation()">
        <span class="lightbox-counter" id="lightbox-counter"></span>
        <button class="lightbox-close" onclick="closeLightbox()" aria-label="Fechar">&times;</button>
        <button class="lightbox-nav lightbox-prev" onclick="navigateLightbox(-1)" aria-label="Anterior">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="15 18 9 12 15 6" />
          </svg>
        </button>
        <img id="lightbox-image" src="" alt="">
        <button class="lightbox-nav lightbox-next" onclick="navigateLightbox(1)" aria-label="Próximo">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 18 15 12 9 6" />
          </svg>
        </button>
        <p class="lightbox-caption" id="lightbox-caption"></p>
      </div>
    </div>
  @endif
@endsection

@section('scripts')
  <script>
    // Galeria Amazon - seleção de imagem principal
    const galleryThumbs = document.querySelectorAll('.gallery-thumb');
    const galleryMainImage = document.getElementById('gallery-main-image');
    const galleryCounter = document.getElementById('gallery-counter');
    let currentGalleryIndex = 0;
    const totalGalleryImages = galleryThumbs.length || 1;

    function setMainImage(index) {
      currentGalleryIndex = index;
      const thumb = galleryThumbs[index];
      if (!thumb || !galleryMainImage) return;

      // Atualizar imagem principal
      galleryMainImage.src = thumb.dataset.url;

      // Atualizar contador
      if (galleryCounter) {
        galleryCounter.textContent = `${index + 1} / ${totalGalleryImages}`;
      }

      // Atualizar classe active nas miniaturas
      galleryThumbs.forEach((t, i) => {
        t.classList.toggle('active', i === index);
      });
    }

    // Lightbox functionality
    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxCaption = document.getElementById('lightbox-caption');
    const lightboxCounter = document.getElementById('lightbox-counter');
    let currentLightboxIndex = 0;

    function openLightbox(index) {
      if (!lightboxModal) return;
      currentLightboxIndex = index;
      updateLightboxImage();
      lightboxModal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function closeLightbox(event) {
      if (event && event.target !== lightboxModal) return;
      if (!lightboxModal) return;
      lightboxModal.classList.remove('active');
      document.body.style.overflow = '';
    }

    function navigateLightbox(direction) {
      currentLightboxIndex += direction;
      if (currentLightboxIndex < 0) currentLightboxIndex = totalGalleryImages - 1;
      if (currentLightboxIndex >= totalGalleryImages) currentLightboxIndex = 0;
      updateLightboxImage();
      // Sincronizar com galeria principal
      setMainImage(currentLightboxIndex);
    }

    function updateLightboxImage() {
      // Se temos thumbs, usar eles
      if (galleryThumbs.length > 0) {
        const thumb = galleryThumbs[currentLightboxIndex];
        if (!thumb) return;
        lightboxImage.src = thumb.dataset.url;
        lightboxImage.alt = thumb.dataset.caption || 'Foto do empreendimento';
        lightboxCaption.textContent = thumb.dataset.caption || '';
      } else if (galleryMainImage) {
        // Caso só tenha a imagem de capa
        lightboxImage.src = galleryMainImage.src;
        lightboxImage.alt = 'Foto principal';
        lightboxCaption.textContent = '';
      }

      if (lightboxCounter) {
        lightboxCounter.textContent = `${currentLightboxIndex + 1} / ${totalGalleryImages}`;
      }
    }

    // Keyboard navigation
    document.addEventListener('keydown', function (e) {
      if (!lightboxModal || !lightboxModal.classList.contains('active')) return;

      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowLeft') navigateLightbox(-1);
      if (e.key === 'ArrowRight') navigateLightbox(1);
    });

    // Keyboard para galeria principal (setas quando lightbox fechado)
    document.addEventListener('keydown', function (e) {
      if (lightboxModal && lightboxModal.classList.contains('active')) return;
      if (galleryThumbs.length === 0) return;

      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        let newIndex = currentGalleryIndex - 1;
        if (newIndex < 0) newIndex = totalGalleryImages - 1;
        setMainImage(newIndex);
      }
      if (e.key === 'ArrowRight') {
        e.preventDefault();
        let newIndex = currentGalleryIndex + 1;
        if (newIndex >= totalGalleryImages) newIndex = 0;
        setMainImage(newIndex);
      }
    });
  </script>
@endsection