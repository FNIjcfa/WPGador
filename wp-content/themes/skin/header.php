<?php
/*
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>

    </head> 

<body <?php body_class(); ?>>




<!-- Checkbox to show/hide the navigation menu -->
<input type="checkbox" name="menu" value="toggle" id="toggle">
 
<!-- navigation menu container -->
 
<div id="off-canvas-menu">
 
   <!-- Lable for #showmenu to hide the menu/uncheck the checkbox -->
   <label class="toggle" for="toggle"><i class="fa fa-2x fa-bars"></i></label>
 
   <!-- Menu content -->
 
    <nav class="menu-content">
        <?php skin_social_icons(); 
         get_search_form();?> 
        <!-- Menu Section title -->
        <span><?php _e( 'Navigate', 'skin' ); ?></span>
        <!-- Mobile Menu -->

<?php if ( has_nav_menu( 'skin_mobile' ) ) : ?>
    <nav id="offset-navigation" class="mobile-navigation" role="navigation" aria-label="<?php _e( 'Navigation Links', 'skin' ); ?>">
        <?php
        if ( function_exists( 'skin_mobile_menu' ) ) : 
        skin_mobile_menu();
        endif;
        ?>
    </nav><!-- .main-navigation -->
<?php endif; ?>
        
    </nav> 
</div>
<!-- /#menu -->

    


<?php 
    if ( esc_attr( get_theme_mod('header_style_selector', 'skin_1') ) === 'skin_1') {  
    get_template_part( 'elements/header/header', '1' ); 
 }
    if ( esc_attr( get_theme_mod('header_style_selector', 'skin_1') ) === 'skin_2') {  
    get_template_part( 'elements/header/header', '2' ); 
 }
    if ( esc_attr( get_theme_mod('header_style_selector', 'skin_1') ) === 'skin_3') {  
    get_template_part( 'elements/header/header', '3' ); 
 }
    if ( esc_attr( get_theme_mod('header_style_selector', 'skin_1') ) === 'skin_4') {  
    get_template_part( 'elements/header/header', '4' ); 
 }
?>
