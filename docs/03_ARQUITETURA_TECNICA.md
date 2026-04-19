# 03 — Arquitetura Técnica
## Papel: Arquiteto de Software (10+ anos de experiência)

> **Foco:** Desenhar uma arquitetura sólida, escalável e alinhada com as tecnologias escolhidas.  
> **Data:** Abril 2026 | **Versão:** 1.0

---

## 1. Decisão de Arquitetura: Monólito Modular

### Escolha: Laravel Monolith com domínios bem separados

**Justificação:**
- A equipa é pequena no início → microserviços adicionariam overhead desnecessário
- Laravel favorece produtividade com uma base de código coesa
- A separação por domínios (Domain-Driven Design light) permite extrair serviços no futuro
- Livewire + Alpine.js = SPA-like experience sem necessidade de API separada

**Quando reconsiderar:** Quando qualquer módulo (ex: LMS) atingir > 10.000 utilizadores simultâneos ou quando a equipa crescer para > 5 devs

---

## 2. Estrutura de Diretórios do Projeto

```
amis/
├── app/
│   ├── Console/
│   │   └── Commands/
│   │       ├── GenerateOverdueInvoiceReminders.php
│   │       └── CleanExpiredEnrollments.php
│   ├── Enums/
│   │   ├── ProjectStatus.php
│   │   ├── EnrollmentStatus.php
│   │   ├── InvoiceStatus.php
│   │   ├── PaymentMethod.php
│   │   └── UserRole.php
│   ├── Events/
│   │   ├── PaymentConfirmed.php
│   │   ├── CourseCompleted.php
│   │   ├── ProjectMessageSent.php
│   │   └── MilestoneCompleted.php
│   ├── Exceptions/
│   │   └── Handler.php
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Web/           # Controladores do website público
│   │   │   │   ├── HomeController.php
│   │   │   │   ├── CourseController.php
│   │   │   │   ├── ServiceController.php
│   │   │   │   ├── BlogController.php
│   │   │   │   └── ContactController.php
│   │   │   └── Certificates/
│   │   │       └── VerifyController.php
│   │   ├── Livewire/          # Componentes Livewire (organizados por domínio)
│   │   │   ├── Auth/
│   │   │   │   ├── LoginForm.php
│   │   │   │   ├── RegisterForm.php
│   │   │   │   └── ForgotPasswordForm.php
│   │   │   ├── Courses/
│   │   │   │   ├── CourseCatalog.php
│   │   │   │   ├── CoursePlayer.php
│   │   │   │   ├── QuizAttempt.php
│   │   │   │   └── EnrollmentCheckout.php
│   │   │   ├── Consultancy/
│   │   │   │   ├── RequestForm.php
│   │   │   │   ├── ProjectDashboard.php
│   │   │   │   ├── ProjectChat.php
│   │   │   │   └── MilestoneTracker.php
│   │   │   ├── CRM/
│   │   │   │   ├── Pipeline.php
│   │   │   │   ├── ClientForm.php
│   │   │   │   └── ActivityLog.php
│   │   │   ├── Equipment/
│   │   │   │   ├── Catalog.php
│   │   │   │   └── QuoteRequest.php
│   │   │   ├── Payments/
│   │   │   │   ├── InvoiceList.php
│   │   │   │   └── PaymentConfirmation.php
│   │   │   ├── Notifications/
│   │   │   │   └── NotificationBell.php
│   │   │   └── Admin/
│   │   │       ├── Dashboard.php
│   │   │       ├── UserManager.php
│   │   │       ├── CourseManager.php
│   │   │       └── FinancialReport.php
│   │   └── Middleware/
│   │       ├── EnsureEmailIsVerified.php
│   │       └── CheckRole.php
│   ├── Jobs/
│   │   ├── GenerateCertificatePdf.php
│   │   ├── SendEnrollmentEmail.php
│   │   ├── SendInvoicePdf.php
│   │   └── ProcessCourseCompletion.php
│   ├── Listeners/
│   │   ├── OnPaymentConfirmed.php
│   │   ├── OnCourseCompleted.php
│   │   └── OnProjectMessageSent.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Client.php
│   │   ├── CrmContact.php
│   │   ├── CrmOpportunity.php
│   │   ├── CrmActivity.php
│   │   ├── Course.php
│   │   ├── CourseCategory.php
│   │   ├── CourseModule.php
│   │   ├── Lesson.php
│   │   ├── Quiz.php
│   │   ├── QuizQuestion.php
│   │   ├── QuizOption.php
│   │   ├── Enrollment.php
│   │   ├── LessonProgress.php
│   │   ├── QuizAttempt.php
│   │   ├── Certificate.php
│   │   ├── ConsultancyPackage.php
│   │   ├── ConsultancyRequest.php
│   │   ├── ConsultancyProject.php
│   │   ├── ProjectMilestone.php
│   │   ├── ProjectDocument.php
│   │   ├── ProjectMessage.php
│   │   ├── EquipmentCategory.php
│   │   ├── EquipmentSupplier.php
│   │   ├── Equipment.php
│   │   ├── EquipmentRequest.php
│   │   ├── Invoice.php
│   │   ├── Payment.php
│   │   ├── ExchangeRate.php
│   │   └── Post.php
│   ├── Notifications/
│   │   ├── EnrollmentConfirmed.php
│   │   ├── PaymentReceived.php
│   │   ├── CertificateIssued.php
│   │   ├── ProjectActivated.php
│   │   └── InvoiceOverdue.php
│   ├── Policies/
│   │   ├── CoursePolicy.php
│   │   ├── ConsultancyProjectPolicy.php
│   │   └── InvoicePolicy.php
│   └── Services/
│       ├── CertificateService.php
│       ├── EnrollmentService.php
│       ├── InvoiceService.php
│       ├── ExchangeRateService.php
│       └── CourseProgressService.php
├── bootstrap/
├── config/
│   ├── amis.php           # Configurações específicas da AMIS
│   └── ...
├── database/
│   ├── migrations/
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── RolesAndPermissionsSeeder.php
│       ├── ConsultancyPackagesSeeder.php
│       └── CourseCategoriesSeeder.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── public.blade.php      # Layout website público
│   │   │   ├── app.blade.php         # Layout portal autenticado
│   │   │   └── admin.blade.php       # Layout painel admin
│   │   ├── livewire/                 # Views dos componentes Livewire
│   │   ├── emails/                   # Templates de email
│   │   ├── pdf/                      # Templates PDF (certificados, faturas)
│   │   └── components/               # Blade components reutilizáveis
│   └── js/
│       ├── app.js
│       └── echo.js                   # Laravel Echo setup
├── routes/
│   ├── web.php             # Website público
│   ├── auth.php            # Autenticação
│   ├── portal.php          # Portal do cliente (middleware: auth)
│   ├── admin.php           # Painel admin (middleware: auth + role:admin)
│   └── api.php             # Endpoints API (futuro)
└── tests/
    ├── Feature/
    │   ├── Auth/
    │   ├── Courses/
    │   ├── Consultancy/
    │   └── Payments/
    └── Unit/
        ├── Services/
        └── Models/
```

---

## 3. Esquema de Base de Dados (PostgreSQL)

### 3.1 — Autenticação e Utilizadores

```sql
-- Tabela principal de utilizadores
CREATE TABLE users (
    id              BIGSERIAL PRIMARY KEY,
    name            VARCHAR(255) NOT NULL,
    email           VARCHAR(255) UNIQUE NOT NULL,
    password        VARCHAR(255) NOT NULL,
    phone           VARCHAR(50),
    country         CHAR(2) DEFAULT 'AO',    -- ISO 3166-1 alpha-2
    avatar          VARCHAR(500),
    status          VARCHAR(20) DEFAULT 'active', -- active, suspended, pending
    email_verified_at TIMESTAMPTZ,
    remember_token  VARCHAR(100),
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW()
);

-- Spatie Laravel Permission (gerado automaticamente)
-- roles, permissions, model_has_roles, model_has_permissions, role_has_permissions
```

**Roles do sistema:**
- `super_admin` — acesso total
- `admin` — gestão operacional
- `consultant` — consultor técnico AMIS
- `instructor` — instrutor de cursos
- `commercial` — departamento comercial
- `finance` — departamento financeiro
- `client_company` — empresa cliente
- `client_individual` — profissional/aluno individual

---

### 3.2 — Clientes e CRM

```sql
CREATE TABLE clients (
    id              BIGSERIAL PRIMARY KEY,
    user_id         BIGINT REFERENCES users(id) ON DELETE SET NULL,
    type            VARCHAR(20) NOT NULL,   -- 'individual' | 'company'
    company_name    VARCHAR(255),
    tax_id          VARCHAR(50),            -- NIF angolano
    industry        VARCHAR(100),
    country         CHAR(2) DEFAULT 'AO',
    address         TEXT,
    notes           TEXT,
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE crm_contacts (
    id              BIGSERIAL PRIMARY KEY,
    client_id       BIGINT REFERENCES clients(id) ON DELETE CASCADE,
    name            VARCHAR(255) NOT NULL,
    email           VARCHAR(255),
    phone           VARCHAR(50),
    position        VARCHAR(100),
    is_primary      BOOLEAN DEFAULT FALSE,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE crm_opportunities (
    id              BIGSERIAL PRIMARY KEY,
    client_id       BIGINT REFERENCES clients(id) ON DELETE CASCADE,
    assigned_to     BIGINT REFERENCES users(id) ON DELETE SET NULL,
    title           VARCHAR(255) NOT NULL,
    stage           VARCHAR(50) NOT NULL,  -- lead, qualified, proposal, negotiation, won, lost
    service_type    VARCHAR(50),           -- consultancy, course, equipment
    value_usd       DECIMAL(12,2),
    probability     SMALLINT DEFAULT 0,    -- 0-100%
    expected_close  DATE,
    notes           TEXT,
    lost_reason     TEXT,
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE crm_activities (
    id              BIGSERIAL PRIMARY KEY,
    opportunity_id  BIGINT REFERENCES crm_opportunities(id) ON DELETE CASCADE,
    client_id       BIGINT REFERENCES clients(id) ON DELETE CASCADE,
    user_id         BIGINT REFERENCES users(id) ON DELETE SET NULL,
    type            VARCHAR(30) NOT NULL,  -- call, meeting, email, note, visit
    description     TEXT NOT NULL,
    scheduled_at    TIMESTAMPTZ,
    completed_at    TIMESTAMPTZ,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);
```

---

### 3.3 — LMS (Cursos e Formação)

```sql
CREATE TABLE course_categories (
    id              BIGSERIAL PRIMARY KEY,
    name            VARCHAR(100) NOT NULL,
    slug            VARCHAR(120) UNIQUE NOT NULL,
    icon            VARCHAR(50),
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE courses (
    id              BIGSERIAL PRIMARY KEY,
    category_id     BIGINT REFERENCES course_categories(id),
    instructor_id   BIGINT REFERENCES users(id) ON DELETE SET NULL,
    title           VARCHAR(255) NOT NULL,
    slug            VARCHAR(280) UNIQUE NOT NULL,
    short_desc      VARCHAR(500),
    description     TEXT,
    objectives      JSONB DEFAULT '[]',  -- array de objetivos de aprendizagem
    requirements    JSONB DEFAULT '[]',  -- pré-requisitos
    duration_months SMALLINT,
    total_hours     SMALLINT,
    level           VARCHAR(20) DEFAULT 'beginner',  -- beginner, intermediate, advanced
    delivery        VARCHAR(20) DEFAULT 'online',    -- online, presencial, hybrid
    language        CHAR(2) DEFAULT 'pt',
    price_usd       DECIMAL(10,2) NOT NULL,
    price_aoa       DECIMAL(14,2) NOT NULL,
    thumbnail       VARCHAR(500),
    intro_video_url VARCHAR(500),
    max_students    SMALLINT,          -- NULL = ilimitado
    status          VARCHAR(20) DEFAULT 'draft', -- draft, published, archived
    certificate_template VARCHAR(50) DEFAULT 'default',
    pass_percentage SMALLINT DEFAULT 70,
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE course_sessions (  -- Para cursos presenciais/turmas
    id              BIGSERIAL PRIMARY KEY,
    course_id       BIGINT REFERENCES courses(id) ON DELETE CASCADE,
    name            VARCHAR(100),
    start_date      DATE NOT NULL,
    end_date        DATE NOT NULL,
    location        VARCHAR(255),
    max_students    SMALLINT,
    status          VARCHAR(20) DEFAULT 'open',
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE course_modules (
    id              BIGSERIAL PRIMARY KEY,
    course_id       BIGINT REFERENCES courses(id) ON DELETE CASCADE,
    title           VARCHAR(255) NOT NULL,
    description     TEXT,
    sort_order      SMALLINT DEFAULT 0,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE lessons (
    id              BIGSERIAL PRIMARY KEY,
    module_id       BIGINT REFERENCES course_modules(id) ON DELETE CASCADE,
    title           VARCHAR(255) NOT NULL,
    type            VARCHAR(20) NOT NULL, -- video, pdf, text, quiz, link
    content         TEXT,                 -- HTML rico ou URL
    video_url       VARCHAR(500),
    video_duration  INTEGER,              -- segundos
    is_free_preview BOOLEAN DEFAULT FALSE,
    sort_order      SMALLINT DEFAULT 0,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE quizzes (
    id              BIGSERIAL PRIMARY KEY,
    lesson_id       BIGINT REFERENCES lessons(id) ON DELETE CASCADE,
    title           VARCHAR(255) NOT NULL,
    pass_percentage SMALLINT DEFAULT 70,
    max_attempts    SMALLINT DEFAULT 3,
    time_limit_min  SMALLINT,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE quiz_questions (
    id              BIGSERIAL PRIMARY KEY,
    quiz_id         BIGINT REFERENCES quizzes(id) ON DELETE CASCADE,
    question        TEXT NOT NULL,
    type            VARCHAR(20) DEFAULT 'multiple_choice', -- multiple_choice, true_false
    points          SMALLINT DEFAULT 1,
    sort_order      SMALLINT DEFAULT 0
);

CREATE TABLE quiz_options (
    id              BIGSERIAL PRIMARY KEY,
    question_id     BIGINT REFERENCES quiz_questions(id) ON DELETE CASCADE,
    option_text     TEXT NOT NULL,
    is_correct      BOOLEAN DEFAULT FALSE,
    sort_order      SMALLINT DEFAULT 0
);

CREATE TABLE enrollments (
    id              BIGSERIAL PRIMARY KEY,
    user_id         BIGINT REFERENCES users(id) ON DELETE CASCADE,
    course_id       BIGINT REFERENCES courses(id) ON DELETE CASCADE,
    session_id      BIGINT REFERENCES course_sessions(id) ON DELETE SET NULL,
    invoice_id      BIGINT,              -- FK adicionada após tabela invoices
    status          VARCHAR(20) DEFAULT 'pending_payment', -- pending_payment, active, completed, cancelled
    progress_pct    SMALLINT DEFAULT 0,
    enrolled_at     TIMESTAMPTZ,
    completed_at    TIMESTAMPTZ,
    expires_at      TIMESTAMPTZ,         -- NULL = acesso vitalício
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW(),
    UNIQUE (user_id, course_id)
);

CREATE TABLE lesson_progress (
    id              BIGSERIAL PRIMARY KEY,
    enrollment_id   BIGINT REFERENCES enrollments(id) ON DELETE CASCADE,
    lesson_id       BIGINT REFERENCES lessons(id) ON DELETE CASCADE,
    status          VARCHAR(20) DEFAULT 'not_started', -- not_started, in_progress, completed
    time_spent_sec  INTEGER DEFAULT 0,
    completed_at    TIMESTAMPTZ,
    UNIQUE (enrollment_id, lesson_id)
);

CREATE TABLE quiz_attempts (
    id              BIGSERIAL PRIMARY KEY,
    enrollment_id   BIGINT REFERENCES enrollments(id) ON DELETE CASCADE,
    quiz_id         BIGINT REFERENCES quizzes(id) ON DELETE CASCADE,
    answers         JSONB NOT NULL,      -- { question_id: option_id, ... }
    score           SMALLINT NOT NULL,
    passed          BOOLEAN NOT NULL,
    attempted_at    TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE certificates (
    id              BIGSERIAL PRIMARY KEY,
    enrollment_id   BIGINT REFERENCES enrollments(id) ON DELETE CASCADE,
    cert_number     VARCHAR(50) UNIQUE NOT NULL,  -- Ex: AMIS-2026-00001
    pdf_path        VARCHAR(500),
    issued_at       TIMESTAMPTZ DEFAULT NOW(),
    revoked_at      TIMESTAMPTZ,
    UNIQUE (enrollment_id)
);
```

---

### 3.4 — Consultoria

```sql
CREATE TABLE consultancy_packages (
    id              BIGSERIAL PRIMARY KEY,
    name            VARCHAR(100) NOT NULL,  -- Básico, Intermédio, Avançado
    slug            VARCHAR(120) UNIQUE NOT NULL,
    description     TEXT,
    features        JSONB DEFAULT '[]',
    price_usd       DECIMAL(10,2) NOT NULL,
    price_aoa       DECIMAL(14,2) NOT NULL,
    is_active       BOOLEAN DEFAULT TRUE,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE consultancy_requests (
    id              BIGSERIAL PRIMARY KEY,
    client_id       BIGINT REFERENCES clients(id) ON DELETE CASCADE,
    package_id      BIGINT REFERENCES consultancy_packages(id),
    status          VARCHAR(30) DEFAULT 'submitted',
    -- submitted → under_review → proposal_sent → accepted → rejected
    project_description TEXT NOT NULL,
    timeline        VARCHAR(100),
    budget_range    VARCHAR(100),
    reviewed_by     BIGINT REFERENCES users(id) ON DELETE SET NULL,
    reviewed_at     TIMESTAMPTZ,
    proposal_sent_at TIMESTAMPTZ,
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE consultancy_projects (
    id              BIGSERIAL PRIMARY KEY,
    request_id      BIGINT REFERENCES consultancy_requests(id),
    client_id       BIGINT REFERENCES clients(id) ON DELETE CASCADE,
    package_id      BIGINT REFERENCES consultancy_packages(id),
    lead_consultant BIGINT REFERENCES users(id) ON DELETE SET NULL,
    title           VARCHAR(255) NOT NULL,
    description     TEXT,
    status          VARCHAR(30) DEFAULT 'active',
    -- active, on_hold, completed, cancelled
    start_date      DATE,
    end_date        DATE,
    value_usd       DECIMAL(12,2),
    value_aoa       DECIMAL(16,2),
    deposit_pct     SMALLINT DEFAULT 30,
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE project_team (
    project_id      BIGINT REFERENCES consultancy_projects(id) ON DELETE CASCADE,
    user_id         BIGINT REFERENCES users(id) ON DELETE CASCADE,
    role            VARCHAR(50) DEFAULT 'consultant',
    PRIMARY KEY (project_id, user_id)
);

CREATE TABLE project_milestones (
    id              BIGSERIAL PRIMARY KEY,
    project_id      BIGINT REFERENCES consultancy_projects(id) ON DELETE CASCADE,
    title           VARCHAR(255) NOT NULL,
    description     TEXT,
    due_date        DATE,
    completed_at    TIMESTAMPTZ,
    status          VARCHAR(20) DEFAULT 'pending', -- pending, in_progress, completed, delayed
    sort_order      SMALLINT DEFAULT 0,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE project_documents (
    id              BIGSERIAL PRIMARY KEY,
    project_id      BIGINT REFERENCES consultancy_projects(id) ON DELETE CASCADE,
    uploaded_by     BIGINT REFERENCES users(id) ON DELETE SET NULL,
    title           VARCHAR(255) NOT NULL,
    type            VARCHAR(50),         -- report, proposal, contract, other
    file_path       VARCHAR(500) NOT NULL,
    file_size       INTEGER,             -- bytes
    mime_type       VARCHAR(100),
    version         SMALLINT DEFAULT 1,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE project_messages (
    id              BIGSERIAL PRIMARY KEY,
    project_id      BIGINT REFERENCES consultancy_projects(id) ON DELETE CASCADE,
    sender_id       BIGINT REFERENCES users(id) ON DELETE SET NULL,
    message         TEXT NOT NULL,
    attachments     JSONB DEFAULT '[]',  -- [{ name, path, size }]
    read_by         JSONB DEFAULT '[]',  -- [user_id, ...]
    created_at      TIMESTAMPTZ DEFAULT NOW()
);
```

---

### 3.5 — Equipamentos

```sql
CREATE TABLE equipment_categories (
    id              BIGSERIAL PRIMARY KEY,
    name            VARCHAR(100) NOT NULL,
    slug            VARCHAR(120) UNIQUE NOT NULL,
    description     TEXT,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE equipment_suppliers (
    id              BIGSERIAL PRIMARY KEY,
    name            VARCHAR(255) NOT NULL,
    country         CHAR(2),
    website         VARCHAR(300),
    contact_email   VARCHAR(255),
    description     TEXT,
    is_active       BOOLEAN DEFAULT TRUE,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE equipment (
    id              BIGSERIAL PRIMARY KEY,
    category_id     BIGINT REFERENCES equipment_categories(id),
    supplier_id     BIGINT REFERENCES equipment_suppliers(id),
    name            VARCHAR(255) NOT NULL,
    slug            VARCHAR(280) UNIQUE NOT NULL,
    description     TEXT,
    specifications  JSONB DEFAULT '{}',
    images          JSONB DEFAULT '[]',
    price_min_usd   DECIMAL(12,2),
    price_max_usd   DECIMAL(12,2),
    is_active       BOOLEAN DEFAULT TRUE,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE equipment_requests (
    id              BIGSERIAL PRIMARY KEY,
    client_id       BIGINT REFERENCES clients(id) ON DELETE CASCADE,
    equipment_id    BIGINT REFERENCES equipment(id),
    quantity        INTEGER DEFAULT 1,
    project_desc    TEXT,
    notes           TEXT,
    status          VARCHAR(30) DEFAULT 'submitted',
    -- submitted, quoted, approved, ordered, delivered
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE equipment_quotes (
    id              BIGSERIAL PRIMARY KEY,
    request_id      BIGINT REFERENCES equipment_requests(id) ON DELETE CASCADE,
    price_usd       DECIMAL(12,2) NOT NULL,
    price_aoa       DECIMAL(16,2),
    lead_time_days  SMALLINT,
    notes           TEXT,
    valid_until     DATE,
    accepted_at     TIMESTAMPTZ,
    rejected_at     TIMESTAMPTZ,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);
```

---

### 3.6 — Pagamentos e Faturação

```sql
CREATE TABLE exchange_rates (
    id              BIGSERIAL PRIMARY KEY,
    usd_to_aoa      DECIMAL(10,4) NOT NULL,
    effective_date  DATE NOT NULL,
    set_by          BIGINT REFERENCES users(id) ON DELETE SET NULL,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE invoices (
    id              BIGSERIAL PRIMARY KEY,
    -- Polimórfico: pode ser de enrollment, consultancy_project, equipment_quote
    invoiceable_type VARCHAR(100) NOT NULL,
    invoiceable_id  BIGINT NOT NULL,
    client_id       BIGINT REFERENCES clients(id) ON DELETE CASCADE,
    invoice_number  VARCHAR(30) UNIQUE NOT NULL,  -- AMIS-2026-0001
    status          VARCHAR(20) DEFAULT 'pending',
    -- pending, paid, overdue, cancelled, refunded
    subtotal_usd    DECIMAL(12,2) NOT NULL,
    tax_pct         SMALLINT DEFAULT 0,
    tax_usd         DECIMAL(10,2) DEFAULT 0,
    total_usd       DECIMAL(12,2) NOT NULL,
    exchange_rate   DECIMAL(10,4),
    total_aoa       DECIMAL(16,2),
    currency        CHAR(3) DEFAULT 'USD',
    due_date        DATE NOT NULL,
    paid_at         TIMESTAMPTZ,
    notes           TEXT,
    pdf_path        VARCHAR(500),
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE payments (
    id              BIGSERIAL PRIMARY KEY,
    invoice_id      BIGINT REFERENCES invoices(id) ON DELETE CASCADE,
    confirmed_by    BIGINT REFERENCES users(id) ON DELETE SET NULL,
    amount_usd      DECIMAL(12,2) NOT NULL,
    amount_aoa      DECIMAL(16,2),
    currency        CHAR(3) DEFAULT 'USD',
    method          VARCHAR(30) NOT NULL, -- bank_transfer, multicaixa, cash, other
    reference       VARCHAR(100),         -- referência bancária
    status          VARCHAR(20) DEFAULT 'pending', -- pending, confirmed, rejected
    payment_date    DATE,
    confirmed_at    TIMESTAMPTZ,
    notes           TEXT,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

-- Adicionar FK em enrollments para invoices
ALTER TABLE enrollments ADD CONSTRAINT fk_enrollment_invoice
    FOREIGN KEY (invoice_id) REFERENCES invoices(id) ON DELETE SET NULL;
```

---

### 3.7 — Conteúdo e Blog

```sql
CREATE TABLE post_categories (
    id              BIGSERIAL PRIMARY KEY,
    name            VARCHAR(100) NOT NULL,
    slug            VARCHAR(120) UNIQUE NOT NULL,
    created_at      TIMESTAMPTZ DEFAULT NOW()
);

CREATE TABLE posts (
    id              BIGSERIAL PRIMARY KEY,
    author_id       BIGINT REFERENCES users(id) ON DELETE SET NULL,
    category_id     BIGINT REFERENCES post_categories(id),
    title           VARCHAR(255) NOT NULL,
    slug            VARCHAR(280) UNIQUE NOT NULL,
    excerpt         VARCHAR(500),
    content         TEXT NOT NULL,
    featured_image  VARCHAR(500),
    tags            JSONB DEFAULT '[]',
    status          VARCHAR(20) DEFAULT 'draft', -- draft, published, archived
    published_at    TIMESTAMPTZ,
    created_at      TIMESTAMPTZ DEFAULT NOW(),
    updated_at      TIMESTAMPTZ DEFAULT NOW()
);
```

---

## 4. Infraestrutura e Deploy

```
┌─────────────────────────────────────────────────────────────┐
│                     PRODUÇÃO (VPS/Cloud)                    │
│                                                             │
│  ┌──────────────┐    ┌──────────────┐    ┌───────────────┐ │
│  │   Nginx      │    │  PHP-FPM 8.2 │    │  PostgreSQL   │ │
│  │  (Reverse    │───▶│  Laravel 12  │───▶│    16.x       │ │
│  │   Proxy)     │    │              │    │               │ │
│  └──────────────┘    └──────────────┘    └───────────────┘ │
│          │                  │                               │
│          │           ┌──────┴───────┐                       │
│          │           │    Redis     │  ← Cache + Sessions   │
│          │           │   (Queues)   │  ← Job Queue          │
│          │           └──────────────┘                       │
│          │                                                   │
│  ┌───────┴──────────────────────────────────────────────┐   │
│  │              Laravel Horizon (Queue Monitor)          │   │
│  └──────────────────────────────────────────────────────┘   │
└─────────────────────────────────────────────────────────────┘
         │                    │
  ┌──────┴──────┐    ┌────────┴────────┐
  │   Pusher    │    │   AWS S3 / MinIO │
  │  (WebSocket)│    │  (Ficheiros)     │
  └─────────────┘    └─────────────────┘
```

### Recomendação de Servidor (MVP)
- **VPS:** 4 vCPU, 8GB RAM, 100GB SSD (DigitalOcean/Hetzner/AWS EC2)
- **OS:** Ubuntu 24.04 LTS
- **SSL:** Let's Encrypt (via Certbot)
- **CDN:** Cloudflare (grátis) para assets estáticos

---

## 5. Pacotes Laravel Essenciais

```json
{
  "require": {
    "laravel/framework": "^12.0",
    "livewire/livewire": "^4.0",
    "spatie/laravel-permission": "^6.0",
    "spatie/laravel-medialibrary": "^11.0",
    "spatie/laravel-activitylog": "^4.0",
    "pusher/pusher-php-server": "^7.2",
    "barryvdh/laravel-dompdf": "^3.0",
    "league/flysystem-aws-s3-v3": "^3.0",
    "predis/predis": "^2.0",
    "laravel/horizon": "^5.0",
    "laravel/telescope": "^5.0"
  },
  "require-dev": {
    "phpunit/phpunit": "^11.0",
    "fakerphp/faker": "^1.23",
    "laravel/pint": "^1.0",
    "larastan/larastan": "^2.0",
    "pestphp/pest": "^3.0"
  }
}
```

---

## 6. Configurações Vite (vite.config.js)

```javascript
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/echo.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        rollupOptions: {
            output: {
                manualChunks: {
                    'vendor': ['alpinejs'],
                },
            },
        },
    },
});
```

---

## 7. Diagrama de Fluxo de Dados (Compra de Curso)

```
Cliente         Livewire           Laravel         PostgreSQL       Pusher/Email
  │                │                  │                │               │
  ├─ click inscrever ──────────────▶ │                │               │
  │                ├─ EnrollmentCheckout.php          │               │
  │                │      ├──── InvoiceService ──────▶│               │
  │                │      │         │    ← invoice criada             │
  │                │      │         │                │               │
  │                │      │    Job: SendInvoicePdf ──────────────────▶│
  │                │◀─ mostra fatura                 │               │
  │                │                  │                │               │
  │  [paga manualmente]               │                │               │
  │                │                  │                │               │
  Admin ─ confirma pagamento ────────▶│                │               │
  │                │      ├── Payment::confirm()──────▶│               │
  │                │      │    ├── Enrollment::activate()─────────────▶│
  │                │      │    ├── Event: PaymentConfirmed             │
  │                │      │    │         └── Job: SendEnrollmentEmail─▶│
  │                │      │    │         └── ProcessCourseCompletion   │
  │◀── email: acesso liberado        │                │               │
```

---

## 8. Segurança (OWASP Top 10)

| Risco OWASP | Mitigação no Stack |
|-------------|-------------------|
| A01 Broken Access Control | Spatie Permission + Policies Laravel por cada modelo |
| A02 Cryptographic Failures | HTTPS obrigatório, passwords com bcrypt/argon2, ficheiros S3 com URL assinadas |
| A03 Injection | Eloquent ORM com prepared statements, validação com Form Requests |
| A04 Insecure Design | Policies por recurso, confirmação de pagamento manual isolada |
| A05 Security Misconfiguration | .env fora do webroot, APP_DEBUG=false em produção, headers de segurança via Nginx |
| A06 Vulnerable Components | Dependabot / composer audit no CI/CD |
| A07 Auth Failures | Rate limiting em login (5 tentativas/min), 2FA opcional, verificação de email |
| A08 Data Integrity | Assinaturas em jobs Laravel, validação de uploads (mime, tamanho) |
| A09 Logging Failures | Spatie Activity Log + Laravel Telescope em staging, logs estruturados |
| A10 SSRF | Validação e whitelist de URLs externas, sem fetch de URLs fornecidas pelo utilizador |
