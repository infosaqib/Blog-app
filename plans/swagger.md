# API Documentation — Laravel (Scramble)

This project uses **`dedoc/scramble`** to auto-generate and serve interactive API documentation.

---

## Where to Access Docs

Documentation is available **only in non-production environments** (restricted by `RestrictedDocsAccess` middleware).

| URL | Description |
|-----|-------------|
| `http://localhost/docs/api` | Stoplight Elements UI (interactive docs) |
| `http://localhost/docs/api.json` | Raw OpenAPI JSON spec |

---

## How It Works — Auto Docs

Scramble auto-generates the OpenAPI spec on every request — **no manual annotation or code generation step required**. Here is what gets inferred automatically:

| Source | What Scramble Infers |
|--------|---------------------|
| `routes/api.php` | All endpoints (path, method, route name) |
| Controller method signatures | Parameters from route bindings |
| `FormRequest::rules()` | Request body schema and validation |
| `JsonResponse` return type | Response shape (when typed) |

---

## Current Endpoints (Auto-Documented)

All routes in `routes/api.php` appear automatically:

```
GET    /api/posts           PostsController@index
POST   /api/posts           PostsController@store      ← schema from CreatePostRequest
GET    /api/posts/{post}    PostsController@show
PUT    /api/posts/{post}    PostsController@update     ← schema from UpdatePostRequest
DELETE /api/posts/{post}    PostsController@destroy
GET    /api/posts/search    PostsController@searchPosts
GET    /api/users           UsersController@index
```

---

## Configuration

Config file: `config/scramble.php`

| Key | Value | Effect |
|-----|-------|--------|
| `api_path` | `'api'` | Scans all routes under `/api` |
| `info.version` | `env('API_VERSION', '1.0.0')` | Shown in docs header |
| `info.description` | `'Laravel API documentation'` | Shown on docs home |
| `ui.title` | `'Laravel API'` | Browser tab title |
| `servers` | `null` | Auto-detects local server URL |

---

## Adding Docs to a New Endpoint

When creating a new controller or adding a new endpoint:

1. **Add the route** in `routes/api.php` — it appears in docs automatically.

2. **Use a `FormRequest`** for request validation — Scramble reads `rules()` to generate the request body schema.

3. **Add a `JsonResponse` return type** to the controller method — helps Scramble infer response schema.

4. **Optionally add PHPDoc** for richer descriptions:
   ```php
   /**
    * Get all posts with their authors.
    */
   public function index(): JsonResponse
   ```

That's it — no `@OA` annotations needed.

---

## Comparison to NestJS swagger.md

| Feature | NestJS (swagger.md) | Laravel (Scramble) |
|---------|---------------------|-------------------|
| UI | Scalar (`/api-reference`) | Stoplight Elements (`/docs/api`) |
| Auto endpoint detection | `@RouteController` scan | Route file scan |
| Request schema | `@ApiProperty` on DTOs | `FormRequest::rules()` |
| Response schema | `@ApiResponse({ type: Dto })` | Return type hints / Resources |
| No registration needed | Yes | Yes |

---

## Architecture

```
routes/api.php                        ← Scramble scans for endpoints
app/Http/Controllers/PostsController  ← return types inform response schema
app/Http/Controllers/UsersController  ← auto-documented from route
app/Http/Requests/CreatePostRequest   ← rules() → request body schema
app/Http/Requests/UpdatePostRequest   ← rules() → request body schema
config/scramble.php                   ← configuration
```
