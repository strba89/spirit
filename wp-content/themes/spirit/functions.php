<?php
/**
 * spirit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package spirit
 */

if ( ! function_exists( 'spirit_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spirit_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on spirit, use a find and replace
	 * to change 'spirit' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'spirit', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header' => esc_html__( 'Header', 'spirit' ),
	) );
    register_nav_menus( array(
        'gallery_portfolio' => esc_html__( 'Portfolio Gallery', 'spirit' ),
    ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'spirit_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

}
endif;
add_action( 'after_setup_theme', 'spirit_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function spirit_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'spirit_content_width', 640 );
}
add_action( 'after_setup_theme', 'spirit_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function spirit_widgets_init() {


        register_sidebar( array(
            'name'          => esc_html__( 'Team page', 'spirit' ),
            'id'            => 'team-page',
            'description'   => esc_html__( 'Add widgets here.', 'spirit' ),
            'before_widget' => '<div class="item">',
            'after_widget'  => '</div>',


        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Services page', 'spirit' ),
            'id'            => 'services',
            'description'   => esc_html__( 'Add widgets here.', 'spirit' ),
            'before_widget' => '<div class="col-md-3 col-sm-6 service">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4><strong>',
            'after_title'   => '</strong></h4>',
            'before_body'  => '<p>',
            'after_body'   => '</p>',

        ) );
        register_sidebar( array(
            'name'          => esc_html__( 'Testimonials page', 'spirit' ),
            'id'            => 'testimonials',
            'description'   => esc_html__( 'Add widgets here.', 'spirit' ),
            'before_widget' => '<div class="item">',
            'after_widget'  => '</div>',
            'before_title'  => '<p>',
            'after_title'   => '</p>',
            'before_body'  => '<h5>',
            'after_body'   => '</h5>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Footer', 'spirit' ),
            'id'            => 'footer',
            'description'   => esc_html__( 'Add widgets here.', 'spirit' ),
            'before_widget' => '<div class="pull-right fnav"><ul class="footer-social">',
            'after_widget'  => '</ul></div>',
        ) );


}

add_action( 'widgets_init', 'spirit_widgets_init' );
/**
 * Register new Widget area and position it after the header.
 */

// Register Custom Post Type
function about_us() {

    $labels = array(
        'name'                  => _x( 'About', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'About', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'About us', 'text_domain' ),
        'name_admin_bar'        => __( 'About us', 'text_domain' ),
        'archives'              => __( 'Item Archives', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'About', 'text_domain' ),
        'description'           => __( 'Post Type Description', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', ),
        'taxonomies'            => array( ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'about', $args );

}
add_action( 'init', 'about_us', 0 );
// Register Custom Post Type
// Register Custom Post Type
function portfolio() {

    $labels = array(
        'name'                  => _x( 'Portfolio ', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Portfolio', 'text_domain' ),
        'name_admin_bar'        => __( 'Portfolio', 'text_domain' ),
        'archives'              => __( 'Portfolio', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Portfolio', 'text_domain' ),
        'description'           => __( 'Portfolio', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'post-formats', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'Portfolio', $args );

}
add_action( 'init', 'portfolio', 0 );
// Register Custom Post Type
function client() {

    $labels = array(
        'name'                  => _x( 'Client', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'client', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Client', 'text_domain' ),
        'name_admin_bar'        => __( 'Client', 'text_domain' ),
        'archives'              => __( 'Client', 'text_domain' ),
        'attributes'            => __( 'Item Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
        'all_items'             => __( 'All Items', 'text_domain' ),
        'add_new_item'          => __( 'Add New Item', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Item', 'text_domain' ),
        'edit_item'             => __( 'Edit Item', 'text_domain' ),
        'update_item'           => __( 'Update Item', 'text_domain' ),
        'view_item'             => __( 'View Item', 'text_domain' ),
        'view_items'            => __( 'View Items', 'text_domain' ),
        'search_items'          => __( 'Search Item', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
        'items_list'            => __( 'Items list', 'text_domain' ),
        'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'client', 'text_domain' ),
        'description'           => __( 'client', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor','post-formats', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'client', $args );

}
add_action( 'init', 'client', 0 );

/**
 * Enqueue scripts and styles.
 */
function spirit_scripts() {
    wp_enqueue_style('font1', "http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic");
    wp_enqueue_style('font2', "http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400");
    wp_enqueue_style('bootstrap', get_template_directory_uri() . "/style/bootstrap.css");
    wp_enqueue_style('font_awesome', get_template_directory_uri() . "/fonts/font-awesome/css/font-awesome.css");
    wp_enqueue_style('owl1', get_template_directory_uri() . "/style/owl.carousel.css");
    wp_enqueue_style('owl2', get_template_directory_uri() . "/style/owl.theme.css");
    wp_enqueue_style('style', get_template_directory_uri() . "/style/style.css?809");
    wp_enqueue_style('responsive', get_template_directory_uri() . "/style/responsive.css");



    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array(), '', true );
    wp_enqueue_script( 'maxcdn1', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', array(), '', true );
    wp_enqueue_script( 'maxcdn2' , "https://oss.maxcdn.com/respond/1.4.2/respond.min.js", [], "", true );
    wp_enqueue_script( 'jq_min' ,"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js", [], "", true );
    wp_enqueue_script( 'jq' ,get_template_directory_uri() . "/js/jquery.1.11.1.js", [], "", true );
    wp_enqueue_script( 'b' ,get_template_directory_uri() . "/js/bootstrap.js", [], "", true );
    wp_enqueue_script( 'smooth' ,get_template_directory_uri() . "/js/SmoothScroll.js", [], "", true );
    wp_enqueue_script( 'isotope' ,get_template_directory_uri() . "/js/jquery.isotope.js", [], "", true );
    wp_enqueue_script( 'carousel' ,get_template_directory_uri() . "/js/owl.carousel.js", [], "", true );
    wp_enqueue_script( 'main' ,get_template_directory_uri() . "/js/main.js", [], "", true );



    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'spirit_scripts' );

function add_menu_class($class, $args) {
    if($args->theme_location == "header"){

    return preg_replace('/<a /', '<a class="page-scroll"', $class);
    }else if( $args->theme_location == "gallery_portfolio"){


        return preg_replace('/<a /', '<a ', $class);


    }
}
add_filter('wp_nav_menu','add_menu_class', 10, 2 );


//function add_menudata($ulclass) {
//    $data = ['*','web','.photography','.app','.branding'];
//    foreach ($data as $item){
//        return preg_replace('/<a /', '<a data-filter="'. $item.'"', $ulclass);
//    }
//}
add_filter('wp_nav_menu_data','add_menudata');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
//require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';

class Features_Widget extends WP_Widget  {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'features_widget', // Base ID
            esc_html__( 'Features Widget', 'spirit' ), // Name
            array( 'description' => esc_html__( 'A text with title and icon', 'spirit' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        echo $args['before_widget'];
        echo '<i class="' .$instance['icon'] . '"></i>';
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        echo $instance['body'];
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
        $body = ! empty( $instance['body'] ) ? $instance['body'] : esc_html__( '', 'text_domain' );
        $icon = ! empty( $instance['icon'] ) ? $instance['icon'] : esc_html__( '', 'text_domain' );
        ?>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'body' ) ); ?>"><?php esc_attr_e( 'Text:', 'text_domain' ); ?></label>
            <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'body' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'body' ) ); ?>" cols="30" rows="10"><?php echo esc_attr( $body ); ?></textarea>
        </p>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php esc_attr_e( 'Icon:', 'text_domain' ); ?></label>

            <select name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" class="widefat" >
                <option value="fa fa-desktop" <?= $icon == 'fa fa-desktop' ? "selected" : ""; ?>>WEB DESIGN</option>
                <option value="fa fa-mobile" <?= $icon == 'fa fa-mobile' ? "selected" : ""; ?>>MOBILE APPS</option>
                <option value="fa fa-camera" <?= $icon == 'fa fa-camera' ? "selected" : ""; ?>>PHOTOGRAPHY</option>
                <option value="fa fa-bullhorn" <?= $icon == 'fa fa-bullhorn' ? "selected" : ""; ?>>MARKETING</option>
            </select>

        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['body'] = ( ! empty( $new_instance['body'] ) ) ? strip_tags( $new_instance['body'] ) : '';
        $instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';

        return $instance;
    }

}
class Home_Rollover_Widget extends WP_Widget
{

    public function __construct()
    {
        parent::__construct(
            'home-rollover-widget',
            'Team Widget',
            array(
                'description' => 'Team widget'
            )
        );
    }

    public function widget( $args, $instance )
    {
       echo '<div class="item">
                <div class="thumbnail">
                    <img src="'.esc_url($instance['image_uri']).'" class="img-circle team-img">
                    <div class="caption">
                        <h3>'.esc_html($instance['title']).'</h3>
                        <p>'.esc_html($instance['body']).'</p>
                        <p>'.esc_html($instance['text']).'</p>
                     </div>
                 </div>
             </div>';
    }

    public function form( $instance )
    {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
        $body = ! empty( $instance['body'] ) ? $instance['body'] : esc_html__( '', 'text_domain' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );

        // removed the for loop, you can create new instances of the widget instead
        ?>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'body' ) ); ?>"><?php esc_attr_e( 'Description:', 'text_domain' ); ?></label>
            <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'body' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'body' ) ); ?>" cols="3" rows="3"><?php echo esc_attr( $body ); ?></textarea>
        </p>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php esc_attr_e( 'Text:', 'text_domain' ); ?></label>
            <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" cols="30" rows="10"><?php echo esc_attr( $text ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>">Image</label><br />
            <input type="text" class="img" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php echo $instance['image_uri']; ?>" />
            <input type="button" class="select-img" value="Select Image" />
        </p>
        <?php
    }


}
// end class

// init the widget
add_action( 'widgets_init', create_function('', 'return register_widget("Home_Rollover_Widget");') );

// queue up the necessary js
function hrw_enqueue($hook)
{
    if( $hook != 'widgets.php' )
        return;
    wp_enqueue_style('thickbox');
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    // moved the js to an external file, you may want to change the path
    wp_enqueue_script( 'main' ,get_template_directory_uri() . "/js/img_widget_add.js", [], "", true );
}
add_action('admin_enqueue_scripts', 'hrw_enqueue');

class Testimonials_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'testimonials_widget', // Base ID
            esc_html__( 'Testimonials Widget', 'spirit' ), // Name
            array( 'description' => esc_html__( 'A text with title', 'spirit' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        echo $args['before_widget'];
        echo $instance['body'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $body = ! empty( $instance['body'] ) ? $instance['body'] : esc_html__( '', 'text_domain' );
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
        ?>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'body' ) ); ?>"><?php esc_attr_e( 'Text:', 'text_domain' ); ?></label>
            <textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'body' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'body' ) ); ?>" cols="30" rows="10"><?php echo esc_attr( $body ); ?></textarea>
        </p>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>


        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['body'] = ( ! empty( $new_instance['body'] ) ) ? strip_tags( $new_instance['body'] ) : '';
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

} // class Foo_Widget
class Icon_Widget extends WP_Widget  {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
            'icon_widget', // Base ID
            esc_html__( 'Icons Widget', 'spirit' ), // Name
            array( 'description' => esc_html__( 'icon', 'spirit' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        echo $args['before_widget'];
        echo '<li><a href="#"><i class="' .$instance['icon'] . '"></i></a></li>';
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        $icon = ! empty( $instance['icon'] ) ? $instance['icon'] : esc_html__( '', 'text_domain' );
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
        ?>

        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>

            <label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php esc_attr_e( 'Icon:', 'text_domain' ); ?></label>

            <select name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" class="widefat" >
                <option value="fa fa-facebook" <?= $icon == 'fa fa-facebook' ? "selected" : ""; ?>>facebook</option>
                <option value="fa fa-dribbble" <?= $icon == 'fa fa-dribbble' ? "selected" : ""; ?>>dribbble</option>
                <option value="fa fa-google-plus" <?= $icon == 'fa fa-google-plus' ? "selected" : ""; ?>>google plus</option>
                <option value="fa fa-twitter" <?= $icon == 'fa fa-twitter' ? "selected" : ""; ?>>twitter</option>
            </select>

        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }

}
function register_features_widget() {
    register_widget( 'Features_Widget' );
    register_widget( 'Testimonials_Widget' );
    register_widget( 'Home_Rollover_Widget' );
    register_widget( 'Icon_Widget' );

}
add_action( 'widgets_init', 'register_features_widget' );
function bullion(){
    return '<span class="fa fa-dot-circle-o"></span>';
}
add_shortcode( 'bullion', 'bullion' );
class Custom_Nav_Menu extends Walker_Nav_Menu {
    /**
     * Start the element output.
     *
     * @param  string $output Passed by reference. Used to append additional content.
     * @param  object $item   Menu item data object.
     * @param  int $depth     Depth of menu item. May be used for padding.
     * @param  array|object $args    Additional strings. Actually always an
    instance of stdClass. But this is WordPress.
     * @return void
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 )
    {
        $classes     = empty ( $item->classes ) ? array () : (array) $item->classes;

        $class_names = join(
            ' '
            ,   apply_filters(
                'nav_menu_css_class'
                ,   array_filter( $classes ), $item
            )
        );

//        ! empty ( $class_names )
//        and $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= "<li>";

        $attributes  = '';

        ! empty( $item->attr_title )
        and $attributes .= ' title="'  . esc_attr( $item->attr_title ) .'"';
        ! empty( $item->target )
        and $attributes .= ' target="' . esc_attr( $item->target     ) .'"';
        ! empty( $item->xfn )
        and $attributes .= ' rel="'    . esc_attr( $item->xfn        ) .'"';
        ! empty( $item->url )
        and $attributes .= ' href="'   . esc_attr( $item->url        ) .'"';

        // insert description for top level elements only
        // you may change this
        $description = ( ! empty ( $item->description ) and 0 == $depth )
            ? '<small class="nav_desc">' . esc_attr( $item->description ) . '</small>' : '';

        $title = apply_filters( 'the_title', $item->title, $item->ID );
        $words  = explode(' ', $title);

        $longestWordLength = 3;
        $Word = '';
        $active='';
        foreach ($words as $word) {
            if($word == 'All'){
                $Word ='*';
                $active='active';

            }else if (strlen($word) <= $longestWordLength) {
                $longestWordLength = strlen($word);
                $Word = '.'.$word;
                $active='';


            }else if ( count($words) == 1){
                $longestWordLength = strlen($word);
                $Word = '.'.$word;
                $active='';


            }

        }

        $item_output = $args->before
            . '<a href="#" data-filter="'.strtolower($Word).'" class="'.$active.'">'
            . $args->link_before
            . $title
            . '</a>'
            . $args->link_after
            . $description
            . $args->after;

        // Since $output is called by reference we don't need to return anything.
        $output .= apply_filters(
            'walker_nav_menu_start_el'
            ,   $item_output
            ,   $item
            ,   $depth
            ,   $args
        );
    }


}

function get_description($description)
{
    $args = array(
        'post_type'              => array( 'portfolio' ),
        'posts_per_page'         => '',

    );

    $query = new WP_Query( $args );

    // The Loop
    if ( $query->have_posts() ) {
        while ($query->have_posts()) {
            $query->the_post();
            global $post;
            $post_id = 149;

            $image_ids = array();
            if ($galleries = get_post_galleries($post_id, false)) {

                foreach ($galleries as $gallery) {

                    // pull the ids from each gallery
                    if (!empty ($gallery['ids'])) {

                        // merge into our final list
                        $image_ids = array_merge($image_ids, explode(',', $gallery['ids']));


                    }
                }
            }
            $image_ids = array_unique($image_ids);

            $img = array();

            foreach ($image_ids as $id) {
                $my_id = $id;
                $post_id = get_post($my_id);
                $content = $post_id->$description;
                $content = apply_filters($description, $content);
                $content = str_replace(']]>', ']]>', $content);
                $content_chars = 238;
                $modcontent = substr($content, 0, $content_chars);
                $img = array_merge($img, explode(',', $modcontent));
            }
//            print_r ( $img );

        }
    }
    return $img;
}