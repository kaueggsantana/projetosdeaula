<?php
/**
 * The default template for displaying content
 * @package Aviation Industry
 * @since 1.0.0
 */

$aviation_industry_default = aviation_industry_get_default_theme_options();
$aviation_industry_image_size = 'large';
global $aviation_industry_archive_first_class; 
$aviation_industry_archive_classes = [
    'theme-article-post',
    'theme-article-animate',
    $aviation_industry_archive_first_class
];?>

<article id="post-<?php the_ID(); ?>" <?php post_class($aviation_industry_archive_classes); ?>>
    <div class="theme-article-image">
        <?php if ( get_theme_mod('aviation_industry_display_archive_post_image', true) == true ) : ?>
            <div class="entry-thumbnail">
                <?php
                if (is_search() || is_archive() || is_front_page()) {
                    $aviation_industry_featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                    $aviation_industry_featured_image = isset( $aviation_industry_featured_image[0] ) ? $aviation_industry_featured_image[0] : ''; ?>
                    <div class="post-thumbnail data-bg data-bg-big"
                         data-background="<?php echo esc_url( $aviation_industry_featured_image ); ?>">
                        <a href="<?php the_permalink(); ?>" class="theme-image-responsive" tabindex="0"></a>
                    </div>
                    <?php
                } else {
                    aviation_industry_post_thumbnail($aviation_industry_image_size);
                }
                aviation_industry_post_format_icon(); ?>
            </div>
        <?php endif; ?>

    </div>
    <div class="theme-article-details">
        <div class="entry-meta-top">
            <div class="entry-meta">
                <?php aviation_industry_entry_footer($cats = true, $tags = false, $edits = false); ?>
            </div>
        </div>
        <header class="entry-header">
            <h2 class="entry-title entry-title-medium">
                <a href="<?php the_permalink(); ?>" rel="bookmark">
                    <span><?php the_title(); ?></span>
                </a>
            </h2>
        </header>
        <div class="entry-content">

            <?php
            if (has_excerpt()) {

                the_excerpt();

            } else {

                echo '<p>';
                echo esc_html(wp_trim_words(get_the_content(), get_theme_mod('aviation_industry_excerpt_limit', 10), '...'));
                echo '</p>';
            }

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'aviation-industry'),
                'after' => '</div>',
            )); ?>

        </div>
        <a href="<?php the_permalink(); ?>" rel="bookmark" class="theme-btn-link">
          <span> <?php esc_html_e('Read More', 'aviation-industry'); ?> </span>
          <span class="topbar-info-icon"><?php aviation_industry_the_theme_svg('arrow-right-1'); ?></span>
        </a>
    </div>
</article>