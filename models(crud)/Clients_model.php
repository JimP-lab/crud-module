<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clients_model extends App_Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    /**
     * Get client data by ID or all clients.
     *
     * @param  int|string $id Optional. Client ID.
     * @return object|array Client data.
     */
    public function get($id = '')
    {
        if ($id != '') {
            $this->db->where('ID', $id);
            return $this->db->get(db_prefix() . 'crud_clients')->row();
        }

        return $this->db->get(db_prefix() . 'crud_clients')->result_array();
    }

    /**
     * Add a new client.
     *
     * @param  array $data Client data.
     * @return int|bool Inserted client ID or false on failure.
     */
    public function add($data)
    {
        $data = [
            'Name' => $data['Name'],
            'VAT' => $data['VAT']
        ];

        $this->db->insert(db_prefix() . 'crud_clients', $data);
        return $this->db->insert_id();
    
    }

    /**
     * Update client data.
     *
     * @param  int $id Client ID.
     * @param  array $data Updated client data.
     * @return bool True on success, false on failure.
     */
    public function update($id, $data)
    {
        $data = [
            'Name' => $data['Name'],
            'VAT' => $data['VAT']
        ];

        $this->db->where('ID', $id);
        $this->db->update(db_prefix() . 'crud_clients', $data);
        $this->db->update('clients', $data);
        return $this->db->affected_rows() > 0;
    }
    /**
     * Delete a client.
     *
     * @param  int $id Client ID.
     * @return bool True on success, false on failure.
     */
    public function delete($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete(db_prefix() . 'crud_clients');
        return $this->db->affected_rows() > 0;
    }
}

