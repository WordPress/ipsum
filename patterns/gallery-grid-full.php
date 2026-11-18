<?php
/**
 * Title: Gallery Grid Full
 * Slug: ipsum/gallery-grid-full
 * Categories: gallery
 * Viewport width: 1280
 * Description: The square photo grid at full width, with a text tile linking to the gallery’s Instagram.
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */

?>
<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Gallery Grid Full', 'Name of the full-width gallery grid group', 'ipsum' ); ?>"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:group {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"grid","minimumColumnWidth":"20rem"}} -->
<div class="wp-block-group alignwide"><!-- wp:cover {"overlayColor":"accent-3","isUserOverlayColor":true,"metadata":{"name":"<?php echo esc_html_x( 'Grid Unit', 'Name of the gallery text tile', 'ipsum' ); ?>"},"style":{"dimensions":{"aspectRatio":"1"},"border":{"radius":"5px"}},"textColor":"base","layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-base-color has-text-color" style="border-radius:5px"><span aria-hidden="true" class="wp-block-cover__background has-accent-3-background-color has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Info Stack', 'Name of the tile info stack group', 'ipsum' ); ?>"},"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":{"top":"0","left":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center","justifyContent":"center"}} -->
<div class="wp-block-group has-link-color" style="min-height:100%"><!-- wp:heading {"fontSize":"medium"} -->
<h2 class="wp-block-heading has-medium-font-size"><?php esc_html_e( 'Cover Block', 'ipsum' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size"><a href="#"><?php esc_html_e( '@ipsum', 'ipsum' ); ?></a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/ipsum-audio-panel.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'A brushed metal dial and black knobs on a pale panel.', 'Alt text for the audio panel image', 'ipsum' ); ?>" class="wp-image-32348" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/ipsum-chair-dark.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'A glossy black chair curving out of the dark.', 'Alt text for the dark chair image', 'ipsum' ); ?>" class="wp-image-32325" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/ipsum-number-27.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'The number 27 cut into a black block on a white surface.', 'Alt text for the number 27 image', 'ipsum' ); ?>" class="wp-image-32337" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/ipsum-dome-lamp.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'A white dome pendant lamp glowing in a dark room.', 'Alt text for the dome lamp image', 'ipsum' ); ?>" class="wp-image-32331" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","focalPoint":{"x":0.5,"y":1},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/ipsum-furniture.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'A black lounge chair and low table in a bright white room.', 'Alt text for the furniture image', 'ipsum' ); ?>" class="wp-image-32339" style="aspect-ratio:1;object-fit:cover;object-position:50% 100%"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/ipsum-umbrella.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'A black umbrella tilted against a white background.', 'Alt text for the umbrella image', 'ipsum' ); ?>" class="wp-image-32328" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/ipsum-dog.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'The head of a black dog in profile against white.', 'Alt text for the dog image', 'ipsum' ); ?>" class="wp-image-32333" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/ipsum-black-table.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'A black table on one thin leg, lit across a white wall.', 'Alt text for the black table image', 'ipsum' ); ?>" class="wp-image-32332" style="aspect-ratio:1;object-fit:cover"/></figure>
<!-- /wp:image -->

<!-- wp:image {"aspectRatio":"1","scale":"cover","focalPoint":{"x":0.5,"y":0},"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_parent_theme_file_uri( 'assets/images/ipsum-clock.webp' ) ); ?>" alt="<?php echo esc_attr_x( 'A round black clock and its shadow on a gray wall.', 'Alt text for the clock image', 'ipsum' ); ?>" class="wp-image-32329" style="aspect-ratio:1;object-fit:cover;object-position:50% 0%"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
