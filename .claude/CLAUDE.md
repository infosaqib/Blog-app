---
name: laravel-vue-inertia
description: Laravel 13 + Vue 3 + Inertia.js fullstack project with Tailwind CSS, TypeScript, and Pest testing. Includes auth (Breeze), posts CRUD, and profile management.
---

# Laravel App

## Tech Stack

- **Backend:** PHP ^8.3, Laravel 13
- **Frontend:** Vue 3, Inertia.js v2 (SPA-like, no separate API)
- **Language:** TypeScript (strict)
- **CSS:** Tailwind CSS v4 + `@tailwindcss/forms`
- **Build:** Vite 8 (`laravel-vite-plugin`, `@vitejs/plugin-vue`)
- **Utilities:** Alpine.js, Laravel Wayfinder (type-safe route helpers)
- **Database:** MySQL — `laravel` DB, user `admin`/`admin123`
- **Auth Scaffold:** Laravel Breeze
- **Testing:** Pest v4 + `pestphp/pest-plugin-laravel`

## Existing Features

- **Auth:** register, login, logout, email verification, password reset/confirm
- **Profile:** edit, update, delete account
- **Posts:** CRUD with user ownership, search by ID, cascade delete on user removal
- **Validation:** `CreatePostRequest`, `UpdatePostRequest`, `ProfileUpdateRequest`

## Key Directory Structure

| Path | Description |
|---|---|
| `app/Http/Controllers/` | PostsController, UsersController, ProfileController |
| `app/Http/Controllers/Auth/` | Auth controllers (Breeze) |
| `app/Http/Requests/` | Form request validation classes |
| `app/Models/` | User, Post |
| `resources/js/pages/` | Inertia page components |
| `resources/views/` | Blade layouts + Inertia entry point |
| `resources/views/components/` | Reusable Blade components |
| `resources/views/components/buttons/` | Button components (`x-buttons.primary`, `x-buttons.danger`, `x-buttons.secondary`) |
| `resources/views/components/icons/` | SVG icon components (`x-icons.application-logo`, `x-icons.chevron-down`, `x-icons.hamburger`) |
| `resources/views/components/modals/` | Modal components (`x-modals.modal`) |
| `routes/web.php` | Main routes (includes auth.php) |
| `routes/auth.php` | Auth routes |
| `database/migrations/` | 5 migrations |
| `tests/Feature/` | Pest feature tests |
| `tests/Unit/` | Pest unit tests |

## Common Commands

```bash
# Start dev server (PHP + queue + logs + Vite HMR, concurrent)
composer run dev

# Run full test suite (lint + Pest)
composer run test

# Run tests only
php artisan test
# or
./vendor/bin/pest

# PHP code formatting
./vendor/bin/pint

# JS/TS formatting & linting
npm run format
npm run lint
npm run types:check

# Database
php artisan migrate
php artisan migrate:fresh --seed
php artisan tinker
```

## Coding Conventions

- **PHP:** PSR-12 style enforced by Laravel Pint (`pint.json`)
- **JS/TS:** ESLint + Prettier with Tailwind class sorting plugin
- **Tests:** Pest with `RefreshDatabase` — SQLite in-memory for test runs
- **Inertia pages** live in `resources/js/pages/`
- **Routes** use Wayfinder helpers for type-safe links and form actions
- **No direct API calls** — Inertia handles server communication via form actions

## Skills

- **Notes** — `.claude/skills/notes.md`: After every explanation or topic, append a structured note to `notes/<topic>.md`.
