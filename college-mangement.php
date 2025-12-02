<?php  

/**
 * Plugin Name: College Management System
 * Description: Complete College Management with CPT + Custom Tables
 * Version: 1.0.0
 * Author: Rajendro
 */  

// 1.security check
if(!defined('ABSPATH')){
    exit;
}

// 2. constant

define('CMS_VERSION', '1.0.0');
define('CMS_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('CMS_PLUGIN_URL', plugin_dir_url(__FILE__));
define('CMS_TEXT_DOMAIN', 'college-management');

include_once CMS_PLUGIN_DIR . 'includes/metabox-students.php';
include_once CMS_PLUGIN_DIR . 'includes/cpt-students.php';

register_activation_hook(__FILE__, 'cms_flush_rewrites');

function cms_admin_styles($hook){

    
    if(strpos($hook, 'college-management') !==false || $hook == 'edit.php' || $hook == 'post.php' || $hook == 'post-new.php'){
        wp_enqueue_style('cms-admin-style', CMS_PLUGIN_URL.'assets/css/admin-style.css', [], CMS_VERSION);
    }
    

}

add_action('admin_enqueue_scripts', 'cms_admin_styles');

