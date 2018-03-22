<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'gertex2018_setup' ) ) :
	function gertex2018_setup() {
		// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'gertex2018' ),
		'social'  => __( 'Social Links Menu', 'gertex2018' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', gertex2018_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'gertex2018_setup' );

/**
 * Register widget areas and custom widgets.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function gertex2018_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__( 'Sidebar', 'gertex2018' ),
		'id' => 'sidebar',
		'description' => esc_html__( 'Add widgets here to appear in your sidebar.', 'gertex2018' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

	register_sidebar( array(
		'name' => esc_html__( 'Content Top 1', 'gertex2018' ),
		'id' => 'content-top1',
		'description' => esc_html__( 'Content Top 1.', 'gertex2018' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

	register_sidebar( array(
		'name' => esc_html__( 'Content Top 2', 'gertex2018' ),
		'id' => 'content-top2',
		'description' => esc_html__( 'Content Top 2.', 'gertex2018' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

	register_sidebar( array(
		'name' => esc_html__( 'Content Bottom.', 'gertex2018' ),
		'id' => 'content-bottom',
		'description' => esc_html__( 'Content Bottom', 'gertex2018' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-header"><h3 class="widget-title">',
		'after_title' => '</h3></div>',
	));

}
add_action( 'widgets_init', 'gertex2018_widgets_init' );

function gertex_register_script() {

	wp_enqueue_style('Bootstrap-boot', get_stylesheet_directory_uri(). '/assets/css/bootstrap.min.css');

	//wp_enqueue_style('font-awesome', get_stylesheet_directory_uri(). '/assets/css/font-awesome.min.css');

	wp_enqueue_style('style', get_stylesheet_uri());


	wp_enqueue_script( 'smljquery', get_stylesheet_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array(), '3.3.1', true);

	wp_enqueue_script( 'Popper-JS-File', get_stylesheet_directory_uri() . '/assets/js/popper.min.js', array('smljquery'), '', true);

	wp_enqueue_script( 'bootstrap',get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array(), '', true);

	//wp_enqueue_script( 'master',get_stylesheet_directory_uri() . '/assets/js/master.js', array(), '', true);

	//remove_action('wp_head', 'print_emoji_detection_script', 7);
	//remove_action('wp_print_styles', 'print_emoji_styles');

	//remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	//remove_action( 'admin_print_styles', 'print_emoji_styles' );

}

add_action( 'wp_enqueue_scripts', 'gertex_register_script' );


if ( ! function_exists( 'gertex2018_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own gertex2018_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function gertex2018_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'gertex2018' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'gertex2018' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'gertex2018' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Extras Function.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load custom nav walker https://github.com/dupkey/bs4navwalker.
 */
require get_template_directory() . '/inc/bs4navwalker.php';
