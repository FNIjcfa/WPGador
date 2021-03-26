<?php
/* 
 *
 * @package WordPress
 * @subpackage Skin
 * @since Skin 1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'skin' ); ?></span>
		<input type="search" class="search-field" placeholder="" value="<?php echo esc_html( get_search_query() ); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'skin' ); ?>"/>
	</label>
	<button type="submit" class="search-submit"><i class="fa fa-search fa-2x"></i></button>
</form>