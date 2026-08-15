# AMIS — Angola Mining Innovation & Solutions
## Plataforma Digital de Consultoria, Formação e Tecnologia Mineira

> **Estado:** Planeamento / Pré-desenvolvimento  
> **Data de início:** Abril 2026  
> **Versão do documento:** 1.0

---

## Sobre o Projeto

A **AMIS** é uma empresa de consultoria e inovação tecnológica para o setor mineiro angolano. Esta plataforma digital centraliza:

- **Portal de consultoria técnica** com gestão de projetos
- **Directório de fornecedores de equipamentos** mineiros, com pedidos de introdução mediados pela AMIS
- **CRM** para gestão de clientes e oportunidades
- **Painel administrativo** completo com dashboards financeiros

> Não existe módulo de cursos/formação online (LMS) — o negócio não vende formação.

---

## Stack Tecnológica

| Componente         | Tecnologia           | Versão  |
|--------------------|----------------------|---------|
| Backend            | Laravel              | 12.x    |
| Linguagem          | PHP                  | 8.2+    |
| Frontend Reativo   | Livewire             | 4.x     |
| UI / CSS           | Tailwind CSS         | 4.x     |
| Base de Dados      | PostgreSQL           | 16+     |
| JS Interactivo     | Alpine.js            | 3.x     |
| Tempo Real         | Pusher + Laravel Echo| —       |
| Build Tool         | Vite                 | 7.x     |
| Testes             | PHPUnit              | 11.x    |
| Cache / Queues     | Redis                | 7.x     |
| Armazenamento      | S3 / MinIO           | —       |

---

## Documentação do Projeto

| Ficheiro | Papel | Conteúdo |
|----------|-------|----------|
| [docs/01_ANALISE_REQUISITOS.md](docs/01_ANALISE_REQUISITOS.md) | Analista de Sistemas | Requisitos funcionais, não-funcionais, casos de uso, regras de negócio |
| [docs/02_PRODUCT_ROADMAP.md](docs/02_PRODUCT_ROADMAP.md) | Product Manager | MVP, fases, user stories, personas, prioridades |
| [docs/03_ARQUITETURA_TECNICA.md](docs/03_ARQUITETURA_TECNICA.md) | Arquiteto de Software | Estrutura técnica, esquema de BD, módulos, integrações |
| [docs/04_VALIDACAO_TECNICA.md](docs/04_VALIDACAO_TECNICA.md) | Tech Lead | Riscos técnicos, decisões validadas, boas práticas, CI/CD |
| [docs/05_UX_UI_FLUXOS.md](docs/05_UX_UI_FLUXOS.md) | UX/UI Designer | Personas, fluxos de utilizador, wireframes, design system |

---

## Módulos Principais

```
┌─────────────────────────────────────────────────────────┐
│                  AMIS PLATFORM                          │
├──────────────┬──────────────┬──────────────┬────────────┤
│   Website    │ Fornecedores │ Consultoria  │  CRM       │
│   Público    │ (Equipamento)│  (Projetos)  │ (Clientes) │
├──────────────┴──────────────┴──────────────┴────────────┤
│            Equipamentos  │  Pagamentos  │  Notificações │
├───────────────────────────────────────────────────────  ┤
│               PAINEL ADMINISTRATIVO AMIS                │
└─────────────────────────────────────────────────────────┘
```

---

## Equipa de Liderança

| Cargo | Nome | Especialidade |
|-------|------|---------------|
| CEO | Engº MSc Puto Luís | Engenharia de Minas, Beneficiamento Mineral (MISIS) |
| Diretora de Operações | Engª Fernanda Amorim | Informática e Geologia |

---

## Projeção de Receita

| Ano | Receita Estimada | Lucro Líquido |
|-----|-----------------|---------------|
| 1º  | $400,000 USD    | $120,000 USD  |
| 2º  | $650,000 USD    | $250,000 USD  |
| 3º  | $900,000 USD    | $400,000 USD  |

---

## Mercados Alvo

- 🇦🇴 Angola (mercado principal)
- 🇲🇿 Moçambique
- 🇳🇦 Namíbia
- 🇨🇩 República Democrática do Congo
