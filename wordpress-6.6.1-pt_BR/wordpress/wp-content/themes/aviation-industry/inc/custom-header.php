<?php
/**
 * Sample implementation of the Custom Header feature
 * @package Aviation Industry
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses aviation_industry_header_style()
 */
function aviation_industry_custom_header_setup()
{
    add_theme_support('custom-header',
        apply_filters('aviation_industry_custom_header_args', array(
            'default-image' => '',
            'default-text-color' => '00224D',
            'width' => 1920,
            'height' => 400,
            'flex-height' => true,
            'flex-width' => true,
            'wp-head-callback' => 'aviation_industry_header_style',
        )));
}

add_action('after_setup_theme', 'aviation_industry_custom_header_setup');

if (!function_exists('aviation_industry_header_style')) :
    /**
     * Styles the header image and text displayed on the blog
     *
     * @see aviation_industry_custom_header_setup().
     */
    function aviation_industry_header_style()
    {
        $aviation_industry_header_text_color = get_header_textcolor();

        if (get_theme_support('custom-header', 'default-text-color') === $aviation_industry_header_text_color) {
            return;
        }

        ?>
        <style type="text/css">
            <?php
                if ( 'blank' == $aviation_industry_header_text_color ) :
            ?>
            .header-titles .custom-logo-name,
            .site-description {
                display: none;
                position: absolute;
                clip: rect(1px, 1px, 1px, 1px);
            }

            <?php
                else :
            ?>
            .header-titles .custom-logo-name:not(:hover):not(:focus),
            .site-description {
                color: #<?php echo esc_attr( $aviation_industry_header_text_color ); ?>;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif;