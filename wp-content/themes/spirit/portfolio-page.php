<!-- Portfolio Section
   ==========================================-->
<div id="tf-works">
    <div class="container"> <!-- Container -->
        <div class="section-title text-center center">
            <h2>Take a look at <strong>our services</strong></h2>
            <div class="line">
                <hr>
            </div>
            <div class="clearfix"></div>
            <small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>
        </div>
        <div class="space"></div>

        <div class="categories">

            <ul class="cat">
                <li class="pull-left"><h4>Filter by Type:</h4></li>
                <li class="pull-right">

                        <?php
                        $args = [
                            'theme_location'  => 'gallery_portfolio',
                            'items_wrap'      => '<ol class="type">%3$s</ol>',
                            'depth'           => 0,
                            'walker'          => new Custom_Nav_Menu
                        ];


                        wp_nav_menu($args);
                        ?>

                </li>
            </ul>
            <div class="clearfix"></div>
        </div>

        <div id="lightbox" class="row">
            <?php
            // WP_Query arguments
            $args = array(
                'post_type'              => array( 'portfolio' ),
                'posts_per_page'         => '',

            );

            // The Query
            $query = new WP_Query( $args );

            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();?>
            <?php
                    global $post;
                    $post_id = 149;

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

                    $description_url = array();
                    $img_description_and_url =array();


                    $_merge_array = array_map(function ($value) {
                        return  $value['name'];
                    }, $description_url);

                       $description_url = array( $image_urls, get_description('post_content') ,get_description('post_title') ,get_description('post_excerpt'));
                    foreach ( $image_urls as $key => $value ) {
                        $my_key = $key;

                        $_merge_array = array_column($description_url, $my_key);
                        $img_description_and_url[]= $_merge_array;





                    }

                    foreach ( $img_description_and_url as $value  ) {


                        echo '<div class="col-sm-6 col-md-3 col-lg-3 '.$value[1].' ">
                                    <div class="portfolio-item">
                                        <div class="hover-bg">
                                            <a href="#">
                                                <div class="hover-text">
                                                    <h4>'.$value[2].'</h4>
                                                    <small>'.$value[3].'</small>
                                                    <div class="clearfix"></div>
                                                    <i class="fa fa-plus"></i>
                                                </div>
                                                <img src="'.$value[0].'" class="img-responsive" alt="...">
                                            </a>
                                        </div>
                                    </div>
                                </div>';


                    }

                    ?>


                    <?php
                }
            } else {
                // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata();
            ?>

        </div>

    </div>
</div>