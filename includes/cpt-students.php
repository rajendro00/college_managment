<?php
// ============================================
// STUDENT CUSTOM POST TYPE
// ============================================

// ১. CPT Register
add_action('init', 'cms_register_student_post_type');

function cms_register_student_post_type() {
    $labels = array(
        'name'               => __('Students', CMS_TEXT_DOMAIN),
        'singular_name'      => __('Student', CMS_TEXT_DOMAIN),
        'menu_name'          => __('Students', CMS_TEXT_DOMAIN),
        'name_admin_bar'     => __('Student', CMS_TEXT_DOMAIN),
        'add_new'            => __('Add New Student', CMS_TEXT_DOMAIN),
        'add_new_item'       => __('Add New Student', CMS_TEXT_DOMAIN),
        'new_item'           => __('New Student', CMS_TEXT_DOMAIN),
        'edit_item'          => __('Edit Student', CMS_TEXT_DOMAIN),
        'view_item'          => __('View Student', CMS_TEXT_DOMAIN),
        'all_items'          => __('All Students', CMS_TEXT_DOMAIN),
        'search_items'       => __('Search Students', CMS_TEXT_DOMAIN),
        'parent_item_colon'  => __('Parent Student:', CMS_TEXT_DOMAIN),
        'not_found'          => __('No students found.', CMS_TEXT_DOMAIN),
        'not_found_in_trash' => __('No students found in Trash.', CMS_TEXT_DOMAIN)
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'student'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 30,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'thumbnail'),
        'show_in_rest'       => false, // Classic editor use
    );

    register_post_type('student', $args);
    
    // ২. 
    if (get_transient('cms_flush_rewrites')) {
        flush_rewrite_rules();
        delete_transient('cms_flush_rewrites');
    }
}

// ৩. CPT 
function cms_student_activation() {
    cms_register_student_post_type();
    set_transient('cms_flush_rewrites', true, 60);
}