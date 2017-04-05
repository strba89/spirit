<!-- Clients Section
   ==========================================-->
<div id="tf-clients" class="text-center">
    <div class="overlay">
        <div class="container">
            <?php
            // WP_Query arguments
            $args = array(
                'post_type'              => array( 'client' ),
                'posts_per_page'         => '1',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();?>
                    <div class="section-title center">
                        <h2><?php the_title()?></h2>
                        <div class="line">
                            <hr>
                        </div>
                    </div>

            <div id="clients" class="owl-carousel owl-theme">
                <?php
                // WP_Query arguments
                $args = array(
                    'post_type'              => array( 'client' ),
                    'posts_per_page'         => '',

                );

                // The Query

                        global $post;

                        $post_id = 151;

                        $image_ids = array ();

                        if ( $galleries = get_post_galleries( $post_id, false ) ) {

                            foreach ( $galleries as $gallery ) {

                                // pull the ids from each gallery
                                if ( ! empty ( $gallery[ 'ids' ] ) ) {

                                    // merge into our final list
                                    $image_ids = array_merge( $image_ids, explode( ',', $gallery[ 'ids' ] ) );


                                }
                            }
                        }


                        $image_ids = array_unique( $image_ids );

                        $image_urls = array_map( "wp_get_attachment_url", $image_ids );


                        foreach ( $image_urls as $img ) {

                            if ( ! empty ( $gallery[ 'ids' ] ) ) {

                                echo '<div class="item">
                                        <img src="'.$img.'">
                                    </div>';

                            }
                        }

                        ?>

            </div>




                    <?php
                }
            } else {

            }

            // Restore original Post Data
            wp_reset_postdata();
            ?>



        </div>
    </div>
</div>