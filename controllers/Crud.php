<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Crud extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Crud_Model');
        $this->load->model('Clients_Model');
    }

    public function Create()
    {
        if ($this->input->post()) {
            $data = $this->input->post();
            $this->Clients_Model->add($data);
            redirect(admin_url('crud/CreateClient'));
        }
        $this->load->view('Create');
    }

    public function CreateClient() {
        log_message('debug','Creating Clients');
        $this->load->view('Create_Client');
    }

    public function ClientCredentials() {
        log_message('debug','Processing Clients credentials');
        $name = $this->input->post('name'); 
        $vat = $this->input->post('vat');
    
        $data = [
            'name' => $name, 
            'vat' => $vat,
        ];
    
        $insert_id = $this->Clients_Model->add($data);
        if ($insert_id) {
            $this->session->set_flashdata('success', 'Client was added.');
            redirect(admin_url('crud/TablesClient'));
    
        } else {
            $this->session->set_flashdata('error', 'Failed to add Client.');
            redirect(admin_url('crud/CreateClient'));
        }
    }

    public function TablesClient($id= '')
    {     
        $Clients_data = $this->Clients_Model->get($id);
        if ($Clients_data) {        
            $this->load->model('Clients_Model'); 
            $this->db->select('id,name,vat');
            $this->db->from('crud_clients');
            $query = $this->db->get();
            $all_Clients_data = $query->result(); 
            $data['Clients'] = [];
            foreach ($all_Clients_data as $Client) {
                $data['Clients'][] = [
                    'id' => $Client['id'],
                    'name' => $Client->name,
                    'vat' => $Client->vat,
                ];
            }
            log_message('debug', 'Loading table view');
            $this->load->view('Show_Client', $data);
        } else {
            $this->session->set_flashdata('error', 'Vendor not found.');
            redirect(admin_url('crud/CreateClient'));
        }
    }
    public function EditClient($id = '')
{
    if ($this->input->post()) {
        $data = [
            'name' => $this->input->post('name'),
            'vat' => $this->input->post('vat'),
        ];

        $result = $this->Clients_Model->update($id, $data);

        if ($result) {
            $this->session->set_flashdata('success', 'Client was updated.');
        } else {
            $this->session->set_flashdata('error', 'Failed to update Client.');
        }
    }

    // Load client data for display
    $Client = $this->Clients_Model->get($id);

    if ($Client) {
        $data['Clients'] = $Client;
        $this->load->view('Edit_Client', $data);
    } else {
        $this->session->set_flashdata('error', 'Client not found.');
        $this->load->view('Create_Client');
    }
}

    public function DeleteClient()
{
    // Check if a deletion request was submitted
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $id = $this->input->post('id');
        if ($id) {
            $result = $this->Clients_Model->delete($id);
            if ($result) {
                $this->session->set_flashdata('success', 'Client deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to delete Client.');
            }
        } else {
            $this->session->set_flashdata('error', 'No vendor was found');
        }
        // Redirect to refresh the page after deletion attempt
        redirect(admin_url('crud/DeleteClient'));
    }

    // Fetch all vendors to display in the table
    $data['Clients'] = $this->Clients_Model->getAllClients();
    
    // Load the view with the vendor data
    $this->load->view('Delete_Client', $data);
}
}
?>
