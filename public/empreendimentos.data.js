// Dataset central de empreendimentos (use em todas as páginas)
window.CASTEL_EMPREENDIMENTOS = [
    {
      id: 1,
      slug: "residencial-atlantico",
      nome: "Residencial Atlântico",
      tipo: "apartamento",
      status: "lancamento",
      cidade: "Natal",
      uf: "RN",
      bairro: "Ponta Negra",
      preco: 289900,
      area: 58,
      quartos: 2,
      suites: 1,
      vagas: 1,
      banheiros: 2,
      descricao:
        "Empreendimento moderno a poucos minutos da orla, com lazer completo e plantas inteligentes.",
      capa: "https://images.unsplash.com/photo-1460317442991-0ec209397118?q=80&w=1600&auto=format&fit=crop",
      imagens: [
        "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=1600&auto=format&fit=crop",
        "https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?q=80&w=1600&auto=format&fit=crop",
        "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1600&auto=format&fit=crop"
      ],
      comodidades: ["Piscina", "Academia", "Coworking", "Playground", "Portaria 24h"],
      coords: { lat: -5.876, lng: -35.171 }, // aproximado
      plantas: [
        "https://dummyimage.com/1200x800/eaeefa/31425a&text=Planta+58m%C2%B2",
        "https://dummyimage.com/1200x800/eaeefa/31425a&text=Planta+62m%C2%B2"
      ],
      entregaPrevista: "2027-03",
      incorporacao: "Castel Construções e Incorporações",
      registro: "R-01/12345"
    },
    {
      id: 2,
      slug: "parque-das-dunas",
      nome: "Parque das Dunas",
      tipo: "apartamento",
      status: "em_construcao",
      cidade: "Natal",
      uf: "RN",
      bairro: "Lagoa Nova",
      preco: 349900,
      area: 72,
      quartos: 3,
      suites: 1,
      vagas: 2,
      banheiros: 2,
      descricao:
        "Conforto e praticidade perto de tudo. Torre única, lazer panorâmico e alto padrão de acabamento.",
      capa: "https://images.unsplash.com/photo-1529400971008-f566de0e6dfc?q=80&w=1600&auto=format&fit=crop",
      imagens: [
        "https://images.unsplash.com/photo-1501876725168-00c445821c9e?q=80&w=1600&auto=format&fit=crop",
        "https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?q=80&w=1600&auto=format&fit=crop"
      ],
      comodidades: ["Salão de festas", "Churrasqueira", "Bicicletário", "Pet place"],
      coords: { lat: -5.807, lng: -35.212 },
      plantas: [
        "https://dummyimage.com/1200x800/eaeefa/31425a&text=Planta+72m%C2%B2"
      ],
      entregaPrevista: "2026-09",
      incorporacao: "Castel Construções e Incorporações",
      registro: "R-02/98765"
    },
    {
      id: 3,
      slug: "vila-do-sol",
      nome: "Vila do Sol",
      tipo: "casa",
      status: "entregue",
      cidade: "Mossoró",
      uf: "RN",
      bairro: "Nova Betânia",
      preco: 259900,
      area: 54,
      quartos: 2,
      suites: 0,
      vagas: 1,
      banheiros: 1,
      descricao:
        "Condomínio entregue e habitado, com paisagismo e lazer para toda a família.",
      capa: "https://images.unsplash.com/photo-1522708323590-d24dbb6b0267?q=80&w=1600&auto=format&fit=crop",
      imagens: [
        "https://images.unsplash.com/photo-1499952127939-9bbf5af6c51c?q=80&w=1600&auto=format&fit=crop",
        "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1600&auto=format&fit=crop"
      ],
      comodidades: ["Praça interna", "Brinquedoteca", "Portaria"],
      coords: { lat: -5.195, lng: -37.324 },
      plantas: [
        "https://dummyimage.com/1200x800/eaeefa/31425a&text=Planta+54m%C2%B2"
      ],
      entregaPrevista: null,
      incorporacao: "Castel Construções e Incorporações",
      registro: "R-03/55555"
    },
    {
      id: 4,
      slug: "praia-bella",
      nome: "Praia Bella",
      tipo: "apartamento",
      status: "avulso",
      cidade: "Parnamirim",
      uf: "RN",
      bairro: "Cotovelo",
      preco: 189900,
      area: 46,
      quartos: 2,
      suites: 0,
      vagas: 1,
      banheiros: 1,
      descricao:
        "Unidades avulsas próximas à praia, perfeitas para morar ou investir.",
      capa: "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?q=80&w=1600&auto=format&fit=crop",
      imagens: [
        "https://images.unsplash.com/photo-1501876725168-00c445821c9e?q=80&w=1600&auto=format&fit=crop"
      ],
      comodidades: ["Piscina adulto/infantil", "Solarium"],
      coords: { lat: -5.986, lng: -35.155 },
      plantas: [],
      entregaPrevista: null,
      incorporacao: "Castel Construções e Incorporações",
      registro: "R-04/22222"
    },
    {
      id: 5,
      slug: "ranchotexas",
      nome: "Ranchotexas",
      status: "lancamento",
      tipo: "lote",
      cidade: "Natal",
      uf: "RN",
      bairro: "Ponta Negra",
      preco: 150000,
      area: 200,
      descricao: "Lotes residenciais em condomínio fechado, com infraestrutura completa e lazer.",
      capa: "https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=1600&auto=format&fit=crop",
      imagens: [
        "https://images.unsplash.com/photo-1512917774080-9991f1c4c750?q=80&w=1600&auto=format&fit=crop",
      ],
      comodidades: ["Guarita 24h", "Ruas pavimentadas", "Área de lazer", "Quadra poliesportiva"],
      coords: { lat: -5.88, lng: -35.18 }, // Aprox
      plantas: [
        "https://dummyimage.com/1200x800/eaeefa/31425a&text=Planta+do+loteamento"
      ],
      entregaPrevista: "2028-01",
      incorporacao: "Castel Construções e Incorporações",
      registro: "R-05/12345"
    }
  ];
  
  // utilzinho pra formatar moeda
  window.castelFmtCurrency = (v) =>
    Number(v).toLocaleString("pt-BR", { style: "currency", currency: "BRL" });
  
  // mapinha status -> rótulo
  window.castelStatusLabel = (s) =>
    ({ lancamento: "Lançamento", em_construcao: "Em construção", avulso: "Avulso", entregue: "Entregue" }[s] || s);
  