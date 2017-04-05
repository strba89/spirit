<?php
/**
 * spirit-theme Theme Customizer
 *
 * @package spirit-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function spirit_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->add_section( 'spirit_homepage_section' , array(
        'title'    => __( 'Home page Settings', 'spirit' ),
        'priority' => 10
    ) );

    $wp_customize->add_setting( 'spirit_title' , array(
        'default'   => 'title',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'spirit_title2' , array(
        'default'   => 'title',
        'transport' => 'refresh',
    ) );

    $wp_customize->add_setting( 'color' , array(
        'default'   => '#e3e3e3',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting(
        'tcx_background_image',
        array(
            'default'      => get_template_directory() .' /img/01.jpg',
            'transport'    => 'refresh'
        )
    );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title', array(
        'label'    => __( 'Title_Row_1', 'spirit' ),
        'section'  => 'spirit_homepage_section',
        'settings' => 'spirit_title',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title2', array(
        'label'    => __( 'Title_Row_2', 'spirit' ),
        'section'  => 'spirit_homepage_section',
        'settings' => 'spirit_title2',
    ) ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color', array(
        'label'    => __( 'Color', 'spirit' ),
        'section'  => 'spirit_homepage_section',
        'settings' => 'color',
    ) ) );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'tcx_background_image',
            array(
                'label'    => 'Home Page Image',
                'settings' => 'tcx_background_image',
                'section'  => 'spirit_homepage_section'
            )
        )
    );




}
add_action( 'customize_register', 'spirit_theme_customize_register' );
function customize_register( WP_Customize_Manager $wp_customize ) {
    $wp_customize->add_panel( 'spirit_title' , array(
        'title'    => 'Title amd Subtitle',
        'priority' => 11,
        'capability'  => 'manage_options',


    ) );



    $wp_customize->add_section( 'about_us' , array(
        'title'    => __( 'About us', 'spirit' ),
        'priority' => 11,
        'panel' => 'spirit_title'

    ) );
    $wp_customize->add_setting( 'aboutUsTitle' , array(
        'default'   => 'Title about us',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'aboutUsSubTitle' , array(
        'default'   => 'Subtitle about us',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_aboutUs', array(
        'label'    => __( 'Title About us', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'aboutUsTitle',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'subtitle_aboutUs', array(
        'label'    => __( 'Subtitle About us', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'aboutUsSubTitle',
    ) ) );



    $wp_customize->add_section( 'spirit_title_team' , array(
        'title'    => __( 'Team', 'spirit' ),
        'priority' => 11,
        'panel' => 'spirit_title'

    ) );
    $wp_customize->add_setting( 'teamTitle' , array(
        'default'   => 'Title team',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_team', array(
        'label'    => __( 'Title Team', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'teamTitle',
    ) ) );


    $wp_customize->add_section( 'spirit_title_services' , array(
        'title'    => __( 'Services', 'spirit' ),
        'priority' => 11,
        'panel' => 'spirit_title'

    ) );
    $wp_customize->add_setting( 'servicesTitle' , array(
        'default'   => 'Title services',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'servicesText' , array(
        'default'   => 'Text services',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_services', array(
        'label'    => __( 'Title Services', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'servicesTitle',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'text_services', array(
        'label'    => __( 'Text Services', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'servicesText',
    ) ) );


    $wp_customize->add_section( 'spirit_title_client' , array(
        'title'    => __( 'Client', 'spirit' ),
        'priority' => 11,
        'panel' => 'spirit_title'

    ) );
    $wp_customize->add_setting( 'clientTitle' , array(
        'default'   => 'Title client',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_client', array(
        'label'    => __( 'Text Client', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'clientTitle',
    ) ) );




    $wp_customize->add_section( 'spirit_title_portfolio' , array(
        'title'    => __( 'Portfolio', 'spirit' ),
        'priority' => 11,
        'panel' => 'spirit_title'

    ) );
    $wp_customize->add_setting( 'portfolioTitle' , array(
        'default'   => 'Text portfolio',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'portfolioText' , array(
        'default'   => 'Text portfolio',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_portfolio', array(
        'label'    => __( 'Title Portfolio', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'portfolioTitle',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'text_portfolio', array(
        'label'    => __( 'Text Portfolio', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'portfolioText',
    ) ) );




    $wp_customize->add_section( 'spirit_title_testimonials' , array(
        'title'    => __( 'Testimonials', 'spirit' ),
        'priority' => 11,
        'panel' => 'spirit_title'

    ) );
    $wp_customize->add_setting( 'testimonialsTitle' , array(
        'default'   => 'Text testimonials',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_testimonials', array(
        'label'    => __( 'Title Testimonials', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'testimonialsTitle',
    ) ) );





    $wp_customize->add_section( 'spirit_title_contact' , array(
        'title'    => __( 'Contact', 'spirit' ),
        'priority' => 11,
        'panel' => 'spirit_title'

    ) );
    $wp_customize->add_setting( 'contactTitle' , array(
        'default'   => 'Text contact',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_setting( 'contactText' , array(
        'default'   => 'Text contact',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_contact', array(
        'label'    => __( 'Title Contact', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'contactTitle',
    ) ) );
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'text_contact', array(
        'label'    => __( 'Text Contact', 'spirit' ),
        'section'  => 'spirit_title',
        'settings' => 'contactText',
    ) ) );
}
add_action( 'customize_register', 'customize_register' );
function panel($wp_customize){

    $wp_customize->add_panel( 'spirit_title' , array(
        'title'    => 'Title amd Subtitle',
        'priority' => 11,
        'capability'  => 'manage_options',


    ) );


    $wp_customize->add_section('section',array(
        'title'=>'section',
        'priority'=>10,
        'panel'=>'spirit_title',
    ));


    $wp_customize->add_setting('setting_demo',array(
        'defaule'=>'a',
    ));


    $wp_customize->add_control('contrl_demo',array(
        'label'=>'Text',
        'type'=>'text',
        'section'=>'section',
        'settings'=>'setting_demo',
    ));}


    add_action('customize_register','panel');
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function spirit_theme_customize_preview_js() {
	wp_enqueue_script( 'spirit_theme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'spirit_theme_customize_preview_js' );

?>


