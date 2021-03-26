<?php
/**
 * Adds a meta box to the post editing screen
 */
function skin_title_custom_meta() {
    add_meta_box( 'skin_title_meta', __( 'Title Position', 'skin' ), 'skin_title_callback', 'post','side' );

    add_meta_box( 'skin_featured_image_position', __( 'Featured Image', 'skin' ), 'skin_featured_image_callback', 'post','side' );
}
add_action( 'add_meta_boxes', 'skin_title_custom_meta' );


/**
 * Outputs the content of the meta box for Title Position
 */
function skin_title_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'skin_title_nonce' );
    $skin_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <div class="prfx-row-content">
            <label for="meta-radio-one">
                <input type="radio" name="title-position" id="meta-radio-one" value="default"  checked="checked" <?php if ( isset ( $skin_stored_meta['title-position'] ) ) checked( $skin_stored_meta['title-position'][0], 'default' ); ?>>
                <?php _e( 'Default', 'skin' )?>
            </label>
            <label for="meta-radio-two">
                <input type="radio" name="title-position" id="meta-radio-two" value="full-width" <?php if ( isset ( $skin_stored_meta['title-position'] ) ) checked( $skin_stored_meta['title-position'][0], 'full-width' ); ?>>
                <?php _e( 'Full Width', 'skin' )?>
            </label>
        </div>
    </p>
    <?php
}

/**
 * Saves the custom meta input for Title Position
 */
function skin_title_meta_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'skin_title_nonce' ] ) && wp_verify_nonce( $_POST[ 'skin_title_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for radio buttons and saves if needed
    if( isset( $_POST[ 'title-position' ] ) ) {
        $title_position = sanitize_text_field( $_POST[ 'title-position' ] );
        update_post_meta( $post_id, 'title-position', $title_position );
    }
 
}
add_action( 'save_post', 'skin_title_meta_save' );

/**
 * Outputs the content of the meta box for Featured Image Position
 */
function skin_featured_image_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'skin_featured_image_nonce' );
    $skin_stored_meta = get_post_meta( $post->ID );
    ?>
 
    <p>
        <div class="prfx-row-content">
            <label for="image-radio-one">
                <input type="radio" name="image-position" id="image-radio-one" value="hide"  checked="checked" <?php if ( isset ( $skin_stored_meta['image-position'] ) ) checked( $skin_stored_meta['image-position'][0], 'hide' ); ?>>
                <?php _e( 'Hide', 'skin' )?> 
            </label>
            <label for="image-radio-three">
                <input type="radio" name="image-position" id="image-radio-three" value="default" <?php if ( isset ( $skin_stored_meta['image-position'] ) ) checked( $skin_stored_meta['image-position'][0], 'default' ); ?>>
                <?php _e( 'Show', 'skin' )?>
            </label>
            <label for="image-radio-two" style="display:none">
                <input type="radio" name="image-position" id="image-radio-two" value="full-width" <?php if ( isset ( $skin_stored_meta['image-position'] ) ) checked( $skin_stored_meta['image-position'][0], 'full-width' ); ?>>
                <?php _e( 'Full Width', 'skin' )?>
            </label>
        </div>
    </p>
    <?php
}

/**
 * Saves the custom meta input for Image Position
 */
function skin_featured_image_save( $post_id ) {
 
    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'skin_featured_image_nonce' ] ) && wp_verify_nonce( $_POST[ 'skin_featured_image_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
 
    // Checks for radio buttons and saves if needed
    if( isset( $_POST[ 'image-position' ] ) ) {
    $image_position = sanitize_text_field( $_POST[ 'image-position' ] );
    update_post_meta( $post_id, 'image-position', $image_position );
    }
 
}
add_action( 'save_post', 'skin_featured_image_save' );


?>
