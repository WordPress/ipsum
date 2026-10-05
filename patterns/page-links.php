<?php
/**
 * Title: Page Links
 * Slug: ipsum/page-links
 * Categories: ipsum_page
 * Viewport width: 1280
 * Description: A link-in-bio page — portrait, name, short bio and social links on the reading column.
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */

?>
<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Page Links', 'Name of the Page Links element', 'ipsum' ); ?>"},"className":"is-style-section-1","style":{"dimensions":{"minHeight":"100vh"},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-section-1" style="min-height:100vh;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--70);padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:columns {"verticalAlignment":"center"} -->
<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"aspectRatio":"3/4","scale":"cover","sizeSlug":"full","linkDestination":"none","align":"center","style":{"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"}}}} -->
<figure class="wp-block-image aligncenter size-full has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-cover-author.webp" alt="" class="" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;aspect-ratio:3/4;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Title and Paragraph', 'Name of the Title and Paragraph element', 'ipsum' ); ?>"},"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|20"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"textAlign":"left"}},"fontSize":"x-large"} -->
<h2 class="wp-block-heading has-text-align-left has-x-large-font-size"><?php esc_html_e( 'Lorem', 'ipsum' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"small"} -->
<p class="has-small-font-size"><?php esc_html_e( 'Teacher in Porto, keeping a quiet blog of essays, pictures, and sounds—notes on books, slow mornings, and the occasional recipe that actually works. Start with the essays, or just say hi.', 'ipsum' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:social-links {"iconColor":"currentColor","iconColorValue":"currentColor","className":"is-style-logos-only"} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"whatsapp"} /-->

<!-- wp:social-link {"url":"#","service":"mastodon"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
