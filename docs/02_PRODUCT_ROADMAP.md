# 02 — Roadmap de Produto
## Papel: Product Manager (10+ anos de experiência)

> **Foco:** Maximizar o valor entregue ao mercado, priorizar corretamente e garantir que cada funcionalidade resolve um problema real.  
> **Data:** Abril 2026 | **Versão:** 1.0

---

## 1. Problema Real de Mercado

O setor mineiro angolano enfrenta um gap crítico:

- **Escassez de profissionais qualificados** localmente → dependência cara de expatriados
- **Falta de plataformas digitais especializadas** para consultoria técnica no setor
- **Ausência de um hub digital** que conecte empresas mineiras a formação, consultoria e equipamentos num único lugar
- **Barreiras linguísticas e geográficas** para aceder a formação internacional de qualidade

A AMIS resolve estes três problemas numa só plataforma. **O mercado está subservido e pronto.**

---

## 2. Proposta de Valor por Segmento

### Segmento A — Empresas Mineiras (B2B)
> "Aceda a consultoria técnica especializada, otimize as suas operações e adquira os equipamentos certos — tudo numa plataforma, com profissionais que conhecem Angola."

### Segmento B — Profissionais e Engenheiros (B2C)
> "Avance na sua carreira com cursos certificados em engenharia de minas e geociências, ministrados por especialistas com experiência internacional."

### Segmento C — AMIS (Interno)
> "Gerir todos os projetos, clientes, pagamentos e conteúdo numa única plataforma operacional — sem Excel, sem emails dispersos."

---

## 3. Personas de Utilizador

### Persona 1 — Carlos Mavinga | Diretor de Operações Mineiras
- **Idade:** 45 anos | **País:** Angola
- **Empresa:** Empresa mineira de médio porte
- **Dores:** Operações ineficientes, falta de tecnologia, dificuldade em encontrar consultores locais competentes
- **Objetivos:** Otimizar processos, cumprir normas ambientais, reduzir custos operacionais
- **Comportamento digital:** Usa laptop, email corporativo, WhatsApp; não é tech-savvy mas usa internet regularmente
- **O que precisa da plataforma:** Solicitar consultoria facilmente, acompanhar o projeto, receber relatórios, fazer pagamentos em AOA

### Persona 2 — Ana Paula Ferreira | Engenheira de Geologia
- **Idade:** 28 anos | **País:** Angola
- **Situação:** Recém-formada, quer especializar-se em beneficiamento mineral
- **Dores:** Formação local limitada, cursos internacionais caros e em inglês, sem certificados reconhecidos
- **Objetivos:** Obter certificações valorizadas no mercado, progredir na carreira
- **Comportamento digital:** Usa smartphone, redes sociais, YouTube para aprender
- **O que precisa da plataforma:** Cursos acessíveis em PT, certificado verificável, pagamento em AOA, acesso mobile

### Persona 3 — Miguel Sousa | Gestor Comercial da AMIS
- **Idade:** 35 anos | **País:** Angola
- **Papel interno:** Captação de clientes e gestão de pipeline
- **Dores:** Informação de clientes dispersa, sem visibilidade do pipeline, follow-ups perdidos
- **Objetivos:** Fechar mais contratos, ter visibilidade das oportunidades
- **O que precisa da plataforma:** CRM com pipeline Kanban, lembretes, histórico de comunicações

### Persona 4 — Fernanda Amorim | Diretora de Operações AMIS
- **Idade:** 38 anos | **País:** Angola
- **Papel:** Gere toda a operação — projetos, equipa, clientes, financeiro
- **Dores:** Falta de visibilidade consolidada, relatórios manuais, sem dashboard unificado
- **O que precisa:** Dashboard executivo com KPIs em tempo real, relatórios financeiros, gestão de equipa

---

## 4. MVP — Produto Mínimo Viável

### Definição do MVP
O MVP deve permitir à AMIS **começar a gerar receita imediatamente** após o lançamento. Isso significa:

1. Clientes conseguem descobrir a AMIS online (website)
2. Clientes conseguem comprar e aceder a cursos online
3. Clientes conseguem solicitar consultoria
4. A equipa AMIS consegue gerir tudo num painel

### Funcionalidades do MVP (Sprint 1–6, ~3 meses)

| # | Funcionalidade | Valor de Negócio |
|---|---------------|-----------------|
| 1 | Website público com SEO (HOME, SERVIÇOS, SOBRE, CONTACTO) | Gerar leads orgânicos |
| 2 | Autenticação (registo, login, verificação de email, recuperação de password) | Identificar utilizadores |
| 3 | Catálogo de cursos com filtros + página de detalhe | Mostrar oferta formativa |
| 4 | Inscrição em cursos + geração de fatura (USD/AOA) | Gerar receita de formação |
| 5 | Confirmação manual de pagamento + liberação de acesso | Controlo financeiro |
| 6 | Player de curso: lições em vídeo + PDF + texto | Entrega de valor ao aluno |
| 7 | Rastreio de progresso + emissão de certificado PDF | Completar ciclo do aluno |
| 8 | Formulário de pedido de consultoria (pacote + documentos) | Captar leads de consultoria |
| 9 | Painel administrativo: gestão de utilizadores, cursos, pedidos | Operação interna |
| 10 | Painel do cliente: cursos, faturas, projetos | Self-service do cliente |
| 11 | Notificações por email (inscrição, pagamento, certificado) | Comunicação automatizada |
| 12 | Dashboard financeiro básico (receita, faturas pendentes) | Visibilidade financeira |

### O que NÃO está no MVP
- CRM completo (Fase 2)
- Fórum de cursos (Fase 2)
- Catálogo de equipamentos (Fase 2)
- Chat em tempo real (Fase 2)
- App mobile (Fase 3)
- Pagamentos online automáticos (Fase 2)
- Multi-idioma inglês (Fase 2)

---

## 5. Fases de Desenvolvimento

### Fase 1 — MVP: "Abrir Portas" (Meses 1–3)
**Objetivo:** Plataforma funcional que gera receita e opera internamente

```
✅ Website público
✅ Autenticação completa
✅ LMS básico (vídeos, PDFs, quizzes, certificados)
✅ Portal de consultoria (pedido + gestão básica de projeto)
✅ Faturação manual (USD/AOA)
✅ Painel admin + painel cliente
✅ Notificações por email
```

**KPIs de sucesso da Fase 1:**
- 50+ utilizadores registados no primeiro mês
- 10+ inscrições em cursos no primeiro mês
- 3+ pedidos de consultoria no primeiro mês
- NPS > 7 dos primeiros utilizadores

---

### Fase 2 — "Crescer" (Meses 4–7)
**Objetivo:** Adicionar funcionalidades que aumentam retenção e receita

```
🔵 CRM completo com pipeline Kanban
🔵 Chat em tempo real por projeto (Pusher + Echo)
🔵 Catálogo de equipamentos + pedidos de cotação
🔵 Fórum de discussão por curso
🔵 Avaliações de cursos e NPS de projetos
🔵 Relatórios avançados (exportação PDF/Excel)
🔵 Multi-idioma (EN)
🔵 Planos de pagamento parcelado
🔵 Integração Multicaixa Express (pagamento online)
🔵 Painel do instrutor melhorado
🔵 Blog/Artigos técnicos com editor rico
```

**KPIs de sucesso da Fase 2:**
- 200+ utilizadores ativos
- Taxa de conclusão de cursos > 60%
- 15+ projetos de consultoria ativos
- 5+ cotações de equipamento por mês

---

### Fase 3 — "Escalar" (Meses 8–14)
**Objetivo:** Expansão geográfica e automação avançada

```
🟡 App mobile (React Native ou PWA)
🟡 IA: recomendação de cursos e análise de perfil
🟡 Portal de fornecedores internacionais
🟡 Sistema de afiliados/referências
🟡 Webinars ao vivo integrados
🟡 API pública para parceiros
🟡 Expansão: Moçambique, Namíbia, RDC (multi-tenancy)
🟡 Relatórios analíticos com BI (Metabase integrado)
```

---

## 6. User Stories Prioritárias (MVP)

### ÉPICO 1: Formação Online

```
US-01 [ALTA] Como aluno, quero navegar no catálogo de cursos e filtrar por área,
       duração e preço, para encontrar o curso certo para mim.

US-02 [ALTA] Como aluno, quero ver a ementa completa, o instrutor e exemplos
       de conteúdo antes de me inscrever, para tomar uma decisão informada.

US-03 [ALTA] Como aluno, quero pagar o curso em AOA via transferência bancária
       e receber uma fatura em PDF, para cumprir os requisitos contabilísticos da empresa.

US-04 [ALTA] Como aluno, quero marcar lições como concluídas e ver o meu
       progresso visualmente, para me manter motivado.

US-05 [ALTA] Como aluno, quero receber o meu certificado em PDF após concluir
       o curso, para partilhar no LinkedIn e apresentar a empregadores.

US-06 [MÉDIA] Como recrutador, quero verificar um número de certificado online,
       para confirmar a autenticidade da formação de um candidato.
```

### ÉPICO 2: Consultoria

```
US-07 [ALTA] Como diretor de operações, quero solicitar uma consultoria online
       descrevendo o problema e fazendo upload de documentos, para evitar
       reuniões desnecessárias na fase de triagem.

US-08 [ALTA] Como cliente de consultoria, quero ver os milestones do meu
       projeto e o estado de cada um, para saber exatamente onde estamos.

US-09 [ALTA] Como consultor AMIS, quero comunicar com o cliente por mensagens
       no painel do projeto, para ter todo o histórico centralizado.
```

### ÉPICO 3: Administração

```
US-10 [ALTA] Como administrador, quero confirmar pagamentos manualmente e
       que o sistema libere automaticamente o acesso, para não depender
       de processos manuais adicionais.

US-11 [ALTA] Como diretora de operações, quero ver um dashboard com receita
       do mês, projetos ativos e inscrições em cursos, para gerir o negócio
       em tempo real.
```

---

## 7. Métricas de Produto

### North Star Metric
> **"Número de profissionais impactados positivamente pela AMIS por mês"**  
> (alunos com progresso ativo + clientes com projetos ativos)

### Métricas por Módulo

| Módulo | Métricas Chave |
|--------|---------------|
| Cursos | Taxa de inscrição, taxa de conclusão, NPS do curso, receita por curso |
| Consultoria | Nº pedidos/mês, taxa de conversão pedido→projeto, duração média de projeto, NPS |
| Financeiro | MRR, ARR, LTV por cliente, taxa de pagamento pontual |
| Website | Visitas orgânicas, taxa de conversão visitante→registo |
| Plataforma | DAU/MAU, tempo médio de sessão, taxa de retenção |

---

## 8. Estratégia de Go-to-Market

### Pré-lançamento (1 mês antes)
- Landing page com "lista de espera" para recolher emails
- Posts nas redes sociais sobre o lançamento
- Parcerias com 3 empresas mineiras para acesso beta

### Lançamento (Mês 1)
- Evento de lançamento digital (webinar gratuito sobre beneficiamento mineral)
- Primeiros 2 cursos disponíveis a preço de lançamento (20% desconto)
- Campanha de email para a rede de contactos da AMIS

### Pós-lançamento (Meses 2–3)
- SEO contínuo com artigos técnicos do blog
- Participação em feiras de mineração (referência ao website/plataforma)
- Programa de referência: cliente que indica recebe desconto

---

## 9. Análise de Risco de Produto

| Risco | Probabilidade | Impacto | Mitigação |
|-------|--------------|---------|-----------|
| Baixa adoção por falta de cultura digital | Alta | Alto | UX simples, suporte WhatsApp, tutoriais em vídeo |
| Conectividade instável em Angola | Alta | Alto | Lazy loading, conteúdo offline (PWA - Fase 3) |
| Concorrência internacional (Coursera, etc.) | Média | Médio | Foco em conteúdo 100% contextualizado para Angola |
| Atraso no pagamento de clientes enterprise | Alta | Alto | Sinal obrigatório de 30% para iniciar projeto |
| Resistência ao pagamento online | Alta | Médio | Manter transferência bancária como opção principal |
