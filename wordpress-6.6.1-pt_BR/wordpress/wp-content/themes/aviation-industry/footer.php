<?php
/**
 * The template for displaying the footer
 * @package Aviation Industry
 * @since 1.0.0
 */

/**
 * Toogle Contents
 * @hooked aviation_industry_content_offcanvas - 30
*/

do_action('aviation_industry_before_footer_content_action'); ?>

</div>

<footer id="site-footer" role="contentinfo">

    <?php
    /**
     * Footer Content
     * @hooked aviation_industry_footer_content_widget - 10
     * @hooked aviation_industry_footer_content_info - 20
    */

    do_action('aviation_industry_footer_content_action'); ?>

</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
