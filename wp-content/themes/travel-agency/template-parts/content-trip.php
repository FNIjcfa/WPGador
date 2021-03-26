<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Agency
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    <?php
        $meta     = get_post_meta( get_the_ID(), 'wp_travel_engine_setting', true ); 
        $code     = travel_agency_get_trip_currency_code( get_post() );
        $currency = travel_agency_get_trip_currency(); ?>
        <div class="holder">
            <div class="img-holder">
                <a href="<?php the_permalink(); ?>">
                <?php
                    if( has_post_thumbnail() ){        
                        the_post_thumbnail( 'travel-agency-blog', array( 'itemprop' => 'image' ) );        
                    }else{ 
                        travel_agency_get_fallback_svg( 'travel-agency-blog' );
                    }
                    
                    travel_agency_trip_archive_currency_symbol_options( get_the_ID(), $code, $currency );

                    if( travel_agency_is_wpte_gd_activated() && isset( $meta['group']['discount'] ) && isset( $meta['group']['traveler'] ) && ! empty( $meta['group']['traveler'] ) ){ ?>
                        <span class="group-discount"><span class="tooltip"><?php esc_html_e( 'You have group discount in this trip.', 'travel-agency' ) ?></span><?php esc_html_e( 'Group Discount', 'travel-agency' ) ?></span>
                        <?php
                    }
                ?>
                </a>
            </div>
            
            <div class="text-holder">
                <?php if( travel_agency_is_wpte_tr_activated() ){ ?>
                    <div class="star-holder">
                        <?php
                            $trip_comments = get_comments( array(
                                'post_id' => get_the_ID(),
                                'status' => 'approve',
                            ) );
                            if ( !empty( $trip_comments ) ){
                                echo '<div class="review-wrap"><div class="average-rating">';
                                $sum = 0;
                                $i = 0;
                                foreach($trip_comments as $t_comment) {
                                    $rating = get_comment_meta( $t_comment->comment_ID, 'stars', true );
                                    $sum = $sum+$rating;
                                    $i++;
                                }
                                $aggregate = $sum/$i;
                                $aggregate = round( $aggregate, 2 );

                                echo '<div id="agg-rating-' . esc_attr( get_the_ID() ) . '" class="agg-rating"></div><div class="aggregate-rating">
                                <span class="rating-star">' . floatval( $aggregate ) . '</span><span>' . absint( $i ) . '</span> '. esc_html( _nx( 'Review', 'Reviews', $i, 'reviews count', 'travel-agency' ) ) .'</div>';
                                echo '</div></div><!-- .review-wrap -->';
                            }
                        ?>  
                    </div>
                <?php } ?>       

                <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        		<div class="meta-info">
        			<?php 
                        if( ( isset( $meta['trip_duration'] ) && '' != $meta['trip_duration'] ) || ( isset( $meta['trip_duration_nights'] ) ) && '' != $meta['trip_duration_nights'] ){
                            echo '<span class="time"><i class="fa fa-clock-o"></i>'; 
                            if( $meta['trip_duration'] ) printf( esc_html__( '%s Days', 'travel-agency' ), absint( $meta['trip_duration'] ) ); 
                            if( $meta['trip_duration_nights'] ) printf( esc_html__( ' - %s Nights', 'travel-agency' ), absint( $meta['trip_duration_nights'] ) ); ;
                            echo '</span>';                                   
                        }  
                    ?>                        
        		</div>
                <?php if( travel_agency_is_wpte_tfsd_activated() ){ 
                    $starting_dates = get_post_meta( get_the_ID(), 'WTE_Fixed_Starting_Dates_setting',true );

                    if( isset( $starting_dates['departure_dates'] ) && ! empty( $starting_dates['departure_dates'] ) && isset($starting_dates['departure_dates']['sdate']) ){ ?>
                        <div class="next-trip-info">
                            <?php echo '<div class="fsd-title">'.esc_html__( 'Next Departure', 'travel-agency' ).'</div>'; ?>
                            <ul class="next-departure-list">
                                <?php
                                    $wpte_option_settings = get_option('wp_travel_engine_settings', true);
                                    $sortable_settings    = get_post_meta( get_the_ID(), 'list_serialized', true);

                                    if(!is_array($sortable_settings))
                                    {
                                      $sortable_settings = json_decode($sortable_settings);
                                    }
                                    $today = strtotime(date("Y-m-d"))*1000;
                                    $i = 0;
                                    foreach( $sortable_settings as $content )
                                    {
                                        $new_date = substr( $starting_dates['departure_dates']['sdate'][$content->id], 0, 7 );
                                        if( $today <= strtotime( $starting_dates['departure_dates']['sdate'][$content->id])*1000 )
                                        {
                                            $num = isset( $wpte_option_settings['trip_dates']['number']) ? $wpte_option_settings['trip_dates']['number']:5;
                                            if($i < $num)
                                            {
                                                if( isset( $starting_dates['departure_dates']['seats_available'][$content->id] ) )
                                                {
                                                    $remaining = isset( $starting_dates['departure_dates']['seats_available'][$content->id] ) && ! empty( $starting_dates['departure_dates']['seats_available'][$content->id] ) ?  $starting_dates['departure_dates']['seats_available'][$content->id] . ' ' . __( 'spaces left', 'travel-agency' ) : __( '0 space left', 'travel-agency' );
                                                    echo '<li><span class="left"><i class="fa fa-clock-o"></i>'. date_i18n( get_option( 'date_format' ), strtotime( $starting_dates['departure_dates']['sdate'][$content->id] ) ).'</span><span class="right">'. esc_html( $remaining) .'</span></li>';
                                                }
                                            }
                                        $i++;
                                        }
                                    }
                                ?>
                            </ul>
                        </div>
                    <?php 
                    } 
                }?>
        		<div class="btn-holder">
        			<a href="<?php the_permalink(); ?>" class="btn-more"><?php esc_html_e( 'View Detail', 'travel-agency' ); ?></a>
        		</div>
            </div><!-- .text-holder -->
        </div>
    
</article><!-- #post-<?php the_ID(); ?> -->
