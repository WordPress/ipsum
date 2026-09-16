<?php
/**
 * Title: 404
 * Slug: ipsum/404
 * Inserter: no
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */
?>
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:group {"tagName":"main","metadata":{"name":"Body"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:group {"metadata":{"name":"Post Title"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1,"fitText":true} -->
<h1 class="wp-block-heading has-fit-text"><?php esc_html_e( 'Page not found.', 'ipsum' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php esc_html_e( 'The page you are looking for doesn\'t exist, or it has been moved. Please try searching using the form below.', 'ipsum' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'ipsum' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'ipsum' ); ?>","buttonUseIcon":true} /--></main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->