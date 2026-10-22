<?php
/**
 * Title: CTA Search
 * Slug: ipsum/cta-search
 * Categories: call-to-action
 * Viewport width: 1280
 * Description: A search invitation — a display heading over the search field.
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */

?>
<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|50","padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}},"layout":{"type":"constrained"}} --><div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><!-- wp:group {"layout":{"type":"default"}} --><div class="wp-block-group"><!-- wp:heading {"fontSize":"2-x-large"} --><h2 class="wp-block-heading has-2-x-large-font-size"><?php esc_html_e( 'Find the post you half-remember.', 'ipsum' ); ?></h2><!-- /wp:heading --><!-- wp:search {"label":<?php echo ipsum_serialize_block_attribute( esc_html__( 'Search', 'ipsum' ) ); ?>,"showLabel":false,"placeholder":<?php echo ipsum_serialize_block_attribute( __( 'A word you remember…', 'ipsum' ) ); ?>,"buttonText":<?php echo ipsum_serialize_block_attribute( esc_html__( 'Search', 'ipsum' ) ); ?>,"ariaLabel":<?php echo ipsum_serialize_block_attribute( _x( 'Posts', 'Accessible name of the search form', 'ipsum' ) ); ?>} /--></div><!-- /wp:group --></div><!-- /wp:group -->
