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

    .galeria-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 1rem;
      margin-top: 1rem;
    }

    .galeria-item {
      position: relative;
      overflow: hidden;
      border-radius: 12px;
      aspect-ratio: 4/3;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .galeria-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
    }

    .galeria-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .galeria-item:hover img {
      transform: scale(1.1);
    }

    .galeria-item .overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.6) 0%, transparent 50%);
      opacity: 0;
      transition: opacity 0.3s ease;
      display: flex;
      align-items: flex-end;
      padding: 1rem;
      color: white;
      font-weight: 500;
    }

    .galeria-item:hover .overlay {
      opacity: 1;
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

          {{-- Imagem de Capa --}}
          @if($empreendimento->foto_capa)
            @php
              $capaUrl = Str::startsWith($empreendimento->foto_capa, 'http')
                ? $empreendimento->foto_capa
                : asset('storage/' . $empreendimento->foto_capa);
            @endphp
            <div class="empreendimento-header">
              <img src="{{ $capaUrl }}" alt="{{ $empreendimento->title }}" class="empreendimento-capa">
            </div>
          @endif

          <h1 class="empreendimento-title">{{ $empreendimento->title }}</h1>

          {{-- Badges de Informações --}}
          <div class="badge-container">
            @if($empreendimento->tipo)
              <span class="badge-premium tipo">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                </svg>
                {{ ucfirst($empreendimento->tipo) }}
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

          {{-- Galeria de Fotos --}}
          @if($empreendimento->fotos->count() > 0)
            <section style="margin-top: 3rem;">
              <h3 class="section-title">Galeria de Fotos</h3>
              <div class="galeria-grid">
                @foreach($empreendimento->fotos as $foto)
                  @php
                    $fotoUrl = Str::startsWith($foto->file_name, 'http')
                      ? $foto->file_name
                      : asset('storage/' . $foto->file_name);
                  @endphp
                  <a href="{{ $fotoUrl }}" target="_blank" rel="noopener" class="galeria-item">
                    <img src="{{ $fotoUrl }}" alt="{{ $foto->sub_title ?? 'Foto do empreendimento' }}" loading="lazy">
                    <div class="overlay">
                      {{ $foto->sub_title ?? 'Ver imagem' }}
                    </div>
                  </a>
                @endforeach
              </div>
            </section>
          @endif

          {{-- Planta Baixa --}}
          @if($empreendimento->foto_planta)
            @php
              $plantaUrl = Str::startsWith($empreendimento->foto_planta, 'http')
                ? $empreendimento->foto_planta
                : asset('storage/' . $empreendimento->foto_planta);
            @endphp
            <section style="margin-top: 3rem;">
              <h3 class="section-title">Planta Baixa</h3>
              <a href="{{ $plantaUrl }}" target="_blank" rel="noopener" class="galeria-item"
                style="aspect-ratio: 16/10; max-width: 600px;">
                <img src="{{ $plantaUrl }}" alt="Planta baixa de {{ $empreendimento->title }}"
                  style="object-fit: contain; background: #f8f9fa;">
                <div class="overlay">Clique para ampliar</div>
              </a>
            </section>
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

            <a href="{{ route('contato') }}?assunto=Interesse+em+{{ urlencode($empreendimento->title) }}"
              class="btn-interesse">
              Tenho Interesse
            </a>

            <a href="https://wa.me/5584994618126?text={{ urlencode('Olá! Tenho interesse no empreendimento ' . $empreendimento->title . '. Pode me ajudar?') }}"
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
              @if($empreendimento->tipo)
                <li>
                  <span class="label">Tipo</span>
                  <span class="value">{{ ucfirst($empreendimento->tipo) }}</span>
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

    </div>
  </main>
@endsection