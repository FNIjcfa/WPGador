<?php
function spyropress_premium_setting( $wp_customize ) {

	$wp_customize->add_section(
        'upgrade_premium',
        array(
            'title' 		=> __('Upgrade to Premium','spyropress'),
		)
    );
	
	/*=========================================
	Buttons
	=========================================*/
	
	class Spyropress_Buttons_Customize_Control extends WP_Customize_Control {
	public $type = 'upgrade_premium';

	   function render_content() {
		?>
			<div class="premium_info">
				<ul>
					<li><a href="http://demo.speciatheme.com/pro/?theme=spyropress" class="btn-green" target="_blank"><i class="dashicons dashicons-desktop info-icon"></i><?php _e( 'Premium Demo','spyropress' ); ?> </a></li>
					
					<li><a href="https://speciatheme.com/spyropress-premium/" class="btn-red" target="_blank"><i class="dashicons dashicons-cart"></i><?php _e( 'Buy Now','spyropress' ); ?> </a></li>
					
					<li><a href="http://specia.ticksy.com/" class="btn-green" target="_blank"><i class="dashicons dashicons-sos"></i><?php _e( 'Support Center','spyropress' ); ?> </a></li>
				</ul>
			</div>
			<div>
				<ul>
					<li><a href="https://docs.speciatheme.com/themes/spyropress-free/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/documentation.png"></a></li>
					
					<li><a href="https://wordpress.org/support/theme/spyropress/reviews/#new-post" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/rating.png"></a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
		$wp_customize->add_setting(
			'premium_info_buttons',
			array(
			   'capability'     => 'edit_theme_options',
			   'sanitize_callback' => 'specia_sanitize_text',
			)	
		);
	
		$wp_customize->add_control( new Spyropress_Buttons_Customize_Control( $wp_customize, 'premium_info_buttons', array(
				'section' => 'upgrade_premium',
				'setting' => 'premium_info_buttons',
			))
		);
}
add_action( 'customize_register', 'spyropress_premium_setting',999 );
?>