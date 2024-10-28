<?php
/**
 * Custom Functions.
 *
 * @package Aviation Industry
 */

if( !function_exists( 'aviation_industry_fonts_url' ) ) :

    //Google Fonts URL
    function aviation_industry_fonts_url(){

        $font_families = array(
            'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
            'Playfair+Display:ital,wght@0,400..900;1,400..900',
        );

        $fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($fonts_url);
    }

endif;

if ( ! function_exists( 'aviation_industry_sub_menu_toggle_button' ) ) :

    function aviation_industry_sub_menu_toggle_button( $args, $item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $args->theme_location == 'aviation-industry-primary-menu' && isset( $args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'aviation-industry' ) . '</span>' . aviation_industry_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $args->theme_location == 'aviation-industry-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $args->before = '<div class="link-icon-wrapper">';
                $args->after  = aviation_industry_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $args->before = '';
                $args->after  = '';

            }

        }

        return $args;

    }

endif;

add_filter( 'nav_menu_item_args', 'aviation_industry_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'aviation_industry_the_theme_svg' ) ):
    
    function aviation_industry_the_theme_svg( $svg_name, $return = false ) {

        if( $return ){

            return aviation_industry_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in aviation_industry_get_theme_svg();.

        }else{

            echo aviation_industry_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in aviation_industry_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'aviation_industry_get_theme_svg' ) ):

    function aviation_industry_get_theme_svg( $svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            Aviation_Industry_SVG_Icons::get_svg( $svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $svg ) {
            return false;
        }
        return $svg;

    }

endif;

if( !function_exists( 'aviation_industry_post_category_list' ) ) :

    // Post Category List.
    function aviation_industry_post_category_list( $select_cat = true ){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        if( $select_cat ){

            $post_cat_cat_array[''] = esc_html__( '-- Select Category --','aviation-industry' );

        }

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;

if( !function_exists('aviation_industry_single_post_navigation') ):

    function aviation_industry_single_post_navigation(){

        $aviation_industry_footer_column_layout = aviation_industry_get_default_theme_options();
        $aviation_industry_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'aviation_industry_twp_disable_ajax_load_next_post', true ) );
        $current_id = '';
        $article_wrap_class = '';
        global $post;
        $current_id = $post->ID;
        if( $aviation_industry_twp_navigation_type == '' || $aviation_industry_twp_navigation_type == 'global-layout' ){
            $aviation_industry_twp_navigation_type = get_theme_mod('aviation_industry_twp_navigation_type', $aviation_industry_footer_column_layout['aviation_industry_twp_navigation_type']);
        }

        if( $aviation_industry_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $aviation_industry_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . aviation_industry_the_theme_svg('arrow-left',$return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'aviation-industry') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . aviation_industry_the_theme_svg('arrow-right',$return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'aviation-industry') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $next_post = get_next_post();
                if( isset( $next_post->ID ) ){

                    $next_post_id = $next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'aviation_industry_navigation_action','aviation_industry_single_post_navigation',30 );

if( !function_exists('aviation_industry_content_offcanvas') ):

    // Offcanvas Contents
    function aviation_industry_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html('Close', 'aviation-industry'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'aviation-industry'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('aviation-industry-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'aviation-industry-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Aviation_Industry_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'aviation_industry_before_footer_content_action','aviation_industry_content_offcanvas',30 );

if( !function_exists('aviation_industry_footer_content_widget') ):

    function aviation_industry_footer_content_widget(){

        $aviation_industry_default = aviation_industry_get_default_theme_options();
        
            $aviation_industry_footer_column_layout = absint(get_theme_mod('aviation_industry_footer_column_layout', $aviation_industry_default['aviation_industry_footer_column_layout']));
            $aviation_industry_footer_sidebar_class = 12;
            if($aviation_industry_footer_column_layout == 2) {
                $aviation_industry_footer_sidebar_class = 6;
            }
            if($aviation_industry_footer_column_layout == 3) {
                $aviation_industry_footer_sidebar_class = 4;
            }
            ?>
           
            <?php if ( get_theme_mod('aviation_industry_display_footer', true) == true ) : ?>
                <div class="footer-widgetarea">
                    <div class="wrapper">
                        <div class="column-row">

                            <?php for ($i=0; $i < $aviation_industry_footer_column_layout; $i++) {
                                ?>
                                <div class="column <?php echo 'column-' . absint($aviation_industry_footer_sidebar_class); ?> column-sm-12">
                                    <?php dynamic_sidebar('aviation-industry-footer-widget-' . $i); ?>
                                </div>
                           <?php } ?>

                        </div>
                    </div>
                </div>
           <?php endif; ?> 

        <?php

    }

endif;

add_action( 'aviation_industry_footer_content_action','aviation_industry_footer_content_widget',10 );

if( !function_exists('aviation_industry_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function aviation_industry_footer_content_info(){

        $aviation_industry_footer_column_layout = aviation_industry_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-9">
                        <div class="footer-credits">
                            <div class="footer-copyright">
                                <?php
                                $aviation_industry_footer_copyright_text = wp_kses_post( get_theme_mod( 'aviation_industry_footer_copyright_text', $aviation_industry_footer_column_layout['aviation_industry_footer_copyright_text'] ) );
                                    echo esc_html( $aviation_industry_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'aviation-industry') . 'Aviation Industry ' . esc_html__('By ', 'aviation-industry') . '  <span>' . esc_html__('OMEGA ', 'aviation-industry') . '</span>';
                                    echo esc_html__('Powered by ', 'aviation-industry') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'aviation-industry') . '" target="_blank"><span>' . esc_html__('WordPress.', 'aviation-industry') . '</span></a>';
                                 ?>
                            </div>
                        </div>
                    </div>
                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php
                                printf( esc_html__( 'To the Top %s', 'aviation-industry' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                                ?>
                            </span>
                            <span class="to-the-top-short">
                                <?php
                                printf( esc_html__( 'Up %s', 'aviation-industry' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

endif;

add_action( 'aviation_industry_footer_content_action','aviation_industry_footer_content_info',20 );


if( !function_exists( 'aviation_industry_main_slider' ) ) :

    function aviation_industry_main_slider(){

        $aviation_industry_defaults = aviation_industry_get_default_theme_options();
        $aviation_industry_header_slider = get_theme_mod( 'aviation_industry_header_slider', $aviation_industry_defaults['aviation_industry_header_slider'] );

        $aviation_industry_banner_background_image = get_theme_mod( 'aviation_industry_banner_background_image' );

        $aviation_industry_slider_section_button = esc_html( get_theme_mod( 'aviation_industry_slider_section_button',
        $aviation_industry_defaults['aviation_industry_slider_section_button'] ) );

        $aviation_industry_slider_section_button_url = esc_url( get_theme_mod( 'aviation_industry_slider_section_button_url',
        $aviation_industry_defaults['aviation_industry_slider_section_button_url'] ) );

        $aviation_industry_header_banner_cat = get_theme_mod( 'aviation_industry_header_banner_cat' );

        if( $aviation_industry_header_slider ){ $rtl = '';
            if( is_rtl() ){
                $rtl = 'dir="rtl"';
            }

            $banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 4,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $aviation_industry_header_banner_cat ) ) );

            if( $banner_query->have_posts() ): ?>

                <div id="site-content" class="main-banner">
                    <div class="slider-box" style="background: url(<?php echo esc_url( $aviation_industry_banner_background_image ); ?>);">
                        <div class="wrapper">
                            <div class="main-slider">
                                <div class="swiper-container theme-main-carousel swiper-container" <?php echo $rtl; ?>>
                                    <div class="swiper-wrapper">
                                        <?php
                                        while( $banner_query->have_posts() ):
                                        $banner_query->the_post();
                                        $aviation_industry_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                        $aviation_industry_featured_image = isset( $aviation_industry_featured_image[0] ) ? $aviation_industry_featured_image[0] : ''; ?>
                                            <div class="swiper-slide main-carousel-item">                                 
                                                <div class="slider-main">
                                                    <div class="left-box">
                                                        <div class="slide-heading-main">
                                                            <div class="main-carousel-caption">
                                                                <div class="post-content">
                                                                    <header class="entry-header">
                                                                        <h2 class="slider-heading">
                                                                            <a href="<?php the_permalink(); ?>" rel="bookmark"><span><?php the_title(); ?></span></a>
                                                                        </h2>
                                                                    </header>
                                                                    <div class="entry-content">
                                                                        <?php
                                                                        if (has_excerpt()) {
                                                                            the_excerpt();
                                                                        } else {
                                                                            echo esc_html(wp_trim_words(get_the_content(), 25, '...'));
                                                                        } ?>
                                                                    </div>
                                                                    <a href="<?php the_permalink(); ?>" class="btn-fancy btn-fancy-primary" tabindex="0">
                                                                        <?php echo esc_html__('get started', 'aviation-industry'); ?>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="right-box">
                                                        <div class="image-main-box">
                                                            <div class="data-bg banner-img" data-background="<?php echo esc_url($aviation_industry_featured_image); ?>">
                                                            </div>
                                                            <?php aviation_industry_post_format_icon(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            wp_reset_postdata();
            endif;
        }
    }

endif;

    if( !function_exists( 'aviation_industry_services_section' ) ) :

    function aviation_industry_services_section(){

        $aviation_industry_footer_column_layout = aviation_industry_get_default_theme_options();
        $aviation_industry_services = get_theme_mod( 'aviation_industry_services', $aviation_industry_footer_column_layout['aviation_industry_services'] );
        $aviation_industry_services_sec_cat = get_theme_mod( 'aviation_industry_services_sec_cat' );
        if( $aviation_industry_services ){
            if( $aviation_industry_services_sec_cat ){ ?>
                <div class="service-box">
                    <div class="wrapper">
                        <div class="service-right-box">
                                <?php
                                $rtl = '';
                                if( is_rtl() ){
                                    $rtl = 'dir="rtl"';
                                }
                                $banner_query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 8,'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html( $aviation_industry_services_sec_cat ) ) );
                                if( $banner_query->have_posts() ): ?>
                                    <div class="theme-custom-block theme-banner-block">
                                        <div class="swiper-container theme-services-carousel swiper-container" <?php echo $rtl; ?>>
                                            <div class="swiper-wrapper">
                                                <?php
                                                $s=1;
                                                while( $banner_query->have_posts() ):
                                                $banner_query->the_post();
                                                $aviation_industry_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                                                $aviation_industry_featured_image = isset( $aviation_industry_featured_image[0] ) ? $aviation_industry_featured_image[0] : ''; 
                                                $aviation_industry_services_icon = get_theme_mod( 'aviation_industry_services_icon' .$s,'' );

                                                ?>
                                                    <div class="swiper-slide main-carousel-item">                                 
                                                        <div class="theme-article-post">
                                                            <div class="main-carousel-caption">
                                                                <div class="service-content">
                                                                    <div class="entry-thumbnail">
                                                                        <div class="data-bg data-bg-large featured-image" data-background="<?php echo esc_url($aviation_industry_featured_image); ?>">
                                                                            <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                                                                        </div>
                                                                        <?php aviation_industry_post_format_icon(); ?>
                                                                    </div>
                                                                    <header class="entry-header">
                                                                        <?php if( $aviation_industry_services_icon ){ ?>
                                                                            <img class="ser-icon-img" src="<?php echo esc_url( $aviation_industry_services_icon ); ?>" alt="Services Icon Image">
                                                                        <?php } ?>
                                                                        <h2 class="entry-title">
                                                                            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                                                                        </h2>
                                                                        <div class="entry-content">
                                                                            <?php
                                                                            if (has_excerpt()) {

                                                                                the_excerpt();

                                                                            } else {

                                                                                echo esc_html(wp_trim_words(get_the_content(), 25, '...'));

                                                                            } ?>
                                                                        </div>
                                                                    </header>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php $s++; endwhile; ?>
                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                <?php
                                    wp_reset_postdata();
                                    endif; ?>
                        </div>
                    </div>
                </div>
            <?php }
        }
    }

endif;

if (!function_exists('aviation_industry_post_format_icon')):

    // Post Format Icon.
    function aviation_industry_post_format_icon() {

        $aviation_industry_format = get_post_format(get_the_ID()) ?: 'standard';
        $aviation_industry_icon = '';
        $aviation_industry_title = '';
        if( $aviation_industry_format == 'video' ){
            $aviation_industry_icon = aviation_industry_get_theme_svg( 'video' );
            $aviation_industry_title = esc_html__('Video','aviation-industry');
        }elseif( $aviation_industry_format == 'audio' ){
            $aviation_industry_icon = aviation_industry_get_theme_svg( 'audio' );
            $aviation_industry_title = esc_html__('Audio','aviation-industry');
        }elseif( $aviation_industry_format == 'gallery' ){
            $aviation_industry_icon = aviation_industry_get_theme_svg( 'gallery' );
            $aviation_industry_title = esc_html__('Gallery','aviation-industry');
        }elseif( $aviation_industry_format == 'quote' ){
            $aviation_industry_icon = aviation_industry_get_theme_svg( 'quote' );
            $aviation_industry_title = esc_html__('Quote','aviation-industry');
        }elseif( $aviation_industry_format == 'image' ){
            $aviation_industry_icon = aviation_industry_get_theme_svg( 'image' );
            $aviation_industry_title = esc_html__('Image','aviation-industry');
        }
        
        if (!empty($aviation_industry_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo aviation_industry_svg_escape($aviation_industry_icon); ?></span>
                <?php if( $aviation_industry_title ){ echo '<span class="post-format-label">'.esc_html( $aviation_industry_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'aviation_industry_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function aviation_industry_svg_escape( $input ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            $input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $svg ) {
            return false;
        }

        return $svg;

    }

endif;

if( !function_exists( 'aviation_industry_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function aviation_industry_sanitize_sidebar_option_meta( $input ){

        $aviation_industry_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$aviation_industry_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'aviation_industry_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function aviation_industry_sanitize_pagination_meta( $input ){

        $aviation_industry_metabox_options = array( 'Center','Right','Left');
        if( in_array( $input,$aviation_industry_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'aviation_industry_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function aviation_industry_sanitize_menu_transform( $input ){

        $aviation_industry_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $input,$aviation_industry_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'aviation_industry_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function aviation_industry_sanitize_page_content_alignment( $input ){

        $aviation_industry_metabox_options = array( 'left','center','right');
        if( in_array( $input,$aviation_industry_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'aviation_industry_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function aviation_industry_sanitize_footer_widget_title_alignment( $input ){

        $aviation_industry_metabox_options = array( 'left','center','right');
        if( in_array( $input,$aviation_industry_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;
