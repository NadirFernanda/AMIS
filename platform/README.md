# AMIS — Plataforma Web

Aplicação Laravel do site institucional e painel administrativo da **AMIS (Angola Mining Innovation & Solutions)**, focada em dois negócios:

1. **Consultoria técnica** para empresas mineiras (pacotes de consultoria, pedidos via formulário de contacto).
2. **Ligação a fornecedores de equipamentos mineiros** — directório público de fornecedores por categoria, com pedido de introdução mediado pela AMIS.

---

## Cursos

> ⏳ **Brevemente.** O módulo de cursos/formação não está disponível nesta versão da plataforma — foi removido do código actual. Os cursos serão disponibilizados brevemente, numa fase posterior do produto.

---

## Módulos

| Módulo | Rota pública | Painel admin |
|---|---|---|
| Home | `/` | — |
| Serviços (Consultoria + categorias de Equipamento) | `/servicos` | `/admin/consultorias`, `/admin/equipamentos` |
| Fornecedores de Equipamentos | `/fornecedores` | `/admin/fornecedores` |
| Projectos (portfólio) | `/projectos` | `/admin/projectos` |
| Sobre / Equipa | `/sobre`, `/fundadores/{slug}` | `/admin/equipa` |
| Contacto | `/contacto` | `/admin/mensagens` |
| Estatísticas (home) | — | `/admin/estatisticas` |
| Testemunhos | — | `/admin/testemunhos` |
| Área de Cliente (autenticada) | `/cliente/dashboard` | — |

O fluxo **"Pedir Introdução"** em `/fornecedores` cria uma mensagem em `/admin/mensagens` já associada ao fornecedor pedido, para a equipa AMIS fazer a ponte.

Conteúdo é multi-idioma (**PT / EN / FR**) — os modelos guardam colunas `_en` / `_fr` e o utilizador troca de idioma em `/locale/{lang}`.

---

## Stack

- Laravel 12 · PHP 8.2+
- Blade + Tailwind CSS 4 + Alpine.js
- SQLite em desenvolvimento (`database/database.sqlite`)
- Vite

---

## Desenvolvimento local

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate

php artisan migrate

npm run dev        # noutro terminal
php artisan serve
```

---

## Deploy (actualizar servidor de produção)

```bash
cd /var/www/AMIS
git pull origin main

cd platform
php artisan migrate --force

php artisan view:clear
php artisan route:clear
php artisan config:clear
php artisan cache:clear

php artisan config:cache
php artisan route:cache
```

Se o `git pull` recusar por "dubious ownership" (a correr como root):

```bash
git config --global --add safe.directory /var/www/AMIS
```
