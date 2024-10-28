<?php
/**
 * Header Layout
 * @package Aviation Industry
 */

$aviation_industry_default = aviation_industry_get_default_theme_options();

$aviation_industry_header_layout_phone_number = esc_html( get_theme_mod( 'aviation_industry_header_layout_phone_number',
$aviation_industry_default['aviation_industry_header_layout_phone_number'] ) );

$aviation_industry_header_layout_timing = esc_html( get_theme_mod( 'aviation_industry_header_layout_timing',
$aviation_industry_default['aviation_industry_header_layout_timing'] ) );

$aviation_industry_header_layout_email_address = esc_html( get_theme_mod( 'aviation_industry_header_layout_email_address',
$aviation_industry_default['aviation_industry_header_layout_email_address'] ) );

$aviation_industry_header_layout_address = esc_html( get_theme_mod( 'aviation_industry_header_layout_address',
$aviation_industry_default['aviation_industry_header_layout_address'] ) );

$aviation_industry_header_search = get_theme_mod( 'aviation_industry_header_search', 
$aviation_industry_default['aviation_industry_header_search'] );

$aviation_industry_header_layout_button = esc_html( get_theme_mod( 'aviation_industry_header_layout_button',
$aviation_industry_default['aviation_industry_header_layout_button'] ) );

$aviation_industry_header_layout_button_url = esc_url( get_theme_mod( 'aviation_industry_header_layout_button_url',
$aviation_industry_default['aviation_industry_header_layout_button_url'] ) );

?>

<section id="center-header">
    <div class="wrapper">
        <div class="header-right-box theme-header-areas">
            <section id="top-header">
                <div class="header-wrapper">
                    <div class="theme-header-areas header-areas-right contact-box location">
                        <?php if( $aviation_industry_header_layout_address ){ ?>
                           <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M172.3 501.7C27 291 0 269.4 0 192 0 86 86 0 192 0s192 86 192 192c0 77.4-27 99-172.3 309.7-9.5 13.8-29.9 13.8-39.5 0zM192 272c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80z"/></svg><?php echo esc_html( $aviation_industry_header_layout_address ); ?></span>
                        <?php } ?>
                    </div>
                    <div class="theme-header-areas header-areas-right contact-box location">
                        <?php if( $aviation_industry_header_layout_email_address ){ ?>
                           <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7 .3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2 .4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg><a href="mailto:<?php echo esc_html( $aviation_industry_header_layout_email_address ); ?>"><?php echo esc_html( $aviation_industry_header_layout_email_address ); ?></a></span>
                        <?php } ?>
                    </div>
                    <div class="theme-header-areas header-areas-right contact-box">
                        <?php if( $aviation_industry_header_layout_phone_number ){ ?>
                           <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M97.3 507c-129.9-129.9-129.7-340.3 0-469.9 5.7-5.7 14.5-6.6 21.3-2.4l64.8 40.5a17.2 17.2 0 0 1 6.8 21l-32.4 81a17.2 17.2 0 0 1 -17.7 10.7l-55.8-5.6c-21.1 58.3-20.6 122.5 0 179.5l55.8-5.6a17.2 17.2 0 0 1 17.7 10.7l32.4 81a17.2 17.2 0 0 1 -6.8 21l-64.8 40.5a17.2 17.2 0 0 1 -21.3-2.4zM247.1 95.5c11.8 20 11.8 45 0 65.1-4 6.7-13.1 8-18.7 2.6l-6-5.7c-3.9-3.7-4.8-9.6-2.3-14.4a32.1 32.1 0 0 0 0-29.9c-2.5-4.8-1.7-10.7 2.3-14.4l6-5.7c5.6-5.4 14.8-4.1 18.7 2.6zm91.8-91.2c60.1 71.6 60.1 175.9 0 247.4-4.5 5.3-12.5 5.7-17.6 .9l-5.8-5.6c-4.6-4.4-5-11.5-.9-16.4 49.7-59.5 49.6-145.9 0-205.4-4-4.9-3.6-12 .9-16.4l5.8-5.6c5-4.8 13.1-4.4 17.6 .9zm-46 44.9c36.1 46.3 36.1 111.1 0 157.5-4.4 5.6-12.7 6.3-17.9 1.3l-5.8-5.6c-4.4-4.2-5-11.1-1.3-15.9 26.5-34.6 26.5-82.6 0-117.1-3.7-4.8-3.1-11.7 1.3-15.9l5.8-5.6c5.2-4.9 13.5-4.3 17.9 1.3z"/></svg>
                            <a href="tell:<?php echo esc_attr( $aviation_industry_header_layout_phone_number ); ?>"><?php echo esc_html( $aviation_industry_header_layout_phone_number ); ?></a></span>
                        <?php } ?>
                    </div>
                    <div class="theme-header-areas header-areas-right contact-box">
                        <?php if( $aviation_industry_header_layout_timing ){ ?>
                           <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm61.8-104.4l-84.9-61.7c-3.1-2.3-4.9-5.9-4.9-9.7V116c0-6.6 5.4-12 12-12h32c6.6 0 12 5.4 12 12v141.7l66.8 48.6c5.4 3.9 6.5 11.4 2.6 16.8L334.6 349c-3.9 5.3-11.4 6.5-16.8 2.6z"/></svg>
                            <?php echo esc_html( $aviation_industry_header_layout_timing ); ?></span>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <header id="site-header" class="site-header-layout header-layout" role="banner">
                <div class="header-center">
                    <div class="theme-header-areas header-areas-right header-logo">
                        <div class="header-titles">
                            <?php
                                aviation_industry_site_logo();
                                aviation_industry_site_description();
                            ?>
                        </div>
                    </div>
                    <div class="theme-header-areas header-areas-right header-menu">
                        <div class="site-navigation">
                            <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'aviation-industry'); ?>" role="navigation">
                                <ul class="primary-menu theme-menu">
                                    <?php
                                    if (has_nav_menu('aviation-industry-primary-menu')) {
                                        wp_nav_menu(
                                            array(
                                                'container' => '',
                                                'items_wrap' => '%3$s',
                                                'theme_location' => 'aviation-industry-primary-menu',
                                            )
                                        );
                                    } else {
                                        wp_list_pages(
                                            array(
                                                'match_menu_classes' => true,
                                                'show_sub_menu_icons' => true,
                                                'title_li' => false,
                                                'walker' => new Aviation_Industry_Walker_Page(),
                                            )
                                        );
                                    } ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="navbar-controls twp-hide-js">
                            <button type="button" class="navbar-control navbar-control-offcanvas">
                                <span class="navbar-control-trigger" tabindex="-1">
                                    <?php aviation_industry_the_theme_svg('menu'); ?>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="theme-header-areas header-areas-right header-button">
                        <?php if( $aviation_industry_header_layout_button || $aviation_industry_header_layout_button_url ){ ?>
                            <span>
                                <a href="<?php echo esc_url( $aviation_industry_header_layout_button_url ); ?>"><?php echo esc_html( $aviation_industry_header_layout_button ); ?></a>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </header>
            
        </div>
    </div>
</section>