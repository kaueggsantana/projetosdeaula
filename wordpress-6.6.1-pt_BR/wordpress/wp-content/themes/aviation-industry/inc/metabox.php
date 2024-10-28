<?php
/**
* Sidebar Metabox.
*
* @package Aviation Industry
*/

$aviation_industry_post_sidebar_fields = array(
    'global-sidebar' => array(
        'id'        => 'post-global-sidebar',
        'value' => 'global-sidebar',
        'label' => esc_html__( 'Global sidebar', 'aviation-industry' ),
    ),
    'right-sidebar' => array(
        'id'        => 'post-left-sidebar',
        'value' => 'right-sidebar',
        'label' => esc_html__( 'Right sidebar', 'aviation-industry' ),
    ),
    'left-sidebar' => array(
        'id'        => 'post-right-sidebar',
        'value'     => 'left-sidebar',
        'label'     => esc_html__( 'Left sidebar', 'aviation-industry' ),
    ),
    'no-sidebar' => array(
        'id'        => 'post-no-sidebar',
        'value'     => 'no-sidebar',
        'label'     => esc_html__( 'No sidebar', 'aviation-industry' ),
    ),
);

function aviation_industry_category_add_form_fields_callback() {
    $image_id = null; ?>
    <div id="category_custom_image"></div>
    <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
    <div style="margin-bottom: 20px;">
        <span><?php esc_html_e('Category Image','aviation-industry'); ?></span>
        <a href="#" class="button custom-button-upload" id="custom-button-upload"><?php esc_html_e('Upload Image','aviation-industry'); ?></a>
        <a href="#" class="button custom-button-remove" id="custom-button-remove" style="display: none"><?php esc_html_e('Remove Image','aviation-industry'); ?></a>
    </div>
    <?php 
}
add_action( 'category_add_form_fields', 'aviation_industry_category_add_form_fields_callback' );

function aviation_industry_custom_create_term_callback($term_id) {
    // add term meta data
    add_term_meta(
        $term_id,
        'term_image',
        esc_url($_REQUEST['category_custom_image_url'])
    );
}
add_action( 'create_term', 'aviation_industry_custom_create_term_callback' );

function aviation_industry_category_edit_form_fields_callback($ttObj, $taxonomy) {
    $term_id = $ttObj->term_id;
    $aviation_industry_image = '';
    $aviation_industry_image = get_term_meta( $term_id, 'term_image', true ); ?>
    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="image"><?php esc_html_e('Image','aviation-industry'); ?></label></th>
        <td>
        <?php if ( $aviation_industry_image ): ?>
            <span id="category_custom_image">
               <img src="<?php echo $aviation_industry_image; ?>" style="width: 100%"/>
            </span>
            <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
            <span>
                <a href="#" class="button custom-button-upload" id="custom-button-upload" style="display: none"><?php esc_html_e('Upload Image','aviation-industry'); ?></a>
                <a href="#" class="button custom-button-remove"><?php esc_html_e('Remove Image','aviation-industry'); ?></a>                    
            </span>
        <?php else: ?>
            <span id="category_custom_image"></span>
            <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
            <span>
               <a href="#" class="button custom-button-upload" id="custom-button-upload"><?php esc_html_e('Upload Image','aviation-industry'); ?></a>
               <a href="#" class="button custom-button-remove" style="display: none"><?php esc_html_e('Remove Image','aviation-industry'); ?></a>
            </span>
            <?php endif; ?>
        </td>
    </tr>
    <?php
}
add_action ( 'category_edit_form_fields', 'aviation_industry_category_edit_form_fields_callback', 10, 2 );

function aviation_industry_edit_term_callback($term_id) {
    $aviation_industry_image = '';
    $aviation_industry_image = get_term_meta( $term_id, 'term_image' );
    if ( $aviation_industry_image )
    update_term_meta( 
        $term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );
    else
    add_term_meta( 
        $term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );
}
add_action( 'edit_term', 'aviation_industry_edit_term_callback' );