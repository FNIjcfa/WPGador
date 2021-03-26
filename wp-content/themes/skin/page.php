<?php
/* 
 *
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
                
                <?php
                /*
                 * This action hook will get the layout file selected from the theme customizer.
                */
                
                do_action('skin_page_content_area_hook'); ?>
                
            </div><!-- .content-wrapper -->
    
            <?php get_sidebar(); ?>
            
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .main-wrapper -->
    
</main>
<?php get_footer(); ?>