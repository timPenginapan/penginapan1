<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Transaksi_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Management Transaksi';
        $data['transaksi'] = $this->Transaksi_model->get_all_transaksi();
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/management_transaksi', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function update_status() {
        $id_transaksi = $this->input->post('id_transaksi');
        $status = $this->input->post('status');
        
        if ($this->Transaksi_model->update_status_pembayaran($id_transaksi, $status)) {
            $this->session->set_flashdata('success', 'Status pembayaran berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate status pembayaran');
        }
        redirect('transaksi');
    }

    public function detail($id) {
        $data['title'] = 'Detail Transaksi';
        $data['transaksi'] = $this->Transaksi_model->get_transaksi_by_id($id);
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/transaksi_detail', $data);
        $this->load->view('template_admin/footer', $data);
    }
}
?>