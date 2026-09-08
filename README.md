# 🎓 Plataforma de Cursos — Laravel 13

> Uma plataforma completa de cursos online inspirada em streaming (Netflix) para consumo de aulas, comentários e gestão de perfil. Projeto focado em boas práticas de Laravel, PHP moderno e UI reativa.

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-13.x-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge&logo=php" alt="PHP">
  <img src="https://img.shields.io/badge/Tailwind-4.0-06B6D4?style=for-the-badge&logo=tailwindcss" alt="Tailwind">
  <img src="https://img.shields.io/badge/Alpine.js-3.17-8BC0D0?style=for-the-badge&logo=alpine.js" alt="Alpine">
  <img src="https://img.shields.io/badge/Vite-8-646CFF?style=for-the-badge&logo=vite" alt="Vite">
  <img src="https://img.shields.io/badge/MySQL-8.4-4479A1?style=for-the-badge&logo=mysql" alt="MySQL">
  <img src="https://img.shields.io/badge/Redis-7-DC382D?style=for-the-badge&logo=redis" alt="Redis">
</p>

<p align="center">
  <a href="#-demonstração">Demonstração</a> •
  <a href="#-tecnologias">Tecnologias</a> •
  <a href="#-funcionalidades">Funcionalidades</a> •
  <a href="#-arquitetura">Arquitetura</a> •
  <a href="#-como-rodar">Como Rodar</a> •
  <a href="#-rotas-principais">Rotas</a>
</p>

---
## 🚀 Tecnologias

### Backend
- **PHP 8.3** + **Laravel 13.17** - Framework, Eloquent, Policies, Gates, Mail, Queue
- **MySQL 8.4** (Docker) + **Redis 7** (Cache & Queue) via `predis/predis 3.6`
- **Intervention Image 4.3** - Upload e `cover(300,300)` + `encode(PngEncoder)` para avatar
- **Laravel Debugbar 4.4** - Debug em dev
- **Pint + Rector** - Code style & refatoração automática

### Frontend
- **Tailwind CSS 4.0** + **@tailwindplus/elements 1.0** (Headless UI)
- **Alpine.js 3.17** - Reatividade leve (modal de resposta, dropdown)
- **Vite 8** + `laravel-vite-plugin 3.1` + `@tailwindcss/vite`
- **Vite Fonts (Bunny - Instrument Sans)**

### Infra & Ferramentas
- **Docker Compose** (MySQL + Redis)
- **Vite HMR**, **Laravel Pail / Pao** (`php artisan dev`)
- **Faker, PHPUnit 12, Collision, Mockery**

---

## ✨ Funcionalidades

### 🔐 Autenticação & Conta
- Cadastro / Login / Logout (`LoginController`, `UserController`)
- Verificação de e-mail (`EmailVerifyController` + `signed` middleware)
- Esqueci minha senha (`ForgotPasswordController` - token + e-mail Mailtrap)
- `throttle:3,1` em contato, update de usuário/perfil/avatar para anti-spam

### 📚 Cursos & Aulas
- Home com listagem, `CoursesController@index`, `CourseController@show` por `slug`
- Player de aula (`LessonController@show`) com navegação `anterior / próxima` via `LessonService`
- `Policy CoursePolicy@access` - libera aula se `free=true` ou se `purchases.payment_status = paid`
- `MyCoursesController@index` - área `auth + verified` só com cursos comprados

### 💬 Comentários & Respostas (regras reais)
- Só usuário **autenticado + comprador do curso** pode comentar (`LessonService@canComment` + `LessonPolicy@comment` + `purchases`)
- Comentários aninhados (`Comment` hasMany `Reply`)
- Modal reativo Alpine (`resources/js/alpine/reply.js` + `components/modal-reply.blade.php`) com `fetch` JSON, validação `422`, `loading`, `success` + `window.location.reload()`
- Correção de rota crítica: `/comentario/responder` **antes** de `/comentario/{id}` (ordem importa no Laravel)

### 👤 Perfil
- Criação/edição de perfil (`ProfileController@store/update` + `ProfilePolicy@update`)
- Upload de avatar `cover(300,300)` PNG, deleta antigo (`Storage::disk('public')`), ignora URLs externas do `faker`
- `avatar_color` + iniciais (`User::initials` via `Attribute` + `mb_strtoupper`)

### ✉️ Contato
- Página `/contato` centralizada (`contact.blade.php` `max-w-3xl mx-auto`) com `throttle:3,1,contact`

### 🛡️ Segurança & Qualidade
- `Policies` (`CoursePolicy`, `LessonPolicy`, `ProfilePolicy`), `Gates` (`can:access`, `can:update`)
- `FormRequests` (`UserRequest`, `ProfileRequest`, `LoginRequest`)
- `SESSION_DRIVER=file`, `CACHE_STORE=redis`, `QUEUE_CONNECTION=redis` (predis)
- Tratamento de `MethodNotAllowed` por ordem de rotas fixas vs `/{param}`

---

## 🏗️ Arquitetura

```
app/
├── Http/
│   ├── Controllers/ (Home, Course, Lesson, Comment, Reply, Profile, User, Auth...)
│   └── Requests/ (ProfileRequest, UserRequest...)
├── Models/ (User, Course, Lesson, Comment, Reply, Profile, Purchase)
├── Policies/ (CoursePolicy, LessonPolicy, ProfilePolicy)
├── Services/ (LessonService - canComment, previous/next)
└── Providers/

resources/
├── views/ (layout.blade.php grid md:grid-cols-3, lesson/show, profile/edit, contact...)
├── js/ (app.js -> Alpine.data('reply', reply), alpine/reply.js)
└── css/ (app.css Tailwind)

routes/web.php -> 78 linhas, fallback 404, middleware auth/verified/guest/can/throttle
database/ (factories, seeders com courses->lessons->comments->replies, purchases)
```

**Fluxo de aula:** `Route can:access` -> `LessonController@show` -> `LessonService@getLessonData` (eager `comments.user.replies.user`, `canComment`) -> `lesson/show.blade.php` (`@if($canComment)` + `x-modal-reply`).

---

## ⚙️ Como Rodar

### Pré-requisitos
- PHP 8.3, Composer, Node 20+, Docker + Docker Compose

### 1. Clone e Setup
```bash
git clone https://github.com/lailsondev/laravel-plataforma-cursos
cd plataforma-cursos

# via script do composer.json
composer setup
# ou manual:
composer install
cp .env.example .env
php artisan key:generate
```

### 2. Docker (MySQL + Redis)
```bash
docker compose up -d
# .env deve estar:
# DB_CONNECTION=mysql
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=plat_cursos
# DB_USERNAME=root
# DB_PASSWORD=root
#
# CACHE_STORE=redis
# QUEUE_CONNECTION=redis
# REDIS_CLIENT=predis
# REDIS_HOST=127.0.0.1
# REDIS_PORT=6379
```

### 3. Banco
```bash
php artisan migrate --seed
# cria 10 users, 10 cursos, 5 lessons/curso, 3 comments/lesson, 2 replies/comment
# + 1 purchase (user 1 -> curso 10 paid) para testar comentário
```

### 4. Frontend
```bash
npm install
npm run dev    # dev com HMR
# ou
npm run build  # prod (gera public/build)
```

### 5. Servir
```bash
php artisan serve
# ou
composer dev # roda serve + queue + pail + vite concorrente (concurrently)
```

Acesse `http://localhost:8000`

**Storage link para avatar:**
```bash
php artisan storage:link
```

---

## 🗺️ Rotas Principais

| Método | URI | Nome | Middleware |
|--------|-----|------|------------|
| GET | `/` | `home.index` | - |
| GET | `/cursos` | `courses.index` | - |
| GET | `/curso/{course:slug}` | `course.show` | - |
| GET | `/curso/{course:slug}/aula/{lesson:slug}` | `lesson.show` | `can:access` |
| GET | `/meus-cursos` | `mycourses.index` | `auth, verified` |
| POST | `/comentario/{id}` | `comment.store` | `auth` |
| POST | `/comentario/responder` | `reply.store` | `auth` |
| GET | `/perfil/editar` | `profile.edit` | `auth, verified` |
| PUT | `/perfil/avatar/{profile}` | `profile.avatar` | `can:update, throttle` |
| PUT | `/usuario/{user}` | `user.update` | `auth, throttle` |
| POST | `/contato` | `contact.store` | `throttle:3,1,contact` |

Detalhe: `php artisan route:list --path=comentario`

---

## 🧪 Testes & Qualidade

```bash
php artisan test
./vendor/bin/pint --ansi      # formatação (composer fix)
./vendor/bin/rector --ansi
```

---

## 📌 Próximos Passos (roadmap)

- [ ] Pagamento real integrado (Stripe/Mercado Pago) em `CheckoutController`
- [ ] Notificações de novas respostas (`Notification`)
- [ ] Testes de Feature para `LessonPolicy` e `ReplyController`
- [ ] Upload para S3 (`FILESYSTEM_DISK=s3`)
- [ ] CI (GitHub Actions) + Deploy (Vapor/Forge)

---

## 👨‍💻 Autor

**Lailson** - Dev PHP/Laravel.

[![LinkedIn](https://img.shields.io/badge/LinkedIn-0077B5?style=for-the-badge&logo=linkedin)](https://www.linkedin.com/in/lailson-dev/)
[![GitHub](https://img.shields.io/badge/GitHub-000?style=for-the-badge&logo=github)](https://github.com/lailsondev)

> Se este projeto te ajudou ou você é recrutador, deixa uma ⭐ e vamos conversar!

---

## 📄 Licença

MIT - Laravel base.
