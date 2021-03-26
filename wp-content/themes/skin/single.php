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
            
            <!-- BrearCrumbs-->
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    $yoast_links_options    =  get_option( 'wpseo_internallinks' );
                    $yoast_bc_enabled       =  esc_attr( $yoast_links_options['breadcrumbs-enable'] );
                        if ($yoast_bc_enabled) { ?>
                        <div class="col-md-12 breadcrumb">
                            <span class="breadcrumb_heading"> <?php _e('you are here','skin'); ?></span>
                            <?php yoast_breadcrumb('<p id="breadcrumbs"> <i class="fa fa-home fa-2x"></i>','</p>'); ?>
                        </div>
                        <?php } else { ?>
                        <div class="col-md-12 breadcrumb">
                           <span class="skin_breadcrumb breadcrumb_heading"> <?php _e('you are here','skin'); ?> <i class="fa fa-home fa-2x"></i></span> 
                            <?php skin_breadcrumb();  ?>
                        </div>
                        <?php }
                    } ?>  
           <!-- BrearCrumbs-->


            <?php $title_position =   get_post_meta($post->ID, 'title-position', true);
                 if ( $title_position == 'full-width' ){?>
                <div class="title-holder">
                    <h1><?php the_title();?> </h1>
                    <?php skin_post_meta(); ?>
                </div>
            <?php }?>
            
            <div class="content-wrapper col-md-8">
                
                <?php
                /*
                 * This action hook will get the layout file selected from the theme customizer.
                */
                
                do_action('skin_single_content_area_hook'); ?>
                
            </div><!-- .content-wrapper -->
    
            <?php get_sidebar(); ?>
            
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .main-wrapper -->
    
</main>
<?php get_footer(); ?>