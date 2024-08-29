<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
Module Name: crud
Description: crud
Version: 1.0
Author: Brainfoodmedia
*/
define('CRUD_MODULE_NAME', 'crud');
define('CRUD_MODULE_PATH', 'modules/crud/');


crud_module_activation_hook();
    
function crud_module_activation_hook() {
    $CI = &get_instance();
    require_once(__DIR__ . '/install.php');
}

hooks()->add_action('admin_init', 'crud_module_init_menu_items');
    
function crud_module_init_menu_items() {
    $CI = &get_instance();

    if (is_admin()) {
        $CI->app_menu->add_sidebar_menu_item('crud', [
            'slug' => 'crud',
            'name' => _l('crud'),
            'icon' => 'fa fa-users',
            'href' => admin_url('crud/CreateClient'),
            'position' => 10,
        ]);
    }
}
?>
