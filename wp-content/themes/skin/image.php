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
            <!-- BrearCrumbs-->
            <div class="col-md-12 breadcrumb">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    $yoast_links_options    =  get_option( 'wpseo_internallinks' );
                    $yoast_bc_enabled       =  esc_attr( $yoast_links_options['breadcrumbs-enable'] );
                        if ($yoast_bc_enabled) { ?>
                            <span class="breadcrumb_heading"> <?php _e('you are here','skin'); ?></span>
                            <?php yoast_breadcrumb('<p id="breadcrumbs"> <i class="fa fa-home fa-2x"></i>','</p>');
                        } else { ?>
                           <span class="skin_breadcrumb breadcrumb_heading"> <?php _e('you are here','skin'); ?> <i class="fa fa-home fa-2x"></i></span> 
                            <?php skin_breadcrumb();  
                        }
                    } ?>  
               
           </div>
           <!-- BrearCrumbs-->
            
            <div class="content-wrapper col-md-12">
<?php
    // Start the loop.
    while ( have_posts() ) : the_post(); ?>                
                    <nav id="image-navigation" class="navigation image-navigation">
                        <div class="nav-links">
                            <div class="nav-previous"><?php previous_image_link( false, __( 'Previous Image', 'skin' ) ); ?></div>
                            <div class="nav-next"><?php next_image_link( false, __( 'Next Image', 'skin' ) ); ?></div>
                        </div><!-- .nav-links -->
                    </nav><!-- .image-navigation -->
					
                    <header class="entry-header">
						<h3><?php
                              $metadata = wp_get_attachment_metadata();
                                printf( __( '<span class="meta-prep meta-prep-entry-date">Published on </span> <span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s (Full Size Image)</a> in <a href="%6$s" title="Return to %7$s" rel="gallery" class="attachment-post-title">%8$s</a>', 'skin' ),
                                  esc_attr( get_the_time() ),
                                  get_the_date(),
                                  esc_url( wp_get_attachment_url() ),
                                  $metadata['width'],
                                  $metadata['height'],
                                  esc_url( get_permalink( $post->post_parent ) ),
                                  esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
                                  esc_attr( get_the_title( $post->post_parent ) ) );
                              ?> </h3>   
					</header><!-- .entry-header -->
               <div class="attachment-container">
                    <div class="entry-attachment">
							<?php
								/**
								 * Filter the default twentysixteen image attachment size.
								 *
								 * @since Twenty Sixteen 1.0
								 *
								 * @param string $image_size Image size. Default 'large'.
								 */
								$image_size = apply_filters( 'skin_attachment_size', 'large' );

								echo wp_get_attachment_image( get_the_ID(), $image_size );
							?>

							<?php // twentysixteen_excerpt( 'entry-caption' ); ?>

						</div><!-- .entry-attachment -->
						<?php
							the_content();
							wp_link_pages( array(
								'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'skin' ) . '</span>',
								'after'       => '</div>',
								'link_before' => '<span>',
								'link_after'  => '</span>',
								'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'skin' ) . ' </span>%',
								'separator'   => '<span class="screen-reader-text">, </span>',
							) );
						?>
				</div>
				
				<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>
				
				 
<?php endwhile ?>
            </div><!-- .content-wrapper --> 
            
        </div><!-- .row -->
    </div><!-- .container -->
</div><!-- .main-wrapper -->
    
</main>
<?php get_footer(); ?>
