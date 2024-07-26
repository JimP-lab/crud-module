<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Crud extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Crud_model');
        $this->load->model('Clients_model');
    }

    public function Create()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            $this->Crud_model->add($data);
            redirect(admin_url('crud/crudCreateClient'));
        }
        $this->load->view('Create');
    }

    public function crudCreateClient() {
        log_message('debug','hello world');
        $this->load->view('Create');
    }

    public function crudClientCredentials() {
        log_message('debug','Processing client credentials');
        $Name = $this->input->post('Name');
        $VAT = $this->input->post('VAT');

        if (empty($Name) || empty($VAT)) {
            $this->session->set_flashdata('error', 'Name and VAT are required.');
            redirect(admin_url('crud/crudCreateClient'));
        }
        $data = [
            'Name' => $Name,
            'VAT' => $VAT,
        ];

        $insert_id = $this->Clients_model->add($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Client was added.');
            redirect(admin_url('crud/crudtablesClient/'));

        } else {
            $this->session->set_flashdata('error', 'Failed to add client.');
            redirect(admin_url('crud/crudCreateClient'));
        }
    }    

    public function crudtablesClient($id)
    {     
        $client_data = $this->Clients_model->get($id);
        if ($client_data) {
           
            $this->load->model('Clients_model'); 
            $this->db->select('Name, VAT');
            $this->db->from('crud_clients');

            $query = $this->db->get();
            $all_clients_data = $query->result(); 
            
            $data['crud'] = [];
            foreach ($all_clients_data as $client) {
                $data['crud'][] = [
                    'Name' => $client->Name,
                    'VAT' => $client->VAT,
                ];
            }
    
            log_message('debug', 'Loading table view');
            $this->load->view('Tables', $data);
        } else {
            $this->session->set_flashdata('error', 'Client not found.');
            redirect(admin_url('crud/crudCreateClient'));
        }
    }
    public function crudDeleteClient() {
        // Log message for debugging
        log_message('debug', 'Attempting to delete a client');
    
        // Check if a form is submitted for deletion
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // Get the client ID to be deleted
            $client_id = $this->input->post('client_id');
    
            if ($client_id) {
                // Attempt to delete the client
                $this->Clients_model->delete($client_id);
    
                // Set success message and redirect
                $this->session->set_flashdata('success', 'Client deleted successfully.');
                redirect(admin_url('crud/crudtablesClient'));
            } else {
                // Set error message if no client ID is provided
                $this->session->set_flashdata('error', 'No client selected for deletion.');
                redirect(admin_url('crud/crudtablesClient'));
            }
        } else {
            // If no POST request, show the delete form
            $this->load->view('Delete');
        }
    }
    
    
}
