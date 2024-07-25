<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends App_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = '')
    {
        if ($id != '') {
            $this->db->where('ID', $id);
            return $this->db->get(db_prefix() . 'crud')->row();
        }

        return $this->db->get(db_prefix() . 'crud')->result_array();
    }
}
