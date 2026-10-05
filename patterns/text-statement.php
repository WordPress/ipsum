<?php
/**
 * Title: Text Statement
 * Slug: ipsum/text-statement
 * Categories: text
 * Viewport width: 1280
 * Description: A one-line statement on the toast card — the opening quotation mark on top, centered, with room for a single link.
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */

?>
<!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Text Statement Small', 'Name of the Text Statement Small element', 'ipsum' ); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40)"><!-- wp:group {"metadata":{"name":"<?php echo esc_html_x( 'Text Statement Small Wrapper', 'Name of the Text Statement Small Wrapper element', 'ipsum' ); ?>"},"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|40","right":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|30"},"elements":{"link":{"color":{"text":"var:preset|color|theme-1"}}},"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"}}},"backgroundColor":"theme-6","textColor":"theme-1","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-theme-1-color has-theme-6-background-color has-text-color has-background has-link-color" style="border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--40)"><!-- wp:heading {"className":"pre-quote pre-quote-current pre-quote-current","level":1,"style":{"typography":{"textAlign":"center"}},"fontSize":"x-large"} -->
<h1 class="pre-quote pre-quote-current wp-block-heading has-text-align-center has-x-large-font-size"><?php echo wp_kses_post( __( 'I teach and write about books, slow mornings, and the occasional recipe that actually works—start with the <a href="#">essays</a>.', 'ipsum' ) ); ?></h1>
<!-- /wp:heading --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
