<?php
/**
 * Title: Header Stick
 * Slug: ipsum/header-stick
 * Categories: header
 * Block Types: core/template-part/header
 * Viewport width: 1280
 * Description: A sticky full-width header bar with the site logo, title and navigation.
 */
?>
<!-- wp:group {"metadata":{"name":"Header Wrapper"},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|70"}},"position":{"type":"sticky","top":"0px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-bottom:var(--wp--preset--spacing--70)"><!-- wp:group {"metadata":{"name":"Header Stick"},"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"position":{"type":"sticky","top":"0px"},"shadow":"var:preset|shadow|soft","border":{"right":[],"top":[],"bottom":{"color":"var:preset|color|theme-5","width":"1px"},"left":[]}},"backgroundColor":"theme-1","textColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-theme-1-color has-theme-1-background-color has-text-color has-background" style="border-bottom-color:var(--wp--preset--color--theme-5);border-bottom-width:1px;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40);box-shadow:var(--wp--preset--shadow--soft)"><!-- wp:group {"metadata":{"name":"Header Row"},"align":"wide","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group alignwide"><!-- wp:group {"metadata":{"name":"Site Logo and Title"},"style":{"layout":{"selfStretch":"fill","flexSize":null},"spacing":{"blockGap":{"left":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:cover {"dimRatio":0,"isUserOverlayColor":true,"minHeight":48,"isDark":false,"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":{"topLeft":"5px","topRight":"5px","bottomLeft":"5px","bottomRight":"5px"}},"layout":{"selfStretch":"fixedNoShrink","flexSize":"48px"},"dimensions":{"aspectRatio":"1"}},"layout":{"type":"default"}} -->
<div class="wp-block-cover is-light" style="border-top-left-radius:5px;border-top-right-radius:5px;border-bottom-left-radius:5px;border-bottom-right-radius:5px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;min-height:48px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:site-logo {"width":48,"shouldSyncIcon":true,"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0","left":"0","right":"0"}},"color":{"duotone":"var:preset|duotone|duotone-1"}}} /--></div></div>
<!-- /wp:cover -->

<!-- wp:site-title {"level":0,"style":{"elements":{"link":{"color":{"text":"var:preset|color|theme-6"}}}},"textColor":"theme-2"} /--></div>
<!-- /wp:group -->

<!-- wp:navigation {"textColor":"theme-2","overlay":"navigation-overlay","icon":"menu","fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
