# Ipsum

Welcome to the development repository for the default theme that will launch with [WordPress 7.2](https://make.wordpress.org/core/7-2/).

## About

Ipsum is a blank canvas built around the blogging experience, our proposal for what a default theme should be. Named after *lorem ipsum*, the placeholder that fills a page until real content arrives, it is composed enough to stand on its own and to be transformed the moment people start writing.

Ipsum is built as a [block theme](https://developer.wordpress.org/block-editor/how-to-guides/themes/block-theme-overview/). The theme aims to ship with as little CSS as possible: our goal is for all theme styles to be configured through [`theme.json`](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/) and editable through Global Styles. The theme development team will work closely with [Gutenberg](https://github.com/wordpress/gutenberg) contributors to build design tools in the block editor that enable this goal.

![The Ipsum home page on a laptop: site title, a quiet navigation, and a single large featured image on the blank canvas.](.github/1-Ipsum-theme-preview-single-laptop.png)

## Try Ipsum

- **[Open Ipsum in WordPress Playground](https://playground.wordpress.net/?blueprint-url=https://raw.githubusercontent.com/WordPress/ipsum/trunk/.github/blueprint.json)** — a throwaway WordPress in your browser with Ipsum active and the demo content already imported. Nothing to install; close the tab and it's gone.
- **[Browse the demo site](https://ipsum.mystagingwebsite.com/)** — the theme with the same content, hosted.
- **Install it** — download this repository as a ZIP (Code → Download ZIP) or clone it into `wp-content/themes/ipsum`, then activate Ipsum under Appearance → Themes. Requires WordPress 7.1 or later and PHP 7.4 or later.

## Demo content

The posts and pages used in the screenshots and the demo site are in [`ipsum-demo-content.xml`](.github/ipsum-demo-content.xml). Import them on a test site via Tools → Import → WordPress. The Playground link above loads them for you.

## A closer look

![A single post on desktop, tablet and mobile.](.github/2-Ipsum-theme-preview-responsive.png)

![Page details.](.github/3-Ipsum-theme-preview-page-details-1.png)

![More page details.](.github/4-Ipsum-theme-preview-page-details-2.png)

![The blog feed with and without featured images, a picture gallery post, an audio post in the Blue Hour style variation, and the navigation overlay in After Hours.](.github/5-Ipsum-theme-preview-bento-1.png)

![More views of the theme across its style variations.](.github/6-Ipsum-theme-preview-bento-2.png)

## Contributing

Ipsum is being developed in the open. Feedback is welcome — [open an issue](https://github.com/WordPress/ipsum/issues) with anything you find, from bugs to design notes. The style variations, the archive pattern pack, and the sidebar templates are the areas where testing helps most right now.

Connect your GitHub account to your WordPress.org account to receive props for your contributions.
Please see the tutorials on [Linking your GitHub and w.org profiles](https://make.wordpress.org/core/handbook/tutorials/linking-your-github-and-w-org-profiles/).

If you would like to contribute code, the list of [open issues](https://github.com/WordPress/ipsum/issues) is a great place to start looking for tasks. [Pull requests](https://github.com/WordPress/ipsum/pulls) are preferred when linked to an existing issue.

Contributing is not just for developers! There are many opportunities to help with [testing](CONTRIBUTING.md#getting-started), triage, discussion, design, building patterns and templates, and more. Please look through [open issues](https://github.com/WordPress/ipsum/issues), and join in wherever you feel most comfortable.

If you'd like to help with triage, open a new issue and one of the maintainers will help you get set up with the ability to add labels to issues and PRs.

However you contribute, please read the [contributing guide](CONTRIBUTING.md) first.

Two conventions for contributors: the theme version stays at 1.0.0 while Ipsum is in development, and changes are logged in pull request descriptions rather than a changelog.

As with all WordPress projects, we want to ensure a welcoming environment for everyone. With that in mind, all contributors are expected to follow our [Code of Conduct](https://make.wordpress.org/handbook/community-code-of-conduct/).

### Checking your changes

Pull requests are linted in CI. To run the same checks locally, you need PHP with [Composer](https://getcomposer.org/), and Node.js 24.18 or later with npm 11.16 or later — `nvm use` picks the version in `.nvmrc`.

```sh
composer install
npm install
npm run lint
```

- `npm run lint:css` checks the CSS against the WordPress CSS Coding Standards.
- `npm run lint:php` checks PHP against the WordPress Coding Standards; `npm run lint:php:fix` fixes what it can.
- `npm run lint:theme` checks the pattern headers and the block markup in patterns, templates, and template parts, and validates `theme.json` and the style variations against the schema for the theme's "Requires at least" version.

`npm install` also sets up a pre-commit hook with [Husky](https://typicode.github.io/husky/) and [lint-staged](https://github.com/lint-staged/lint-staged). It runs the same checks on the files you stage and stops the commit if they fail. Until you run `composer install`, it skips the PHP check. To skip the hook for a commit, use `git commit --no-verify`.

## Resources

- [Setting up a development environment](https://developer.wordpress.org/block-editor/handbook/tutorials/devenv/)
- [Theme Developer Handbook](https://developer.wordpress.org/themes/getting-started/what-is-a-theme/)
- [Block Editor Handbook: Global Styles & theme.json documentation](https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-json/)
- [Block Editor Handbook: theme.json reference](https://developer.wordpress.org/block-editor/reference-guides/theme-json-reference/theme-json-living/)

## Timeline

The theme will be released with [WordPress 7.2](https://make.wordpress.org/core/7-2/) and follow the key dates / milestones associated with its future development schedule.

## License

Ipsum is licensed under the [GNU General Public License v2 or later](http://www.gnu.org/licenses/gpl-2.0.html). Bundled fonts are licensed under the SIL Open Font License; details in [readme.txt](readme.txt).
