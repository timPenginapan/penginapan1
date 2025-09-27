<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Management Customer';
        $data['customers'] = $this->User_model->get_all_customers();
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/management_customer', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function get_customer($id) {
        $customer = $this->User_model->get_user_by_id($id);
        echo json_encode($customer);
    }

    public function simpan() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat'),
                'role' => 'customer'
            );

            if ($this->User_model->insert_user($data)) {
                $response = array('status' => 'success', 'message' => 'Customer berhasil ditambahkan');
            } else {
                $response = array('status' => 'error', 'message' => 'Gagal menambahkan customer');
            }
        } else {
            $response = array('status' => 'error', 'message' => validation_errors());
        }

        echo json_encode($response);
    }

    public function update() {
        $id = $this->input->post('id_user');
        
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_hp' => $this->input->post('no_hp'),
                'alamat' => $this->input->post('alamat')
            );

            if ($this->input->post('password')) {
                $data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            }

            if ($this->User_model->update_user($id, $data)) {
                $response = array('status' => 'success', 'message' => 'Customer berhasil diupdate');
            } else {
                $response = array('status' => 'error', 'message' => 'Gagal mengupdate customer');
            }
        } else {
            $response = array('status' => 'error', 'message' => validation_errors());
        }

        echo json_encode($response);
    }

    public function hapus($id) {
        if ($this->User_model->delete_user($id)) {
            $response = array('status' => 'success', 'message' => 'Customer berhasil dihapus');
        } else {
            $response = array('status' => 'error', 'message' => 'Gagal menghapus customer');
        }
        
        echo json_encode($response);
    }
}
?>