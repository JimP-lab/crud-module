<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clients_Model extends App_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        if ($id != '') {
            $this->db->where('ID', $id);
            return $this->db->get(db_prefix() . 'crud_clients')->row();
        }
        return $this->db->get(db_prefix() . 'crud_clients')->result_array();
    }

    public function add($data)
    {
        $data = [
            'id' => $data['ID'],
            'name' => $data['name'],
            'vat' => $data['vat'],
        ];
        $this->db->insert(db_prefix() . 'crud_clients', $data);
        return $this->db->insert_id();
    }


    public function update($id, $data)
    {
        $this->db->where('ID', $id);
        return $this->db->update(db_prefix() . 'crud_clients', $data);
    }

    public function delete($id)
    {      
        $this->db->delete('crud_clients', array('ID' => $id));
        return $this->db->delete(db_prefix() . 'crud_clients');
    }

    public function getAllClients()
    {
        return $this->db->get(db_prefix() . 'crud_clients')->result_array();
    }
}