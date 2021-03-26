<?php
/*
 * Template Name: Full Width Page Template
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
                   
            <div class="content-wrapper col-md-12">
                
                <?php
                /*
                 * This action hook will get the layout file selected from the theme customizer.
                */
                
                do_action('skin_page_content_area_hook'); ?>
                
            </div><!-- .content-wrapper -->
                
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .main-wrapper -->
    
</main>
<?php get_footer(); ?>