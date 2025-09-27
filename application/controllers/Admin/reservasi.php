<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Reservasi_model');
        $this->load->model('User_model');
        $this->load->model('Penginapan_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Management Reservasi';
        $data['reservasi'] = $this->Reservasi_model->get_all_reservasi();
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/reservasi', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function detail($id) {
        $data['title'] = 'Detail Reservasi';
        $data['reservasi'] = $this->Reservasi_model->get_reservasi_by_id($id);
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/reservasi_detail', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function update_status() {
        $id_reservasi = $this->input->post('id_reservasi');
        $status = $this->input->post('status');
        
        if ($this->Reservasi_model->update_status($id_reservasi, $status)) {
            $this->session->set_flashdata('success', 'Status reservasi berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate status reservasi');
        }
        redirect('reservasi');
    }

    public function hapus($id) {
        if ($this->Reservasi_model->delete_reservasi($id)) {
            $this->session->set_flashdata('success', 'Reservasi berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus reservasi');
        }
        redirect('reservasi');
    }
}
?>