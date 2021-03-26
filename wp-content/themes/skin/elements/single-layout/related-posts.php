<div class="related-wrapper">
    <div class="related-heading"> <?php _e('related posts ','skin'); ?> </div>

    <div class="related-post-wrapper">   
        <?php $categories = get_the_category($post->ID);
            if ($categories) { $category_ids = array();
            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
            $args=array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID), 
            'showposts'=> esc_attr( get_theme_mod( 'skin_single_related_count' , '4') ) ,
            'ignore_sticky_posts'=>1,
             );
            $my_query = new WP_Query($args); if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post(); ?>

            <div class="related_post">
                <div class="related_thumb"> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('skin_related_thumb'); ?> </a>
                </div>
                <div class="related-title">
                    <a href="<?php the_permalink()?>" rel="bookmark"><?php the_title(); ?></a>
                </div>
            </div>

        <?php endwhile; } wp_reset_postdata(); } ?>
        <div class="cb"></div>
                
    </div>
</div>
