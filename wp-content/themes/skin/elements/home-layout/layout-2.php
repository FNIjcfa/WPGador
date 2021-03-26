<?php
/*
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
 */
?>
<div class="content_loop">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();  ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="blog_post">
                
                <div class="postmetadata">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 30 ); ?>
                <?php the_author_posts_link(); ?> <?php _e('in','skin') ?>
                    <span><?php the_category( ', ' ); ?></span> 
                </div>
                
                <?php if ( has_post_thumbnail() ) { ?>
                <div class="blog_post_img">
                     <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail('skin_featured_one_thumb' ); ?>
                    </a>
                </div>
                <?php } else { } ?>
                <h2>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','skin')?> <?php the_title_attribute(); ?>"> <?php the_title(); ?></a>
                </h2>
                
                <div class="entry">
                    <?php the_excerpt() ?>
                </div>
                
                <div class="postmetadata postmetadata_second">
                <a href="<?php the_permalink() ?>"><span><?php _e('Continue Reading','skin') ?></span></a> - <?php the_time('M j, Y') ?>  
                </div>
                
            </div><!-- .blog_post -->
    </article><!-- #post-## -->
    <?php endwhile; ?>
    
    <?php
        // Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'skin' ),
				'next_text'          => __( 'Next page', 'skin' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'skin' ) . ' </span>',
			) ); ?>    
    
    <?php else : ?>
        <h2 class="center"> <?php _e('Not Found','skin') ?></h2>
        <p class="center">
        <?php _e('Sorry, but you are looking for something that isn\'t here.','skin'); ?></p>
    <?php endif; ?>
            
</div><!-- .content_loop -->
