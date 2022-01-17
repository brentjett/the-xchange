<?php
function xchange_setup_theme() {
	
	/*
	 * Let WordPress manage the document title.
	 * This theme does not use a hard-coded <title> tag in the document head,
	 * WordPress will provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = 960;
	
	// Menu Locations
	register_nav_menus( [
		'top-nav'   => __( 'Top Nav Bar', 'the-xchange' ),
		'more-menu' => __( 'Ellipsis Menu', 'the-xchange' ),
	] );
	
	// Image Sizes
	add_image_size( 'square-128', 128, 128, [ 'center', 'top' ] );
	add_image_size( 'square-512', 512, 512, [ 'center', 'top' ] );
	
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 2400, 9999 );
	
	// Cleanup head of unnecessary meta tags
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
}
add_action( 'after_setup_theme', 'xchange_setup_theme' );

function xchange_enqueue() {
	$ver =  wp_get_theme()->get( 'Version' );
	$base = get_template_directory_uri();
	wp_enqueue_style( 'xchange-main', $base . '/style.css', [], $ver );
	
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_style( 'xchange-bb-ui', $base . '/css/beaver-builder-ui.css', [], $ver );
	}
	
	// Don't need block editor css on Beaver Builder pages
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {
		wp_dequeue_style( 'wp-block-library' );
	} else {
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );
	}
}
add_action( 'wp_enqueue_scripts', 'xchange_enqueue' );

function xchange_init() {
	// Load BB modules
	if ( class_exists( 'FLBuilder' ) ) {
		define( 'XCHANGE_MODULES_DIR', dirname(__FILE__) . '/modules/' );
		define( 'XCHANGE_MODULES_URL', get_template_directory_uri() . '/modules/' );
		
		require_once XCHANGE_MODULES_DIR . 'index.php';
	}
}
add_action( 'init', 'xchange_init' );
 
function xchange_name_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, [
		'square-128' => __( '128px Icon', 'the-xchange' ),
		'square-512' => __( '512px Square', 'the-xchange' ),
	] );
}
add_filter( 'image_size_names_choose', 'xchange_name_custom_image_sizes' );

function xchange_should_include_header() {
	return true;
}

function xchange_should_include_title() {
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {
		return false;
	}
	return true;
}

function xchange_filter_post_class( $classes, $additional, $post_id ) {
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {
		$classes[] = 'fl-builder-enabled';
	}
	return $classes;
}
add_filter( 'post_class', 'xchange_filter_post_class', 10, 3 );