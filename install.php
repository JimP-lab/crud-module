<?php
defined('BASEPATH') or exit('No direct script access allowed');
$CI = &get_instance();
if (!$CI->db->table_exists(db_prefix() . 'crud_clients')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . "crud_clients` (
      `ID` int(11) NOT NULL AUTO_INCREMENT,
      `Name` varchar(127) NOT NULL,
      `VAT` varchar(15) NOT NULL,
      PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
}
