# Contributing to Ipsum

Thank you for helping build the default theme for [WordPress 7.2](https://make.wordpress.org/core/7-2/). This document covers how to get set up and what we expect from contributions.

You can try Ipsum without installing anything using the [WordPress Playground demo](https://bit.ly/wp-ipsum). It runs WordPress with the theme from this repository's default branch.

New default themes for WordPress are developed on GitHub until their version 1.0 release. At that point, the GitHub repository is archived, remaining issues triaged and moved to [Trac](https://core.trac.wordpress.org), and development continues in the core SVN repository.

## Before you contribute

- [Link your GitHub and WordPress.org profiles](https://make.wordpress.org/core/handbook/tutorials/linking-your-github-and-w-org-profiles/) so you receive props on commits that land in this repo.
- Read and follow the [WordPress Community Code of Conduct](https://make.wordpress.org/handbook/community-code-of-conduct/).

## How to contribute

- **Code:** Browse [open issues](https://github.com/WordPress/ipsum/issues) and open [pull requests](https://github.com/WordPress/ipsum/pulls) linked to an issue when possible.
- **Not just code:** Testing, triage, discussion, design, patterns, and templates are all valuable. Comment on issues or open one to propose work.
- **Triage:** If you want help with labels and issue triage, open an issue and a maintainer can grant the needed access.

### Getting Started

The recommended way to work on Ipsum is with [`wp-env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/), so every contributor runs the same WordPress setup.

#### Requirements

- [Node.js](https://nodejs.org/) 20 or later, with npm. If you use `nvm`, run `nvm use` to pick the version in `.nvmrc`.
- [Docker Desktop](https://www.docker.com/products/docker-desktop/), or another Docker-compatible daemon, running.

#### First-time setup

```sh
npm install
npm run env:setup
```

This starts WordPress, activates Ipsum, and installs and activates the [Gutenberg](https://wordpress.org/plugins/gutenberg/) and [Theme Check](https://wordpress.org/plugins/theme-check/) plugins.

- Site: <http://localhost:8899>
- Admin: <http://localhost:8899/wp-admin/>
- Username: `admin`
- Password: `password`

Debugging, script debugging, and theme [development mode](https://make.wordpress.org/core/2023/07/14/configuring-development-mode-in-6-3/) are on, so `theme.json` isn't cached and a reload shows your edits. PHP notices, warnings, and errors go to `debug.log` in the WordPress install's `wp-content` directory instead of the browser. That install lives outside this repository (`npm run env:status` shows the path), or you can follow the log from the container:

```sh
npm run wp-env -- run cli tail -f wp-content/debug.log
```

The repository is mounted as the `ipsum` theme, whatever the folder is named on your computer. `node_modules` is hidden from WordPress, so Theme Check only sees the theme's own files.

#### Everyday commands

```sh
npm run env:start   # Start the existing environment.
npm run env:status  # Show its status and ports.
npm run env:stop    # Stop it without deleting data.
npm run env:reset   # Reset the database to a fresh WordPress install.
```

Check `npm run env:status` before you start or set up anything, since the environment may already be running.

`npm run env:reset` can't be undone. Run `npm run env:setup` afterwards to activate Ipsum and the plugins again.

#### Other setups

You can also clone this repository into `wp-content/themes/ipsum` in any WordPress 7.2 install (a beta or release candidate until 7.2 ships), such as [WordPress Studio](https://developer.wordpress.com/studio/), then install the [Gutenberg plugin](https://wordpress.org/plugins/gutenberg/) and activate Ipsum. Turn on development mode there too, so `theme.json` isn't cached while you work:

```php
define( 'WP_DEVELOPMENT_MODE', 'theme' );
```

Or with [WP-CLI](https://developer.wordpress.org/cli/commands/config/set/), from your installation directory: `wp config set WP_DEVELOPMENT_MODE theme`.

To try the theme in the browser without installing anything, use [WordPress Playground](https://developer.wordpress.org/playground/).

### Editing the stylesheet

Ipsum's main stylesheet is `style.css`. On a production site the front end uses the minified copy, `style.min.css`, instead. When `SCRIPT_DEBUG` is on, as it is in the `wp-env` setup above, the theme uses `style.css`, so your edits show up right away. Either way, WordPress prints the stylesheet inline in the page's `<head>` rather than linking to it, which saves a render-blocking request. It's printed as `<style id="ipsum-style-inline-css">`, so there's no stylesheet request to inspect or intercept.

`style.min.css` is generated from `style.css` and committed to the repository. When you commit a change to `style.css`, the pre-commit hook regenerates `style.min.css` and adds it to the commit. If you skip the hook with `--no-verify`, or it doesn't run, as in a worktree without `npm install`, regenerate it yourself and include both files in your pull request:

```sh
npm run build   # Regenerate style.min.css from style.css.
npm run watch   # Or regenerate it every time style.css changes.
```

Don't edit `style.min.css` by hand. CI rebuilds it and fails the pull request if the committed copy doesn't match.

### Pattern creation guidelines

What a pattern needs ships with the theme, in [Writing patterns](DESIGN.md#writing-patterns) in DESIGN.md: file names, categories and headers, translatable strings, images, presets, cleaning up copied markup, and block names.

### Tips for Contributors

- As stated above, a goal for the theme is to have as little CSS as possible. Much of the theme's visual treatments should be handled by the Block Editor and Global Styles. As a general rule, if multiple themes would benefit from the CSS you're considering adding, it might reasonably be provided by Gutenberg instead. Let's include clear code comments for any CSS we do include.
- Similarly, let's refrain from building any custom-built PHP or JavaScript-based workarounds for functionality that might reasonably be provided by the Block Editor, let's keep the code simple to help with future maintenance.
- In accordance to those last two bullets, the theme needs no build process to run. The only build step is minifying `style.css`, which the pre-commit hook does for you (see [Editing the stylesheet](#editing-the-stylesheet)).
- Refrain from creating pull requests for translatable strings until all patterns, parts, and templates are completed.

### Opening a pull request

Follow the [pull request template](.github/PULL_REQUEST_TEMPLATE.md), including the AI disclosure section.

- Link the issue the change fixes.
- Check the front end and the Site Editor, and at least one color variation besides the default, since variations redefine every preset color. Say what you checked in Testing Instructions.
- Don't bump `Version:` or add a changelog entry unless the issue asks for it. `Version:` stays at 1.0 until release, so tell copies apart by the git commit, not the version.

## Development guidelines

Ipsum is a [block theme](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview/). Keep these goals in mind:

- Prefer **`theme.json`** and Global Styles over custom CSS. Only add CSS when the block editor or theme APIs cannot express the design yet.
- Use existing patterns in the repo for templates, template parts, and block patterns (`templates/`, `parts/`, `patterns/`).
- Style with the presets as [DESIGN.md](DESIGN.md) describes them: what each color, font size and spacing step is for.
- Follow [WordPress PHP coding standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/) for PHP in `functions.php`, `inc/` and pattern files.

When a change affects the front end or the Site Editor, test both and note what you checked in your pull request.

Only the theme ships with WordPress. Repository tooling and docs, such as `.github/`, `.husky/`, `bin/`, `CONTRIBUTING.md`, `README.md` and `.wp-env.json`, stay in this repository. Like the other bundled themes, core's copy has its own `package.json`, `package-lock.json` and `.nvmrc`, which only build `style.min.css`, so this repository's versions don't sync to core. `AGENTS.md` and `DESIGN.md` ship with the theme, so keep them true for any copy of it.

## Contributor Attribution (Props)

When merging a PR, make sure all meaningful contributors receive proper credit. The WordPress [Props Bot](https://github.com/WordPress/props-bot-action) will leave a comment on the PR with the appropriate `Co-authored-by` lines.

Review the Props Bot list to confirm the contributors should be credited, then copy those lines to the bottom of the squash merge commit message:

```text
Co-authored-by: githubusername <dotorgusername@git.wordpress.org>
```

The `Co-authored-by` lines must:

* Be preceded by a blank line.
* Appear at the very end of the commit message.
* Include everyone who meaningfully contributed to the PR or linked issues, including through code, design, documentation, testing, review, or other substantive contributions.

Do not omit the Props Bot attribution when cleaning up the squash merge commit description. These trailers allow WordPress.org to correctly recognize contributions made through GitHub.

See the [WordPress Contributor Attribution (“Props”) guide](https://make.wordpress.org/core/handbook/best-practices/contributor-attribution-props/) for additional details.

## Questions

If something is unclear, open a [GitHub issue](https://github.com/WordPress/ipsum/issues).
