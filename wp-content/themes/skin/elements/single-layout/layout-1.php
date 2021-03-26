<?php
    $image_position =   get_post_meta($post->ID, 'image-position', true);
    $title_position =   get_post_meta($post->ID, 'title-position', true);
?>

<div class="single-content-holder">
    <?php
        while ( have_posts() ) : the_post();
    if ( has_post_thumbnail() && get_theme_mod( 'skin_single_featured','1' ) == '1' ){ 
        if ( $image_position == 'default' ) { ?>
            <div class="big-featured-image">
                <?php the_post_thumbnail(); ?>
                <div class="cat-wrapper"> <?php the_category(''); ?> </div>
                <div class="clear-both"></div>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="cat-wrapper cat-no-featured"> <?php the_category(''); ?> </div>
    <?php } ?>
    <?php if ( $title_position == 'default' || $title_position == '' ){?>
        <div class="title-holder">
            <h1><?php the_title();?> </h1>
            <?php skin_post_meta(); ?>
        </div>
    <?php }?>
    
    <div class="post-content">
        <?php the_content();
        wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'skin' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span class="link_number">',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'skin' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text page-link-seperator"> , </span>',
			) );
        ?>
        <div class="cb"></div>
    </div>
    <?php endwhile ?>
</div> <!--.single-content-holder-->

<?php if ( esc_attr( get_theme_mod('skin_single_social','1') ) == '1' ) { ?> 
    <div class="share-block">
        <span class="share-this-text">
            <span> <?php _e('share ','skin'); ?> </span>
            <?php _e('this','skin');?></span>   
        <ul class="share-buttons">

            <li class="facebook_icon"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="_blank" title="Share on Facebook"><i class="fa fa-facebook"></i> <span>facebook</span></a></li>

          <li class="twitter_icon"><a href="https://twitter.com/intent/tweet?source=<?php the_permalink(); ?>&text=<?php the_title(); ?>:%20<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" title="Tweet"><i class="fa fa-twitter"></i> <span>Twitter</span> </a></li>

          <li class="gplus_icon"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" target="_blank" title="Share on Google+"><i class="fa fa-google-plus"></i></a></li>

          <li class="pinterest_icon"><a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&description=" target="_blank" title="Pin it"><i class="fa fa-pinterest"></i></a></li>

          <li class="linkedin_icon"><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&summary=&source=<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin"></i></a></li>
 
          <li class="email_icon"><a href="mailto:?subject=<?php the_title(); ?>&body=:%20<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" title="Email"><i class="fa fa-envelope"></i></a></li>

        </ul>
        <div class="cb"></div>
     </div>   <!--   .share-block-->
<?php } ?>

<?php if ( esc_attr( get_theme_mod('skin_single_author','1') ) == '1' ) { ?>
     <div class="author-area">
         <?php 
             $author_avatar_size = apply_filters( 'skin_author_avatar_size', 100 );
             $user_description = get_the_author_meta('description'); 

            printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
                get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
                _x( 'About', 'Used before post author name.', 'skin' ),
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                get_the_author()); ?>
                <div class="author-bio"><?php echo $user_description ?></div>
                <div class="cb"></div>
    </div>
<?php } ?>
     
    <?php if ( '1' === esc_attr( get_theme_mod( 'tag_on_off', '1' ) ) ) { 
          $tag = get_the_tags(); 
            if ($tag){ ?>
              <div class="single-tags">
                  <span><?php _e('Tagged as ','skin'); ?></span><?php the_tags('',' ',''); ?>
              </div>
            <?php } 
        } 

        // Previous/next post navigation.
        the_post_navigation( array(
            'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'skin' ) . '</span> ' .
                '<span class="screen-reader-text">' . __( 'Next post:', 'skin' ) . '</span> ' .
                '<span class="post-title">%title</span>',
            'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'skin' ) . '</span>  ' .
                '<span class="screen-reader-text">' . __( 'Previous post:', 'skin' ) . '</span> ' .
                '<span class="post-title">%title</span>',
        ) );
    ?>
    <div class="cb"></div>
    
<?php 
    if ( esc_attr( get_theme_mod('skin_single_related','1') )== '1' ) {    
        get_template_part('elements/single-layout/related','posts'); 
    } 
?>
     <?php 
    // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) {
            comments_template();
        } ?>
