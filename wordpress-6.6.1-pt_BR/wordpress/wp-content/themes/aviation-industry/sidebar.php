<?php
/**
 * The sidebar containing the main widget area
 * @package Aviation Industry
 */

$aviation_industry_default = aviation_industry_get_default_theme_options();

$post_id = get_the_ID(); // Get the post ID

$aviation_industry_post_sidebar = esc_html(get_post_meta($post_id, 'aviation_industry_post_sidebar_option', true));
$aviation_industry_sidebar_column_class = 'column-order-2';

if (empty($aviation_industry_post_sidebar)) {
    $aviation_industry_global_sidebar_layout = esc_html(get_theme_mod('aviation_industry_global_sidebar_layout', $aviation_industry_default['aviation_industry_global_sidebar_layout']));
} else {
    $aviation_industry_global_sidebar_layout = $aviation_industry_post_sidebar;
}
if (!is_active_sidebar('sidebar-1') || $aviation_industry_global_sidebar_layout == 'no-sidebar') {
    return;
}

if ($aviation_industry_global_sidebar_layout == 'left-sidebar') {
    $aviation_industry_sidebar_column_class = 'column-order-1';
}
?>

<aside id="secondary" class="widget-area <?php echo esc_attr($aviation_industry_sidebar_column_class); ?>">
    <div class="widget-area-wrapper">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>
</aside>
