<?php
/**
 * The template for displaying single posts and pages.
 * @package Aviation Industry
 * @since 1.0.0
 */
get_header();

    $aviation_industry_default = aviation_industry_get_default_theme_options();
    $aviation_industry_global_sidebar_layout = esc_html( get_theme_mod( 'aviation_industry_global_sidebar_layout',$aviation_industry_default['aviation_industry_global_sidebar_layout'] ) );
    $aviation_industry_post_sidebar = esc_html( get_post_meta( $post->ID, 'aviation_industry_post_sidebar_option', true ) );
    $aviation_industry_sidebar_column_class = 'column-order-1';

    if (!empty($aviation_industry_post_sidebar)) {
        $aviation_industry_global_sidebar_layout = $aviation_industry_post_sidebar;
    }

    if ($aviation_industry_global_sidebar_layout == 'left-sidebar') {
        $aviation_industry_sidebar_column_class = 'column-order-2';
    } ?>

    <div id="single-page" class="singular-main-block">
        <div class="wrapper">
            <div class="column-row">

                <div id="primary" class="content-area <?php echo esc_attr($aviation_industry_sidebar_column_class); ?>">
                    <main id="site-content" class="" role="main">

                        <?php
                            aviation_industry_breadcrumb();

                        if( have_posts() ): ?>

                            <div class="article-wraper">

                                <?php while (have_posts()) :
                                    the_post();

                                    get_template_part('template-parts/content', 'single');

                                    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && !post_password_required() ) { ?>

                                        <div class="comments-wrapper">
                                            <?php comments_template(); ?>
                                        </div>

                                    <?php
                                    }

                                endwhile; ?>

                            </div>

                        <?php
                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;

                        /**
                         * Navigation
                         * 
                         * @hooked aviation_industry_related_posts - 20  
                         * @hooked aviation_industry_single_post_navigation - 30  
                        */

                        do_action('aviation_industry_navigation_action'); ?>

                    </main>
                </div>
                <?php get_sidebar();?>
            </div>
        </div>
    </div>

<?php
get_footer();
