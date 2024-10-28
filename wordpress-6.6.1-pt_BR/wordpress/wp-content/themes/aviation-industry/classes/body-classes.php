<?php
/**
* Body Classes.
* @package Aviation Industry
*/
 
 if (!function_exists('aviation_industry_body_classes')) :

    function aviation_industry_body_classes($classes) {

        $aviation_industry_default = aviation_industry_get_default_theme_options();
        global $post;
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        }

        $aviation_industry_global_sidebar_layout = esc_html( get_theme_mod( 'aviation_industry_global_sidebar_layout',$aviation_industry_default['aviation_industry_global_sidebar_layout'] ) );

        if ( is_active_sidebar( 'sidebar-1' ) ) {
            if( is_single() || is_page() ){
                $aviation_industry_post_sidebar = esc_html( get_post_meta( $post->ID, 'aviation_industry_post_sidebar_option', true ) );
                if (empty($aviation_industry_post_sidebar) || ($aviation_industry_post_sidebar == 'global-sidebar')) {
                    $classes[] = esc_attr( $aviation_industry_global_sidebar_layout );
                } else{
                    $classes[] = esc_attr( $aviation_industry_post_sidebar );
                }
            }else{
                $classes[] = esc_attr( $aviation_industry_global_sidebar_layout );
            }
            
        }
        
        return $classes;
    }

endif;

add_filter('body_class', 'aviation_industry_body_classes');