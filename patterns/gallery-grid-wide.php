<?php
/**
 * Title: Gallery Grid Wide
 * Slug: ipsum/gallery-grid-wide
 * Categories: gallery
 * Viewport width: 1280
 * Description: The square photo grid at band width, with a text tile linking to the gallery’s Instagram.
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */

?>
<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Gallery Grid Wide', 'Name of the wide gallery grid group', 'ipsum' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"grid","minimumColumnWidth":"15rem"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Grid Unit', 'Name of the gallery text tile group', 'ipsum' ); ?>"},"className":"ratio-square","style":{"dimensions":{"minHeight":"100%"},"elements":{"link":{"color":{"text":"var:preset|color|theme-1"}}},"border":{"radius":{"topLeft":"5px","topRight":"5px","bottomLeft":"5px","bottomRight":"5px"}}},"backgroundColor":"theme-6","textColor":"theme-1","layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
<div class="wp-block-group ratio-square has-theme-1-color has-theme-6-background-color has-text-color has-background has-link-color" style="border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;min-height:100%"><!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Info Stack', 'Name of the tile info stack group', 'ipsum' ); ?>"},"className":"alignfull","style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":{"top":"0","left":"0"}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
<div class="wp-block-group alignfull" style="min-height:100%"><!-- wp:heading {"className":"alignfull","fontSize":"medium"} -->
<h2 class="wp-block-heading alignfull has-medium-font-size"><?php esc_html_e( 'Instagram', 'ipsum' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"alignfull","style":{"typography":{"textAlign":"center"}},"fontSize":"medium"} -->
<p class="has-text-align-center alignfull has-medium-font-size"><a href="#"><?php esc_html_e( '@ipsum', 'ipsum' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"alignfull"} -->
<figure class="wp-block-image size-full alignfull"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-metal-table.webp" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"alignfull"} -->
<figure class="wp-block-image size-full alignfull"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-staircase.webp" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"alignfull"} -->
<figure class="wp-block-image size-full alignfull"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-pendant-lamp.webp" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"alignfull"} -->
<figure class="wp-block-image size-full alignfull"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-polygons.webp" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"alignfull"} -->
<figure class="wp-block-image size-full alignfull"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-monobloc-front.webp" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"alignfull"} -->
<figure class="wp-block-image size-full alignfull"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-capital.webp" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"alignfull"} -->
<figure class="wp-block-image size-full alignfull"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-monobloc-back.webp" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"alignfull"} -->
<figure class="wp-block-image size-full alignfull"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-studio-closeup.webp" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"alignfull"} -->
<figure class="wp-block-image size-full alignfull"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/ipsum-lead-letter.webp" alt="" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
