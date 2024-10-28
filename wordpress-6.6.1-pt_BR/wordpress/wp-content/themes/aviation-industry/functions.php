<?php
/**
 * Aviation Industry functions and definitions
 * @package Aviation Industry
 */

if ( ! function_exists( 'aviation_industry_after_theme_support' ) ) :

	function aviation_industry_after_theme_support() {
		
		add_theme_support( 'automatic-feed-links' );

		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'aviation_industry_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

	}

endif;

add_action( 'after_setup_theme', 'aviation_industry_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function aviation_industry_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $theme_version = wp_get_theme()->get( 'Version' );
	$fonts_url = aviation_industry_fonts_url();
    if( $fonts_url ){
    	require_once get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'aviation-industry-google-fonts',
			wptt_get_webfont_url( $fonts_url ),
			array(),
			$theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
	wp_enqueue_style( 'aviation-industry-style', get_stylesheet_uri(), array(), $theme_version );

	wp_enqueue_style( 'aviation-industry-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'aviation-industry-style',$aviation_industry_custom_css );

	$aviation_industry_css = '';

	if ( get_header_image() ) :

		$aviation_industry_css .=  '
			.header-center{
				background-image: url('.esc_url(get_header_image()).') !important;
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'aviation-industry-style', $aviation_industry_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'aviation-industry-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $c_paged,
        );
        $posts_qry = new WP_Query( $posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $aviation_industry_default = aviation_industry_get_default_theme_options();
    $aviation_industry_pagination_layout = get_theme_mod( 'aviation_industry_pagination_layout',$aviation_industry_default['aviation_industry_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'aviation_industry_register_styles',200 );

function aviation_industry_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('aviation-industry-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'aviation_industry_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function aviation_industry_menus() {

	$locations = array(
		'aviation-industry-primary-menu'  => esc_html__( 'Primary Menu', 'aviation-industry' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'aviation_industry_menus' );

add_filter('loop_shop_columns', 'aviation_industry_loop_columns');
if (!function_exists('aviation_industry_loop_columns')) {
	function aviation_industry_loop_columns() {
		$aviation_industry_columns = get_theme_mod( 'aviation_industry_per_columns', 3 );
		return $aviation_industry_columns;
	}
}

add_filter( 'loop_shop_per_page', 'aviation_industry_per_page', 20 );
function aviation_industry_per_page( $aviation_industry_cols ) {
  	$aviation_industry_cols = get_theme_mod( 'aviation_industry_product_per_page', 9 );
	return $aviation_industry_cols;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';

function aviation_industry_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'aviation_industry_remove_customize_register', 11 );

// Apply styles based on customizer settings

function aviation_industry_customizer_css() {
    ?>
    <style type="text/css">
        <?php
        $aviation_industry_footer_widget_background_color = get_theme_mod('aviation_industry_footer_widget_background_color');
        if ($aviation_industry_footer_widget_background_color) {
            echo '.footer-widgetarea { background-color: ' . esc_attr($aviation_industry_footer_widget_background_color) . '; }';
        }

        $footer_widget_background_image = get_theme_mod('footer_widget_background_image');
        if ($footer_widget_background_image) {
            echo '.footer-widgetarea { background-image: url(' . esc_url($footer_widget_background_image) . '); }';
        }
        $aviation_industry_copyright_font_size = get_theme_mod('aviation_industry_copyright_font_size');
        if ($aviation_industry_copyright_font_size) {
            echo '.footer-copyright { font-size: ' . esc_attr($aviation_industry_copyright_font_size) . 'px;}';
        }
        ?>
    </style>
    <?php
}
add_action('wp_head', 'aviation_industry_customizer_css');

function aviation_industry_check_banner_enabled() {
	$aviation_industry_check_banner_enable = get_theme_mod('aviation_industry_header_slider', false);
	if($aviation_industry_check_banner_enable == false) {
		echo '<style>.page-template-frontpage #center-header { position: relative !important; }</style>';
	}
    
}

add_action('wp_head', 'aviation_industry_check_banner_enabled');