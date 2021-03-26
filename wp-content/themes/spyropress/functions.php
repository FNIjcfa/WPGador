<?php
function spyropress_css() {
	$parent_style = 'specia-parent-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'spyropress-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('spyropress-default',get_stylesheet_directory_uri() .'/css/colors/default.css');
	wp_dequeue_style('specia-default');
	
	wp_dequeue_script('specia-custom-js');
	wp_enqueue_script('spyropress-custom-js', get_stylesheet_directory_uri() . '/js/custom.js');
	
	wp_dequeue_style('specia-media-query');
	wp_enqueue_style('spyropress-media-query', get_stylesheet_directory_uri() . '/css/media-query.css');
	
	wp_enqueue_style('spyropress-colors', get_stylesheet_directory_uri() . '/css/colors/default.css');

}
add_action( 'wp_enqueue_scripts', 'spyropress_css',999);
   	

function spyropress_setup()	{	
	load_child_theme_textdomain( 'spyropress', get_stylesheet_directory() . '/languages' );
	add_editor_style( array( 'css/editor-style.css', spyropress_google_font() ) );
}
add_action( 'after_setup_theme', 'spyropress_setup' );
	
/**
 * Register Google fonts for Nifty.
 */
function spyropress_google_font() {
	
    $get_fonts_url = '';
		
    $font_families = array();
 
	$font_families = array('Open Sans:300,400,600,700,800', 'Raleway:400,700');
 
        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );
 
        $get_fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return esc_url($get_fonts_url);
	
}

function spyropress_scripts_styles() {
    wp_enqueue_style( 'spyropress-fonts', spyropress_google_font(), array(), null );
}
add_action( 'wp_enqueue_scripts', 'spyropress_scripts_styles' );

require( get_stylesheet_directory() . '/inc/customize/specia-header-section.php');
require( get_stylesheet_directory() . '/inc/customize/specia-features.php');
require( get_stylesheet_directory() . '/inc/customize/spyropress-premium.php');
	
/**
 * Add WooCommerce Cart Icon With Cart Count
*/
function spyropress_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-icon" href="<?php echo esc_url( wc_get_cart_url() ); ?>"><i class='fa fa-cart-plus'></i><?php
    if ( $count > 0 ) { 
	?>
        <span class="count"><?php echo esc_html( $count ); ?></span>
	<?php            
    } else {
	?>	
		<span class="count"><?php echo "0"; ?></span>
	<?php
	}
    ?></a><?php
 
    $fragments['a.cart-icon'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'spyropress_add_to_cart_fragment' );