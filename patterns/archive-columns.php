<?php
/**
 * Title: Archive Columns
 * Slug: ipsum/archive-columns
 * Categories: posts
 * Block Types: core/query
 * Viewport width: 1280
 * Description: Featured image beside title and meta in a responsive row — the image takes a fixed width on desktop and the full width on small screens.
 */
?>
<!-- wp:query {"queryId":12,"query":{"perPage":20,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[],"excludeCurrent":null},"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-query alignwide"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"default"}} -->
<!-- wp:group {"metadata":{"name":"Media and Content"},"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
<div class="wp-block-group"><!-- wp:post-featured-image {"isLink":true,"style":{"layout":{"selfStretch":"fixed","flexSize":"300px"},"@mobile":{"layout":{"selfStretch":"fill"}},"@tablet":{"layout":{"selfStretch":"fill"}}}} /-->

<!-- wp:group {"metadata":{"name":"Title and Meta"},"style":{"layout":{"selfStretch":"fill"},"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:post-title {"isLink":true,"fontSize":"2-x-large"} /-->

<!-- wp:group {"metadata":{"name":"Date and Categories"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-date {"datetime":"2026-08-25T12:32:20.987Z","isLink":true} /-->

<!-- wp:paragraph {"metadata":{"name":"·"},"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
<p class="has-small-font-size" style="font-style:normal;font-weight:600"><?php esc_html_e('·', 'ipsum');?></p>
<!-- /wp:paragraph -->

<!-- wp:post-terms {"term":"category"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:group {"metadata":{"name":"No Results Wrapper"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:query-no-results -->
<!-- wp:paragraph -->
<p><?php esc_html_e('No posts have been published in this section yet.', 'ipsum');?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Pagination Wrapper"},"align":"wide","style":{"spacing":{"margin":{"top":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:var(--wp--preset--spacing--60)"><!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"space-between"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:group --></div>
<!-- /wp:query -->
