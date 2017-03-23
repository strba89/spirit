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
//    $wp_customize->add_section( 'spirit_aboutUs_page_section' , array(
//        'title'    => __( 'About Us Page Settings', 'spirit' ),
//        'priority' => 11
//    ) );
//    $wp_customize->add_setting( 'spirit_title_aboutUs' , array(
//        'default'   => 'SOME WORDS',
//        'transport' => 'refresh',
//    ) );
//    $wp_customize->add_setting(
//        'image_aboutUs',
//        array(
//            'default'      => get_template_directory() .' /img/02.png',
//            'transport'    => 'refresh'
//        )
//    );
//    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_aboutUs', array(
//        'label'    => __( 'Title', 'spirit' ),
//        'section'  => 'spirit_aboutUs_page_section',
//        'settings' => 'spirit_title_aboutUs',
//    ) ) );
//    $wp_customize->add_control(
//        new WP_Customize_Image_Control(
//            $wp_customize,
//            'image_aboutUs',
//            array(
//                'label'    => 'About Us Page Image',
//                'settings' => 'image_aboutUs',
//                'section'  => 'spirit_aboutUs_page_section'
//            )
//        )
//    );

//    class jpen_Example_Widget extends WP_Widget {
//        /**
//         * To create the example widget all four methods will be
//         * nested inside this single instance of the WP_Widget class.
//         **/
//    }
//    public function __construct() {
//        $widget_options = array(
//            'classname' => 'example_widget',
//            'description' => 'This is an Example Widget',
//        );
//        parent::__construct( 'example_widget', 'Example Widget', $widget_options );
//    }
//    function spirit_aboutUs_widgets_init() {
//
//        register_sidebar( array(
//            'name'          => esc_html__( 'About Us Page', 'spirit-theme' ),
//            'id'            => 'aboutUs',
//            'description'   => esc_html__( 'Add widgets here.', 'spirit-theme' ),
//            'before_widget' => '<li><span class="fa fa-dot-circle-o"></span>
//                            <strong>',
//            'after_widget'  => '</strong> -',
//            'before_title'  => '<em>',
//            'after_title'   => '</em></li>',
//        ) );
//
//    }
//    add_action( 'widgets_init', 'spirit_aboutUs_widgets_init' );


}
add_action( 'customize_register', 'spirit_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function spirit_theme_customize_preview_js() {
	wp_enqueue_script( 'spirit_theme_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'spirit_theme_customize_preview_js' );
?>


