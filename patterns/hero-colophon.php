<?php
/**
 * Title: Hero Colophon
 * Slug: ipsum/hero-colophon
 * Categories: banner, about, header
 * Block Types: core/template-part/header
 * Viewport width: 1280
 * Description: A blogger card introducing the person behind the blog — site icon, greeting, short bio and the menu.
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */
?>
<!-- wp:group {"metadata":{"name":"Hero Colophon"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:group {"metadata":{"name":"Colophon Card"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"}}},"backgroundColor":"theme-5","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-theme-5-background-color has-background" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:cover {"isUserOverlayColor":true,"contentPosition":"center center","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"0"},"border":{"radius":{"topLeft":"5px","topRight":"5px","bottomLeft":"5px","bottomRight":"5px"}},"layout":{"selfStretch":"fixedNoShrink","flexSize":"80px"},"dimensions":{"aspectRatio":"1"}},"fontSize":"small","layout":{"type":"default"}} -->
<div class="wp-block-cover has-small-font-size" style="border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:site-logo {"width":80,"style":{"color":{"duotone":"var:preset|duotone|duotone-1"}}} /--></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"name":"Colophon Text"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"},"layout":{"selfStretch":"fill","flexSize":null}},"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1,"fontSize":"2-x-large"} -->
<h1 class="wp-block-heading has-2-x-large-font-size"><?php echo esc_html__( 'Howdy, I’m Lorem', 'ipsum' ); ?></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} -->
<p style="margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html__( 'Teacher in Porto. This is where I keep my notes on books, slow mornings, and the occasional recipe that actually works.', 'ipsum' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:navigation {"overlay":"navigation-overlay","icon":"menu","style":{"spacing":{"blockGap":"var:preset|spacing|30"},"typography":{"fontStyle":"normal","fontWeight":"700"}},"fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
