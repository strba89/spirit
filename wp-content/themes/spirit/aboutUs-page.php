<div id="tf-about">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if( get_theme_mod( 'image_aboutUs' ) != '') { ?>
                    <img src="<?php echo get_theme_mod('image_aboutUs'); ?>" class="img-responsive">
                <?php } ?>
            </div>
            <div class="col-md-6">
                <div class="about-text">
                    <div class="section-title">
                        <h4></h4>
                        <h2><?php echo get_theme_mod('spirit_title_aboutUs'); ?><strong>about us</strong></h2>
                        <hr>
                        <div class="clearfix"></div>
                    </div>
                    <p class="intro">We love building and rebuilding brands through our  specific skills. Using colour, fonts, and illustration, we brand companies in a way they will never forget.</p>
                    <ul class="about-list">
                        <?php dynamic_sidebar('about-us') ?>
<!--                        <li>-->
<!--                            <span class="fa fa-dot-circle-o"></span>-->
<!--                            <strong>Mission</strong> - <em>We deliver uniqueness and quality</em>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <span class="fa fa-dot-circle-o"></span>-->
<!--                            <strong>Skills</strong> - <em>Delivering fast and excellent results</em>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <span class="fa fa-dot-circle-o"></span>-->
<!--                            <strong>Clients</strong> - <em>Satisfied clients thanks to our experience</em>-->
<!--                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>