<!-- Home Page
    ==========================================-->
<div id="tf-home" class="text-center" style="<?php if ( 0 < count( strlen( ( $background_image_url = get_theme_mod( 'tcx_background_image' ) ) ) ) ) { ?>
        background-image: url( <?php echo $background_image_url; ?> );
<?php } // end if ?>">
    <div class="overlay">
        <div class="content">
            <h1 style="color: <?=get_theme_mod('color')?>"><?= get_theme_mod('spirit_title')?> <strong><span class="color"><?php bloginfo('name'); ?></span></strong></h1>
            <p class="lead" style="color: <?= get_theme_mod('color')?>"><?= get_theme_mod('spirit_title2')?></p>
            <a href="#tf-about" class="fa fa-angle-down page-scroll"></a>
        </div>
    </div>
</div>