# Contributing to Ipsum

Thank you for helping build the default theme for [WordPress 7.2](https://make.wordpress.org/core/7-2/). This document covers how to get set up and what we expect from contributions.

You can try Ipsum without installing anything using the [WordPress Playground demo](https://bit.ly/wp-ipsum). It runs WordPress with the theme from this repository's default branch.

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

Debugging, script debugging, and theme [development mode](https://make.wordpress.org/core/2023/07/14/configuring-development-mode-in-6-3/) are on. PHP notices, warnings, and errors go to `debug.log` in the WordPress install's `wp-content` directory instead of the browser. That install lives outside this repository (`npm run env:status` shows the path), or you can follow the log from the container:

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

`npm run env:reset` can't be undone. Run `npm run env:setup` afterwards to activate Ipsum and the plugins again.

#### Other setups

You can also clone this repository into `wp-content/themes/ipsum` in any WordPress install, such as [WordPress Studio](https://developer.wordpress.com/studio/), then install the [Gutenberg plugin](https://wordpress.org/plugins/gutenberg/) and activate Ipsum. Turn on development mode there too, so `theme.json` isn't cached while you work:

```php
define( 'WP_DEVELOPMENT_MODE', 'theme' );
```

Or with [WP-CLI](https://developer.wordpress.org/cli/commands/config/set/), from your installation directory: `wp config set WP_DEVELOPMENT_MODE theme`.

To try the theme in the browser without installing anything, use [WordPress Playground](https://developer.wordpress.org/playground/).

### Pattern creation guidelines

[Reference guide for patterns in the handbook](https://developer.wordpress.org/block-editor/reference-guides/block-api/block-patterns/).
A few things to have in mind when building patterns for the default theme:

- **Category selection**

When creating WordPress block patterns, it's important to carefully choose the appropriate category for your pattern. WordPress provides a set of default categories, each serving a specific purpose. Let's stick to using the default categories. We can add multiple of them separating them by commas. The list of the slug is [here](https://github.com/WordPress/gutenberg/blob/c20350c1d246163201375f090b0b7b4ab49b1dad/packages/block-editor/src/components/inserter/block-patterns-tab.js#L35).

- **Hiding patterns from the inserter**

You can control the visibility of your block pattern in the inserter by adding the following line of code when registering the pattern:

We do this for patterns we don't want the user to access via the inserter or the pattern library. This is usually the case for utility patterns that we create for translation purposes such as the 404 pattern.

We do this by adding the following line:

` * Inserter: no`

Let's prefix hidden patterns using `hidden-` when we name the pattern file.

- **Different translation functions and when to use them**

WordPress block patterns should be [internationalized](https://developer.wordpress.org/apis/internationalization/internationalization-guidelines/) to make them accessible to a global audience.

`esc_html_x()`: Employ this function when you need to translate and escape text for display within HTML. It's useful for multilingual websites as it provides translation support while also ensuring HTML safety.

`esc_html__()`: Similar to `esc_html_x()`, use this function for translating and escaping HTML-embedded text. It's a simpler version when context-specific translations are not needed.

`esc_attr__()` and `esc_attr_x()`: Use this function to escape and sanitize text meant for HTML attributes, such as image source URLs or link targets. It helps prevent security vulnerabilities by ensuring that user inputs are safe for use in attributes.

`esc_html_e`: works just like `esc_html__()` but you don't need to use `echo` to output the string

When we have simple HTML tags in our translatable strings we would use `echo wp_kses_post( __( 'Lorem ipsum <em>Hello</em> dolor sit amet.', 'textdomain' ) );`. This syntax is clearer for translators than using `sprintf()` and it allows them to remove the markup if it doesn't work on their own language.

These functions enhance security and support localization efforts in WordPress block patterns, ensuring that text is safe and can be easily translated.

- **Patterns with images**

To create dynamic image links in your block patterns, utilize the `get_template_directory_uri()` function. This function retrieves the URL of the current theme's directory, ensuring that the image links are relative to the theme and work correctly even if the website's directory structure changes or if we are using a child theme. This is essential for maintaining the stability and portability of your patterns.

Make sure to add alt text to your images and to make sure to remove the IDs from them. An example would be:

```
<!-- wp:image {"id":125,"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="http://wp-stable.test/wp-content/themes/twentytwentyfive/assets/images/project.webp" alt="" class="wp-image-125"/></figure>
<!-- /wp:image -->
```

would turn into

```
<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
<figure class="wp-block-image size-large"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/project.webp" alt="<?php echo esc_attr_x( 'Picture of a building', 'Alt text for project picture', 'ipsum' ); ?>"/></figure>
<!-- /wp:image -->
```

- **Image license attribution**

When adding images to the theme, we need to add the license attribution to the readme.txt file.

- **Use of Post Types, Block Types and Template Types**

We use Block Types when the pattern uses custom markup for a specific block or one of the default template parts (footer and header). Using this will suggest the pattern when someone inserts said block or template part. This is commonly used for query, post-content block, template or footer.

Template Types is used when we want our pattern as a suggestion for a specific template. In this case we provide the template slug (404, home, single...)

Post Types is used to restrict the post type we want the pattern to be used for. commonly used for full page patterns.

- **Spacing, colors and font sizes**

Using presets for spacing, font sizes, and colors in WordPress block patterns is preferred over hardcoded values for three key reasons:

Consistency: Presets ensure a uniform design across the theme, promoting a cohesive visual identity.

Scalability: They make global design changes easier during development, saving time and effort.

Accessibility: Presets facilitate adherence to accessibility standards, making your patterns more usable and readable for a wider audience.

- **Other tips**

In the same way we remove IDs from image blocks, we need to remove queryId from query blocks too. Also, if any of our template parts have a theme attribute, that needs to remove too.

`<!-- wp:query {"queryId":18,"query":{"perPage":8,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->`

turns into

`<!-- wp:query {"query":{"perPage":8,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->`

and

`<!-- wp:template-part {"slug":"header-portfolio","theme":"ipsum","area":"header","tagName":"header"} /-->`

turns into

`<!-- wp:template-part {"slug":"header-portfolio","area":"header","tagName":"header"} /-->`

If we are constantly assigning properties to the same block over and over again (ie: border radius to images), consider moving those properties to the theme.json.

When building full page patterns, let's prefix them by using page-

One way to control the order in which patterns are displayed in the inserter is by changing the name of the file (they are sorted alphabetically)

### Tips for Contributors

- As stated above, a goal for the theme is to have as little CSS as possible. Much of the theme's visual treatments should be handled by the Block Editor and Global Styles. As a general rule, if multiple themes would benefit from the CSS you're considering adding, it might reasonably be provided by Gutenberg instead. Let's include clear code comments for any CSS we do include.
- Similarly, let's refrain from building any custom-built PHP or JavaScript-based workarounds for functionality that might reasonably be provided by the Block Editor, let's keep the code simple to help with future maintenance.
- In accordance to those last two bullets, this theme has no required build process.
- Refrain from creating pull requests for translatable strings until all patterns, parts, and templates are completed.

## Development guidelines

Ipsum is a [block theme](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview/). Keep these goals in mind:

- Prefer **`theme.json`** and Global Styles over custom CSS. Only add CSS when the block editor or theme APIs cannot express the design yet.
- Use existing patterns in the repo for templates, template parts, and block patterns (`templates/`, `parts/`, `patterns/`).
- Follow [WordPress PHP coding standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/) for PHP in `functions.php` and pattern files.

When a change affects the front end or the Site Editor, test both and note what you checked in your pull request.

## Contributor Attribution (Props)

When merging a PR, make sure all meaningful contributors receive proper credit.  The WordPress [Props Bot](https://github.com/WordPress/props-bot-action) will leave a comment on the PR with the appropriate `Co-authored-by` lines.

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
