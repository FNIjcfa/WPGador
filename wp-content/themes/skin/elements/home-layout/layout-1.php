<?php
/*
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
 */
?>
<div class="content_loop blog-layout-1">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post();  ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('blog_post'); ?>>
                      
            <div class="post-holder">
                <div class="blog_post_img">
                    <div class="blog_post_cat"><?php the_category('  ') ?></div>
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail('skin_content_one_thumb' ); ?>
                    </a>
                </div>
                <h2>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent Link to','skin')?> <?php the_title_attribute(); ?>"> <?php the_title(); ?></a>
                </h2>

                <div class="postmetadata">
                <small><?php the_author_posts_link(); ?> - <?php the_time('M j, Y') ?></small>
                    <span><?php comments_popup_link('0', '1', '%'); ?><a href="<?php comments_link(); ?>"><i class="fa fa-comment fa-2x"></i></a></span>
                </div>


                <div class="entry">
                    <?php if ( has_post_thumbnail()){
                        echo skin_excerpt_length(30);
                    } else {
                        echo skin_excerpt_length(52); 
                    } ?>
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
