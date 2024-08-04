<?php
defined('BASEPATH') or exit('No direct script access allowed');
$CI = &get_instance();
if (!$CI->db->table_exists(db_prefix() . 'crud_clients')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "crud_clients` (
      id INT AUTO_INCREMENT PRIMARY KEY,
      name VARCHAR(255) NOT NULL,
      vat VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}