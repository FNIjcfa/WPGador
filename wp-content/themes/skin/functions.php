<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';


add_action( 'tgmpa_register', 'skin_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function skin_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin from a GitHub repository in your theme.
		// This presumes that the plugin code is based in the root of the GitHub repository
		// and not in a subdirectory ('/src') of the repository.
	array(
			'name'      => 'Kirki',
			'slug'      => 'kirki',
			'required'  => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
			'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
			'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop(
				'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop(
				'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop(
				'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
				'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
				'theme-slug'
			), // %1$s = plugin name(s).
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'theme-slug'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'theme-slug'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'theme-slug'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

			'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

//include_once dirname( __FILE__ ) . '/toolkit/skin_toolkit.php';

// WooCommerce Support
add_action( 'after_setup_theme', 'skin_woocommerce_support' );
if ( ! function_exists( 'skin_woocommerce_support' ) ) {
    function skin_woocommerce_support() {
        add_theme_support( 'woocommerce' );
    } 
}
/*
 *  
 * @since Skin 1.0
 */
if ( ! function_exists( 'skin_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own skin_theme_setup() function to override in a child theme.
 *
 * @since Skin 1.0
 */
function skin_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory. 
	 */
	load_theme_textdomain( 'skin', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
		add_theme_support( 'title-tag' );
	
		// Add Logo Support For The Theme
		add_theme_support( 'custom-logo', array(
	   		'header-text' => array( 'site-title', 'site-description' ),
		) );

    // Add support for Custom background
    add_theme_support( 'custom-background' ); 

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 0, true );
    // Image Sizes
    add_image_size( 'skin_featured_one_thumb', 733, 390, true );
    add_image_size( 'skin_content_one_thumb', 354, 200 , true );
    add_image_size( 'skin_related_thumb', 177, 130 , true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'skin_primary' => __( 'Primary Menu', 'skin' ), 
		'skin_mobile' => __( 'Mobile Menu', 'skin' ), 
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
}
endif; // skin_theme_setup
add_action( 'after_setup_theme', 'skin_theme_setup' );


/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Skin 1.0
 */
function skin_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'skin_content_width', 733 );
}
add_action( 'after_setup_theme', 'skin_content_width', 0 );



/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Skin 1.0
 */
function skin_theme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'skin' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'skin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'skin' ),
		'id'            => 'footer-1',
		'description'   => __( 'Appears in the Footer.', 'skin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'skin' ),
		'id'            => 'footer-2',
		'description'   => __( 'Appears in the Footer.', 'skin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'skin' ),
		'id'            => 'footer-3',
		'description'   => __( 'Appears in the Footer.', 'skin' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'skin_theme_widgets_init' );


/*
 * Adding custom class in the body tag to control and style elements according to the layout.
 * 
 * @since Skin 1.0
*/
if ( ! function_exists( 'skin_add_layout_class' ) ) {
    function skin_add_layout_class( $classes ) {

    if ( esc_attr( get_theme_mod('header_style_selector', 'skin_1') ) === 'skin_1') {
        array_push( $classes, 'header-style-1' );
     }
    if ( esc_attr( get_theme_mod('header_style_selector', 'skin_1') ) === 'skin_2') {  
        array_push( $classes, 'header-style-2' );
    }
    if ( esc_attr( get_theme_mod('header_style_selector', 'skin_1') ) === 'skin_3') {  
        array_push( $classes, 'header-style-3' );
    }
    if ( esc_attr( get_theme_mod('header_style_selector', 'skin_1') ) === 'skin_4') {  
        array_push( $classes, 'header-style-4' ); 
    }
        return $classes;
    }
}
add_filter('body_class', 'skin_add_layout_class');


/*
 * Skin Custom BreadCrumb.
 * 
 * This theme also supports Yoast BreadCrumb. Once you activate Yoast BreadCrumb this breadcrumb will be deactivated automatically.
 * 
 * @since Skin 1.0
*/
if ( ! function_exists( 'skin_breadcrumb' ) ) {
	function skin_breadcrumb( $args = array() ) {
		if ( is_front_page() ) {
			return;
		} 
		global $post; 
		$defaults  = array(
			'separator_icon'      => '&gt;',
			'breadcrumbs_id'      => 'breadcrumbs',
			'breadcrumbs_classes' => 'breadcrumb-trail breadcrumbs',
			'home_title'          => __('Home','skin'),
		);
		$args      = apply_filters( 'skin_breadcrumbs_args', wp_parse_args( $args, $defaults ) );
		$separator = '<span class="separator"> ' . esc_attr( $args['separator_icon'] ) . ' </span>';
		/***** Begin Markup *****/
		// Open the breadcrumbs
		$html = '<div id="' . esc_attr( $args['breadcrumbs_id'] ) . '" class="' . esc_attr( $args['breadcrumbs_classes'] ) . '">';
		// Add Homepage link & separator (always present)
		$html .= '<span class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . esc_attr( $args['home_title'] ) . '">' . esc_attr( $args['home_title'] ) . '</a></span>';
		$html .= $separator;
		// Post
		if ( is_singular( 'post' ) ) {
			$category = get_the_category();
			$category_values = array_values( $category );
			$last_category = end( $category_values );
			$cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
			$cat_parents = explode( ',', $cat_parents );
			foreach ( $cat_parents as $parent ) {
				$html .= '<span class="item-cat">' . wp_kses( $parent, wp_kses_allowed_html( 'a' ) ) . '</span>';
				$html .= $separator;
			}
			$html .= '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . esc_attr( get_the_title() )  . '">' . esc_attr( get_the_title() )  . '</span></span>';
		} elseif ( is_singular( 'page' ) ) {
			if ( $post->post_parent ) {
				$parents = get_post_ancestors( $post->ID );
				$parents = array_reverse( $parents );
				foreach ( $parents as $parent ) {
					$html .= '<span class="item-parent item-parent-' . esc_attr( $parent ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent ) . '" href="' . esc_url( get_permalink( $parent ) ) . '" title="' . esc_attr( get_the_title( $parent ) ) . '">' . esc_attr( get_the_title( $parent ) ) . '</a></span>';
					$html .= $separator;
				}
			}
			$html .= '<span class="item-current item-' . $post->ID . '"><span title="' . esc_attr( get_the_title() ) . '"> ' . esc_attr( get_the_title() ) . '</span></span>';
		} elseif ( is_singular( 'attachment' ) ) {
			$parent_id        = $post->post_parent;
			$parent_title     = esc_attr( get_the_title( $parent_id ) );
			$parent_permalink = esc_url( get_permalink( $parent_id ) );
			$html .= '<span class="item-parent"><a class="bread-parent" href="' . esc_url( $parent_permalink ) . '" title="' . esc_attr( $parent_title ) . '">' . esc_attr( $parent_title ) . '</a></span>';
			$html .= $separator;
			$html .= '<span class="item-current item-' . $post->ID . '"><span title="' . esc_attr( get_the_title() ) . '"> ' . esc_attr( get_the_title() ) . '</span></span>';
		} elseif ( is_singular() ) {
			$post_type         = get_post_type();
			$post_type_object  = get_post_type_object( $post_type );
			$post_type_archive = get_post_type_archive_link( $post_type );
			$html .= '<span class="item-cat item-custom-post-type-' . esc_attr( $post_type ) . '"><a class="bread-cat bread-custom-post-type-' . esc_attr( $post_type ) . '" href="' . esc_url( $post_type_archive ) . '" title="' . esc_attr( $post_type_object->labels->name ) . '">' . esc_attr( $post_type_object->labels->name ) . '</a></span>';
			$html .= $separator;
			$html .= '<span class="item-current item-' . $post->ID . '"><span class="bread-current bread-' . $post->ID . '" title="' . $post->post_title . '">' . $post->post_title . '</span></span>';
		} elseif ( is_category() ) {
			$parent = get_queried_object()->category_parent;
			if ( $parent !== 0 ) {
				$parent_category = get_category( $parent );
				$category_link   = get_category_link( $parent );
				$html .= '<span class="item-parent item-parent-' . esc_attr( $parent_category->slug ) . '"><a class="bread-parent bread-parent-' . esc_attr( $parent_category->slug ) . '" href="' . esc_url( $category_link ) . '" title="' . esc_attr( $parent_category->name ) . '">' . esc_attr( $parent_category->name ) . '</a></span>';
				$html .= $separator;
			}
			$html .= '<span class="item-current item-cat"><span class="bread-current bread-cat" title="' . $post->ID . '">' . single_cat_title( '', false ) . '</span></span>';
		} elseif ( is_tag() ) {
			$html .= '<span class="item-current item-tag"><span class="bread-current bread-tag">' . single_tag_title( '', false ) . '</span></span>';
		} elseif ( is_author() ) {
			$html .= '<span class="item-current item-author"><span class="bread-current bread-author">' . get_queried_object()->display_name . '</span></span>';
		} elseif ( is_day() ) {
			$html .= '<span class="item-current item-day"><span class="bread-current bread-day">' . get_the_date() . '</span></span>';
		} elseif ( is_month() ) {
			$html .= '<span class="item-current item-month"><span class="bread-current bread-month">' . get_the_date( 'F Y' ) . '</span></span>';
		} elseif ( is_year() ) {
			$html .= '<span class="item-current item-year"><span class="bread-current bread-year">' . get_the_date( 'Y' ) . '</span></span>';
		} elseif ( is_archive() ) {
			$custom_tax_name = get_queried_object()->name;
			$html .= '<span class="item-current item-archive"><span class="bread-current bread-archive">' . esc_attr( $custom_tax_name ) . '</span></span>';
		} elseif ( is_search() ) {
			$html .= '<span class="item-current item-search"><span class="bread-current bread-search">Search results for: ' . get_search_query() . '</span></span>';
		} elseif ( is_404() ) {
			$html .= '<span>' . __( 'Error 404', 'skin' ) . '</span>';
		} elseif ( is_home() ) {
			$html .= '<span>' . esc_attr( get_the_title( get_option( 'page_for_posts' ) ) ) . '</span>';
		}
		$html .= '</div>';
		$html = apply_filters( 'skin_breadcrumbs_filter', $html );
		echo wp_kses_post( $html );
	}
}


/*
 * Skin Post Meta.
 * 
 * skin_post_meta() function was created to add meta information at the end of single posts. You can edit the function using skin_post_meta() in Child theme.
 * 
 * @since Skin 1.0
*/

if (! function_exists('skin_post_meta') ) {
    function skin_post_meta(){
        if(is_single() || is_page()) { ?>
            <div class="post-meta">
                <?php _e('published on ','skin'); the_date();

             printf( '<span class="byline">'. _x('by',' ','skin') .'<span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>', get_the_author_meta(), _x( 'Author', 'Used before post author name.', 'skin' ), esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), get_the_author() );

edit_post_link( sprintf( __( 'Edit', 'skin' )), '<span class="edit-link">', '</span>' ); ?>                

                <span class="comments-holder"><?php comments_popup_link( __('0 Comments','skin'), __('1 Comment','skin'), __('% Comment','skin')); ?> <i class="fa fa-comment"></i> </span>
                <div class="cb"></div>

            </div>
        <?php }   
    }
}


/*
 * Add Back to top feature in footer, to move smoothly to top.
 *
 * @since Skin 1.0
 */
add_action('wp_footer','skin_backtotop');
if ( ! function_exists('skin_backtotop') ) {
    function skin_backtotop(){
        echo '<a href="#" class="back-to-top"> '. __('top','skin') . ' </a>';
    }
}

/*
 * Adding Meta name="generator" in header through wp_head()
 *
 * @since Skin 1.0
 */

add_action( 'wp_head', 'skin_metaname_generator' );
function skin_metaname_generator() { 
	echo '<meta name="generator" content="Skin WP Theme" />';
}

/*
 * Including required files thought require_once() function.
 * 
 * Theme Customizer and Hooks.php files are added into the theme.
 * @since Skin 1.0
*/ 
require_once('inc/customizer.php');
require_once('inc/skin-metabox.php');
require_once('hooks.php');



/*
 * Category selector for Theme customizer. 
 * 
 * It fetches all the category names throught get_categories() and displays in select in Theme Customizer.
 * 
 * @since Skin 1.0
*/
function skin_get_all_categories_list() {
  $all_cats = get_categories();
  $results;

  $count = count($all_cats);
  for ($i=0; $i < $count; $i++) {
    if (isset($all_cats[$i]))
      $results[$all_cats[$i]->slug] = $all_cats[$i]->name;
    else
      $count++;
  }
  return $results;
}

/*
 * Enqueueing Styles and Scripts. 
 *
 * @since Skin 1.0
*/

function skin_scripts() { 
    
// Loading Styles for the theme

	// Add FontAwesome, used in the main stylesheet.
    
	wp_enqueue_style( 'skin-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array() );

	// Add BootStrap
	wp_enqueue_style( 'skin-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array() );
    
	// Add Swiper Slider Style
	wp_enqueue_style( 'skin-swiper-slider', get_template_directory_uri() . '/assets/css/swiper.min.css', array() );
    
    // Theme stylesheet.
	wp_enqueue_style( 'skin-style', get_stylesheet_uri() );
    
    // Header style
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_1') {  
	wp_enqueue_style( 'skin_header_style_1', get_template_directory_uri() . '/elements/header/header-1.css', array() );
 }
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_2') {  
	wp_enqueue_style( 'skin_header_style_2', get_template_directory_uri() . '/elements/header/header-2.css', array() );
 }
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_3') {  
	wp_enqueue_style( 'skin_header_style_3', get_template_directory_uri() . '/elements/header/header-3.css', array() );
}
    if (get_theme_mod('header_style_selector', 'skin_1') === 'skin_4') {  
	wp_enqueue_style( 'skin_header_style_4', get_template_directory_uri() . '/elements/header/header-4.css', array() );
}
    
    // Featured style

    if (get_theme_mod('featured_style_selector', 'skin_1') === 'skin_1') {  
	wp_enqueue_style( 'skin_featured_style_1', get_template_directory_uri() . '/elements/featured/featured-1.css', array() );
 }
    if (get_theme_mod('featured_style_selector', 'skin_1') === 'skin_2') {  
	wp_enqueue_style( 'skin_featured_style_2', get_template_directory_uri() . '/elements/featured/featured-2.css', array() );
 }    
    
    
    
    // Post style
if (get_theme_mod('post_area_style_selector', 'skin_1') === 'skin_1') {  
	wp_enqueue_style( 'skin_home_layout_style_1', get_template_directory_uri() . '/elements/home-layout/layout-1.css', array() );
      }
if (get_theme_mod('post_area_style_selector', 'skin_1') === 'skin_2') {  
	wp_enqueue_style( 'skin_home_layout_style_2', get_template_directory_uri() . '/elements/home-layout/layout-2.css', array() );
      }
if (get_theme_mod('post_area_style_selector', 'skin_1') === 'skin_3') { 
	wp_enqueue_style( 'skin_home_layout_style_3', get_template_directory_uri() . '/elements/home-layout/layout-3.css', array() );
    }

   
    // Adding google fonts. 
    wp_enqueue_style( 'skin-google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,300,500,700', false ); 

     
// Loading Scripts for the theme 
    
    // Loading BootStarp.min.js 
    wp_enqueue_script( 'skin-bootstrap-js', get_template_directory_uri() .'/assets/js/bootstrap.min.js', array('jquery'), 1.0, true);
    
    // Load Script for Swiper Slider
    wp_enqueue_script( 'skin-swiper-slider', get_template_directory_uri() .'/assets/js/swiper.min.js', array('jquery'), 1.0, true);

    // Load scripts.js to run custom functions
    wp_enqueue_script( 'skin-custom-js', get_template_directory_uri() .'/assets/js/custom.js', array('jquery'), 1.0, true);
    
     // Load Script only on Singular Pages where Comment Form is loaded.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'skin_scripts' );


/*
 * Adding Menu in the Header 
 *
 * @since Skin 1.0
*/

if ( ! function_exists('skin_header_menu')) {
	function skin_header_menu() {
        wp_nav_menu(array(
            'theme_location'    => 'skin_primary',
            'menu_class'        => 'primary-menu',
	        ));
	} 
}

if ( ! function_exists('skin_mobile_menu')) {
	function skin_mobile_menu() {
        wp_nav_menu(array(
            'theme_location'    => 'skin_mobile',
            'menu_class'        => 'mobile-menu',
	        ));
	} 
}

/*
 * Social Media Icons for Headers
 *
 * @since Skin 1.0
*/

if( ! function_exists( 'skin_social_icons' ) ){
    function skin_social_icons() { 
        $icon_style = get_theme_mod('skin_icon_style','icon_type_round'); ?>
	<div class="social-icons <?php echo esc_attr($icon_style); ?>">
		<ul>
			<?php if ( get_theme_mod( 'skin_twitter_on_off','0' ) == '1' ) { ?>
			    <li><a href="<?php echo esc_url( get_theme_mod( 'skin_twitter_link','#' ) );?>"><i class="fa fa-twitter fa-2x"></i></a></li>
			<?php } ?>

			<?php if ( get_theme_mod( 'skin_facebook_on_off','0' ) == '1' ) { ?>
			    <li><a href="<?php echo  esc_url( get_theme_mod( 'skin_facebook_link','#' ) );?>"><i class="fa fa-facebook fa-2x"></i></a></li> 
			<?php } ?>  
			   
			<?php if ( get_theme_mod( 'skin_instagram_on_off','0' ) == '1' ) { ?>  
			    <li><a href="<?php echo  esc_url( get_theme_mod( 'skin_instagram_link','#' ) );?>"><i class="fa fa-instagram fa-2x"></i></a></li>
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_youtube_on_off','0' ) == '1' ) { ?>
			    <li><a href="<?php echo  esc_url( get_theme_mod( 'skin_youtube_link','#' ) );?>"><i class="fa fa-youtube-play fa-2x"></i></a></li>
			<?php } ?> 
			   
			<?php if ( get_theme_mod( 'skin_linkedin_on_off','0' ) == '1' ) { ?>
			    <li><a href="<?php echo  esc_url( get_theme_mod( 'skin_linkedin_link','#' ) );?>"><i class="fa fa-linkedin fa-2x"></i></a></li>
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_pinterest_on_off','0' ) == '1' ) { ?>
			    <li><a href="<?php echo  esc_url( get_theme_mod( 'skin_pinterest_link','#' ) );?>"><i class="fa fa-pinterest fa-2x"></i></a></li>
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_google_plus_on_off','0' ) == '1' ) { ?>  
			    <li><a href="<?php echo  esc_url( get_theme_mod( 'skin_google_plus_link','#' ) );?>"><i class="fa fa-google-plus fa-2x"></i></a></li>
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_tumblr_on_off','0' ) == '1' ) { ?>      
			    <li><a href="<?php echo  esc_url( get_theme_mod( 'skin_tumblr_link','#' ) );?>"><i class="fa fa-tumblr fa-2x"></i></a></li> 
			<?php } ?> 

			<?php if ( get_theme_mod( 'skin_reddit_on_off','0' ) == '1' ) { ?>    
			    <li><a href="<?php echo  esc_url( get_theme_mod( 'skin_reddit_link','#' ) );?>"><i class="fa fa-reddit fa-2x"></i></a></li>  

			<?php } ?>     
		</ul>
	</div>        
    <?php }
}

// Add Custom Style added throught Customizer in header with the use of wp_head.
if ( ! function_exists('skin_custom_css_output') ) {
	function skin_custom_css_output() { ?>
    <style>
        <?php echo wp_filter_nohtml_kses( get_theme_mod( 'custom_css' ) ); ?>  
    </style>  
	<?php } 
}
add_action('wp_head','skin_custom_css_output');


// Using get_the_excerpt to add the custom sized excerpt content in Layout Type #1 & #3 
if ( ! function_exists('skin_excerpt_length') ) {
	function skin_excerpt_length( $limit ) {
		return wp_trim_words( get_the_excerpt(), $limit, ' ' );
	}
}


// Logo Area
if ( ! function_exists('skin_logo_upload_area') ) {
	function skin_logo_upload_area() { ?>
			<div class="logo">
				<?php
					if ( has_custom_logo() ) {
							the_custom_logo();
					} else {
						if(is_home()) { ?>
							<h1 class='site-title'>
									<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'> <?php bloginfo( 'name' ); ?></a>
							</h1>
							<p><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>' rel='home'> <?php bloginfo( 'description' ); ?></a></p>
					<?php } else { ?>
						<h2 class='site-title'>
						<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'> <?php bloginfo( 'name' ); ?></a></h2>
						<p><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>' rel='home'> <?php bloginfo( 'description' ); ?></a></p>
					<?php } 
				} ?>
			</div>
	<?php }
}
