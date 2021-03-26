<footer>
    <?php if ( is_active_sidebar( 'footer-1' )  ) : ?>
    <div class="main-footer">
        <div class="container">
            <div class="row">

            <div class="col-md-4 col-sm-4">
                <?php if ( is_active_sidebar( 'footer-1' )  ) : ?>
                    <aside id="secondary" class="sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer-1' ); ?>
                    </aside><!-- .sidebar .widget-area -->
                <?php endif; ?>
            </div><!-- .sidebar-wrapper -->


            <div class="col-md-4 col-sm-4">
                <?php if ( is_active_sidebar( 'footer-2' )  ) : ?>
                    <aside id="secondary" class="sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer-2' ); ?>
                    </aside><!-- .sidebar .widget-area -->
                <?php endif; ?>
            </div><!-- .sidebar-wrapper -->


            <div class="col-md-4 col-sm-4">
                <?php if ( is_active_sidebar( 'footer-3' )  ) : ?>
                    <aside id="secondary" class="sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'footer-3' ); ?>
                    </aside><!-- .sidebar .widget-area -->
                <?php endif; ?>
            </div><!-- .sidebar-wrapper -->

           </div>
       </div>
    </div>
    <?php endif; ?>

    <div class="sub-footer">
        <div class="container">
            <div class="row">
            <div class="col-md-8 col-xs-8">
                <p><?php echo esc_html( get_theme_mod( 'footer_copyright','' ) ) ; ?></p>
            </div>
            <div class="col-md-4 col-xs-4 footer-credit">
                <?php $skin_url = 'https://www.mhthemes.com/themes/mh/skin/'; ?>
                <p> <?php _e('Powered by','skin')?> <a href="<?php echo esc_url( $skin_url ) ?>" title="Skin WordPress Theme" target="_blank" rel="nofollow"><?php _e('Skin','skin')?></a></p>
            </div>
           </div>
       </div>

    </div>

</footer>
