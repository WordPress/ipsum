<?php
/**
 * Ipsum functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */

// Enqueues editor-style.css in the editors.
if ( ! function_exists( 'ipsum_editor_style' ) ) :
	/**
	 * Enqueues editor-style.css in the editors.
	 *
	 * @since Ipsum 1.0
	 * @return void
	 */
	function ipsum_editor_style() {
		add_editor_style( 'assets/css/editor-style.css' );
	}
endif;
add_action( 'after_setup_theme', 'ipsum_editor_style' );

if ( ! function_exists( 'ipsum_styles' ) ) :
	/**
	 * Enqueue styles.
	 *
	 * @since Ipsum 1.0
	 * @return void
	 */
	function ipsum_styles() {
		// Register theme stylesheet.
		wp_register_style(
			'ipsum-style',
			get_stylesheet_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'ipsum-style' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'ipsum_styles' );

if ( ! function_exists( 'ipsum_comments_cta_binding' ) ) :
	/**
	 * Returns the comments call to action for the current post.
	 *
	 * @since Ipsum 1.0
	 * @param array    $source_args    Block binding source arguments.
	 * @param WP_Block $block_instance The block instance.
	 * @return string The call to action text.
	 */
	function ipsum_comments_cta_binding( $source_args, $block_instance ) {
		$post_id = $block_instance->context['postId'] ?? get_the_ID();

		if ( get_comments_number( $post_id ) > 0 ) {
			$text = __( 'Join the conversation', 'ipsum' );
		} else {
			$text = __( 'Be the first to comment', 'ipsum' );
		}

		return '<a href="' . esc_url( get_comments_link( $post_id ) ) . '">' . esc_html( $text ) . '</a>';
	}
endif;

if ( ! function_exists( 'ipsum_register_block_bindings' ) ) :
	/**
	 * Registers the comments call-to-action block binding source.
	 *
	 * @since Ipsum 1.0
	 * @return void
	 */
	function ipsum_register_block_bindings() {
		register_block_bindings_source(
			'ipsum/comments-cta',
			array(
				'label'              => __( 'Comments call to action', 'ipsum' ),
				'get_value_callback' => 'ipsum_comments_cta_binding',
				'uses_context'       => array( 'postId' ),
			)
		);
	}
endif;
add_action( 'init', 'ipsum_register_block_bindings' );

if ( ! function_exists( 'ipsum_sidebar_template_types' ) ) :
	/**
	 * Registers the sidebar template variants as template types, so they are
	 * listed with proper titles and descriptions in the Site Editor.
	 *
	 * @since Ipsum 1.0
	 * @param array $default_template_types The default template types.
	 * @return array
	 */
	function ipsum_sidebar_template_types( $default_template_types ) {
		$default_template_types['index-sidebar']   = array(
			'title'       => _x( 'Index Sidebar', 'Template name', 'ipsum' ),
			'description' => __( 'Displays the latest posts beside a sidebar with categories and recent posts.', 'ipsum' ),
		);
		$default_template_types['archive-sidebar'] = array(
			'title'       => _x( 'All Archives Sidebar', 'Template name', 'ipsum' ),
			'description' => __( 'Displays post archives beside a sidebar with categories and recent posts.', 'ipsum' ),
		);
		return $default_template_types;
	}
endif;
add_filter( 'default_template_types', 'ipsum_sidebar_template_types' );

if ( ! function_exists( 'ipsum_block_styles' ) ) :
	/**
	 * Registers block style variations.
	 *
	 * The Evening code style keeps the Evening palette's literals on purpose,
	 * so the block reads as a dark slab under every style variation.
	 *
	 * @since Ipsum 1.0
	 * @return void
	 */
	function ipsum_block_styles() {
		register_block_style(
			'core/code',
			array(
				'name'         => 'evening',
				'label'        => _x( 'Evening', 'Block style label', 'ipsum' ),
				'inline_style' => '.wp-block-code.is-style-evening{background-color:#000000;color:#fafafa;border-color:#fafafa40;}',
			)
		);

		register_block_style(
			'core/site-logo',
			array(
				'name'         => 'tile',
				'label'        => _x( 'Tile', 'Block style label', 'ipsum' ),
				'inline_style' => '.wp-block-site-logo.is-style-tile{border-radius:5px;}',
			)
		);
	}
endif;
add_action( 'init', 'ipsum_block_styles' );
