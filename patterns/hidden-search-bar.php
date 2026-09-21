<?php
/**
 * Title: Search Bar
 * Slug: ipsum/hidden-search-bar
 * Inserter: no
 * Description: Sticky search bar button anchored at the bottom edge of the viewport.
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */

?>
<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Search Bar', 'Name of the search bar group', 'ipsum' ); ?>","patternName":"ipsum/hidden-search-bar"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:search {"label":"<?php esc_attr_e( 'Search', 'ipsum' ); ?>","showLabel":false,"buttonText":"<?php esc_attr_e( 'Search', 'ipsum' ); ?>","buttonPosition":"button-only","buttonUseIcon":true} /--></div>
<!-- /wp:group -->