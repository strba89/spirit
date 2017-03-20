<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...

	<?php $header_image = get_header_image();
	if ( ! empty( $header_image ) ) { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" />
		</a>
	<?php } // if ( ! empty( $header_image ) ) ?>

 *
 * @package Spirit
 * @since Spirit 1.0
 */

/**
 * Setup the WordPress core custom header feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for previous versions.
 * Use feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Rework this function to remove WordPress 3.4 support when WordPress 3.6 is released.
 *
 * @uses spirit_header_style()
 * @uses spirit_admin_header_style()
 * @uses spirit_admin_header_image()
 *
 * @package Spirit
 */
function spirit_custom_header_setup() {
	$args = array(
		'default-image'          => '',
		'default-text-color'     => '31b3c4',
		'width'                  => 840,
		'height'                 => 250,
		'flex-height'            => true,
		'flex-width'			 => true,
		'wp-head-callback'       => 'spirit_header_style',
		'admin-head-callback'    => 'spirit_admin_header_style',
		'admin-preview-callback' => 'spirit_admin_header_image',
	);

	$args = apply_filters( 'spirit_custom_header_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-header', $args );
	} else {
		// Compat: Versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR',    $args['default-text-color'] );
		define( 'HEADER_IMAGE',        $args['default-image'] );
		define( 'HEADER_IMAGE_WIDTH',  $args['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $args['height'] );
		add_custom_image_header( $args['wp-head-callback'], $args['admin-head-callback'], $args['admin-preview-callback'] );
	}
}
add_action( 'after_setup_theme', 'spirit_custom_header_setup' );

/**
 * Shiv for get_custom_header().
 *
 * get_custom_header() was introduced to WordPress
 * in version 3.4. To provide backward compatibility
 * with previous versions, we will define our own version
 * of this function.
 *
 * @todo Remove this function when WordPress 3.6 is released.
 * @return stdClass All properties represent attributes of the curent header image.
 *
 * @package Spirit
 * @since Spirit 1.1
 */

if ( ! function_exists( 'get_custom_header' ) ) {
	function get_custom_header() {
		return (object) array(
			'url'           => get_header_image(),
			'thumbnail_url' => get_header_image(),
			'width'         => HEADER_IMAGE_WIDTH,
			'height'        => HEADER_IMAGE_HEIGHT,
		);
	}
}

if ( ! function_exists( 'spirit_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see spirit_custom_header_setup().
 *
 * @since Spirit 1.0
 */
function spirit_header_style() {

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		.site-title,
		.site-description {
			position: absolute !important;
			clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a {
			background-image: none;
			-webkit-text-fill-color: #<?php echo get_header_textcolor(); ?> !important;
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // spirit_header_style

if ( ! function_exists( 'spirit_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see spirit_custom_header_setup().
 *
 * @since Spirit 1.0
 */
function spirit_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		background-color: #caeaf0;
		background-image: url('<?php echo get_template_directory_uri(); ?>/images/texture-background.png');
		background-size: 60px auto;
		border: none;
	}
	#headimg h1,
	#desc {
	}
	#headimg h1 {
		border-bottom: 0;
		display: block;
		font-family: 'Oleo Script Swash Caps', serif;
		font-size: 64px;
		font-weight: normal;
		letter-spacing: 0;
		line-height: 80px;
		margin: 0 auto;
		opacity: 1;
		position: relative;
		text-align: center;
		text-shadow: 1px 1px 3px #fff;
		text-transform: capitalize;
		width: 100%;
	}
	@-moz-document url-prefix() {
		#headimg h1 {
			background-image: none;
		}
	}
	#headimg h1 a {
		text-decoration: none;
	}
	#desc {
		background-color: #caeaf0;
		background-image: url('<?php echo get_template_directory_uri(); ?>/images/texture-background.png');
		background-size: 60px auto;
		color: #d12d2f !important;
		display: inline-block;
		font-size: 20px;
		line-height: 36px;
		padding: 0 10px;
		position: relative;
			top: 20px;
		text-shadow: 1px 1px 0px #fff;
		clear: both;
		font-family: 'PT Sans', Helvetica, sans-serif;
		font-weight: bold;
		letter-spacing: -1px;
		margin: 0;
		text-transform: uppercase;
	}
	.line-through {
		border-bottom: 1px dotted #d12d2f;
		margin: -20px 0 15px;
		text-align: center;
	}
	#headimg img {
		display: block;
		margin: 13px auto;
	}
	</style>
<?php
}
endif; // spirit_admin_header_style

if ( ! function_exists( 'spirit_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see spirit_custom_header_setup().
 *
 * @since Spirit 1.0
 */
function spirit_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_header_textcolor() || '' == get_header_textcolor() )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_header_textcolor() . ';"';
		?>
		<?php $header_image = get_header_image();
		if ( ! empty( $header_image ) ) : ?>
			<img src="<?php echo esc_url( $header_image ); ?>" alt="" />
		<?php endif; ?>
		<h1 data-text="<?php bloginfo( 'name' ); ?>"><a id="name" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"<?php echo $style; ?>><?php bloginfo( 'name' ); ?></a></h1>
		<div class="line-through">
			<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		</div>
	</div>
<?php }
endif; // spirit_admin_header_image