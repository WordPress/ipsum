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

		/*
		 * The call to action repeats for every post in a loop, so the post
		 * title rides along as screen reader text to keep each link's
		 * accessible name unique.
		 */
		$screen_reader = '';
		$title         = get_the_title( $post_id );
		if ( '' !== $title ) {
			$screen_reader = '<span class="screen-reader-text"> ' . esc_html( sprintf(
				/* translators: %s: post title. Appended to the comments call to action for screen readers. */
				__( 'on %s', 'ipsum' ),
				$title
			) ) . '</span>';
		}

		return '<a href="' . esc_url( get_comments_link( $post_id ) ) . '">' . esc_html( $text ) . $screen_reader . '</a>';
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

if ( ! function_exists( 'ipsum_post_date_screen_reader_title' ) ) :
	/**
	 * Gives linked post dates a unique accessible name.
	 *
	 * The post date block links dates to their posts but adds no screen
	 * reader affordance, so posts published on the same day share an
	 * accessible name. The post title rides along as screen reader text
	 * inside the link.
	 *
	 * @since Ipsum 1.0
	 * @param string   $block_content The block markup.
	 * @param array    $block         The parsed block.
	 * @param WP_Block $instance      The block instance.
	 * @return string The block markup.
	 */
	function ipsum_post_date_screen_reader_title( $block_content, $block, $instance ) {
		if ( empty( $block['attrs']['isLink'] ) ) {
			return $block_content;
		}

		$post_id = $instance->context['postId'] ?? get_the_ID();
		$title   = get_the_title( $post_id );

		if ( '' === $title ) {
			return $block_content;
		}

		$screen_reader = '<span class="screen-reader-text"> ' . esc_html( $title ) . '</span>';

		return str_replace( '</a>', $screen_reader . '</a>', $block_content );
	}
endif;
add_filter( 'render_block_core/post-date', 'ipsum_post_date_screen_reader_title', 10, 3 );

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
				'name'         => 'sharp',
				'label'        => _x( 'Sharp', 'Block style label', 'ipsum' ),
				'inline_style' => '.wp-block-site-logo.is-style-sharp{border-radius:0;}',
			)
		);
	}
endif;
add_action( 'init', 'ipsum_block_styles' );
