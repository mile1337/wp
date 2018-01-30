<?php
/**
 * krilnik functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package krilnik
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}

/*-----Fonts------*/

function wpb_add_google_fonts() {
 
wp_register_style( 'googleFonts', 'https://fonts.googleapis.com/css?family=Kanit:200,300,400,800&amp;subset=latin-ext' );
wp_register_style( 'googleFonts', 'https://fonts.googleapis.com/css?family=Kanit:400,700,900&subset=latin-ext' ); 
wp_enqueue_style( 'googleFonts' );
}
 
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

if ( ! function_exists( 'krilnik_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function krilnik_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on krilnik, use a find and replace
		 * to change 'krilnik' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'krilnik', get_template_directory() . '/languages' );

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
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'krilnik' ),
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'krilnik_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'krilnik_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function krilnik_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'krilnik_content_width', 640 );
}
add_action( 'after_setup_theme', 'krilnik_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function krilnik_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'krilnik' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'krilnik' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'krilnik_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function krilnik_scripts() {
	wp_enqueue_style( 'krilnik-style', get_stylesheet_uri() );
	wp_register_script('jquery', "https" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js", false, null, true);
	wp_enqueue_script( 'krilnik-scripts-vendors', get_template_directory_uri() . '/js/vendors.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'krilnik-scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), '20151215', true );
	wp_enqueue_script( 'krilnik-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'krilnik-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'krilnik_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



function categoryImages() {
	//Add fitured image support 
	add_theme_support('post-thumbnails');
	add_image_size('carousel-thumbnail', 740, 450, array('center', 'top'));
	add_image_size('news-thumbnail', 740, 450, array('center', 'top'));
}

add_action('after_setup_theme', 'categoryImages');

//wordpress default resize function

function binary_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ){
if ( !$crop ) return null;
 
$aspect_ratio = $orig_w / $orig_h;
$size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
 
$crop_w = round($new_w / $size_ratio);
$crop_h = round($new_h / $size_ratio);
 
$s_x = floor( ($orig_w - $crop_w) / 2 );
$s_y = floor( ($orig_h - $crop_h) / 2 );
 
return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}
add_filter( 'image_resize_dimensions', 'binary_thumbnail_upscale', 10, 6 );