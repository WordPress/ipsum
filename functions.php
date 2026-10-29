<?php
/**
 * Ipsum functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ipsum
 * @since Ipsum 1.0
 */

// Loads style.css in the editors too, then the few overrides only the editors need.
if ( ! function_exists( 'ipsum_register_editor_styles' ) ) :
	/**
	 * Adds style.css and editor-style.css as editor stylesheets.
	 *
	 * @since Ipsum 1.0
	 *
	 * @return void
	 */
	function ipsum_register_editor_styles() {
		add_editor_style( array( 'style.css', 'assets/css/editor-style.css' ) );
	}
endif;
add_action( 'after_setup_theme', 'ipsum_register_editor_styles' );

if ( ! function_exists( 'ipsum_add_theme_support' ) ) :
	/**
	 * Adds HTML5 support for navigation widgets, so their lists render inside a
	 * nav element. Block themes already get core's other HTML5 features, and this
	 * call merges with them.
	 *
	 * @since Ipsum 1.0
	 *
	 * @return void
	 */
	function ipsum_add_theme_support() {
		add_theme_support( 'html5', array( 'navigation-widgets' ) );
	}
endif;
add_action( 'after_setup_theme', 'ipsum_add_theme_support' );

if ( ! function_exists( 'ipsum_enqueue_styles' ) ) :
	/**
	 * Enqueues styles.
	 *
	 * @since Ipsum 1.0
	 *
	 * @return void
	 */
	function ipsum_enqueue_styles() {
		// Register theme stylesheet.
		wp_register_style(
			'ipsum-style',
			get_parent_theme_file_uri( 'style.css' ),
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'ipsum-style' );
	}
endif;
add_action( 'wp_enqueue_scripts', 'ipsum_enqueue_styles' );

if ( ! function_exists( 'ipsum_comments_cta_binding' ) ) :
	/**
	 * Returns the comments call to action for the current post.
	 *
	 * @since Ipsum 1.0
	 *
	 * @param array    $source_args    Block binding source arguments.
	 * @param WP_Block $block_instance The block instance.
	 * @return string The call to action text.
	 */
	function ipsum_comments_cta_binding( $source_args, $block_instance ) {
		$post_id    = $block_instance->context['postId'] ?? get_the_ID();
		$post_title = wp_strip_all_tags( get_the_title( $post_id ) );
		$has_title  = ! empty( $post_title );

		if ( get_comments_number( $post_id ) > 0 ) {
			$text = $has_title
				? sprintf(
					/* translators: %s: Post title. */
					__( 'Join the conversation<span class="screen-reader-text"> on %s</span>', 'ipsum' ),
					esc_html( $post_title )
				)
				: __( 'Join the conversation', 'ipsum' );
		} else {
			$text = $has_title
				? sprintf(
					/* translators: %s: Post title. */
					__( 'Be the first to comment<span class="screen-reader-text"> on %s</span>', 'ipsum' ),
					esc_html( $post_title )
				)
				: __( 'Be the first to comment', 'ipsum' );
		}

		return '<a href="' . esc_url( get_comments_link( $post_id ) ) . '">' . wp_kses_post( $text ) . '</a>';
	}
endif;

if ( ! function_exists( 'ipsum_register_block_bindings' ) ) :
	/**
	 * Registers the comments call-to-action block binding source.
	 *
	 * @since Ipsum 1.0
	 *
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
	 *
	 * @param array $default_template_types The default template types.
	 * @return array The template types, with the sidebar variants added.
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

if ( ! function_exists( 'ipsum_register_pattern_categories' ) ) :
	/**
	 * Registers the pattern categories the theme's patterns use beyond core's.
	 *
	 * @since Ipsum 1.0
	 *
	 * @return void
	 */
	function ipsum_register_pattern_categories() {
		register_block_pattern_category(
			'ipsum_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'ipsum' ),
				'description' => __( 'Full page layouts, ready to be applied to a page.', 'ipsum' ),
			)
		);
	}
endif;
add_action( 'init', 'ipsum_register_pattern_categories' );

if ( ! function_exists( 'ipsum_search_aria_label_support' ) ) :
	/**
	 * Lets the Search block take an ARIA label, so its search landmark can be named.
	 *
	 * Every Search block is a search landmark, and a page can hold more than one,
	 * such as the search bar next to the search call to action, or next to the
	 * search in the navigation overlay. Repeated landmarks need unique names, but
	 * the block has no ariaLabel support of its own, so this turns on core's and
	 * the patterns set the name.
	 *
	 * @since Ipsum 1.0
	 *
	 * @param array $metadata Metadata for the block type being registered.
	 * @return array The block metadata, with ARIA label support on the Search block.
	 */
	function ipsum_search_aria_label_support( $metadata ) {
		if ( isset( $metadata['name'] ) && 'core/search' === $metadata['name'] ) {
			$metadata['supports']['ariaLabel'] = true;
		}
		return $metadata;
	}
endif;
add_filter( 'block_type_metadata', 'ipsum_search_aria_label_support' );

if ( ! function_exists( 'ipsum_register_block_styles' ) ) :
	/**
	 * Registers block style variations.
	 *
	 * The Evening code style keeps the Evening palette's literals on purpose,
	 * so the block reads as a dark slab under every style variation.
	 *
	 * Each style carries its CSS as an inline style, as the default themes do.
	 * Core prints it on the front end and in the editors, and the REST API
	 * returns it with the style.
	 *
	 * @since Ipsum 1.0
	 *
	 * @return void
	 */
	function ipsum_register_block_styles() {
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

		/*
		 * Pins the part to the bottom of the viewport, shrunk to its content at
		 * the inline end. Like the sticky header, the part's wrapper carries the
		 * stickiness, and it can only travel within the block that holds it, so
		 * the part belongs at the root of the template. The editors need an
		 * !important override too, in assets/css/editor-style.css.
		 *
		 * The search button inside a pinned part, which in the theme is the
		 * Search Bar, is quiet: Base ground, outlined; global button states take
		 * back over on hover/focus/active.
		 */
		register_block_style(
			'core/template-part',
			array(
				'name'         => 'sticky-bottom',
				'label'        => _x( 'Pinned to Bottom', 'Block style label', 'ipsum' ),
				'inline_style' => '
				.wp-block-template-part.is-style-sticky-bottom {
					position: sticky;
					inset-block-end: 0;
					z-index: 10;
					width: fit-content;
					margin-inline-start: auto;
				}

				.wp-block-template-part.is-style-sticky-bottom .wp-block-search__button.wp-element-button:not(:hover):not(:focus):not(:active) {
					background-color: var(--wp--preset--color--base);
					border: 1px dotted var(--wp--preset--color--contrast);
					color: var(--wp--preset--color--contrast);
				}',
			)
		);

		/*
		 * Post rows hover as one: hovering any visible content of a row colors
		 * the whole row, and its featured image tilts and settles. It needs each
		 * post's blocks wrapped in a single Group, as the theme's archive
		 * patterns do. Keyed on the row's child blocks because the row group's
		 * own box spans the full alignwide band.
		 */
		register_block_style(
			'core/post-template',
			array(
				'name'         => 'hover-together',
				'label'        => _x( 'Row Hover', 'Block style label', 'ipsum' ),
				'inline_style' => '
				.wp-block-post-template.is-style-hover-together .wp-block-post > .wp-block-group,
				.wp-block-post-template.is-style-hover-together .wp-block-post > .wp-block-group a {
					transition: color 0.15s ease-out;
				}

				.wp-block-post-template.is-style-hover-together .wp-block-post > .wp-block-group:has(> :hover),
				.wp-block-post-template.is-style-hover-together .wp-block-post > .wp-block-group:has(> :hover) a {
					color: var(--wp--preset--color--accent-3);
				}

				@media (prefers-reduced-motion: no-preference) {
					@keyframes tilt-settle {
						35% {
							transform: rotate(-1deg);
						}

						100% {
							transform: rotate(0deg);
						}
					}

					.wp-block-post-template.is-style-hover-together .wp-block-post > .wp-block-group:has(> :hover) .wp-block-post-featured-image img {
						animation: tilt-settle 0.5s ease-out;
					}
				}',
			)
		);

		/*
		 * Prefixes the block with the "·" meta separator. Used where neighbors
		 * render conditionally (e.g. the comment Edit link only exists for users
		 * who can edit), so the dot appears and disappears with its element
		 * instead of leaving orphan separators. Rows whose neighbors always
		 * render use a literal, translatable "·" paragraph instead. The padding
		 * carries the breathing room — literal spaces in generated content can
		 * collapse — so rows using this style need no block gap of their own.
		 * The empty alternative text after the slash keeps screen readers from
		 * announcing the dot, which is decorative. Registered per block, so each
		 * block prints only its own rule.
		 */
		foreach ( array( 'comment-edit-link', 'comment-reply-link' ) as $block ) {
			register_block_style(
				'core/' . $block,
				array(
					'name'         => 'dot-before',
					'label'        => _x( 'Dot Separator', 'Block style label', 'ipsum' ),
					'inline_style' => '
					.wp-block-' . $block . '.is-style-dot-before::before {
						content: "·" / "";
						font-weight: 600;
						padding-inline: 0.5em;
					}',
				)
			);
		}
	}
endif;
add_action( 'init', 'ipsum_register_block_styles' );
