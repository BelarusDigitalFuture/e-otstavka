<?php
/**
 * Theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Clean_Commerce
 */

if ( ! function_exists( 'clean_commerce_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function clean_commerce_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'clean-commerce', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Register menu locations.
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary Menu', 'clean-commerce' ),
			'header'   => esc_html__( 'Header Menu', 'clean-commerce' ),
			'social'   => esc_html__( 'Social Menu', 'clean-commerce' ),
			'notfound' => esc_html__( '404 Menu', 'clean-commerce' ),
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
		add_theme_support( 'custom-background', apply_filters( 'clean_commerce_custom_background_args', array(
			'default-color' => 'FFFFFF',
			'default-image' => '',
		) ) );

		// Enable support for selective refresh of widgets in Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for custom logo.
		add_theme_support( 'custom-logo' );

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Enable support for WooCommerce.
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );


	}
endif;

add_action( 'after_setup_theme', 'clean_commerce_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function clean_commerce_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'clean_commerce_content_width', 640 );
}
add_action( 'after_setup_theme', 'clean_commerce_content_width', 0 );

/**
 * Register widget area.
 */
function clean_commerce_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'clean-commerce' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Primary Sidebar.', 'clean-commerce' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'clean_commerce_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function clean_commerce_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	// wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/third-party/font-awesome/css/font-awesome' . $min . '.css', '', '4.7.0' );

	// wp_enqueue_style( 'jquery-sidr', get_template_directory_uri() . '/third-party/sidr/css/jquery.sidr.dark' . $min . '.css', '', '2.2.1' );

	// wp_enqueue_style( 'jquery-slick', get_template_directory_uri() . '/third-party/slick/slick' . $min . '.css', '', '1.6.0' );

	// wp_enqueue_style( 'clean-commerce-style', get_stylesheet_uri() );

	// wp_enqueue_script( 'clean-commerce-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $min . '.js', array(), '20130115', true );

	// wp_enqueue_script( 'jquery-sidr', get_template_directory_uri() . '/third-party/sidr/js/jquery.sidr' . $min . '.js', array( 'jquery' ), '2.2.1', true );

	 // wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/third-party/slick/slick' . $min . '.js', array( 'jquery' ), '1.6.0', true );

	// wp_enqueue_script( 'clean-commerce-custom', get_template_directory_uri() . '/js/custom' . $min . '.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-3.5.1' . $min . '.js', array( 'jquery' ), '1.0.1', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/js/swiper' . $min . '.js', array( 'jquery' ), '1.0.1', true );	
	wp_enqueue_script( 'swiper-init', get_template_directory_uri() . '/js/swiper-init.js', array( 'jquery' ), '1.0.1', true );		
	wp_enqueue_script( 'jquery-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery' ), '1.0.1', true );			
	
	wp_enqueue_style( 'swiper-css', get_template_directory_uri() . '/css/swiper' . $min . '.css', array(), '1.0.0' );
	wp_enqueue_style( 'style-css', get_template_directory_uri() . '/css/style.css', array(), '1.0.0' );	
	
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'clean_commerce_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function clean_commerce_admin_scripts( $hook ) {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
		//wp_enqueue_style( 'clean-commerce-metabox', get_template_directory_uri() . '/css/metabox' . $min . '.css', '', '1.0.0' );
		//wp_enqueue_script( 'clean-commerce-custom-admin', get_template_directory_uri() . '/js/admin' . $min . '.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-tabs' ), '1.0.0', true );
	}

	if ( 'widgets.php' === $hook ) {
/*
		wp_enqueue_style( 'wp-color-picker' );
	    wp_enqueue_script( 'wp-color-picker' );
	    wp_enqueue_media();
		wp_enqueue_style( 'clean-commerce-custom-widgets-style', get_template_directory_uri() . '/css/widgets' . $min . '.css', array(), '1.0.0' );
		wp_enqueue_script( 'clean-commerce-custom-widgets', get_template_directory_uri() . '/js/widgets' . $min . '.js', array( 'jquery' ), '1.0.0', true );
*/
		
	}

}
add_action( 'admin_enqueue_scripts', 'clean_commerce_admin_scripts' );

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';


// Ajaxify cart

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment' );

function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
		<img src="<?=get_template_directory_uri();?>/img/white/cart.svg" alt="" title="">
		<div class="cart-count"><?=$woocommerce->cart->cart_contents_count;?></div>
		<div class="cart-sum"><?=$woocommerce->cart->get_cart_total();?></div>		
	</a>
		
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}

/**
 * Change a currency symbol
 */
 
add_filter('woocommerce_currency_symbol', 'change_existing_currency_symbol', 10, 2);

function change_existing_currency_symbol( $currency_symbol, $currency ) {
     switch( $currency ) {
          case 'BYN': $currency_symbol = 'р.'; break;
     }
     return $currency_symbol;
}

/**
 * Increase api limit
 */


function maximum_api_filter($query_params) {
    $query_params['per_page']["maximum"]=1000;
    $query_params['posts_per_page']["maximum"]=1000;
    return $query_params;
}
add_filter('rest_page_collection_params', 'maximum_api_filter');


/**
 * For import, disable image thumbnail generation in background 
 */

add_action( 'init', 'disable_image_regeneration_process', 5 );
function disable_image_regeneration_process() {
   add_filter( 'woocommerce_background_image_regeneration', '__return_false' );
}