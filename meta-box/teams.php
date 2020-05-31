<?php

/**
 * Registers the `teams` post meta box.
 */



add_action('admin_enqueue_scripts', 'wpsmartteam_backend_scripts');

if (!function_exists('wpsmartteam_backend_scripts')) {
    function wpsmartteam_backend_scripts($hook)
    {
        wp_enqueue_media();
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
    }
}

add_action('add_meta_boxes', 'wpsmartteam_add_meta_box');

if (!function_exists('wpsmartteam_add_meta_box')) {
    function wpsmartteam_add_meta_box()
    {
        add_meta_box('header-page-metabox-options', esc_html__('Primary Color', 'wpsmartteam'), 'wpsmartteam_header_meta_box', 'teams', 'side', 'low');
    }
}

if (!function_exists('wpsmartteam_header_meta_box')) {
    function wpsmartteam_header_meta_box($post)
    {
        $custom = get_post_custom($post->ID);
        $primary_color = (isset($custom["primary_color"][0])) ? $custom["primary_color"][0] : '';
        wp_nonce_field('wpsmartteam_header_meta_box', 'wpsmartteam_header_meta_box_nonce');
?>
        <script>
            jQuery(document).ready(function($) {
                $('.color_field').each(function() {
                    $(this).wpColorPicker();
                });
            });
        </script>
        <div class="pagebox">
            <p><?php esc_attr_e('Choose your primary color.', 'wpsmartteam'); ?></p>
            <input class="color_field" type="hidden" name="primary_color" value="<?php esc_attr_e($primary_color); ?>" />
        </div>
<?php
    }
}

if (!function_exists('wpsmartteam_save_header_meta_box')) {
    function wpsmartteam_save_header_meta_box($post_id)
    {
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
        if (!current_user_can('edit_pages')) {
            return;
        }
        if (!isset($_POST['primary_color']) || !wp_verify_nonce($_POST['wpsmartteam_header_meta_box_nonce'], 'wpsmartteam_header_meta_box')) {
            return;
        }
        $primary_color = (isset($_POST["primary_color"]) && $_POST["primary_color"] != '') ? $_POST["primary_color"] : '';
        update_post_meta($post_id, "primary_color", $primary_color);
    }
}

add_action('save_post', 'wpsmartteam_save_header_meta_box');
