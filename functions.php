<?php
/**
 * Humble Associates functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Humble_Associates
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
function humble_associates_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Humble Associates, use a find and replace
		* to change 'humble-associates' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'humble-associates', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'humble-associates' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'humble-associates' ),
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
			'humble_associates_custom_background_args',
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
add_action( 'after_setup_theme', 'humble_associates_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function humble_associates_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'humble_associates_content_width', 640 );
}
add_action( 'after_setup_theme', 'humble_associates_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function humble_associates_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'humble-associates' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'humble-associates' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'humble_associates_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function humble_associates_scripts() {
    // Enqueue styles
    wp_enqueue_style('style', get_template_directory_uri() . '/style.css', '', THEME_VERSION);
    wp_style_add_data( 'humble-associates-style', 'rtl', 'replace' );
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
    wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css' );

    // Enqueue scripts
    wp_enqueue_script( 'scrollreveal', 'https://unpkg.com/scrollreveal', array(), null, true );
    wp_enqueue_script( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js', array(), null, true );
    wp_enqueue_script( 'app-js', get_template_directory_uri() . '/scripts/app.min.js', array('swiper'), null, true );

    // Additional scripts
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'humble_associates_scripts' );



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
define('THEME_VERSION', '1.0.0');

/*Google Fonts */
function add_preconnect_links() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action( 'wp_head', 'add_preconnect_links', 1 );

function enqueue_custom_styles() {
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null );
}
add_action( 'wp_enqueue_scripts', 'enqueue_custom_styles' );

/* Add default font class to body */
function add_custom_body_class($classes) {
    $classes[] = 'font-sans';
    return $classes;
}
add_filter('body_class', 'add_custom_body_class');

// Remove editor from admin
function hide_editor() {
    remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'hide_editor');


//* Add custom class to menu li
function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// ACF Options Page
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Theme Options',
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));
}	

/*Which Template Loaded */
/*
function meks_which_template_is_loaded() {
    if ( is_super_admin() ) {
        global $template;
        print_r( $template );
    }
}
 
add_action( 'wp_footer', 'meks_which_template_is_loaded' ); 
*/


function custom_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

function custom_acf_flexible_content_layout_title($title, $field, $layout, $i) {
    $section_name = get_sub_field('section_name');
    if ($section_name) {
        // Get the layout label to display with the section name
        $layout_label = $layout['label'];

        // Concatenate the section name and layout label with a hyphen in between
        $title = '<span class="acf-layout-title">' . $section_name . ' - ' . $layout_label . '</span>';
    }

    return $title;
}
add_filter('acf/fields/flexible_content/layout_title', 'custom_acf_flexible_content_layout_title', 10, 4);



  
  function add_admin_css() {
    echo '<style>
       
		 .layout[data-layout="section"], .layout[data-layout="hero_section"], .layout[data-layout="testimonials_section"], .layout[data-layout="full_width_row_with_image_column"]  {
				background-color: #9BEDFF !important;
		 }		
		 .acf-field[data-name="row"] {
			background-color: #E4FFDE !important;
		 }
		 .acf-field[data-name="columns"]  {
			background-color: #D3B683 !important;
		 }
		 .acf-field[data-name="components"]  {
			background-color: #ffd3fd !important;
		 }
        
    </style>';
}
add_action( 'admin_head', 'add_admin_css' );


// Enqueue the JavaScript file and pass the AJAX URL to the script
function my_theme_scripts() {
    wp_enqueue_script('my-script', get_template_directory_uri() . '/scripts/mailerlite.min.js', array('jquery'), '1.0', true);
    wp_localize_script('my-script', 'my_script_vars', array(
            'ajax_url' => admin_url('admin-ajax.php'),
        )
    );
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

// AJAX handler for subscribing to MailerLite
function subscribe_to_mailerlite() {
    // Sanitize and validate the form inputs
    $firstName = sanitize_text_field($_POST['firstName']);
    $lastName = sanitize_text_field($_POST['lastName']);
    $email = sanitize_email($_POST['email']);
    $marketingPermission = isset($_POST['marketingPermission']) ? sanitize_text_field($_POST['marketingPermission']) : 'no';
	$groupNumber = $_POST['groupNumber'];
	$tracking = sanitize_text_field($_POST['tracking']);

    // Check if the email is valid
    if (!is_email($email)) {
        wp_send_json_error("Invalid email address.");
    }

    $api_key = get_field('mailerlite_api_key', 'option');
    

    $subscriber_data = array(
        'email' => $email,
        'fields' => array(
            'name' => $firstName,
            'last_name' => $lastName,
            'marketing_permission' => $marketingPermission ? 'yes' : 'no', // change to match your actual field name
			'tracking' => $tracking,
        ),
    );

    $api_url = 'https://api.mailerlite.com/api/v2/groups/' . $groupNumber . '/subscribers';

    $args = array(
        'method' => 'POST',
        'headers' => array(
            'Content-Type' => 'application/json',
            'X-MailerLite-ApiKey' => $api_key,
        ),
        'body' => json_encode($subscriber_data),
    );

    $response = wp_remote_request($api_url, $args);
    
    // Get the HTTP response code from the API response
	$response_code = wp_remote_retrieve_response_code($response);

	// Check the response code
	if ($response_code >= 200 && $response_code < 300) {
		// If it's a 2xx response code, send a success message
		wp_send_json_success("You're subscribed!");
	} else {
		// If it's not a 2xx response code, send an error message
		$error_message = wp_remote_retrieve_response_message($response);
		wp_send_json_error("An error occurred. Response: " . $response_code . " - " . $error_message);
	}
    
    wp_die();
}
add_action('wp_ajax_subscribe_to_mailerlite', 'subscribe_to_mailerlite');
add_action('wp_ajax_nopriv_subscribe_to_mailerlite', 'subscribe_to_mailerlite');

function create_popup_post_type() {
    register_post_type( 'popup',
        array(
            'labels' => array(
                'name' => __( 'Popups' ),
                'singular_name' => __( 'Popup' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title' ),
            'rewrite' => array('slug' => 'popup'),
			'menu_icon' => 'dashicons-admin-post',
        )
    );
}
add_action( 'init', 'create_popup_post_type' );

