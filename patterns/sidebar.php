<?php
/**
 * Title: sidebar
 * Slug: ipsum/sidebar
 * Inserter: no
 */
?>
<!-- wp:group {"tagName":"aside","metadata":{"name":"sidebar"},"style":{"spacing":{"blockGap":"var:preset|spacing|50"}},"layout":{"type":"default"}} -->
<aside class="wp-block-group"><!-- wp:group {"metadata":{"name":"Categories"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"metadata":{"name":"Categories Label"},"style":{"typography":{"letterSpacing":"0rem"}},"fontSize":"small"} -->
<h2 class="wp-block-heading has-small-font-size" style="letter-spacing:0rem"><?php esc_html_e( 'Categories', 'ipsum' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:categories {"fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Recent Posts"},"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"metadata":{"name":"Recent Posts Label"},"style":{"typography":{"letterSpacing":"0rem"}},"fontSize":"small"} -->
<h2 class="wp-block-heading has-small-font-size" style="letter-spacing:0rem"><?php esc_html_e( 'Recent posts', 'ipsum' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":2,"query":{"perPage":5,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"excludeCurrent":null},"layout":{"type":"default"}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"default"}} -->
<!-- wp:group {"metadata":{"name":"Recent Post"},"style":{"spacing":{"blockGap":{"top":"0"},"margin":{"bottom":"var:preset|spacing|40"}}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:post-title {"level":5,"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","letterSpacing":"0rem"}},"fontSize":"small"} /-->

<!-- wp:post-date {"datetime":"2026-08-25T12:32:20.987Z","format":"human-diff","isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","letterSpacing":"0rem"}}} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></aside>
<!-- /wp:group -->