<div class="single-content-holder">
    <?php
        while ( have_posts() ) : the_post(); ?>
         
     
    
    <div class="title-holder">
        <h1><?php the_title();?> </h1>
    </div>
    
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
    
     
 <?php 
// If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) {
        comments_template();
    }