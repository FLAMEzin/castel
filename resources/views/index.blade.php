<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Início • Castel Construções e Incorporações</title>
    <meta
      name="description"
      content="Construtora Castel — empreendimentos com qualidade e seriedade no RN."
    />
    <meta name="theme-color" content="#143a7b" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="style.css" />
    <meta property="og:title" content="Início • Castel" />
    <meta
      property="og:description"
      content="Construtora Castel — empreendimentos com qualidade e seriedade no RN."
    />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Castel" />

    @verbatim
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "Organization",
        "name": "Castel Construções e Incorporações",
        "url": "https://exemplo-castel.com.br/",
        "logo": "https://exemplo-castel.com.br/assets/img/logo.png",
        "sameAs": ["https://www.instagram.com/"]
      }
    </script>
    @endverbatim

  </head>
  <body>
    <header class="header" role="banner">
      <div class="topbar" aria-label="Informações de contato">
        <div class="container">
          <span>Atendimento 24/7</span>
          <span class="sep">•</span>
          <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações." style="color: #fff">(84) 98800-4885</a>
          <span class="sep">•</span>
          <a href="mailto:contato@castelconstrutora.com.br" style="color: #fff"
            >contato@castelconstrutora.com.br</a
          >
        </div>
      </div>
      <div class="container navbar" role="navigation" aria-label="Principal">
        <a class="brand" href="index" aria-label="Castel - Início">
        <img src="/img/Logo.png" width="150px" alt="logo" />
          <!-- <span class="logo">C</span>
      <span>CASTEL</span> -->
        </a>
        <nav class="nav" aria-label="Navegação do site">
          <a href="index">Início</a>
          <a href="sobre">Sobre Nós</a>
          <a href="empreendimentos">Empreendimentos</a>
          <a href="reservas">Reservas</a>
          <a href="avulsos">Avulsos</a>
          <a href="terraplenagem">Castel Terraplenagem</a>
          <a href="simulador">Simulador</a>
          <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações.">Contato</a>
          <a
            class="cta"
            href="https://www.instagram.com/castelconstrutora"
            target="_blank"
            rel="noopener"
            >Instagram</a
          >
        </nav>
        <button class="hamburger" aria-label="Abrir menu"><span></span></button>
      </div>
    </header>

    <section class="hero" role="region" aria-label="Apresentação">
      
      <video src="media/VideoCastel.mp4" autoplay muted loop playsinline"></video>
      <div class="content">
        <h1>
          Seu novo lar com
          <span style="color: var(--brand-red)">segurança</span> e
          <span style="color: #a3c9ff">qualidade</span>.
        </h1>
        <p class="lead">
          Incorporações modernas, atendimento humano e condições que cabem no
          seu bolso. Conheça nossos lançamentos e simule seu financiamento.
        </p>
        <div class="actions">
          <a class="cta" href="empreendimentos">Ver Empreendimentos</a>
          <a
            class="cta"
            style="background: var(--brand-blue)"
            href="simulador"
            >Simular Financiamento</a
          >
        </div>
      </div>
    </section>

    <section class="section" id="destaques">
      <div class="container">
        <h2>Destaques</h2>
        <p class="muted">Alguns dos nossos projetos mais recentes.</p>
        <div class="grid cols-3" id="home-cards">
          <!-- Cards preenchidos via JS a partir do dataset -->
        </div>
        <script>
          // Reuso do dataset do empreendimentos

          // Dataset de empreendimentos (exemplo). Substitua pelos dados reais.
          const EMPREENDIMENTOS = [
            {
              id: 1,
              nome: "Residencial Atlântico",
              status: "lancamento",
              cidade: "Natal",
              uf: "RN",
              preco: 289900,
              area: 58,
              quartos: 2,
              vagas: 1,
              capa: "https://media.discordapp.net/attachments/1210712388647649292/1412906066362105887/image.png?ex=68b9fed0&is=68b8ad50&hm=4a4eeeae84f087e78dbcf5070fee505a40100dd73d093737e82b265b15a5d499&=&format=webp&quality=lossless",
            },
            {
              id: 2,
              nome: "Parque das Dunas",
              status: "em_construcao",
              cidade: "Natal",
              uf: "RN",
              preco: 349900,
              area: 72,
              quartos: 3,
              vagas: 2,
              capa: "https://media.discordapp.net/attachments/1210712388647649292/1412907063058894898/image.png?ex=68b9ffbe&is=68b8ae3e&hm=86228ae72497c9d0fb60f80c0f017e84989472f78841c735b860f0c018b3df2d&=&format=webp&quality=lossless",
            },
            {
              id: 3,
              nome: "Vila do Sol",
              status: "entregue",
              cidade: "Mossoró",
              uf: "RN",
              preco: 259900,
              area: 54,
              quartos: 2,
              vagas: 1,
              capa: "https://media.discordapp.net/attachments/1210712388647649292/1412906800667430952/image.png?ex=68b9ff7f&is=68b8adff&hm=1bc37fe35cd604c36c5b162003940045bd090d0ca58b2fc4ab440e097cd81ee2&=&format=webp&quality=lossless",
            },
            {
              id: 4,
              nome: "Praia Bella",
              status: "avulso",
              cidade: "Parnamirim",
              uf: "RN",
              preco: 189900,
              area: 46,
              quartos: 2,
              vagas: 1,
              capa: "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1200&auto=format&fit=crop",
            },
            {
              id: 5,
              nome: "Jardim Imperial",
              status: "lancamento",
              cidade: "Mossoró",
              uf: "RN",
              preco: 399900,
              area: 89,
              quartos: 3,
              vagas: 2,
              capa: "https://images.unsplash.com/photo-1501876725168-00c445821c9e?q=80&w=1200&auto=format&fit=crop",
            },
            {
              id: 6,
              nome: "Central Park RN",
              status: "em_construcao",
              cidade: "Caicó",
              uf: "RN",
              preco: 219900,
              area: 50,
              quartos: 2,
              vagas: 1,
              capa: "https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?q=80&w=1200&auto=format&fit=crop",
            },
          ];

          function fmtCurrency(v) {
            return v.toLocaleString("pt-BR", {
              style: "currency",
              currency: "BRL",
            });
          }

          function renderLista(list) {
            const grid = document.getElementById("grid-empreendimentos");
            if (!grid) return;
            grid.innerHTML = "";
            if (!list.length) {
              grid.innerHTML =
                '<p class="muted">Nenhum empreendimento encontrado com os filtros atuais.</p>';
              return;
            }
            list.forEach((item) => {
              const li = document.createElement("article");
              li.className = "card";
              li.innerHTML = `
      <img class="thumb" src="${item.capa}" alt="Imagem do empreendimento ${item.nome}" loading="lazy" />
      <div class="body">
        <div style="display:flex; gap:.5rem; align-items:center; flex-wrap:wrap;">
          <span class="badge ${item.status === "lancamento" ? "red" : "blue"}">${item.status.replace("_", " ")}</span>
          <span class="badge">${item.cidade}/${item.uf}</span>
          <span class="badge">${item.quartos} quartos</span>
          <span class="badge">${item.area} m²</span>
        </div>
        <h3 style="margin:.5rem 0 0;">${item.nome}</h3>
        <p class="muted" style="margin:0;">A partir de <strong>${fmtCurrency(item.preco)}</strong></p>
        <div style="margin-top:.75rem; display:flex; gap:.5rem; flex-wrap:wrap;">
          <button class="btn" data-id="${item.id}" data-action="ver">Ver detalhes</button>
          <button class="btn red" data-id="${item.id}" data-action="interesse">Tenho interesse</button>
        </div>
      </div>`;
              grid.appendChild(li);
            });
          }

          function filtrar() {
            const q = (id) => document.getElementById(id);
            const status = q("f-status").value;
            const cidade = q("f-cidade").value.trim().toLowerCase();
            const min = parseInt(q("f-preco-min").value || "0", 10);
            const max = parseInt(q("f-preco-max").value || "999999999", 10);
            const areaMin = parseInt(q("f-area-min").value || "0", 10);
            const quartos = parseInt(q("f-quartos").value || "0", 10);
            let list = EMPREENDIMENTOS.filter(
              (e) =>
                (status ? e.status === status : true) &&
                (cidade ? e.cidade.toLowerCase().includes(cidade) : true) &&
                e.preco >= min &&
                e.preco <= max &&
                e.area >= areaMin &&
                (quartos ? e.quartos === quartos : true)
            );
            renderLista(list);
          }

          function wireEmpreendimentos() {
            const form = document.getElementById("form-filtro");
            if (!form) return;
            form.addEventListener("input", filtrar);
            renderLista(EMPREENDIMENTOS);
            filtrar();

            document.addEventListener("click", (e) => {
              const btn = e.target.closest("button[data-action]");
              if (!btn) return;
              const id = Number(btn.dataset.id);
              const item = EMPREENDIMENTOS.find((i) => i.id === id);
              if (!item) return;
              if (btn.dataset.action === "interesse") {
                // Preenche intenção de compra
                const fld = document.querySelector(
                  "#form-intencao input[name=empreendimento]"
                );
                if (fld) fld.value = item.nome;
                document.getElementById("modal-intencao").showModal();
              } else {
                // Mostra modal com detalhes simples
                const d = document.getElementById("modal-detalhes");
                d.querySelector("h3").textContent = item.nome;
                d.querySelector("img").src = item.capa;
                d.querySelector(".price").textContent = fmtCurrency(item.preco);
                d.querySelector(
                  ".meta"
                ).textContent = `${item.cidade}/${item.uf} • ${item.area} m² • ${item.quartos} quartos`;
                d.showModal();
              }
            });

            document.querySelectorAll("dialog .close").forEach((btn) =>
              btn.addEventListener("click", (e) => {
                e.target.closest("dialog").close();
              })
            );
          }

          wireEmpreendimentos();

          const top3 = EMPREENDIMENTOS.slice(0, 3);
          const grid = document.getElementById("home-cards");
          top3.forEach((it) => {
            const el = document.createElement("article");
            el.className = "card";
            el.innerHTML = `<img class="thumb" src="${it.capa}" alt="Empreendimento ${it.nome}"/><div class="body"><span class="badge">${it.cidade}/${it.uf}</span><h3 style="margin:.5rem 0;">${it.nome}</h3><a class="cta" href="empreendimentos">Saiba mais</a></div>`;
            grid.appendChild(el);
          });
        </script>
      </div>
    </section>

    <section class="section" style="background: var(--brand-gray)">
      <div class="container">
        <div
          class="grid"
          style="grid-template-columns: 1.2fr 1fr; align-items: center"
        >
          <div>
            <h2>Por que a Castel?</h2>
            <ul>
              <li>Mais de 10 anos de atuação com total transparência.</li>
              <li>Time técnico experiente em engenharia e gestão.</li>
              <li>Condições facilitadas e suporte em todo o processo.</li>
            </ul>
            <div class="actions">
              <a href="sobre" class="btn">Conheça nossa história</a>
            </div>
          </div>
          <img
            src="https://media.discordapp.net/attachments/1210712388647649292/1412909372455125064/image.png?ex=68ba01e4&is=68b8b064&hm=f7791b87b3909a71c8a9f7f6c8b6fca5d7a2c01d6549c2bca438ae014677fd94&=&format=webp&quality=lossless&width=550&height=328"
            alt="Equipe de engenharia da Castel"
            style="border-radius: 14px; width: 100%"
          />
        </div>
      </div>
    </section>

    <section class="section" id="instagram">
      <div class="container">
        <h2>Instagram</h2>
        <p class="muted">
          Acompanhe nossos bastidores e novidades <strong>@@castelconstrutora</strong>.
        </p>
        <div class="grid cols-3">
          <div
            class="card"
            data-instagram-profile="castelconstrutora"
            role="button"
            tabindex="0"
            aria-label="Abrir Instagram da Castel"
          >
            <img
              class="thumb"
              src="https://media.discordapp.net/attachments/1210712388647649292/1412907063058894898/image.png?ex=68b9ffbe&is=68b8ae3e&hm=86228ae72497c9d0fb60f80c0f017e84989472f78841c735b860f0c018b3df2d&=&format=webp&quality=lossless"
              alt="Post do Instagram"
            />
            <div class="body">
              <strong>@@castelconstrutora</strong>
              <p class="muted">Toque para abrir o perfil</p>
            </div>
          </div>
          <div class="card" data-instagram-profile="castelconstrutora">
            <img
              class="thumb"
              src="https://media.discordapp.net/attachments/1210712388647649292/1412906800667430952/image.png?ex=68b9ff7f&is=68b8adff&hm=1bc37fe35cd604c36c5b162003940045bd090d0ca58b2fc4ab440e097cd81ee2&=&format=webp&quality=lossless"
              alt="Post do Instagram"
            />
            <div class="body">
              <strong>@@castelconstrutora</strong>
              <p class="muted">Toque para abrir o perfil</p>
            </div>
          </div>
          <div class="card" data-instagram-profile="castelconstrutora">
            <img
              class="thumb"
              src="https://media.discordapp.net/attachments/1210712388647649292/1412906066362105887/image.png?ex=68b9fed0&is=68b8ad50&hm=4a4eeeae84f087e78dbcf5070fee505a40100dd73d093737e82b265b15a5d499&=&format=webp&quality=lossless"
              alt="Post do Instagram"
            />
            <div class="body">
              <strong>@@castelconstrutoraconstrutora</strong>
              <p class="muted">Toque para abrir o perfil</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="footer section" role="contentinfo">
      <div class="container">
        <div class="grid" style="grid-template-columns: 2fr 1fr 1fr">
          <div>
            <a class="brand" href="index">
              <img src="img/Logo.png" width="150px" alt="logo" />
            </a>
            <p class="muted" style="max-width: 48ch">
              Construções e Incorporações. Qualidade, transparência e ética em
              cada empreendimento.
            </p>
          </div>
          <div>
            <h3 style="margin: 0.25rem 0">Contato</h3>
            <p>
              <a href="mailto:contato@castelconstrutora.com.br">contato@castelconstrutora.com.br</a
              ><br />
              <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações." style="color: #fff">(84) 98800-4885</a>
            </p>
            <p>Logradouro: Rua Seis de Janeiro, 1837 <br>
 Bairro: Santo Antonio <br>
 Município/UF: Mossoró, RN</p>
          </div>
          <div>
            <h3 style="margin: 0.25rem 0">Navegação</h3>
            <p>
              <a href="sobre">Sobre Nós</a><br />
              <a href="empreendimentos">Empreendimentos</a><br />
              <a href="reservas">Reservas</a><br />
              
              <a href="https://wa.me/5584994618126?text=Olá!%20Vim%20pelo%20site%20da%20Castel%20e%20gostaria%20de%20mais%20informações.">Contato</a>
            </p>
          </div>
        </div>
        <div class="subfooter">
          © <span id="year"></span> Castel Construções e Incorporações — Todos
          os direitos reservados.
        </div>
      </div>

      <!-- <section class="section reveal">
        <div class="container">
          <h2>Confiança de quem constrói com a gente</h2>
          <div class="trustbar" aria-label="Selos de confiança">
            <img
              src="https://dummyimage.com/140x40/ccd3e3/31425a&text=CREA"
              alt="CREA"
            />
            <img
              src="https://dummyimage.com/140x40/ccd3e3/31425a&text=CAIXA"
              alt="CAIXA"
            />
            <img
              src="https://dummyimage.com/140x40/ccd3e3/31425a&text=Selo+Qualidade"
              alt="Selo de Qualidade"
            />
            <img
              src="https://dummyimage.com/140x40/ccd3e3/31425a&text=PBQP-H"
              alt="PBQP-H"
            />
          </div>
        </div>
      </section> -->

      <section
        class="section"
        id="ig"
        style="background: linear-gradient(180deg, #f7f9fe, transparent)"
      >
        <div class="container">
          <div
            class="card reveal"
            id="ig-banner"
            role="button"
            tabindex="0"
            aria-label="Abrir Instagram da Castel"
          >
            <div
              class="body"
              style="
                display: flex;
                gap: 1rem;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
              "
            >
              <div>
                <strong style="font-size: 1.2rem"
                  >Siga a Castel no Instagram</strong
                >
                <p class="muted" style="margin: 0.25rem 0 0">
                  Novidades, bastidores e entregas em tempo real.
                </p>
              </div>
              <a
                class="cta"
                target="_blank"
                rel="noopener"
                href="https://instagram.com/castelconstrutora"
                >@@castelconstrutora</a
              >
            </div>
          </div>
        </div>
      </section>
    </footer>

    <a
      id="wa-fab"
      class="whatsapp-fab"
      aria-label="Fale no WhatsApp"
      target="_blank"
      rel="noopener"
      href="#"
    >
      <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
        <path
          d="M20.52 3.48A11.8 11.8 0 0012 0C5.39 0 .03 5.36.03 12a11.9 11.9 0 001.6 6L0 24l6.2-1.62a11.9 11.9 0 005.8 1.48h.01c6.61 0 11.97-5.36 11.97-12 0-3.2-1.25-6.2-3.46-8.38zM12 22.03h-.01a9.96 9.96 0 01-5.08-1.4l-.36-.21-3.68.96.98-3.58-.24-.37A9.97 9.97 0 012.03 12C2.03 6.5 6.5 2.03 12 2.03c2.65 0 5.14 1.03 7.01 2.9a9.86 9.86 0 012.92 7.07c0 5.5-4.47 9.97-9.93 9.97zm5.49-7.43c-.3-.15-1.76-.87-2.03-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.95 1.17-.17.2-.35.22-.65.07a8.08 8.08 0 01-2.38-1.47 9 9 0 01-1.67-2.06c-.18-.3 0-.46.14-.61.14-.15.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.07-.15-.67-1.62-.92-2.22-.24-.57-.49-.5-.67-.5h-.57c-.2 0-.52.08-.8.37s-1.04 1.02-1.04 2.5 1.07 2.9 1.22 3.1c.15.2 2.1 3.2 5.08 4.49.71.31 1.26.5 1.69.64.71.23 1.36.2 1.87.12.57-.08 1.76-.72 2.01-1.42.25-.7.25-1.32.17-1.45-.07-.13-.27-.2-.57-.35z"
        />
      </svg>
    </a>

    <script src="main.js"></script>
    <script>
      document.getElementById("year").textContent = new Date().getFullYear();
    </script>
  </body>
</html>
