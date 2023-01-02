<?php
/**
 * WordWise Blogs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordWise_Blogs
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wordwise_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on WordWise Blogs, use a find and replace
		* to change 'wordwise' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wordwise', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'wordwise' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'wordwise_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'wordwise_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wordwise_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wordwise_content_width', 640 );
}
add_action( 'after_setup_theme', 'wordwise_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wordwise_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'wordwise' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'wordwise' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'wordwise_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wordwise_scripts() {
	wp_enqueue_style( 'wordwise-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wordwise-style', 'rtl', 'replace' );

	wp_enqueue_script( 'wordwise-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'wordwise_scripts' );

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



function ww_enqueue_custom_styles() {
	wp_enqueue_style( 'custom-fonts', 'https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,400;0,700;0,800;0,900;1,400;1,700;1,800;1,900&display=swap', array(), '1.0.0' );
    wp_enqueue_style( 'swiper-bundle', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '1.0.0' );   
	wp_enqueue_style( 'custom-stylesheet', get_stylesheet_directory_uri() . '/assets/css/estilos.css', array(), '1.0.0' );   
	   
}

add_action( 'wp_enqueue_scripts', 'ww_enqueue_custom_styles', PHP_INT_MAX);



function ww_enqueue_custom_scripts() {

    wp_enqueue_script('swiperjs', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('ready-scripts', get_stylesheet_directory_uri() . '/assets/js/custom-scripts.js', array('jquery'), '1.0.0', true);
  }

  add_action( 'wp_enqueue_scripts', 'ww_enqueue_custom_scripts' );



//Image Sizes
add_image_size( 'thumbnail-cards', 450, 300, true );

//custom Excerpt

function custom_excerpt_length( $length ) {
	return 28;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


//register menus

function register_my_menus() {
	register_nav_menu('categories-menu',__( 'Menú Categorías' ));
  }
  add_action( 'init', 'register_my_menus' );


