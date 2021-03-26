<?php if( $paged < '2' == true ){ ?>
           
    <div class="featured_1">
        <div class="featured_area">
            <!-- Featured Slider START -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                <?php $cat_name = get_theme_mod('skin_featured_categories'); ?>
                <?php get_posts('category_name='. $cat_name .'&posts_per_page=3&ignore_sticky_posts=1'); ?>
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <div class="swiper-slide">
                    <div class="swiper_slide_image">
                       <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'skin_featured_one_thumb' ); ?>
                        </a>
                    </div>

                    <div class="swiper_slide_title_meta">
                        <div class="swiper_slide_title">
                            <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php _e('Permanent Link to','skin'); ?> <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                        </div><!-- .swiper_slide_title -->
                        <div class="swiper_slide_meta">
                            <span class="featured_one_title"><?php the_time('F jS, Y') ?></span>
                            <?php _e('by','skin');?> <span class="featured_one_author"><?php the_author(); ?></span>
                        </div><!-- .swiper_slide_meta -->
                    </div>

                    </div> <!-- .swiper-slide -->

                <?php endwhile; endif; ?>
                <?php wp_reset_postdata() ?>
                </div>
                <div class="featured_label_arrows">
                <!--Featured Label on Slider  -->
                    <div class="featured_label">
                           <?php echo esc_html( get_theme_mod('skin_featured_text',' Featured') );?>  
                    </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next fa fa-angle-right fa-2x"></div>
                <div class="swiper-button-prev fa fa-angle-left fa-2x"></div>
                </div>
            </div>
            <!-- Featured Slider END -->
        </div><!-- .featured_area -->
    </div><!-- .featured_1 -->
<?php }?>
