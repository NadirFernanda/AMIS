# 05 — UX/UI — Fluxos, Design System e Wireframes
## Papel: UX/UI Designer (10+ anos de experiência)

> **Foco:** Experiência do utilizador intuitiva, adaptada ao contexto angolano, mobile-first e profissional para o setor mineiro.  
> **Data:** Abril 2026 | **Versão:** 1.0

---

## 1. Princípios de Design para a AMIS

### 1.1 Contexto Local (Angola)
- **Conexão instável:** Interfaces leves, sem animações pesadas, imagens otimizadas
- **Smartphones predominantes:** Design mobile-first real (não apenas responsivo)
- **Literacia digital variada:** Linguagem clara, ícones descritivos, tooltips onde necessário
- **Confiança e credibilidade:** Visual corporativo sério, não "startup tech"

### 1.2 Princípios Chave
1. **Clareza antes de estética** — o utilizador entende o que fazer sem precisar de ajuda
2. **Feedback imediato** — toda ação tem resposta visual (loading, sucesso, erro)
3. **Progressividade** — mostrar apenas o que é necessário no momento certo
4. **Consistência** — os mesmos elementos comportam-se sempre da mesma forma

---

## 2. Design System

### 2.1 Paleta de Cores

```
PALETA PRINCIPAL
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Primary Navy    #1a3a5c   ████  → Títulos, navegação, botões primários
Primary Dark    #0f2640   ████  → Headers, sidebars, footer
                                  (evoca profundidade mineral, confiança)

Gold Accent     #c9922a   ████  → CTAs secundários, badges, highlights
                                  (referência ao ouro angolano, setor mineiro)

Teal Action     #0d8a7d   ████  → Links, botões de ação, estado ativo
                                  (inovação tecnológica)

CORES DE SUPORTE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Background      #f8fafc   ████  → Fundo geral das páginas
Surface         #ffffff   ████  → Cards, modais, forms
Border          #e2e8f0   ████  → Bordas de cards e inputs
Text Primary    #1e293b   ████  → Texto principal
Text Secondary  #64748b   ████  → Texto secundário, labels
Text Muted      #94a3b8   ████  → Placeholders, texto desativado

ESTADOS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

Success         #16a34a   ████  → Pagamento confirmado, curso concluído
Warning         #d97706   ████  → Pagamento pendente, prazo próximo
Error           #dc2626   ████  → Erros de validação, pagamento rejeitado
Info            #2563eb   ████  → Informações, dicas
```

### 2.2 Tipografia

```
FONTE PRINCIPAL: Inter (Google Fonts — carregamento rápido)

Títulos H1:    32px / Bold 700    / line-height: 1.2
Títulos H2:    24px / SemiBold 600/ line-height: 1.3
Títulos H3:    20px / SemiBold 600/ line-height: 1.4
Body:          16px / Regular 400 / line-height: 1.6
Small:         14px / Regular 400 / line-height: 1.5
Caption:       12px / Medium 500  / line-height: 1.4

FONTE ALTERNATIVA PARA DADOS TÉCNICOS: JetBrains Mono
→ Usada em: número de certificado, referências de pagamento, IDs
```

### 2.3 Espaçamento e Border Radius

```
Espaçamento base: 4px (Tailwind default)
Escala: 4, 8, 12, 16, 20, 24, 32, 40, 48, 64px

Border Radius:
  Botões:      rounded-lg  (8px)
  Cards:       rounded-2xl (16px)
  Modais:      rounded-2xl (16px)
  Inputs:      rounded-lg  (8px)
  Badges:      rounded-full
  Avatar:      rounded-full
```

### 2.4 Componentes Base

```
BOTÕES
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Primary:    bg-[#1a3a5c] text-white hover:bg-[#0f2640]
Secondary:  border border-[#1a3a5c] text-[#1a3a5c] hover:bg-slate-50
Danger:     bg-red-600 text-white hover:bg-red-700
Ghost:      text-[#1a3a5c] hover:bg-slate-100
CTA Gold:   bg-[#c9922a] text-white hover:bg-[#a67a22]

Tamanhos: sm (h-8), md (h-10, default), lg (h-12)
Loading state: sempre com spinner + cursor-not-allowed

CARDS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Base:    bg-white rounded-2xl border border-slate-200 shadow-sm p-6
Hover:   hover:shadow-md transition-shadow
Featured: ring-2 ring-[#c9922a] (destaque de pacote recomendado)

INPUTS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
Base:    border border-slate-300 rounded-lg px-3 py-2 w-full focus:ring-2 focus:ring-[#0d8a7d] focus:border-transparent
Error:   border-red-500 focus:ring-red-200
Label:   text-sm font-medium text-slate-700 mb-1
Error msg: text-xs text-red-600 mt-1
```

---

## 3. Layouts Globais

### 3.1 Website Público

```
┌─────────────────────────────────────────────────────────┐
│  NAVBAR (sticky)                                        │
│  [Logo AMIS]  Home  Serviços  Formação  Sobre  Contacto │
│                                         [Entrar] [→]    │
├─────────────────────────────────────────────────────────┤
│                                                         │
│                    CONTEÚDO DA PÁGINA                   │
│                                                         │
├─────────────────────────────────────────────────────────┤
│  FOOTER                                                 │
│  Logo | Links | Contactos | Redes Sociais               │
│  © 2026 AMIS — Luanda, Angola                           │
└─────────────────────────────────────────────────────────┘

Mobile: hamburger menu lateral (drawer)
Navbar: fundo #1a3a5c, texto branco, logo branco
```

### 3.2 Portal Autenticado (Cliente)

```
┌────────────────────────────────────────────────────────┐
│  TOPBAR (h-16, bg-white, border-b)                     │
│  [≡ Menu]  [Logo]            [🔔 3]  [Avatar ▾]        │
├──────────────┬─────────────────────────────────────────┤
│              │                                         │
│  SIDEBAR     │        ÁREA PRINCIPAL                   │
│  (w-64,      │                                         │
│  bg-#1a3a5c, │  [Breadcrumb]                          │
│  text-white) │                                         │
│              │  ┌──────────────────────────────────┐  │
│  Dashboard   │  │                                  │  │
│  Meus Cursos │  │        CONTEÚDO DO MÓDULO        │  │
│  Projetos    │  │                                  │  │
│  Faturas     │  └──────────────────────────────────┘  │
│  Perfil      │                                         │
│              │                                         │
└──────────────┴─────────────────────────────────────────┘

Mobile: sidebar como drawer sobreposto (overlay)
        Topbar com botão hamburger
```

### 3.3 Painel Administrativo

```
Igual ao portal, mas com sidebar mais larga (w-72) e menu expandido:
  Visão Geral (Dashboard)
  ── Utilizadores
  ── Cursos
     ── Categorias
     ── Cursos
     ── Inscrições
  ── Consultoria
     ── Pedidos
     ── Projetos
  ── Clientes (CRM)
     ── Pipeline
     ── Clientes
  ── Equipamentos
  ── Financeiro
     ── Faturas
     ── Pagamentos
     ── Câmbio
  ── Conteúdo (Blog)
  ── Configurações
  ── Logs de Auditoria
```

---

## 4. Fluxos de Utilizador (User Flows)

### Flow 1 — Novo Utilizador → Primeiro Curso

```
[Website]
    │
    ▼
[HOME PAGE]
  Hero: "Avance na sua carreira mineira"
  CTA principal: "Ver Cursos" → [CATÁLOGO]
    │
    ▼
[CATÁLOGO DE CURSOS]  ← filtros: categoria, nível, duração, preço
  Cards de cursos com: thumbnail, título, duração, preço USD/AOA, avaliação
    │
    ▼ (click no curso)
[PÁGINA DE DETALHE DO CURSO]
  - Vídeo intro (preview gratuito)
  - Ementa por módulos
  - Sobre o instrutor
  - Preço destacado em USD e AOA
  - CTA: "Inscrever-me por $X / AKZ Y"
    │
    ▼ (não autenticado → modal de auth)
[MODAL: Entrar ou Criar Conta]
  Tabs: Login | Registo
  Após auth → redirecionado de volta ao curso
    │
    ▼
[CHECKOUT DE INSCRIÇÃO]
  Resumo: curso, preço, câmbio atual
  Toggle: pagar em USD | AOA
  Dados de faturação (empresa/NIF se aplicável)
  CTA: "Confirmar Inscrição"
    │
    ▼
[CONFIRMAÇÃO + INSTRUÇÕES DE PAGAMENTO]
  Número da fatura: AMIS-2026-XXXX
  Dados bancários: IBAN + referência
  Instruções Multicaixa (se AOA)
  "Após pagamento, a equipa irá confirmar em até 24h"
  [Ver Fatura em PDF] [Ir para o Dashboard]
    │
    ▼ (equipa confirma pagamento)
[EMAIL: "O seu acesso foi ativado!"]
  Link direto para o primeiro módulo
    │
    ▼
[PLAYER DO CURSO]
  Sidebar: lista de módulos/lições com estado (✓ concluído, ▶ atual, ○ pendente)
  Área principal: vídeo player / PDF viewer / texto
  Barra de progresso no topo
  Botão "Marcar como concluído" → avança para próxima lição
    │
    ▼ (100% concluído + quizzes aprovados)
[ECRÃ DE CONCLUSÃO 🎉]
  Animação de celebração (Alpine.js)
  "Parabéns, [Nome]! Concluiu o curso."
  [Download do Certificado PDF]
  [Partilhar no LinkedIn]
  [Ver mais cursos]
```

---

### Flow 2 — Empresa → Pedido de Consultoria

```
[PÁGINA DE SERVIÇOS → CONSULTORIA]
  Três cards de pacotes lado a lado:
  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐
  │   BÁSICO     │  │  INTERMÉDIO  │  │   AVANÇADO   │
  │  $15,000     │  │  $35,000     │  │  $75,000     │
  │  AKZ 12M     │  │  AKZ 28M     │  │  AKZ 60M     │
  │              │  │  ⭐ POPULAR  │  │              │
  │  [Solicitar] │  │  [Solicitar] │  │  [Solicitar] │
  └──────────────┘  └──────────────┘  └──────────────┘
    │
    ▼ (click Solicitar → auth se necessário)
[FORMULÁRIO DE PEDIDO — 3 PASSOS]

  Passo 1: Sobre o Projeto
  ┌─────────────────────────────────────────────────┐
  │  Descreva o seu projeto ou problema  *           │
  │  [textarea - min 50 caracteres]                  │
  │                                                  │
  │  Prazo desejado                                  │
  │  [input text: "ex: 6 meses"]                    │
  │                                                  │
  │  Orçamento estimado (opcional)                   │
  │  [input text: "ex: $30,000 - $50,000"]          │
  └─────────────────────────────────────────────────┘
  [Anterior]  [Próximo →]

  Passo 2: Documentos (opcional)
  ┌─────────────────────────────────────────────────┐
  │  Documentos de apoio (máx. 5 ficheiros, 10MB)   │
  │  PDF, Word, Excel aceites                        │
  │  ┌─────────────────────────────────────────┐   │
  │  │  📎 Arrastar ficheiros ou clique aqui   │   │
  │  └─────────────────────────────────────────┘   │
  │  [lista de ficheiros carregados com ×]          │
  └─────────────────────────────────────────────────┘
  [← Anterior]  [Próximo →]

  Passo 3: Confirmação
  ┌─────────────────────────────────────────────────┐
  │  Resumo do pedido                               │
  │  Pacote: Intermédio ($35,000)                   │
  │  Empresa: [nome da empresa]                     │
  │  Descrição: [resumo...]                         │
  │  Documentos: 2 ficheiros                        │
  │                                                  │
  │  [✓] Concordo com os Termos e Condições          │
  └─────────────────────────────────────────────────┘
  [← Anterior]  [Submeter Pedido]
    │
    ▼
[ECRÃ DE SUCESSO]
  "O seu pedido foi recebido com sucesso!"
  "A equipa AMIS irá analisar e responder em até 48h"
  Número do pedido: AMIS-CONS-2026-XXX
  [Ver no Dashboard] [Ir para o Início]
    │
    ▼ (AMIS envia proposta)
[EMAIL: "Proposta enviada"]
  + Notificação no dashboard
    │
    ▼ (cliente aceita)
[PAINEL DO PROJETO — DASHBOARD]
  ┌─────────────────────────────────────────────┐
  │  Projeto: Otimização da Linha de Flotação   │
  │  Estado: ● Ativo   Consultor: Eng. João S.  │
  │  Progresso: ████████░░ 73%                  │
  ├─────────────────────────────────────────────┤
  │  MILESTONES                                 │
  │  ✅ Diagnóstico inicial          (14 Abr)   │
  │  ✅ Relatório de análise         (28 Abr)   │
  │  ⏳ Plano de otimização          (15 Mai)   │
  │  ○  Implementação piloto         (30 Jun)   │
  │  ○  Relatório final              (15 Jul)   │
  ├─────────────────────────────────────────────┤
  │  [📁 Documentos]  [💬 Mensagens (3 novos)] │
  └─────────────────────────────────────────────┘
```

---

### Flow 3 — Admin → Confirmar Pagamento

```
[PAINEL ADMIN → Financeiro → Pagamentos Pendentes]

  Badge "3 pagamentos pendentes" no menu lateral

  Tabela:
  ┌─────────────────────────────────────────────────────────────┐
  │ Fatura         │ Cliente       │ Valor  │ Data   │ Ações    │
  ├─────────────────────────────────────────────────────────────┤
  │ AMIS-2026-0042 │ Ana Ferreira  │ $2,500 │ 19 Abr │ [Ver ▾] │
  │ AMIS-2026-0041 │ Minas Angola  │$35,000 │ 18 Abr │ [Ver ▾] │
  └─────────────────────────────────────────────────────────────┘

  → [Ver] abre modal lateral (side panel):
  ┌─────────────────────────────────────────────────────────────┐
  │ Fatura AMIS-2026-0042                              [×]      │
  │ Cliente: Ana Paula Ferreira                                  │
  │ Serviço: Curso — Engenharia de Beneficiamento Mineral       │
  │ Valor: $2,500 USD / AKZ 2,000,000                           │
  │ Vence: 26 Abril 2026                                        │
  │                                                             │
  │ Método de pagamento *                                       │
  │ ○ Transferência bancária  ○ Multicaixa  ○ Numerário         │
  │                                                             │
  │ Referência do pagamento *                                   │
  │ [input: ex: TRF-20260419-12345]                            │
  │                                                             │
  │ Data do pagamento *                                         │
  │ [datepicker]                                               │
  │                                                             │
  │ Notas (opcional)                                           │
  │ [textarea]                                                  │
  │                                                             │
  │          [Rejeitar]          [✓ Confirmar Pagamento]       │
  └─────────────────────────────────────────────────────────────┘
  → Confirmar: dispara evento → enrollment ativo → email ao cliente
```

---

## 5. Wireframes Detalhados (Texto)

### 5.1 — HOME PAGE

```
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
NAVBAR [Logo AMIS]    Serviços  Formação  Blog  Sobre  [Entrar] [Área Cliente →]
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━

HERO (bg gradient #1a3a5c → #0f2640, min-h-screen)
  [Imagem/vídeo: mineração moderna angolana, overlay semi-opaco]

  Tag: "Consultoria · Formação · Tecnologia"
  H1: "Transformamos o Setor
       Mineiro Angolano"
  Subtítulo: "Consultoria técnica especializada, formação certificada e
              soluções tecnológicas para empresas e profissionais de mineração."

  [Ver Cursos]  [Solicitar Consultoria]

  ▼ Scroll indicator

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECÇÃO: NÚMEROS (bg-white, py-16)

  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐  ┌──────────────┐
  │     50+      │  │     200+     │  │      6       │  │    10+       │
  │  Projetos    │  │ Profissionais│  │   Cursos     │  │  Parceiros   │
  │  Concluídos  │  │  Formados    │  │ Certificados │  │ Internacionais│
  └──────────────┘  └──────────────┘  └──────────────┘  └──────────────┘

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECÇÃO: SERVIÇOS (bg-slate-50, py-20)

  H2: "Soluções Completas para a Mineração"

  ┌─────────────────────┐  ┌─────────────────────┐  ┌─────────────────────┐
  │  🏗️ Consultoria     │  │  🎓 Formação         │  │  ⚙️ Equipamentos    │
  │  Técnica            │  │  Profissional        │  │  e Tecnologia       │
  │                     │  │                     │  │                     │
  │  Diagnóstico,       │  │  Cursos em minas,   │  │  Conexão com        │
  │  viabilidade e      │  │  geociências e      │  │  fabricantes e      │
  │  otimização de      │  │  tecnologias        │  │  suporte técnico    │
  │  operações          │  │  digitais           │  │  especializado      │
  │                     │  │                     │  │                     │
  │  A partir de        │  │  A partir de        │  │  Consulte-nos       │
  │  $15,000 USD        │  │  $1,000 USD         │  │                     │
  │  [Saber Mais →]     │  │  [Ver Cursos →]     │  │  [Solicitar →]     │
  └─────────────────────┘  └─────────────────────┘  └─────────────────────┘

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECÇÃO: CURSOS EM DESTAQUE (py-20)

  H2: "Cursos em Destaque"
  [3 cards de cursos com thumbnail, título, duração, preço]
  [Ver todos os cursos →]

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECÇÃO: SOBRE (bg-#1a3a5c, text-white, py-20)

  Col Esquerda: foto da equipa
  Col Direita:
    Tag: "Sobre a AMIS"
    H2: "Especialistas Angolanos com Visão Global"
    Texto sobre o CEO e missão
    [Conhecer a Equipa →]

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECÇÃO: CTA FINAL (bg-[#c9922a], text-white, py-16)

  H2: "Pronto para transformar as suas operações?"
  [Solicitar Consultoria]  [Falar Connosco no WhatsApp]
```

---

### 5.2 — PLAYER DO CURSO

```
TOPBAR: [← Voltar ao Curso]  [Progresso: 45% ████████░░░░░░░░░░]  [Certificado (bloqueado)]

┌─────────────────────────────────┬────────────────────────────────────────┐
│  SIDEBAR (w-80, bg-slate-800)   │  ÁREA DO PLAYER (flex-1)               │
│                                 │                                        │
│  "Módulo 2: Flotação"           │  ┌──────────────────────────────────┐  │
│  ─────────────────────          │  │                                  │  │
│  ✅ 2.1 Introdução (5min)       │  │         VIDEO PLAYER             │  │
│  ✅ 2.2 Reagentes (8min)        │  │     (16:9, bg-black)             │  │
│  ▶  2.3 Circuito (12min) ←ATUAL│  │                                  │  │
│  ○  2.4 Otimização (10min)      │  │  ▶ 00:04:23 / 00:12:00  ──●──── │  │
│  ○  2.5 Quiz (5 perguntas)      │  │  🔊  [CC]  [⛶ Fullscreen]      │  │
│                                 │  └──────────────────────────────────┘  │
│  "Módulo 3: Separação Magnética"│                                        │
│  ─────────────────────          │  H2: "2.3 Circuito de Flotação"        │
│  ○  3.1 Princípios              │  [Tabs: Descrição | Recursos | Notas]  │
│  ○  3.2 Equipamentos            │                                        │
│  ○  3.3 Aplicações              │  [Descrição da lição]                  │
│  ○  3.4 Quiz                    │                                        │
│                                 │  ┌──────────────────────────────────┐  │
│  ─────────────────────          │  │  📎 Material de Apoio             │  │
│  [Suporte] [Fórum]              │  │  · Circuito_flotacao.pdf (2.3MB)  │  │
│                                 │  └──────────────────────────────────┘  │
│                                 │                                        │
│                                 │  [← Anterior]  [✓ Concluído e Próximo→]│
└─────────────────────────────────┴────────────────────────────────────────┘
```

---

### 5.3 — DASHBOARD DO CLIENTE

```
TOPBAR: [≡] [Logo AMIS]                    [🔔 2 novas]  [Ana F. ▾]

┌──────────┬─────────────────────────────────────────────────────────────┐
│ SIDEBAR  │  Bom dia, Ana 👋                           19 Abril 2026    │
│          │  ─────────────────────────────────────────────────────────  │
│ Dashboard│  KPI CARDS (4 colunas)                                      │
│ Cursos   │  ┌──────────────┐┌──────────────┐┌──────────────┐┌────────┐│
│ Projetos │  │ 2            ││ 1            ││ AKZ 4M       ││ 1      ││
│ Faturas  │  │ Cursos       ││ Projeto      ││ Faturas      ││Certif. ││
│ Perfil   │  │ Ativos       ││ Ativo        ││ Pendentes    ││Emitido ││
│          │  └──────────────┘└──────────────┘└──────────────┘└────────┘│
│          │                                                              │
│          │  ┌─────────────────────────────────────────────────────┐   │
│          │  │  OS MEUS CURSOS                          [Ver todos] │   │
│          │  │  ┌────────────────────────────────────────────────┐ │   │
│          │  │  │ 🏗️ Engenharia de Beneficiamento Mineral         │ │   │
│          │  │  │ Progresso: ████████████░░░░░ 65%    [Continuar]│ │   │
│          │  │  └────────────────────────────────────────────────┘ │   │
│          │  │  ┌────────────────────────────────────────────────┐ │   │
│          │  │  │ 🗺️ Geoprocessamento e Modelagem 3D              │ │   │
│          │  │  │ Progresso: ████░░░░░░░░░░░░░░ 20%    [Continuar]│ │   │
│          │  │  └────────────────────────────────────────────────┘ │   │
│          │  └─────────────────────────────────────────────────────┘   │
│          │                                                              │
│          │  ┌──────────────────────────┐ ┌────────────────────────┐   │
│          │  │  PROJETO ATIVO           │ │  FATURAS PENDENTES     │   │
│          │  │  Otimização Flotação     │ │  AMIS-2026-0042        │   │
│          │  │  ● Ativo                 │ │  $2,500 · Vence 26 Abr │   │
│          │  │  Progresso: 73%          │ │  [Ver fatura]          │   │
│          │  │  Próximo marco: 15 Mai   │ │                        │   │
│          │  │  [Ver Projeto]           │ │                        │   │
│          │  └──────────────────────────┘ └────────────────────────┘   │
└──────────┴─────────────────────────────────────────────────────────────┘
```

---

## 6. Estados de Interface

### Loading States
```
Botões com ação assíncrona:
  wire:loading.attr="disabled" + wire:loading.class="opacity-75 cursor-not-allowed"
  Spinner SVG animado + texto "A processar..."

Tabelas/listas carregando:
  Skeleton loaders (pulse animation) — nunca spinner central
  Mínimo 3 linhas skeleton para dar dimensão ao conteúdo
```

### Empty States
```
Nenhum curso inscrito:
  [ícone académico ilustrado]
  "Ainda não está inscrito em nenhum curso"
  "Explore o nosso catálogo e dê o próximo passo na sua carreira"
  [Ver Cursos →]

Nenhuma fatura:
  [ícone documento ilustrado]
  "Sem faturas por enquanto"
```

### Error States
```
Formulário:
  Borda vermelha no campo + mensagem abaixo em vermelho
  Alert de erro no topo do formulário se erro do servidor

404:
  Visual de rocha/mineral com "Página não encontrada"
  [Voltar ao Início]

500:
  "Algo correu mal. A equipa foi notificada."
  Sem stack trace em produção
```

---

## 7. Acessibilidade e Mobile

### Mobile First (< 768px)
- Sidebar como drawer deslizante com overlay escuro
- Cards empilhados verticalmente
- Botões com height mínima de 44px (touch target)
- Texto mínimo de 16px (sem zoom forçado pelo browser)
- Player de curso em fullscreen no mobile

### Acessibilidade (WCAG 2.1 AA)
- Contraste mínimo 4.5:1 para texto normal
- Todos os inputs com `<label>` associado
- Ícones decorativos com `aria-hidden="true"`
- Navegação por teclado em todos os componentes interativos
- `role="alert"` em mensagens de erro dinâmicas
- `aria-live="polite"` em notificações de sucesso

---

## 8. Animações e Microinterações

```
Filosofia: animações com propósito, nunca decorativas

✅ Usar:
  - Fade in de modais (150ms ease-out)
  - Slide de drawers/sidebars (200ms ease-in-out)
  - Pulse em skeleton loaders
  - Barra de progresso com transition suave
  - Celebração de conclusão de curso (confetti via Alpine.js - 1 vez)

❌ Evitar:
  - Animações de entrada em cada card ao fazer scroll
  - Hover animations em botões (apenas cor muda)
  - Parallax (causa problemas de performance em conexões lentas)
  - Carousels automáticos
```
