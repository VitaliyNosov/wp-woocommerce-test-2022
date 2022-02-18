<?php
/**
 * test-woocommerce functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package test-woocommerce
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
function test_woocommerce_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on test-woocommerce, use a find and replace
		* to change 'test-woocommerce' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'test-woocommerce', get_template_directory() . '/languages' );

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
			'header-menu' => esc_html__( 'header-menu', 'test-woocommerce' ),
		)
	);
	register_nav_menus(
		array(
			'footer-menu-one' => esc_html__( 'footer-menu-one', 'test-woocommerce' ),
		)
	);
	register_nav_menus(
		array(
			'footer-menu-two' => esc_html__( 'footer-menu-two', 'test-woocommerce' ),
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
			'test_woocommerce_custom_background_args',
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
add_action( 'after_setup_theme', 'test_woocommerce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function test_woocommerce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'test_woocommerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'test_woocommerce_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
// function test_woocommerce_widgets_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => esc_html__( 'Sidebar', 'test-woocommerce' ),
// 			'id'            => 'sidebar-1',
// 			'description'   => esc_html__( 'Add widgets here.', 'test-woocommerce' ),
// 			'before_widget' => '<section id="%1$s" class="widget %2$s">',
// 			'after_widget'  => '</section>',
// 			'before_title'  => '<h2 class="widget-title">',
// 			'after_title'   => '</h2>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'test_woocommerce_widgets_init' );

function test_woocommerce_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer-Links', 'wordpress-test-2021' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'wordpress-test-2021' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'test_woocommerce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function test_woocommerce_scripts() {
	// wp_enqueue_style( 'test-woocommerce-style', get_stylesheet_uri(), array(), _S_VERSION );
	// wp_style_add_data( 'test-woocommerce-style', 'rtl', 'replace' );
	wp_enqueue_style( 'normalize-style', get_template_directory_uri() . '/assets/style/normalize.css' );
	wp_enqueue_style( 'font-style', get_template_directory_uri() . '/assets/font/stylesheet.css' );
	wp_enqueue_style( 'bcp-style', get_template_directory_uri() . '/assets/style/bcp.css' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/style/style.css' );
	wp_deregister_script( 'jquery' );
  	wp_register_script( 'jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), _S_VERSION, true );
  	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'test-woocommerce-pickout', get_template_directory_uri() . '/js/pickout.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'test-woocommerce-popper', get_template_directory_uri() . '/js/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'test-woocommerce-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'test-woocommerce-bcp', get_template_directory_uri() . '/js/bcp.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'test-woocommerce-bcp-en', get_template_directory_uri() . '/js/bcp.en.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'test-woocommerce-common', get_template_directory_uri() . '/js/common.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'test-woocommerce-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'test_woocommerce_scripts' );



// font-awesome  cdn

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
function enqueue_load_fa() {
wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.11.2/css/all.css' );
}

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

// Фильт который отключает стили woocommerce
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

// Поключаем кастомизации плагина woocommerce
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Вывод поля для ввода купона

remove_action ( 'woocommerce_before_checkout_form' , 'woocommerce_checkout_coupon_form' ) ; 


// Раскрывающийся список колличесва товара.

function ace_quantity_input_field_args( $args, $product ) {
	if ( ! $product->is_sold_individually() ) {
		$args['min_value'] = 1;
		$args['max_value'] = 10;
		$args['step'] = 2;
	}

	return $args;
}
add_filter( 'woocommerce_quantity_input_args', 'ace_quantity_input_field_args', 10, 2 );

// Кастомная форма поиска

function true_search_form( $form ) {
    $form = '	
		<form role="search" method="get" class="search-form" action="http://woocommrce-test/">
			<label>
				<span class="screen-reader-text">Search for:</span>
				<input type="search" class="search-field" placeholder="Search …" value="" name="s">
			</label>
			<input type="submit" class="search-submit" value="">
		</form>	
	'; // в эту переменную записываем новую поисковую форму
    return $form;
}
 
add_filter( 'get_search_form', 'true_search_form' );



// woocommerce custom icons


/*
 * Shortcode for WooCommerce Cart Icon for Menu Item
 */
add_shortcode ('woocommerce_cart_icon', 'woo_cart_icon' );
function woo_cart_icon() {
    ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set variable for Cart URL
  
        echo '<li><a class="menu-item cart-contents" href="'.$cart_url.'" title="Cart">';
        
        if ( $cart_count > 0 ) {
        
            echo '<span class="cart-contents-count">'.$cart_count.'</span>';
       
        }
        
        echo '</a></li>';
        
            
    return ob_get_clean();
 
}


/*
 * Filter with AJAX When Cart Contents Update
 */

add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_icon_count' );
function woo_cart_icon_count( $fragments ) {
 
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    
    
    echo '<a class="cart-contents menu-item" href="'.$cart_url.'" title="View Cart">';
    
    if ( $cart_count > 0 ) {
        
        echo '<span class="cart-contents-count">'.$cart_count.'</span>';
                    
    }
    echo '</a>';
 
    $fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}


/*
 * Append Cart Icon Particular Menu
 */
add_filter('wp_nav_menu_items','woo_cart_icon_menu', 10, 2);
function woo_cart_icon_menu($menu, $args) {

    if($args->theme_location == 'primary') { // 'primary' is my menu ID
        $cart = do_shortcode("[woo_cart_but]");
        return $cart . $menu;
    }

    return $menu;
}


