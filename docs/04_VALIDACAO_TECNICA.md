# 04 — Validação Técnica e Plano de Implementação
## Papel: Tech Lead / Engenheiro Sénior (10+ anos de experiência)

> **Foco:** Validar viabilidade técnica, identificar riscos reais de implementação, definir padrões de desenvolvimento e garantir qualidade.  
> **Data:** Abril 2026 | **Versão:** 1.0

---

## 1. Validação do Stack Tecnológico

### ✅ Laravel 12.x + PHP 8.2+
**Veredicto: APROVADO — sem reservas**
- Laravel 12 lançado em Fevereiro 2025, já maduro e com suporte LTS até 2027
- PHP 8.2+ traz enums nativos (usados nos modelos), readonly properties, e performance melhorada
- Ecossistema rico: Horizon, Telescope, Sanctum, Echo — todos de primeira parte
- **Risco:** Zero para o core; manter `composer update` em ambiente CI

### ✅ Livewire 4.x
**Veredicto: APROVADO — com ressalva de otimização**
- Livewire 4 (Flux) usa reactive state com SPA-like navigation via wire:navigate
- Ideal para formulários complexos, dashboards e interações ricas sem escrever JavaScript
- **Ressalva:** Componentes com muitos dados (ex: tabelas com 1000+ rows) devem usar paginação server-side obrigatória
- **Boas práticas:** Usar `#[Lazy]` em componentes pesados, `wire:loading` em todas as ações, `wire:key` em loops

### ✅ Tailwind CSS 4.x
**Veredicto: APROVADO — com atenção à configuração**
- Tailwind 4 usa CSS nativo (não mais `tailwind.config.js` obrigatório), muito mais rápido no build
- Integração via Vite 7 é direta e estável
- **Atenção:** Tailwind 4 mudou a sintaxe de algumas utilidades — revisar a [migration guide](https://tailwindcss.com/docs/upgrade-guide) antes de iniciar

### ✅ Alpine.js
**Veredicto: APROVADO — para interatividade client-side leve**
- Perfeito para dropdowns, modais, toggles, tabs — tudo que não precisa de round-trip ao servidor
- Integra perfeitamente com Livewire via `@entangle` para estado partilhado
- **Padrão:** Usar Alpine para UI state, Livewire para server state

### ✅ PostgreSQL
**Veredicto: APROVADO — melhor escolha para este projeto**
- JSONB nativo para dados semi-estruturados (specifications de equipamentos, features de pacotes)
- Full-text search nativo (para pesquisa no catálogo de cursos e equipamentos)
- ACID compliance crítico para operações financeiras
- **Configuração:** Usar UUID ou BIGSERIAL como PK (BIGSERIAL escolhido para simplicidade com Eloquent)

### ✅ Pusher + Laravel Echo
**Veredicto: APROVADO — para MVP; Soketi para reduzir custos em produção**
- Pusher tem plano gratuito (200 conexões simultâneas, 200k mensagens/dia) — suficiente para MVP
- Migrar para **Soketi** (self-hosted, compatível com Pusher API) quando o volume aumentar
- **Implementação:** Usar `private channels` para mensagens de projeto (autenticação obrigatória)

### ✅ Vite 7.x
**Veredicto: APROVADO**
- Vite 7 ainda mais rápido no HMR e build final
- `laravel-vite-plugin` compatível com Vite 7
- **Config:** Separar chunks de vendor (Alpine.js) do código da app

### ✅ PHPUnit 11.x + Pest
**Veredicto: APROVADO — Pest como runner por cima de PHPUnit**
- PHPUnit 11 é a base; Pest 3 oferece sintaxe mais expressiva
- **Estratégia:** Unit tests com Pest, Feature tests com PHPUnit/Pest para HTTP
- **Meta:** Coverage > 70% nos Services e Models core

---

## 2. Riscos Técnicos e Mitigações

| # | Risco | Probabilidade | Impacto | Mitigação |
|---|-------|--------------|---------|-----------|
| T-01 | Lentidão no carregamento em Angola (internet lenta) | Alta | Alto | Lazy loading de imagens, CDN Cloudflare, compressão gzip/brotli, assets cacheados |
| T-02 | Livewire component com re-renders excessivos | Média | Médio | Profiling com Telescope, `wire:model.lazy`, computed properties cacheadas |
| T-03 | Upload de ficheiros grandes (vídeos de curso) | Alta | Médio | Upload direto para S3 via presigned URL (bypass do PHP/Laravel) |
| T-04 | PDF de certificado com alta concorrência | Baixa | Médio | Job assíncrono em fila Redis; nunca gerar em request síncrono |
| T-05 | Falha no Pusher em Angola | Média | Alto | Fallback para polling via Livewire (`wire:poll`) em caso de falha WebSocket |
| T-06 | Crescimento de dados de progresso de cursos | Baixa (MVP) | Médio | Índices em `lesson_progress(enrollment_id, lesson_id)`, archiving de dados antigos |
| T-07 | Segurança nos downloads de documentos de projeto | Alta | Alto | Ficheiros privados em S3, acesso apenas via URL assinada temporária (15 min) |
| T-08 | N+1 queries no dashboard administrativo | Alta | Médio | Eager loading obrigatório, query monitoring com Telescope |

---

## 3. Convenções e Padrões de Código

### 3.1 Nomenclatura

```php
// Models: PascalCase, singular
class ConsultancyProject extends Model {}

// Livewire Components: PascalCase, descritivos
class ProjectChat extends Component {}

// Services: PascalCase + Service suffix
class CertificateService {}

// Events: passado, o que aconteceu
class PaymentConfirmed {}

// Jobs: imperativo, o que deve fazer
class GenerateCertificatePdf {}

// Enums: PascalCase, values em snake_case
enum ProjectStatus: string {
    case Active      = 'active';
    case OnHold      = 'on_hold';
    case Completed   = 'completed';
    case Cancelled   = 'cancelled';
}
```

### 3.2 Estrutura de um Livewire Component

```php
<?php

namespace App\Http\Livewire\Courses;

use Livewire\Component;
use Livewire\Attributes\{Computed, Lazy, On};
use App\Models\Course;
use App\Services\EnrollmentService;

#[Lazy]
class EnrollmentCheckout extends Component
{
    public int $courseId;
    public bool $agreed = false;

    #[Computed]
    public function course(): Course
    {
        return Course::findOrFail($this->courseId);
    }

    public function enroll(EnrollmentService $service): void
    {
        $this->authorize('enroll', $this->course);

        $this->validate([
            'agreed' => 'accepted',
        ]);

        $enrollment = $service->create(
            user: auth()->user(),
            course: $this->course,
        );

        $this->dispatch('enrollment-created', enrollmentId: $enrollment->id);
        $this->redirect(route('portal.courses.show', $enrollment->id));
    }

    public function render()
    {
        return view('livewire.courses.enrollment-checkout');
    }
}
```

### 3.3 Form Requests (validação isolada)

```php
// app/Http/Requests/Consultancy/StoreRequestForm.php
class StoreRequestForm extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()->hasRole(['client_company', 'client_individual']);
    }

    public function rules(): array
    {
        return [
            'package_id'          => ['required', 'exists:consultancy_packages,id'],
            'project_description' => ['required', 'string', 'min:50', 'max:5000'],
            'timeline'            => ['nullable', 'string', 'max:100'],
            'documents'           => ['nullable', 'array', 'max:5'],
            'documents.*'         => ['file', 'mimes:pdf,doc,docx,xls,xlsx', 'max:10240'],
        ];
    }
}
```

### 3.4 Services — sem acoplamento com HTTP

```php
// Services NUNCA aceitam Request; recebem DTOs ou parâmetros tipados
class EnrollmentService
{
    public function create(User $user, Course $course): Enrollment
    {
        // Verificar regra de negócio: não pode ter enrollment ativo
        if ($user->enrollments()->active()->where('course_id', $course->id)->exists()) {
            throw new AlreadyEnrolledException();
        }

        $invoice = $this->invoiceService->createForEnrollment($user, $course);

        return Enrollment::create([
            'user_id'    => $user->id,
            'course_id'  => $course->id,
            'invoice_id' => $invoice->id,
            'status'     => EnrollmentStatus::PendingPayment,
        ]);
    }
}
```

---

## 4. Plano de Sprints (MVP — 12 Semanas)

### Sprint 1 (Sem 1–2): Fundação
```
☐ Setup Laravel 12 + Livewire 4 + Tailwind 4 + Vite 7
☐ Configuração PostgreSQL + Redis
☐ Spatie Permission: definir roles e permissões
☐ Autenticação completa (register, login, verificação email, forgot password)
☐ Layouts: public.blade.php, app.blade.php, admin.blade.php
☐ Seeders: roles, permissões, taxas de câmbio iniciais
☐ CI/CD básico: GitHub Actions (lint + testes)
☐ Deploy inicial em VPS (ambiente staging)
```

### Sprint 2 (Sem 3–4): Website Público + Admin Base
```
☐ Página HOME (hero, serviços, sobre, depoimentos)
☐ Página SERVIÇOS (consultoria, formação, equipamentos com preços)
☐ Página SOBRE (equipa, missão, visão)
☐ Formulário de CONTACTO com email notificação
☐ Painel Admin: dashboard KPIs básicos, gestão de utilizadores
☐ Painel Admin: gestão de câmbio USD/AOA
☐ Middleware CheckRole para rotas admin
```

### Sprint 3 (Sem 5–6): LMS — Parte 1
```
☐ CRUD de cursos (Admin): categorias, cursos, módulos, lições
☐ Upload de vídeos (S3 presigned URL) e PDFs
☐ Catálogo público de cursos com filtros (Livewire)
☐ Página de detalhe do curso com ementa e instrutor
☐ Sistema de inscrição + geração de fatura (InvoiceService)
☐ Painel do instrutor: ver alunos, progresso
```

### Sprint 4 (Sem 7–8): LMS — Parte 2 + Pagamentos
```
☐ Player de curso: vídeo + PDF + texto
☐ Rastreio de progresso por lição
☐ Sistema de quizzes (perguntas, opções, pontuação)
☐ Lógica de conclusão de curso + emissão de certificado (Job)
☐ Template PDF de certificado (DomPDF)
☐ Verificação pública de certificado (/certificados/verificar)
☐ Painel financeiro Admin: confirmar pagamentos, listar faturas
☐ Email templates: fatura, acesso liberado, certificado
```

### Sprint 5 (Sem 9–10): Consultoria
```
☐ CRUD de pacotes de consultoria (Admin)
☐ Formulário de pedido de consultoria (Livewire + upload docs)
☐ Fluxo de aprovação: pedido → análise → proposta → aceite
☐ Painel do projeto (cliente): milestones, documentos, estado
☐ Painel do projeto (consultor): milestones, documentos, equipa
☐ Sistema de mensagens por projeto (Livewire + Pusher)
☐ Download seguro de documentos (S3 presigned URL)
```

### Sprint 6 (Sem 11–12): Notificações + QA + Deploy
```
☐ Sistema de notificações em tempo real (sino no header)
☐ Laravel Echo: canal privado por projeto e por utilizador
☐ Notificações email: todos os eventos críticos
☐ Testes Feature: auth, inscrição, pagamento, consultoria
☐ Testes Unit: Services principais
☐ Revisão de segurança (OWASP checklist)
☐ Performance: query optimization, N+1 audit com Telescope
☐ Deploy em produção + DNS + SSL
☐ Smoke tests pós-deploy
```

---

## 5. Pipeline CI/CD (GitHub Actions)

```yaml
# .github/workflows/ci.yml
name: CI

on: [push, pull_request]

jobs:
  test:
    runs-on: ubuntu-latest
    services:
      postgres:
        image: postgres:16
        env:
          POSTGRES_DB: amis_test
          POSTGRES_PASSWORD: secret
        options: --health-cmd pg_isready
    steps:
      - uses: actions/checkout@v4
      - uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          extensions: pdo_pgsql, redis
      - run: composer install --no-interaction
      - run: cp .env.testing .env
      - run: php artisan key:generate
      - run: php artisan migrate --force
      - run: ./vendor/bin/pest --coverage --min=70
      - run: ./vendor/bin/phpstan analyse --level=6
      - run: ./vendor/bin/pint --test

  deploy:
    needs: test
    if: github.ref == 'refs/heads/main'
    runs-on: ubuntu-latest
    steps:
      - name: Deploy via SSH
        run: |
          ssh deploy@${{ secrets.SERVER_IP }} "cd /var/www/amis && git pull && composer install --no-dev && php artisan migrate --force && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan queue:restart"
```

---

## 6. Checklist de Segurança Pré-Deploy

```
AUTENTICAÇÃO E SESSÕES
☐ APP_DEBUG=false em .env de produção
☐ SESSION_LIFETIME=120 (não infinito)
☐ HTTPS obrigatório (force_https=true)
☐ Rate limiting em login: ThrottleRequests (5/min)
☐ Verificação de email ativa

AUTORIZAÇÃO
☐ Cada rota de portal tem middleware auth + role correto
☐ Policies definidas para Course, ConsultancyProject, Invoice
☐ Clientes não acedem a dados de outros clientes (scope com user_id)

UPLOADS E FICHEIROS
☐ Validação de mime type real (não apenas extensão)
☐ Tamanho máximo de upload configurado (nginx + php.ini)
☐ Ficheiros guardados fora do webroot (S3 ou storage/app/private)
☐ Downloads via URL assinada temporária (15 minutos)

BASE DE DADOS
☐ Utilizador DB com permissões mínimas (não usar root)
☐ Backups automáticos diários (pg_dump)
☐ Conexão DB via socket local ou VPC privada

CABEÇALHOS HTTP (Nginx)
☐ X-Frame-Options: DENY
☐ X-Content-Type-Options: nosniff
☐ Content-Security-Policy configurada
☐ Strict-Transport-Security (HSTS)
☐ Referrer-Policy: strict-origin-when-cross-origin

CHAVES E SEGREDOS
☐ .env NÃO commitado no repositório
☐ APP_KEY gerado e único por ambiente
☐ Credenciais Pusher, S3, SMTP em variáveis de ambiente
```

---

## 7. Configuração de Ambientes

```
┌─────────────────┬──────────────────┬──────────────────┐
│   Local (dev)   │    Staging       │   Produção       │
├─────────────────┼──────────────────┼──────────────────┤
│ APP_ENV=local   │ APP_ENV=staging  │ APP_ENV=production│
│ APP_DEBUG=true  │ APP_DEBUG=false  │ APP_DEBUG=false  │
│ DB: local pg    │ DB: staging pg   │ DB: prod pg      │
│ Mail: Mailtrap  │ Mail: Mailtrap   │ Mail: SES/Mailgun│
│ Queue: sync     │ Queue: redis     │ Queue: redis     │
│ Cache: array    │ Cache: redis     │ Cache: redis     │
│ Telescope: ON   │ Telescope: ON    │ Telescope: OFF*  │
│ Pusher: sandbox │ Pusher: real     │ Pusher: real     │
└─────────────────┴──────────────────┴──────────────────┘
* Telescope em produção apenas com acesso restrito a IPs internos
```

---

## 8. Monitorização e Observabilidade

| Ferramenta | Propósito | Ambiente |
|------------|-----------|----------|
| Laravel Telescope | Debug de queries, jobs, emails, exceções | Dev + Staging |
| Laravel Horizon | Monitorização de filas Redis | Staging + Prod |
| Sentry (free tier) | Tracking de erros em produção | Produção |
| Cloudflare Analytics | Tráfego web, performance, DDoS | Produção |
| UptimeRobot | Alertas de downtime (free) | Produção |
| PgBadger | Análise de queries lentas PostgreSQL | Produção |
