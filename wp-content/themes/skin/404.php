<?php
/*
 * 
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
                    <section class="error-404 not-found">
                        <h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'skin' ); ?></h1>
                        
                        <div class="page-content">
                            <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'skin' ); ?></p>
                            <?php get_search_form(); ?>
                        </div><!-- .page-content -->
                        
                    </section><!-- .error-404 -->
                </div><!-- .content-wrapper -->

                <?php get_sidebar(); ?>

            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .main-wrapper -->    
</main>

<?php get_footer(); ?>