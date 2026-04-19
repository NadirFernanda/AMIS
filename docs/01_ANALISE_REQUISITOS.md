# 01 — Análise de Requisitos
## Papel: Analista de Sistemas (10+ anos de experiência)

> **Objetivo:** Transformar o plano de negócios da AMIS em requisitos claros, mensuráveis e implementáveis.  
> **Data:** Abril 2026 | **Versão:** 1.0

---

## 1. Contexto do Problema

A AMIS opera em três linhas de negócio distintas:

1. **Consultoria Técnica** — projetos complexos com múltiplos intervenientes, documentos, cronogramas e pagamentos de alto valor
2. **Formação Profissional** — cursos presenciais e online com gestão de inscrições, conteúdo, progresso e certificados
3. **Intermediação de Equipamentos** — catálogo, cotações e suporte pós-venda

Atualmente, **não existe nenhum sistema centralizado** que suporte estas operações. A empresa depende de e-mails, ficheiros Excel e comunicação manual — o que limita o crescimento, cria falhas de comunicação e impede a escalabilidade para outros países.

---

## 2. Partes Interessadas (Stakeholders)

| Stakeholder | Papel | Necessidades Principais |
|-------------|-------|------------------------|
| CEO (Puto Luís) | Dono do produto, decisão estratégica | Visibilidade financeira, KPIs, relatórios |
| Diretora de Operações (Fernanda Amorim) | Gestão diária da plataforma | Gestão de projetos, clientes, equipa |
| Consultores Técnicos | Executam projetos | Gerir tarefas, documentos, comunicação com clientes |
| Instrutores/Professores | Ministram cursos | Publicar conteúdo, acompanhar alunos, emitir notas |
| Clientes — Empresas Mineiras | Compram consultoria e equipamentos | Self-service, visibilidade dos projetos, faturas |
| Clientes — Profissionais Individuais | Fazem cursos | Catálogo claro, pagamento fácil, certificado digital |
| Departamento Comercial | Captação e pipeline de vendas | CRM, follow-up, propostas |
| Departamento Financeiro | Faturação e relatórios | Faturas, recibos, multi-moeda, relatórios |
| Parceiros Internacionais | Fornecedores de equipamentos | Portal de fornecedor (Fase 2) |

---

## 3. Requisitos Funcionais por Módulo

### 3.1 — Módulo: Website Público

| ID | Requisito | Prioridade |
|----|-----------|------------|
| WEB-01 | Página inicial com apresentação da AMIS, missão, visão e valores | Alta |
| WEB-02 | Página de serviços: Consultoria, Formação, Equipamentos (com preços em USD e AOA) | Alta |
| WEB-03 | Página "Sobre Nós" com equipa de liderança e consultores | Alta |
| WEB-04 | Formulário de contacto com notificação por email à equipa | Alta |
| WEB-05 | Blog / Artigos técnicos com categorias e pesquisa | Média |
| WEB-06 | Página de depoimentos e casos de sucesso | Média |
| WEB-07 | Suporte multi-idioma: Português (PT-AO) e Inglês | Média |
| WEB-08 | SEO on-page: meta tags, sitemap.xml, robots.txt | Alta |
| WEB-09 | Integração com WhatsApp Business (botão de contacto rápido) | Baixa |

---

### 3.2 — Módulo: Autenticação e Perfis de Utilizador

| ID | Requisito | Prioridade |
|----|-----------|------------|
| AUTH-01 | Registo com email + password | Alta |
| AUTH-02 | Login com email + password | Alta |
| AUTH-03 | Recuperação de password por email | Alta |
| AUTH-04 | Verificação de email após registo | Alta |
| AUTH-05 | Perfil editável: nome, foto, telefone, país, empresa | Alta |
| AUTH-06 | Roles distintos: Admin AMIS, Consultor, Instrutor, Cliente Empresa, Cliente Individual | Alta |
| AUTH-07 | Autenticação de 2 fatores (2FA) — opcional pelo utilizador | Média |
| AUTH-08 | Single Sign-On (Google/LinkedIn) — Fase 2 | Baixa |

---

### 3.3 — Módulo: LMS — Sistema de Gestão de Cursos

| ID | Requisito | Prioridade |
|----|-----------|------------|
| LMS-01 | Catálogo de cursos com filtros (categoria, duração, nível, preço) | Alta |
| LMS-02 | Página de detalhe do curso com ementa, instrutor, duração e preço em USD/AOA | Alta |
| LMS-03 | Inscrição no curso após pagamento confirmado | Alta |
| LMS-04 | Área do aluno: cursos inscritos, progresso, certificados | Alta |
| LMS-05 | Lições por tipo: vídeo, PDF/documento, texto enriquecido, quiz | Alta |
| LMS-06 | Player de vídeo integrado (Vimeo/YouTube privado ou armazenamento próprio) | Alta |
| LMS-07 | Rastreio de progresso por lição (concluída / em progresso / não iniciada) | Alta |
| LMS-08 | Quizzes com pontuação mínima de aprovação configurável por curso | Alta |
| LMS-09 | Certificado digital automático em PDF após conclusão do curso | Alta |
| LMS-10 | Número único de certificado verificável online | Alta |
| LMS-11 | Painel do instrutor: criar/editar cursos, módulos, lições, acompanhar alunos | Alta |
| LMS-12 | Pré-visualização gratuita de lições selecionadas | Média |
| LMS-13 | Fórum de discussão por curso | Média |
| LMS-14 | Avaliação e comentários do curso pelos alunos | Média |
| LMS-15 | Emissão de turmas presenciais com datas e vagas limitadas | Alta |
| LMS-16 | Lista de espera quando o curso está lotado | Média |

---

### 3.4 — Módulo: Portal de Consultoria

| ID | Requisito | Prioridade |
|----|-----------|------------|
| CONS-01 | Apresentação dos 3 pacotes de consultoria com descrição detalhada e preços | Alta |
| CONS-02 | Formulário de pedido de consultoria: pacote, descrição do projeto, empresa, prazo | Alta |
| CONS-03 | Upload de documentos no pedido (estudos, relatórios existentes) | Alta |
| CONS-04 | Fluxo de aprovação: Pedido → Análise AMIS → Proposta → Aceite → Projeto Ativo | Alta |
| CONS-05 | Painel de projeto para o cliente: estado, milestones, documentos, mensagens | Alta |
| CONS-06 | Painel de projeto para o consultor: tarefas, documentos, comunicação, tempo | Alta |
| CONS-07 | Sistema de marcos (milestones) com datas e estado de conclusão | Alta |
| CONS-08 | Repositório de documentos do projeto (upload, versões, download) | Alta |
| CONS-09 | Mensagens internas por projeto (tipo chat) com notificações em tempo real | Alta |
| CONS-10 | Relatórios de progresso enviados automaticamente ao cliente (mensal/quinzenal) | Média |
| CONS-11 | Avaliação final do projeto pelo cliente (NPS) | Média |

---

### 3.5 — Módulo: CRM — Gestão de Clientes

| ID | Requisito | Prioridade |
|----|-----------|------------|
| CRM-01 | Cadastro de clientes: empresas e individuais | Alta |
| CRM-02 | Ficha de cliente: dados, contactos, histórico de serviços, documentos | Alta |
| CRM-03 | Pipeline de oportunidades com etapas configuráveis (Kanban) | Alta |
| CRM-04 | Registo de atividades: chamada, reunião, email, visita | Alta |
| CRM-05 | Follow-up programado com lembretes para o comercial | Alta |
| CRM-06 | Segmentação de clientes por setor, país, tipo | Média |
| CRM-07 | Relatório de conversão do pipeline por período | Média |
| CRM-08 | Importação de clientes via CSV | Baixa |

---

### 3.6 — Módulo: Catálogo de Equipamentos

| ID | Requisito | Prioridade |
|----|-----------|------------|
| EQ-01 | Catálogo com categorias de equipamentos de mineração | Alta |
| EQ-02 | Ficha de equipamento: descrição, especificações técnicas, fabricante, imagens | Alta |
| EQ-03 | Pedido de cotação com detalhes do projeto e quantidade | Alta |
| EQ-04 | Fluxo de cotação: Pedido → Análise → Envio de proposta → Confirmação | Alta |
| EQ-05 | Painel de pedidos para o cliente | Alta |
| EQ-06 | Gestão de fornecedores/fabricantes internacionais | Média |
| EQ-07 | Tracking de estado do pedido (após confirmação) | Média |

---

### 3.7 — Módulo: Pagamentos e Faturação

| ID | Requisito | Prioridade |
|----|-----------|------------|
| PAY-01 | Geração de fatura automática após confirmação de pedido | Alta |
| PAY-02 | Suporte a duas moedas: USD e AOA (câmbio configurável) | Alta |
| PAY-03 | Métodos de pagamento: transferência bancária (IBAN), Multicaixa/EMIS | Alta |
| PAY-04 | Confirmação manual de pagamento pela equipa financeira | Alta |
| PAY-05 | Histórico de faturas e recibos no portal do cliente | Alta |
| PAY-06 | Download de faturas em PDF | Alta |
| PAY-07 | Notificação automática de fatura em atraso | Alta |
| PAY-08 | Planos de pagamento por parcelas para consultoria | Média |
| PAY-09 | Dashboard financeiro: receita mensal, por tipo de serviço, por cliente | Alta |
| PAY-10 | Integração futura com gateway de pagamento online | Baixa |

---

### 3.8 — Módulo: Notificações

| ID | Requisito | Prioridade |
|----|-----------|------------|
| NOT-01 | Notificações por email: inscrição, pagamento, novo projeto, marco, certificado | Alta |
| NOT-02 | Notificações em tempo real (Pusher/Echo) no painel: novas mensagens, atualizações | Alta |
| NOT-03 | Central de notificações no painel do utilizador (lidas/não lidas) | Alta |
| NOT-04 | Configurações de notificação (opt-in/out por tipo) | Média |
| NOT-05 | SMS via API (Fase 2) | Baixa |

---

### 3.9 — Módulo: Painel Administrativo AMIS

| ID | Requisito | Prioridade |
|----|-----------|------------|
| ADM-01 | Dashboard com KPIs: receita total, projetos ativos, alunos inscritos, oportunidades abertas | Alta |
| ADM-02 | Gestão de utilizadores e atribuição de roles | Alta |
| ADM-03 | Gestão de conteúdo do website (blog, páginas) | Alta |
| ADM-04 | Relatórios financeiros por período, serviço, cliente | Alta |
| ADM-05 | Gestão de câmbio USD/AOA | Alta |
| ADM-06 | Logs de auditoria (quem fez o quê, quando) | Alta |
| ADM-07 | Configuração de notificações de sistema | Média |
| ADM-08 | Backup e exportação de dados | Média |

---

## 4. Requisitos Não-Funcionais

| ID | Categoria | Requisito |
|----|-----------|-----------|
| NFR-01 | Performance | Tempo de carregamento de página < 2 segundos (FCP) |
| NFR-02 | Performance | API responses < 300ms em P95 |
| NFR-03 | Segurança | Compliance com OWASP Top 10 |
| NFR-04 | Segurança | HTTPS obrigatório em todos os endpoints |
| NFR-05 | Segurança | Rate limiting em endpoints de autenticação |
| NFR-06 | Segurança | Proteção CSRF em todos os formulários |
| NFR-07 | Segurança | Passwords armazenadas com bcrypt/argon2 |
| NFR-08 | Escalabilidade | Suporte a 500 utilizadores simultâneos no MVP |
| NFR-09 | Disponibilidade | SLA de 99.5% de uptime |
| NFR-10 | Usabilidade | Design responsivo: mobile, tablet, desktop |
| NFR-11 | Usabilidade | Acessibilidade WCAG 2.1 nível AA |
| NFR-12 | Internacionalização | Multi-idioma PT-AO / EN |
| NFR-13 | Manutenibilidade | Cobertura de testes > 70% no core business |
| NFR-14 | Conformidade | LGPD / proteção de dados pessoais |
| NFR-15 | SEO | Server-side rendering ou SSR parcial para páginas públicas |

---

## 5. Regras de Negócio Críticas

### RN-01 — Acesso a Curso
> O aluno só tem acesso ao conteúdo completo de um curso após o pagamento ser **confirmado manualmente** pela equipa financeira da AMIS.

### RN-02 — Certificado
> O certificado é emitido automaticamente apenas quando o aluno: (a) completou 100% das lições, e (b) obteve nota mínima em todos os quizzes obrigatórios.

### RN-03 — Câmbio
> O preço em AOA é calculado com base na taxa de câmbio configurada pelo administrador. A taxa é fixa no momento da emissão da fatura.

### RN-04 — Início de Projeto de Consultoria
> Um projeto de consultoria só é ativado após: (a) o cliente aceitar a proposta, e (b) o pagamento do sinal (mínimo 30% do valor) ser confirmado.

### RN-05 — Roles e Permissões
> Um utilizador pode ter múltiplos roles (ex.: um cliente empresa pode também estar inscrito em cursos como individual). As permissões são cumulativas.

### RN-06 — Visibilidade de Dados
> Um cliente só visualiza os seus próprios projetos, faturas e certificados. Dados de outros clientes nunca são expostos.

### RN-07 — Cancelamento de Curso
> Cancelamentos com mais de 7 dias antes do início têm direito a reembolso total. Até 48h, 50%. Após o início, sem reembolso.

---

## 6. Casos de Uso Principais

### UC-01: Inscrição em Curso Online
```
Ator: Cliente Individual
Pré-condição: Utilizador autenticado
Fluxo Principal:
  1. Utilizador navega no catálogo de cursos
  2. Seleciona um curso e visualiza detalhes
  3. Clica em "Inscrever-me"
  4. Sistema exibe resumo do pedido com valor em USD/AOA
  5. Utilizador confirma e recebe fatura
  6. Utilizador efetua pagamento (transferência/Multicaixa)
  7. Equipa financeira confirma pagamento no painel
  8. Sistema libera acesso ao curso e envia email de boas-vindas
Pós-condição: Aluno com acesso ao curso
Exceções: Pagamento não confirmado em 5 dias → fatura cancelada automaticamente
```

### UC-02: Pedido de Consultoria
```
Ator: Cliente Empresa
Pré-condição: Utilizador autenticado como Cliente Empresa
Fluxo Principal:
  1. Cliente visualiza pacotes de consultoria
  2. Seleciona pacote e preenche formulário de pedido
  3. Faz upload de documentos relevantes (opcional)
  4. Submete pedido
  5. Equipa AMIS recebe notificação e analisa pedido
  6. AMIS envia proposta detalhada com cronograma
  7. Cliente aceita proposta
  8. AMIS emite fatura de sinal (30%)
  9. Cliente paga sinal → projeto é ativado
  10. Projeto aparece no painel com milestones e consultor atribuído
Pós-condição: Projeto ativo com consultor atribuído
```

### UC-03: Verificação de Certificado
```
Ator: Qualquer pessoa (não autenticada)
Fluxo Principal:
  1. Acede a /certificados/verificar
  2. Introduz número do certificado
  3. Sistema valida e exibe: nome do aluno, curso, data de emissão
Pós-condição: Certificado verificado publicamente
```

---

## 7. Integrações Externas

| Sistema | Finalidade | Criticidade |
|---------|------------|-------------|
| Pusher | Notificações em tempo real (chat, atualizações) | Alta |
| SMTP (Mailgun/SES) | Envio de emails transacionais | Alta |
| Vimeo / Bunny.net | Hosting de vídeos de cursos | Alta |
| AWS S3 / MinIO | Armazenamento de documentos e ficheiros | Alta |
| Multicaixa Express | Pagamento online (Fase 2) | Média |
| Google Analytics | Tracking de comportamento no website | Média |
| WhatsApp Business API | Notificações e suporte (Fase 2) | Baixa |

---

## 8. Restrições e Pressupostos

- A plataforma será inicialmente em língua portuguesa (PT-AO); inglês na Fase 2
- Os pagamentos online serão inicialmente **manuais** (transferência + confirmação humana)
- A conectividade em Angola pode ser limitada; a plataforma deve ser **otimizada para conexões lentas** (imagens lazy-load, assets comprimidos)
- O sistema deve funcionar nos browsers: Chrome 100+, Firefox 100+, Edge 100+, Safari 15+
