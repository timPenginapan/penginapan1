<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Penginapan_model');
        $this->load->model('Reservasi_model');
        $this->load->model('Transaksi_model');
        $this->load->model('Komentar_model');
        
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
    $data['title'] = 'Dashboard';
    $data['total_customers'] = $this->User_model->count_customers();
    $data['total_mitra'] = $this->User_model->count_mitra();
    $data['total_penginapan'] = $this->Penginapan_model->count_penginapan();
    $data['total_reservasi'] = $this->Reservasi_model->count_reservasi();
    $data['total_transaksi'] = $this->Transaksi_model->count_transaksi();
    $data['reservasi_terbaru'] = $this->Reservasi_model->get_reservasi_terbaru(5);

    $this->load->view('template_admin/header', $data);
    $this->load->view('template_admin/sidebar', $data);
    $this->load->view('admin/dashboard', $data);
    $this->load->view('template_admin/footer', $data);
}

}
?>