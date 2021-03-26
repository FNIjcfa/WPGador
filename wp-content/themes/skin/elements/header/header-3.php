<header class="header_3">
    <div class="top-header">
        <div class="container">
            <div class="row"> 

                <div class="col-md-5 col-sm-5">
                   <?php
                    // Social Icons
                    if( function_exists( 'skin_social_icons' ) ) {
                        skin_social_icons();
                    } ?>
                </div>

                <div class="col-md-7 col-sm-7 search-area">
                  <?php if ( function_exists( 'skin_logo_upload_area' ) ) {
                    echo skin_logo_upload_area();
                  }?>
                    
                    <div class="header-search"> <?php get_search_form();?> </div>
               </div> <!--  .search-area-->

            </div> 
 
        </div>
    </div>  <!--  .top-header -->
    
    <div class="menu-wrapper">
       <div class="container">
            <div class="row">
                <?php if ( has_nav_menu( 'skin_primary' )) : ?>
                    <button id="menu-toggle" class="menu-toggle">
                        <i class="fa fa-bars fa-2x"></i>
                    </button>

					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'skin_primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php _e( 'Primary Menu', 'skin' ); ?>">
								<?php
									if ( function_exists( 'skin_header_menu' ) ) : 
                                skin_header_menu();
                                endif;
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?> 
					</div><!-- .site-header-menu -->
				<?php endif; ?>
           
           
            </div>
        </div>
    </div>
        
</header>
