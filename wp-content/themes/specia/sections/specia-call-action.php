<?php 
	$specia_hs_call_actions			= get_theme_mod('hide_show_call_actions','on'); 
	$specia_call_action_btn_lbl		= get_theme_mod('call_action_button_label');
	$specia_call_action_btn_link	= get_theme_mod('call_action_button_link');
	$specia_call_action_btn_target	= get_theme_mod('call_action_button_target');
	if($specia_hs_call_actions == 'on') :
?>
<section id="specia-cta" class="call-to-action wow fadeInDown">
    <div class="background-overlay">
        <div class="container">
            <div class="row padding-top-25 padding-bottom-25">
                
                <div class="col-md-9">
					<?php 
						$specia_aboutusquery1 = new wp_query('page_id='.get_theme_mod('call_action_page',true)); 
						if( $specia_aboutusquery1->have_posts() ) 
						{   while( $specia_aboutusquery1->have_posts() ) { $specia_aboutusquery1->the_post(); 
					?>
                    <h2 class="demo1"> <?php the_title(); ?> <span class="rotate"> <?php the_content(); ?></span> </h2>
					
					<?php } } wp_reset_postdata(); ?>
                </div>
				
				<?php if($specia_call_action_btn_lbl) :?>
                <div class="col-md-3">
                    <a href="<?php echo esc_url($specia_call_action_btn_link); ?>" <?php if(($specia_call_action_btn_target)== 1){ echo "target='_blank'"; } ?> class="call-btn-1"><?php echo esc_html($specia_call_action_btn_lbl); ?></a>
                </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<?php endif; ?>
