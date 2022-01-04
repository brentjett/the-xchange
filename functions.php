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
}
add_action( 'after_setup_theme', 'xchange_setup_theme' );


function xchange_enqueue() {
	$ver =  wp_get_theme()->get( 'Version' );
	$base = get_template_directory_uri();
	wp_enqueue_style( 'xchange-main', $base . '/style.css', [], $ver );
	
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {
		wp_enqueue_style( 'xchange-bb-ui', $base . '/css/beaver-builder-ui.css', [], $ver );
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