<?php
/**
* Sidebar Metabox.
*
* @package Restaurant Culinary
*/

$restaurant_culinary_post_sidebar_fields = array(
    'global-sidebar' => array(
        'id'        => 'post-global-sidebar',
        'value' => 'global-sidebar',
        'label' => esc_html__( 'Global sidebar', 'restaurant-culinary' ),
    ),
    'right-sidebar' => array(
        'id'        => 'post-left-sidebar',
        'value' => 'right-sidebar',
        'label' => esc_html__( 'Right sidebar', 'restaurant-culinary' ),
    ),
    'left-sidebar' => array(
        'id'        => 'post-right-sidebar',
        'value'     => 'left-sidebar',
        'label'     => esc_html__( 'Left sidebar', 'restaurant-culinary' ),
    ),
    'no-sidebar' => array(
        'id'        => 'post-no-sidebar',
        'value'     => 'no-sidebar',
        'label'     => esc_html__( 'No sidebar', 'restaurant-culinary' ),
    ),
);

function restaurant_culinary_category_add_form_fields_callback() {
    $image_id = null; ?>
    <div id="category_custom_image"></div>
    <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
    <div style="margin-bottom: 20px;">
        <span><?php esc_html_e('Category Image','restaurant-culinary'); ?></span>
        <a href="#" class="button custom-button-upload" id="custom-button-upload"><?php esc_html_e('Upload Image','restaurant-culinary'); ?></a>
        <a href="#" class="button custom-button-remove" id="custom-button-remove" style="display: none"><?php esc_html_e('Remove Image','restaurant-culinary'); ?></a>
    </div>
    <?php 
}
add_action( 'category_add_form_fields', 'restaurant_culinary_category_add_form_fields_callback' );

function restaurant_culinary_custom_create_term_callback($restaurant_culinary_term_id) {
    // add term meta data
    add_term_meta(
        $restaurant_culinary_term_id,
        'term_image',
        esc_url($_REQUEST['category_custom_image_url'])
    );
}
add_action( 'create_term', 'restaurant_culinary_custom_create_term_callback' );

function restaurant_culinary_category_edit_form_fields_callback($ttObj, $taxonomy) {
    $restaurant_culinary_term_id = $ttObj->term_id;
    $restaurant_culinary_image = '';
    $restaurant_culinary_image = get_term_meta( $restaurant_culinary_term_id, 'term_image', true ); ?>
    <tr class="form-field term-image-wrap">
        <th scope="row"><label for="image"><?php esc_html_e('Image','restaurant-culinary'); ?></label></th>
        <td>
        <?php if ( $restaurant_culinary_image ): ?>
            <span id="category_custom_image">
               <img src="<?php echo $restaurant_culinary_image; ?>" style="width: 100%"/>
            </span>
            <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
            <span>
                <a href="#" class="button custom-button-upload" id="custom-button-upload" style="display: none"><?php esc_html_e('Upload Image','restaurant-culinary'); ?></a>
                <a href="#" class="button custom-button-remove"><?php esc_html_e('Remove Image','restaurant-culinary'); ?></a>                    
            </span>
        <?php else: ?>
            <span id="category_custom_image"></span>
            <input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
            <span>
               <a href="#" class="button custom-button-upload" id="custom-button-upload"><?php esc_html_e('Upload Image','restaurant-culinary'); ?></a>
               <a href="#" class="button custom-button-remove" style="display: none"><?php esc_html_e('Remove Image','restaurant-culinary'); ?></a>
            </span>
            <?php endif; ?>
        </td>
    </tr>
    <?php
}
add_action ( 'category_edit_form_fields', 'restaurant_culinary_category_edit_form_fields_callback', 10, 2 );

function restaurant_culinary_edit_term_callback($restaurant_culinary_term_id) {
    $restaurant_culinary_image = '';
    $restaurant_culinary_image = get_term_meta( $restaurant_culinary_term_id, 'term_image' );
    if ( $restaurant_culinary_image )
    update_term_meta( 
        $restaurant_culinary_term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );
    else
    add_term_meta( 
        $restaurant_culinary_term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );
}
add_action( 'edit_term', 'restaurant_culinary_edit_term_callback' );