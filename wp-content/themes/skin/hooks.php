<?php
/*
 * We have created our custom hooks for this theme, so the theme can be flexible and extendable throught child theme.
 * For more details https://codex.wordpress.org/Plugin_API
 *
 *
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
*/


/*
 * Adding custom layout files selected in the theme customizer by the user.
 * Priority level set to 60. Higher the number, the lower the priority.
 *
 * @since Skin 1.0
*/

// get_theme_mod('featured_on_off','1');

// For Adding Featured area in HomePage
add_action('skin_index_content_area_hook','skin_featured_file_include_home', 40 );   

function skin_featured_file_include_home() {
      if ( esc_attr( get_theme_mod('home_switch_new','0') ) == '1' ) { 
          
          if ( esc_attr( get_theme_mod('featured_style_selector', 'skin_1') ) === 'skin_1') {  
              get_template_part( 'elements/featured/featured', '1' ); 
          }
          if ( esc_attr( get_theme_mod('featured_style_selector', 'skin_1') ) === 'skin_2') {  
              get_template_part( 'elements/featured/featured', '2' ); 
          }
          if ( esc_attr( get_theme_mod('featured_style_selector', 'skin_1') ) === 'skin_3') { 
              get_template_part( 'elements/featured/featured', '3' ); 
          }   
    } 
}

// For Homepage, Archive page and others
add_action('skin_index_content_area_hook','skin_template_file_include_home', 60 );   

function skin_template_file_include_home() {
          
    if ( esc_attr( get_theme_mod('post_area_style_selector', 'skin_1') ) === 'skin_1') {  
              get_template_part('elements/home-layout/layout','1');
          }
    if ( esc_attr( get_theme_mod('post_area_style_selector', 'skin_1') ) === 'skin_2') {  
              get_template_part('elements/home-layout/layout','2');
          }
    if ( esc_attr( get_theme_mod('post_area_style_selector', 'skin_1') ) === 'skin_3') { 
              get_template_part('elements/home-layout/layout','3');
          } 
    
}


// For Single/Post page.( for single.php )
add_action('skin_single_content_area_hook','skin_template_file_include_single', 60 ); 

function skin_template_file_include_single() {
    get_template_part('elements/single-layout/layout','1');
}


// For Page Content.( for page.php and template-full.php )
add_action('skin_page_content_area_hook','skin_template_file_include_page', 60 ); 

function skin_template_file_include_page() {
    get_template_part('elements/template','page-content');
}


// For Archive/Category page.( for archive.php )
add_action('skin_archive_content_area_hook','skin_template_file_include_archive', 60 );
function skin_template_file_include_archive() { 
          
    if ( esc_attr( get_theme_mod('post_area_style_selector', 'skin_1') ) === 'skin_1') {  
              get_template_part('elements/home-layout/layout','1');
          }
    if ( esc_attr( get_theme_mod('post_area_style_selector', 'skin_1') ) === 'skin_2') {  
              get_template_part('elements/home-layout/layout','2');
          }
    if ( esc_attr( get_theme_mod('post_area_style_selector', 'skin_1') ) === 'skin_3') { 
              get_template_part('elements/home-layout/layout','3');
          } 
    
}

/*
* Adding footer layouts directly to wp_footer() with the priority level set to 2, so layout files is called before Enqueue styles and scripts.
*Enqueued scripts are executed at priority level 20. Higher the number, the lower the priority.
*
* @since Skin 1.0
*/
add_action('wp_footer','skin_template_file_include_footer', 2 );
function skin_template_file_include_footer() {
              
    if ( esc_attr( get_theme_mod('footer_style_selector', 'skin_1') ) === 'skin_1') {  
              get_template_part('elements/footer/footer','1');
          }
    if ( esc_attr( get_theme_mod('footer_style_selector', 'skin_1') ) === 'skin_2') {  
              get_template_part('elements/footer/footer','2');
          }
    if ( esc_attr( get_theme_mod('footer_style_selector', 'skin_1') ) === 'skin_3') { 
             get_template_part('elements/footer/footer','3');
          } 
}
