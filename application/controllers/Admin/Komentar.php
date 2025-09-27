<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Komentar_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Moderasi Komentar';
        $data['komentar'] = $this->Komentar_model->get_komentar_pending();
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/moderasi_komentar', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function approve($id_komentar) {
        if ($this->Komentar_model->approve_komentar($id_komentar)) {
            $this->session->set_flashdata('success', 'Komentar berhasil disetujui');
        } else {
            $this->session->set_flashdata('error', 'Gagal menyetujui komentar');
        }
        redirect('komentar');
    }

    public function reject($id_komentar) {
        if ($this->Komentar_model->reject_komentar($id_komentar)) {
            $this->session->set_flashdata('success', 'Komentar berhasil ditolak');
        } else {
            $this->session->set_flashdata('error', 'Gagal menolak komentar');
        }
        redirect('komentar');
    }

    public function hapus($id_komentar) {
        if ($this->Komentar_model->delete_komentar($id_komentar)) {
            $this->session->set_flashdata('success', 'Komentar berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus komentar');
        }
        redirect('komentar');
    }
}
?>