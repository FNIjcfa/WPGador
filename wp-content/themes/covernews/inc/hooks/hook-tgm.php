<?php
/**
 * Recommended plugins
 *
 * @package CoverNews
 */

if ( ! function_exists( 'covernews_recommended_plugins' ) ) :

    /**
     * Recommend plugins.
     *
     * @since 1.0.0
     */
    function covernews_recommended_plugins() {

        $plugins = array(
            array(
                'name'     => esc_html__( 'Blockspare - Beautiful Page Building Blocks for WordPress', 'covernews' ),
                'slug'     => 'blockspare',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'WP Post Author', 'covernews' ),
                'slug'     => 'wp-post-author',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'One Click Demo Import', 'covernews' ),
                'slug'     => 'one-click-demo-import',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Smush Image Compression and Optimization', 'covernews' ),
                'slug'     => 'wp-smushit',
                'required' => false,
            ),
            array(
                'name'     => esc_html__( 'Contact Form, Drag and Drop Form Builder for WordPress - Everest Forms', 'covernews' ),
                'slug'     => 'everest-forms',
                'required' => false,
            ),
        );

        tgmpa( $plugins );

    }

endif;

add_action( 'tgmpa_register', 'covernews_recommended_plugins' );
