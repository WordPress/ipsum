# AGENTS.md

How coding agents should work in this repository. `README.md` says what Ipsum is; `CONTRIBUTING.md` covers setup, pattern guidelines and the pull request process. This file covers what is specific to this tree and easy to get wrong.

## Dev environment tips

```bash
nvm use                 # Node version from .nvmrc
npm install
npm run env:status      # Always check first.
npm run env:setup       # First run only: starts wp-env, activates Ipsum, installs Gutenberg and Theme Check.
npm run env:start       # Later runs, if the environment is not already running.
```

The site is at <http://localhost:8899> (`admin` / `password`). The repository is mounted as the `ipsum` theme with `node_modules` hidden, and `WP_DEVELOPMENT_MODE` is `theme`, so `theme.json` is not cached. See [Getting Started](CONTRIBUTING.md#getting-started) for the rest, including running without Docker.

There is no build step. Templates, patterns, `theme.json` and CSS are served as they are in the tree; reload to see an edit.

### Key directories

-   `templates/*.html` - Block templates. Each is a one-line delegate to a pattern.
-   `parts/*.html` - Template parts. Each is a one-line delegate to a pattern.
-   `patterns/*.php` - The markup of every template and part, plus the insertable patterns.
-   `styles/colors/*.json` - Color style variations, number-prefixed to control their order.
-   `styles/typography/*.json` - Typography style variations.
-   `styles/blocks/*.json` - Block style variations. The `slug` is used in markup as `is-style-<slug>`.
-   `assets/fonts/` - Self-hosted fonts, one directory per family, credited under `== Fonts ==` in `readme.txt`.
-   `assets/css/editor-style.css` - Editor-only CSS.
-   `functions.php` - All theme PHP: stylesheets, the comments CTA block binding, sidebar template types, block styles.
-   `theme.json` - Global settings and styles, fonts, `customTemplates`, per-block styles.
-   `style.css` - The theme header plus the front end CSS that `theme.json` cannot express.
-   `readme.txt` - The WordPress.org readme: description, changelog, copyright, font credits.
-   `.github/`, `CONTRIBUTING.md`, `README.md`, `package.json`, `.wp-env.json`, `.nvmrc` - Repository tooling and docs, not part of the theme.

## Progressive discovery

Read only what your task needs, when it needs it:

-   **Adding or changing a pattern**: read [Pattern creation guidelines](CONTRIBUTING.md#pattern-creation-guidelines) first. It covers categories, hiding from the inserter, which i18n function to use, images, and removing `id`, `queryId` and `theme` attributes from copied markup.
-   **Adding CSS or PHP**: read [Development guidelines](CONTRIBUTING.md#development-guidelines). Prefer `theme.json` and Global Styles; add CSS or PHP only when the editor cannot express the design, and keep it commented.
-   **Opening a pull request**: follow `.github/PULL_REQUEST_TEMPLATE.md`, including the AI disclosure section.

## Markdown files

Markdown in this repository is soft-wrapped: a paragraph, list item or table row is one line, however long. Do not hard-wrap prose, and do not re-flow lines a change does not otherwise touch.

## Architectural decisions

-   **The pattern is the source of truth.** `templates/index.html` is `<!-- wp:pattern {"slug":"ipsum/hidden-index"} /-->` and nothing else. Editing a delegate template or part changes nothing at render time; edit the pattern it names. A pattern that only fills a template or part is hidden from the inserter with `Inserter: no`, and its file and slug take the `hidden-` prefix (`patterns/hidden-index.php` is `ipsum/hidden-index`); template patterns also carry `Template Types:`. Insertable patterns use `Categories`, `Block Types`, `Viewport width` and `Description`.
-   **Style with the design tokens, not literals.** Colors come from `var(--wp--preset--color--theme-N)`, spacing from `var:preset|spacing|N`. The palette slugs are generic on purpose: `theme-1` is the background, `theme-2` the body text, `theme-3` the accent, `theme-4` and `theme-5` the faint lines and surfaces, `theme-6` the strongest text. Every color variation redefines all six, so a literal hex freezes one variation's look into all the others.
-   **CSS explains why, in prose.** Rules in `style.css` and `assets/css/editor-style.css` carry a comment saying why they exist, often with the Gutenberg or Trac issue behind it. `css` strings in `theme.json` cannot hold comments.
-   **Text domain is `ipsum`.** Every user-visible string goes through an i18n function, including single characters such as the `·` separators.
-   **PHP follows the WordPress coding standards**, in tabs. Functions in `functions.php` are wrapped in `if ( ! function_exists( '…' ) ) : … endif;`, every docblock carries `@since Ipsum 1.0`, and `@package Ipsum` heads the file.

## Do not reformat block markup

The delimiters in templates, parts and patterns are Gutenberg's serialization, not hand-written HTML: flush left, one delimiter per line, a blank line between sibling blocks, and a block's wrapper element on the same line as the opening delimiter of its first child:

```html
<!-- wp:group {"metadata":{"name":"Body"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:post-title /-->
```

Reindenting or rewrapping it produces a large diff that the next editor round-trip undoes.

## PR instructions

-   Link the issue the change fixes.
-   Check the front end and the Site Editor, and at least one color variation besides the default, since variations redefine every preset color. Say what you checked in Testing Instructions.
-   Do not bump `Version:` or add a changelog entry unless the issue asks for it.
