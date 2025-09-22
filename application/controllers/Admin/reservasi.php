<?php
class Reservasi extends CI_Controller {
    public function Index(){
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('Admin/reservasi');
        $this->load->view('template/footer');
    }
}
?>