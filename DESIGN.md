# DESIGN.md

How Ipsum looks and why each preset exists, as far as the code says. Where the code doesn't give a reason, this file describes what it does. `AGENTS.md` covers working in the repository.

## Ipsum

Ipsum is the default theme for WordPress 7.2: a block theme built around blogging, which its readme calls a blank canvas. Each palette is a background and a text ink in a few strengths, plus an accent the theme uses once.

### Where the design lives

-   **`theme.json` first.** Presets, layout widths, global styles and per-block styles. Change the design here when you can.
-   **`style.css`** holds what `theme.json` can't express, with a comment on each rule. It loads on the front end and in the editors. `assets/css/editor-style.css` adds the few editor-only fixes.
-   **`styles/`** holds the variations: `colors/` (seven palettes, most with fonts too), `typography/` (five font sets) and `blocks/` (block style variations).
-   **`functions.php`** registers five more block styles, the sidebar template types, the Sidebar template part area and the Pages pattern category.
-   **Patterns are the source of truth for templates and parts.** Each file in `templates/` and `parts/` is a one-line `wp:pattern` reference. The markup lives in `patterns/`.

## Color

Six palette colors. Every color variation redefines all six, and the duotone too.

| Slug | Name | Default | Role | Where the theme uses it |
| --- | --- | --- | --- | --- |
| `base` | Base | `#fcfcfc` | Background | Page background, button text, form field fill, text and links on Strong Contrast grounds, the end of both gradients |
| `contrast` | Contrast | `#000000bf` | Text | Body text, headings, links, button fill and border, form field text and border |
| `accent-3` | Strong Contrast | `#000000` | Strongest ink | Hover for links, buttons, form fields and tag pills; the ground of inverted sections, cards and the navigation overlay |
| `accent-1` | Accent | `#3355ff` | Accent | One place only: the arrival bar, a 3px line that sweeps the top of the screen when a single post loads (`style.css`, only when the visitor hasn't asked for reduced motion) |
| `accent-5` | Surface | `#0a0a0a08` | Faint fill | Quotes, pullquotes, comment bubbles, tag pills, table headers and stripes, the calendar header, the audio player, cards in patterns, the start of both gradients, and a few rules (Header Sticky, Text Alternating) |
| `accent-6` | Border | `#0a0a0a33` | Faint line | Separators, list markers, quote marks, table and calendar lines, the code block border, dotted rules between rows |

`accent-2` and `accent-4` are not defined. The slugs match Twenty Twenty-Five's, so patterns written for it find matching colors, but a block that asks for `accent-2` or `accent-4` gets no color.

How the palettes are built:

-   **Light palettes:** Contrast, Border and Surface are the dark ink at 75%, 20% and 3% opacity (hex alpha `bf`, `33`, `08`). Strong Contrast is the ink itself.
-   **Dark palettes:** Contrast is opaque. Border and Surface are Contrast at 25% and 10% (`40`, `1a`). Strong Contrast is lighter than Contrast.
-   Border and Surface are translucent, so they tint whatever is under them.

### Usage rules

-   **Use the slugs, never literal colors.** `var(--wp--preset--color--contrast)` in CSS, `var:preset|color|contrast` in block attributes, or `textColor` and `backgroundColor`. A literal hex freezes one variation's look into all the others.
-   **Text is Contrast.** Body, headings and links all use it. Hover goes to Strong Contrast.
-   **Links** have a dotted 1px underline (`style.css`). On hover they turn Strong Contrast and lose the underline. Navigation, post title, post navigation and pagination links do the reverse: no underline until hover.
-   **Buttons** fill with Contrast, with Base text, and fill with Strong Contrast on hover. Focus and press use Contrast at 85% (`color-mix()`). The Outline style keeps a Contrast border and fills with Surface on hover.
-   **Form fields** in Search and the comment form are Base with Contrast text and border. The border turns Strong Contrast on hover. Jetpack form fields get the same border.
-   **Accent is not a link or button color.** The theme uses it only in the arrival bar.
-   **Inverted sections and cards** use a Strong Contrast ground with Base text and links: the About Row band, the Navigation Overlay, and the cards in Text Statement, Footer Centered, Footer Subscribe, Header Collapsed, Page Bio and the gallery text tiles. They are dark in light variations and light in dark ones.
-   **Tinted cards** use a Surface ground and 10px corners: Kind Words, CTA Membership, Hero Colophon, Format Audio, Format Link and the author chip in single posts.
-   **Lines** use Border, at 1px. Dotted rules use Border or the current text color.
-   **Light or dark:** read `settings.custom.controlScheme`. It is `light` in `theme.json`, and each color variation sets its own. The variation titles don't tell you. It becomes `--wp--custom--control-scheme`, which sets the audio player's `color-scheme`.
-   **Literal colors in the code:** the Evening code block style keeps the Evening palette's literals on purpose, so it reads as a dark slab under every variation. The Soft shadow is black at 8%. The duotone colors are hex copies of palette colors.

### Gradients and duotone

-   **Gradients:** two presets, both Surface to Base, top to bottom. `gradient-1`, "Vertical soft wash to base", fades over the whole height. `gradient-2`, "Vertical hard wash to base", is Surface for the top 90%, then Base. No template or pattern uses them.
-   **Duotone:** one preset, `duotone-1`. The default is "Black and white" (`#000000`, `#FFFFFF`). Each color variation redefines it with two of its own palette colors as hex, dark first, so editing a palette doesn't update its duotone. Header Collapsed, Header Sticky and Hero Colophon apply it to the site logo. Blue Hour and Golden Hour also apply it to every Featured Image.
-   Core's default palette, gradients and duotones are off, so only Ipsum's presets show.

## Typography

| Slug | Family | Role |
| --- | --- | --- |
| `inter` | Inter | The text font: body and, by default, headings |
| `manrope` | Manrope | The meta voice (below), buttons, navigation, site title and tagline; the text font in Golden Hour |
| `jetbrains-mono` | JetBrains Mono | Code and preformatted text; the text font in High Noon |
| `stix-two-text` | STIX Two Text | The text font in Blue Hour, plus its site title and tagline |
| `besley` | Besley | The text font in Sunrise |
| `archivo` | Archivo | The text font in Morning and After Hours |
| `archivo-condensed` | Archivo Condensed | Headings in After Hours |

All seven are self-hosted variable fonts in `assets/fonts/`. Manrope has no italic face.

### The meta voice

Labels, dates, terms, bylines, comment meta, pagination, read more links, cites, form labels and table headers share one treatment: **Manrope, Small (0.875rem), weight 600**. A few use 700 (site title, accordion and details summaries, table headers) or 400 (comment date, comment edit and reply links, comments title). The tagline is 500. The navigation is Manrope at Medium, 500.

It is not a token. `theme.json` has no shared text style, so the treatment is repeated:

-   About 30 times in `theme.json`: per-block `typography`, plus a few `css` strings (form labels, details summaries, list markers).
-   Once in `style.css`, for table headers.
-   Inline in patterns: 28 paragraphs and headings in 16 patterns set `fontFamily: manrope` and `fontSize: small`, most with weight 600 or 700.

To change it, change every copy. Typography variations leave it alone, since those blocks set Manrope directly. Blue Hour is the one variation that moves part of it: the site title and tagline go to STIX Two Text.

### Size scale

| Slug | Name | Size | Fluid | Used for |
| --- | --- | --- | --- | --- |
| `small` | Small | 0.875rem | No | The meta voice, h5, h6 |
| `medium` | Medium | 1.125rem | No | Body text, h4, navigation, verse |
| `large` | Large | 1.4375rem | No | h3 |
| `x-large` | X-Large | 1.75rem | 1.5rem to 1.75rem | h2 |
| `2-x-large` | 2-X-Large | 2.1875rem | 1.625rem to 2.1875rem | h1, single post titles, quote marks |

Above 2-X-Large, the theme uses the Display block style (`is-style-text-display`, 2.2rem to 3.5rem) or fit text (Hero Epigraph, About Row, the 404 heading, the Footer Centered wordmark). Core's default sizes are off.

### Conventions

-   **Line height:** body 1.5, paragraphs 1.6. Headings use `calc(1em + 0.5rem)`, so they get tighter as they grow. Display is 1.2; quote marks are 1.
-   **Weight:** text 400, headings 500.
-   **Letter spacing:** h1 and h2 are tightened by -0.02rem, h3 by -0.01rem. The site title and tagline open to 0.01rem. The meta voice sets 0.
-   **Uppercase** is rare: the site title in Header Sticky, Header Vertical and Footer Social, and the Navigation Overlay menu.
-   **Writing mode** is on. Header Vertical runs its site title vertically.

## Spacing and layout

| Slug | Name | Size | Typical use |
| --- | --- | --- | --- |
| `20` | 2X-Small | 8px | Gaps inside rows (date · categories, title and tagline), tag pill padding, heading bottom margin |
| `30` | X-Small | 16px | Gaps between small items and buttons; padding in compact boxes (code, comment bubbles, button top and bottom) |
| `40` | Small | 24px to 32px | The root block gap and side padding, card padding, button side padding |
| `50` | Regular | 32px to 48px | Section padding (header top, footer), heading top margin |
| `60` | Large | 48px to 64px | Between sections (separators, comments, tags, author chip), the gap between posts in query loops, header bottom padding |
| `70` | X-Large | 64px to 96px | Large section padding, the gap beside the sidebar |
| `80` | 2X-Large | 96px to 128px | Hero and statement patterns: Hero Epigraph, CTA Search, Contact Say Hi, About Row |

From `40` up, sizes scale with the viewport between the two values. Core's default spacing sizes are off.

### Layout

-   **Widths:** content 640px, wide 1280px.
-   **Root padding:** spacing `40` on each side, with root-padding-aware alignments, so full-width blocks reach the screen edges.
-   **Templates** wrap their content in a `main` group with a constrained layout. Post content is full-aligned with a constrained layout, so its blocks sit at 640px and can go wide or full.
-   **Sidebar templates** use a wide Columns block: 66.66% content, 33.33% sidebar, spacing `70` between.

### Shadow

One preset, `soft` ("Soft"): `0 2px 8px rgba(0, 0, 0, 0.08)`. Only the Header Sticky bar uses it.

### Corners and lines

| Radius | Where |
| --- | --- |
| 10px | Buttons, featured images, avatars, comment bubbles, tag pills, the audio player, most cards in patterns |
| 5px | Images, quotes and pullquotes, code, form fields, the site logo |
| 4px | Site title, search button |
| 2px | Post author name |
| 0 and 9999px | The Sharp and Rounded site logo styles |

Lines are 1px. Dotted lines mark link underlines, button focus outlines, the top of accordions and details, and the rules between rows in Archive Simple, Archive Minimal, Events List, Format Link and All Archives Sidebar. Buttons, separators, tables and code use solid lines.

## Style variations

### Color variations

`styles/colors/`, number-prefixed for order. The folder says colors, but six of the seven also change fonts, and two apply duotone to featured images. Every one redefines the six colors and `duotone-1`, so the duotone on the header site logos follows the variation.

| # | Title | Scheme | Base | Accent | Also changes |
| --- | --- | --- | --- | --- | --- |
| | Default (`theme.json`) | light | `#fcfcfc` | `#3355ff` | Nothing |
| 01 | Blue Hour | light | `#ecf7fe` | `#006699` | Text font, site title and tagline in STIX Two Text. Duotone "Ink on paper" on featured images. |
| 02 | Sunrise | light | `#fef8ec` | `#996600` | Text font in Besley. |
| 03 | Morning | light | `#eefbec` | `#47730a` | Text font in Archivo. |
| 04 | High Noon | light | `#FFFF66` | `#465800` | Text font in JetBrains Mono. |
| 05 | Golden Hour | dark | `#7a1000` | `#ff8c52` | Text font and headings in Manrope. Duotone "Peach on maroon" on featured images. |
| 06 | Evening | dark | `#000000` | `#FE4C57` | Colors only. |
| 07 | After Hours | dark | `#310c25` | `#f2a3d8` | Text font in Archivo, headings in Archivo Condensed. |

Scheme is `settings.custom.controlScheme`.

### Typography variations

`styles/typography/`. Each sets only the root font family, which headings inherit. Manrope blocks and code keep their own families. Each file also lists Manrope and JetBrains Mono among its font families.

| Title | Slug | Text font |
| --- | --- | --- |
| Archivo | `archivo` | Archivo |
| Archivo Condensed | `archivo-condensed` | Archivo Condensed |
| Besley | `besley` | Besley |
| JetBrains Mono | `jetbrains-mono` | JetBrains Mono |
| STIX Two Text | `stix-two-text` | STIX Two Text |

### Block style variations

The class is `is-style-` plus the slug, which doesn't always match the file name.

| Style | Class | Blocks | What it does | Defined in |
| --- | --- | --- | --- | --- |
| Crop Contents | `is-style-crop-contents` | Group | `overflow: clip` | `styles/blocks/crop-contents.json` |
| Display | `is-style-text-display` | Heading, Paragraph, Post Title, Site Title, Query Title | Size from 2.2rem to 3.5rem with the viewport, line height 1.2 | `styles/blocks/display.json` |
| Quote Mark | `is-style-text-quote-mark` | Heading, Paragraph | A ❝ above the text, in Border, at 2-X-Large | `styles/blocks/quote-mark.json` |
| Quote Mark on Color | `is-style-text-quote-mark-on-color` | Heading, Paragraph | The same mark in the current text color; Text Statement uses it on a Strong Contrast card | `styles/blocks/quote-mark-on-color.json` |
| Evening | `is-style-evening` | Code | Black ground, `#fafafa` text and `#fafafa40` border, as literals on purpose | `functions.php` |
| Sharp | `is-style-sharp` | Site Logo | Square corners | `functions.php` |
| Pinned to Bottom | `is-style-sticky-bottom` | Template Part | Pins the part to the bottom of the screen; see [Utility classes and block styles](#utility-classes-and-block-styles) | `functions.php`, CSS in `style.css` |
| Row Hover | `is-style-hover-together` | Post Template | Post rows hover as one | `functions.php`, CSS in `style.css` |
| Dot Separator | `is-style-dot-before` | Comment Edit Link, Comment Reply Link | A decorative `·` before the link | `functions.php`, CSS in `style.css` |

`theme.json` also restyles core's own block styles: Button Outline, Quote Plain (no ground, padding or corners), Separator Wide (capped at the wide width), Site Logo Rounded (9999px) and Social Icons Logos Only (icons in the current text color).

## Templates and parts

### Templates

| Template | Pattern | Shows |
| --- | --- | --- |
| `index` | `ipsum/hidden-index` | The post feed, each post in full |
| `archive` | `ipsum/hidden-archive` | The archive title over the Archive Compact list |
| `search` | `ipsum/hidden-search` | The search title and field, then results with excerpts |
| `single` | `ipsum/hidden-single` | The post, tags, author chip, comments and Keep Reading |
| `page` | `ipsum/hidden-page` | Featured image, title and content |
| `404` | `ipsum/hidden-404` | A fit-text heading, a line of text and search |
| `page-no-title` | `ipsum/hidden-page-no-title` | Content only |
| `page-sidebar` | `ipsum/hidden-page-sidebar` | The page beside the Sidebar part |
| `single-sidebar` | `ipsum/hidden-single-sidebar` | The post beside the Sidebar part |
| `index-sidebar` | `ipsum/hidden-index-sidebar` | The feed beside the Sidebar part |
| `archive-sidebar` | `ipsum/hidden-archive-sidebar` | The archive beside the Sidebar part |

-   Every template starts with the Header part.
-   One-column templates end with Footer; sidebar templates end with Footer Wide.
-   All but `404` and `search` add the Search Bar part with the Pinned to Bottom block style, which pins it to the bottom of the screen.
-   Both single templates insert two hidden helper patterns: `ipsum/hidden-comments` and `ipsum/hidden-keep-reading` (the three latest posts).

### Custom templates

-   **In `theme.json` `customTemplates`:** Single Posts Sidebar (`single-sidebar`, posts), Pages Sidebar (`page-sidebar`, pages) and Pages No Title (`page-no-title`, pages). Editors pick them per post or page.
-   **In `functions.php`:** Index Sidebar (`index-sidebar`) and All Archives Sidebar (`archive-sidebar`) are registered as template types by `ipsum_sidebar_template_types()`, which gives them a title and description in the Site Editor. Their slugs aren't in the template hierarchy, so WordPress doesn't choose them on its own.

### Template parts

| Part | Area | Pattern | Used in |
| --- | --- | --- | --- |
| `header` | `header` | `ipsum/header-default` | Every template |
| `header-collapsed` | `header` | `ipsum/header-collapsed` | None; an alternative with the menu always behind a button |
| `header-sticky` | `header` | `ipsum/header-sticky` | None; an alternative sticky bar with the Soft shadow |
| `footer` | `footer` | `ipsum/footer` | One-column templates |
| `footer-wide` | `footer` | `ipsum/footer-wide` | Sidebar templates |
| `navigation-overlay` | `navigation-overlay` | `ipsum/navigation-overlay` | The menu button in Header Default, Header Collapsed, Header Sticky, Hero Colophon and Hero Epigraph |
| `search-bar` | `uncategorized` | `ipsum/hidden-search-bar` | All templates but `404` and `search` |
| `sidebar` | `sidebar` | `ipsum/hidden-sidebar` | The four sidebar templates: categories and the five latest posts |

The header, footer and overlay parts delegate to insertable patterns. Other patterns carry `Block Types: core/template-part/<area>`, so the editor offers them as replacements:

-   **Header:** Header Default, Header Collapsed, Header Sticky, Header Vertical, Hero Colophon, Hero Epigraph.
-   **Footer:** Footer, Footer Wide, Footer Centered, Footer Social, Footer Subscribe.
-   **Navigation overlay:** Navigation Overlay, Overlay Contents, Overlay Profile.

## Utility classes and block styles

No class names in the patterns carry behaviour that the editor can't see. Each one that used to is a registered block style, listed in the block's Styles panel and in REST at `/wp/v2/block-types/<block>` under `styles`. They're registered in `ipsum_register_block_styles()` in `functions.php`, and their CSS lives in `style.css`, with one editor fix in `assets/css/editor-style.css`. A block holds one style at a time, and choosing a style stores `is-style-<slug>` in its `className`.

| Style | Block | What it does | Used in |
| --- | --- | --- | --- |
| Pinned to Bottom (`sticky-bottom`) | Template Part | Pins the part to the bottom of the viewport, shrunk to its content at the inline end (bottom right in LTR, bottom left in RTL), above the content (`z-index: 10`). A Search block inside it gets a quiet outlined button until hover, focus or press. | The Search Bar part at the end of every template but Search and 404. |
| Row Hover (`hover-together`) | Post Template | Post rows hover as one: hovering any visible part of a row turns all its text and links Strong Contrast and gives its featured image a small tilt and settle (skipped with reduced motion). The empty space beside the content doesn't trigger it. | Archive Simple, Archive Standard, Archive Compact, Archive Lead, Search, All Archives Sidebar. |
| Dot Separator (`dot-before`) | Comment Edit Link, Comment Reply Link | Puts a decorative `·` before the link, with 0.5em of space on each side and weight 600. Screen readers skip it, and the dot comes and goes with its link. | The date, Edit and Reply row of each comment in `ipsum/hidden-comments`. |

What each one needs to work:

-   **Pinned to Bottom:** put the template part at the root of the template, after the footer. A sticky element only travels within its parent; at the root that's the site wrapper, which the theme stretches to at least the viewport height. Inside a Group it only sticks while that Group is on screen.
-   **Row Hover:** wrap each post's blocks in a single Group directly inside the Post Template, as every Ipsum archive pattern does. Without that Group the style does nothing.
-   **Dot Separator:** put the link in a flex row with a block gap of 0. The dot's padding does the spacing, so a gap would double it.

### The `·` meta separator

The separator between meta items is built two ways, on purpose:

-   **Where both neighbours always render** (post date · categories, comments link · call to action), it's a Paragraph named Meta Separator: small, weight 600, holding `<span aria-hidden="true">` around `esc_html_e( '·', 'ipsum' )`. The dot can be translated, screen readers skip it, and the row's block gap (`spacing|20`) spaces it. To add one, copy it from an archive pattern.
-   **Where a neighbour may not render**, it's the Dot Separator style. The Edit link only renders for people who can edit the comment, and the Reply link only when threading allows it, so a Paragraph would be left behind as a stray dot. CSS-generated content can't be translated, which is why the Paragraph stays wherever it's safe.

## CSS that theme.json can't express

These blocks keep a `css` string in `theme.json` because no `theme.json` property reaches what they style. Core wraps each rule in `:root :where(…)`, so it has the specificity of one class; `!important` appears only where a more specific core rule has to be beaten, and each one was checked by removing it. `css` strings can't hold comments, so this table records why each exists.

| Block | What the CSS does | Why `theme.json` can't | Upstream |
| --- | --- | --- | --- |
| Audio | Gives the `<audio>` player the Surface wash, 10px corners, Contrast text and the palette's `color-scheme`; clears WebKit's panel and time-display shadows. | The block only supports link color, and the rules target the inner `<audio>` element and WebKit media-control pseudo-elements. | [#56837](https://github.com/WordPress/gutenberg/issues/56837) |
| Calendar | Draws the cell grid in Border and fills header cells with Surface unless the block has its own colors. The text color is in `color.text`. | No border support. The color selector covers both `table` and `th`, so a background would paint twice. Core's cell border rule is more specific, hence `!important`. | [#39053](https://github.com/WordPress/gutenberg/issues/39053) |
| Categories | Indents the list and its child lists by `spacing\|30` at the inline start. | Block padding is physical and would break RTL; nested `ul.children` lists aren't reachable. | [#37411](https://github.com/WordPress/gutenberg/issues/37411), [#53187](https://github.com/WordPress/gutenberg/issues/53187) |
| Comment Content | Spaces the comment's paragraphs by `spacing\|40`, flush at the top. | The paragraphs are plain `<p>`s, with no paragraph element or block gap. | [#49470](https://github.com/WordPress/gutenberg/issues/49470) |
| Details | Sets the summary in the meta voice, replaces the native marker with ▸/▾ and lays it out as a flex row. | Block typography applies to the whole block, not the `<summary>`; the marker can't be changed. | [#76535](https://github.com/WordPress/gutenberg/issues/76535), [#51019](https://github.com/WordPress/gutenberg/issues/51019) |
| Latest Comments | Lets the date and excerpt follow the block's font size and removes the excerpt paragraph margins. | Internal elements; core's excerpt rule is more specific, hence `!important`. | None found |
| Latest Posts | Lets the author and date follow the block's font size; spaces the excerpt and full content by the block gap. | Internal elements. | [#49249](https://github.com/WordPress/gutenberg/issues/49249), [#34647](https://github.com/WordPress/gutenberg/issues/34647) |
| List | Indents at the inline start, spaces items by 0.5rem, uses a "• " bullet with Border Manrope markers. The descendant rules also reach the nested lists of pre-6.1 list content, which have no `wp-block-list` class. | No list-style or `::marker` styling; padding is physical; List Item margin wouldn't reach legacy nested lists. | [#51480](https://github.com/WordPress/gutenberg/issues/51480), [#37411](https://github.com/WordPress/gutenberg/issues/37411) |
| Navigation | Removes the row gap between wrapped items; in vertical menus and the default overlay, removes gaps around items and submenus and indents submenus by `spacing\|30`. | Submenu containers and overlay internals aren't reachable (Submenu and Link only support typography); core's rules are more specific, hence `!important`. | [#39392](https://github.com/WordPress/gutenberg/issues/39392), [#56140](https://github.com/WordPress/gutenberg/issues/56140) |
| Post Author | Lets the byline and bio follow the block's font size; removes the bio margin. | Internal elements. | None found |
| Post Comments Form | Fields get a Base fill, Contrast text and border, 5px corners and a Strong Contrast border on hover; sets the checkbox margin and the spacing between form rows. Labels are in `elements.label`. | `textInput` only matches text-like inputs; there's no input `:hover`, and block elements print after the CSS, so they'd override it. Core's checkbox rule uses an ID, hence `!important`. | [#34198](https://github.com/WordPress/gutenberg/issues/34198), [#76534](https://github.com/WordPress/gutenberg/issues/76534) |
| Post Excerpt | Lets the excerpt paragraph inherit the block's line height. | The Paragraph block's bare `p` selector leaks its line height into the excerpt. | [#82647](https://github.com/WordPress/gutenberg/issues/82647) |
| Post Terms | Keeps each term on one line; tag lists become Surface pills with no separators and a Strong Contrast hover. | Keyed on the taxonomy class; no layout or gap support, and terms can't be styled one by one. | [#85587](https://github.com/WordPress/gutenberg/issues/85587), [#57998](https://github.com/WordPress/gutenberg/issues/57998) |
| Pullquote | Adds a Border ❝ above the quote and a dash before the citation; keeps space under the paragraph when a citation follows. | Generated content and the inner paragraph. | None found ([#48257](https://github.com/WordPress/gutenberg/issues/48257) is closest) |
| Quote | Adds a Border ❝ and a dash before the citation. | Generated content. | None found |
| Search | Input border and hover, placeholder color; the button-inside wrapper's fill, border, corners, hover and focus ring; the label as a block in the meta voice; no input transition for button-only; the outlined text button. The input fill, text and corners are in `elements.textInput`. | Hover and the wrapper aren't reachable. Gutenberg's `theme.json` class drops `::placeholder`. The editor renders the label as a `div`, so `elements.label` misses it. | [#49249](https://github.com/WordPress/gutenberg/issues/49249), [#71382](https://github.com/WordPress/gutenberg/issues/71382), [#52854](https://github.com/WordPress/gutenberg/issues/52854) |
| Separator (Wide) | Lets the Wide style reach the wide size. | No max-width property. Layout rules load later or are more specific in the editor, hence `!important`. | [#65407](https://github.com/WordPress/gutenberg/issues/65407), [#50674](https://github.com/WordPress/gutenberg/issues/50674) |
| Social Icons (Logos Only) | Draws the icons in the current text color instead of brand colors. | No icon color in Global Styles. | [#39989](https://github.com/WordPress/gutenberg/issues/39989) |
| Term Description | Spaces the description's paragraphs by `spacing\|40`. | Plain `<p>`s; core zeroes their margins with a more specific rule, hence `!important`. | [#49470](https://github.com/WordPress/gutenberg/issues/49470) |
| Jetpack Contact Form | Field borders in Contrast with a Strong Contrast hover, 5px corners; labels in the meta voice. | Jetpack's field classes; the same hover limit as the comment form. | None found |

The meta voice is the other gap. `theme.json` can't name a text style and reuse it, so Manrope, small, semibold is repeated in about thirty block styles, in pattern attributes and in `style.css`; see [The meta voice](#the-meta-voice). `settings.custom` tokens could share the values, but Global Styles wouldn't show them and every block would still need its own reference. The upstream gap is named typography presets that blocks and elements can reference: [#66932](https://github.com/WordPress/gutenberg/issues/66932).
