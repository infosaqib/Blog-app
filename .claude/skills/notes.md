---
name: notes
description: Skill for writing topic notes during development sessions. Saves structured notes to notes/<topic>.md with headings, bullet descriptions, and numbered code examples.
---

# Notes Skill

After every explanation or topic discussed, append a note to the relevant file in `notes/` to the relevant place.

## File Naming

Choose the file based on the topic:

| Topic | File |
|---|---|
| Laravel (PHP, Eloquent, Blade, routes, controllers) | `notes/laravel.md` |
| Vue / Inertia / TypeScript / frontend | `notes/vue.md` |
| Tailwind / CSS | `notes/css.md` |
| Testing (Pest, PHPUnit) | `notes/testing.md` |
| General / cross-cutting | `notes/general.md` |

Create the file with a `# <Topic> Notes` title if it does not exist.

## Note Format

Use this exact structure for every note entry:

```markdown
### <Topic or Feature Name>

**<name or concept>** <brief description of what it does or provides>.

- **`<item>`**: <description>.
- **`<item>`**: <description>.
- **`<item>`**: <description>.

#### Usage

1. **`<item>`**

    <one-line explanation>:

    ```<lang>
    <code example>
    ```

2. **`<item>`**

    <one-line explanation>:

    ```<lang>
    <code example>
    ```
```

## Rules

- **Always append** — never overwrite existing content.
- **One `###` section per topic** — use `####` only for Usage.
- **Bullet list first** — list all items/options with descriptions before showing usage.
- **Numbered usage** — each example gets a number, bold name, short explanation, and code block.
- **Write immediately** after the explanation — do not batch at end of session.
- **No duplicates** — skip if the topic is already covered.
- **Correct section placement** — place a note in the most fitting existing section. If the concept is general (e.g. a Blade helper, a global PHP function), add it to a general section (e.g. "Blade Directives"), not inside a specific feature section (e.g. "Password Reset Link"). Create a new general section if no fitting one exists.
