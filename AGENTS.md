# AGENTS.md

How coding agents should work in this repository.

It is the theme itself: this repository is cloned into
`wp-content/themes/ipsum` and activated, so everything outside `.github/` ships
to users. `README.md` covers what Ipsum is; this file covers where the markup
lives and the conventions it follows.

## Where everything lives

| Path | What lives there |
| --- | --- |
| `templates/*.html` | Block templates. Nearly all are one-line delegates to a pattern. |
| `parts/*.html` | Template parts. All are one-line delegates to a pattern. |
| `patterns/*.php` | The markup of every template and part, plus the insertable pattern packs. |
| `styles/colors/*.json` | Seven color style variations, number-prefixed to control their order. |
| `styles/typography/*.json` | Five typography style variations. |
| `styles/blocks/*.json` | Block style variations, e.g. `display.json`. |
| `assets/fonts/` | Self-hosted variable fonts, one directory per family. |
| `assets/css/editor-style.css` | Editor-only CSS, maintained by hand as a mirror of `style.css`. |
| `functions.php` | All theme PHP: stylesheets, the comments CTA block binding, sidebar template types, block styles. |
| `theme.json` | Global settings and styles: presets, fonts, `customTemplates`, per-block styles. |
| `style.css` | The theme header plus the frontend CSS that is not generated from `theme.json`. |
| `readme.txt` | The WordPress.org readme: description, changelog, copyright, fonts. |
| `.github/` | Repository tooling and assets only. Never part of the theme. |

## The pattern is the source of truth

`templates/index.html` and `parts/header.html` are single lines that look like:

```html
<!-- wp:pattern {"slug":"ipsum/index"} /-->
```

Editing a template changes nothing at render time. Edit `patterns/index.php`.

Two exceptions are worth knowing:

- `templates/page-sidebar.html` holds its own markup and does not delegate, even
  though `patterns/page-sidebar.php` exists with near-identical markup. Check
  both when changing the page sidebar.
- `parts/header.html` delegates to `ipsum/header-default`, not `ipsum/header`.
  The mismatch is intentional.

## Conventions

- **Text domain is `ipsum`.** Every user-visible string goes through an i18n
  function — `esc_html_e()`, `esc_attr_e()`, `esc_html__()`, `_x()`, `sprintf()`
  — including static decoration like the `·` separators. Follow the existing
  spacing: `<?php esc_html_e('Read more ›', 'ipsum');?>`.
- **Style markup with the design tokens, not literals.** Colors come from
  `var(--wp--preset--color--theme-N)`, spacing from `var:preset|spacing|N`. The
  palette slugs are generic on purpose: `theme-1` is the background, `theme-2`
  the body text, `theme-3` the accent, `theme-4` and `theme-5` the faint lines
  and surfaces, `theme-6` the strongest text. Each color variation redefines all
  six, so a hardcoded hex freezes one variation's look into every other one.
- **Pattern headers decide where a pattern appears.** Insertable patterns use
  `Title`, `Slug`, `Categories`, `Block Types`, `Viewport width`, `Description`.
  A pattern that replaces a template uses `Title`, `Slug`, `Inserter: no` and
  `Template Types:` instead. Slugs are `ipsum/<kebab-case-filename>`.
- **PHP follows WordPress coding standards**, in tabs. Functions are wrapped in
  `if ( ! function_exists( '…' ) ) : … endif;`, every docblock carries
  `@since Ipsum 1.0`, and `@package Ipsum` heads the file.
- **Variations are named for order and for their slug.** Color variations are
  number-prefixed (`01-blue-hour.json`); a block style variation declares a
  `slug` that is consumed in markup as `is-style-<slug>`, so
  `styles/blocks/display.json` declares `text-display` and appears as
  `is-style-text-display`.
- **Explain why, in prose.** `style.css` and `assets/css/editor-style.css` carry
  block comments describing the reason for a rule, often with a link to the
  Gutenberg or Trac issue behind it. Match that. Note that `css` strings inside
  `theme.json` cannot hold comments, which is why the frontend CSS that could
  live there does not.

## Do not reformat block markup

The delimiters in templates, parts and patterns are Gutenberg's serialization,
not hand-written HTML: flush left, one delimiter per line, a blank line between
siblings, and the rendered wrapper element inlined after its opening delimiter.

```html
<div class="wp-block-group" style="…"><!-- wp:group {"metadata":{"name":"Body"},"layout":{"type":"constrained"}} -->
```

Reindenting or rewrapping this produces a large diff that an editor round-trip
will undo.

## What not to touch

- **Do not bump the version or add changelog entries.** `style.css` stays at
  `Version: 1.0.0` and `readme.txt` keeps its single `= 1.0.0 =` section while
  Ipsum is in development. Changes are described in the pull request.
- **`Requires at least: 7.1` and `Tested up to: 7.1`** in `style.css` and
  `readme.txt` are a deliberate placeholder, not a value to correct.
- **`.github/ipsum-demo-content.xml`, `.github/blueprint.json` and the six
  numbered PNGs.** They are linked by URL from `README.md` and from the preview
  workflow, so renaming or moving one silently breaks a preview. They belong to
  the repository, not to the theme.
- **`@mobile` and `@tablet`** inside block JSON (in `theme.json` and
  `patterns/archive-columns.php`) are theme.json breakpoint features. Do not
  rewrite them as CSS media queries.
- **`--wp--custom--control-scheme`** in `theme.json` is a fallback only. A color
  variation cannot set it, because variations are filtered to color settings on
  apply. The dark audio controls are switched by the
  `@container style(--wp--preset--color--theme-1: …)` queries in `style.css`.

## Couplings to keep in step

- **The comments CTA is a block binding.** `ipsum/comments-cta` is registered in
  `functions.php` and bound from `patterns/index.php`, `index-sidebar.php` and
  `archive-full.php` through `metadata.bindings.content.source`. The visible
  "Join the conversation" is a fallback string; removing either half breaks it.
- **Sidebar templates are registered in two places.** `index-sidebar` and
  `archive-sidebar` come from the `default_template_types` filter in
  `functions.php`; `single-sidebar` and `page-sidebar` come from
  `customTemplates` in `theme.json`. A new template replacement needs its
  pattern's `Template Types:` to agree with whichever one registers it.
- **`assets/css/editor-style.css` mirrors `style.css`.** Both need the change
  when a rule applies to the editor as well as the front end.
- **Bundled fonts are credited in `== Fonts ==`** in `readme.txt`, with
  copyright, license and source. A new family needs an entry there.

## Checking your work

There is no build step: templates, patterns and CSS are served as the browser
finds them, with nothing to compile or regenerate after an edit.

Open Ipsum in WordPress Playground from the link in `README.md` to see the
default branch. To look at a branch before it is merged, give Playground a
Blueprint whose `installTheme` step points at your branch.

Look at the change on the front end and in the Site Editor, and check a color
style variation as well as the default palette, since the variations redefine
every preset color.
