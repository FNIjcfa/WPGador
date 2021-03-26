<?php
/* 
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
 */
get_header(); ?>
<main>

<div class="main-wrapper">
    <div class="container content-holder">
        <div class="row">
            
            <div class="content-wrapper col-md-8">
                <header class="page-header">
                    <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'skin' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
                </header><!-- .page-header -->
              
               <?php
                /*
                 * This action hook will get the layout file selected from the theme customizer. For more details check hooks.php
                 *
                 * @since Skin 1.0
                */
                
                do_action('skin_archive_content_area_hook'); ?>

            </div><!-- .content-wrapper -->
    
            <?php get_sidebar(); ?>
            
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .main-wrapper -->
    
</main>
<?php get_footer(); ?>