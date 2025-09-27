<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penginapan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Penginapan_model');
        $this->load->model('User_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth');
        }
    }

    public function index() {
        $data['title'] = 'Management Penginapan';
        $data['penginapan'] = $this->Penginapan_model->get_all_penginapan();
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/management_penginapan', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function tambah() {
        $data['title'] = 'Tambah Penginapan';
        $data['mitra'] = $this->User_model->get_all_mitra();
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/penginapan_tambah', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function simpan() {
        $this->form_validation->set_rules('nama_penginapan', 'Nama Penginapan', 'required');
        $this->form_validation->set_rules('id_user', 'Mitra', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('jumlah_kamar', 'Jumlah Kamar', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'id_user' => $this->input->post('id_user'),
                'nama_penginapan' => $this->input->post('nama_penginapan'),
                'alamat' => $this->input->post('alamat'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'fasilitas' => $this->input->post('fasilitas'),
                'jumlah_kamar' => $this->input->post('jumlah_kamar'),
                'status' => $this->input->post('status')
            );

            if ($this->Penginapan_model->insert_penginapan($data)) {
                $this->session->set_flashdata('success', 'Penginapan berhasil ditambahkan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan penginapan');
            }
            redirect('penginapan');
        }
    }

    public function edit($id) {
        $data['title'] = 'Edit Penginapan';
        $data['penginapan'] = $this->Penginapan_model->get_penginapan_by_id($id);
        $data['mitra'] = $this->User_model->get_all_mitra();
        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar', $data);
        $this->load->view('admin/penginapan_edit', $data);
        $this->load->view('template_admin/footer', $data);
    }

    public function update($id) {
        $this->form_validation->set_rules('nama_penginapan', 'Nama Penginapan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('jumlah_kamar', 'Jumlah Kamar', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $this->edit($id);
        } else {
            $data = array(
                'nama_penginapan' => $this->input->post('nama_penginapan'),
                'alamat' => $this->input->post('alamat'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga' => $this->input->post('harga'),
                'fasilitas' => $this->input->post('fasilitas'),
                'jumlah_kamar' => $this->input->post('jumlah_kamar'),
                'status' => $this->input->post('status')
            );

            if ($this->Penginapan_model->update_penginapan($id, $data)) {
                $this->session->set_flashdata('success', 'Penginapan berhasil diupdate');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate penginapan');
            }
            redirect('penginapan');
        }
    }

    public function hapus($id) {
        if ($this->Penginapan_model->delete_penginapan($id)) {
            $this->session->set_flashdata('success', 'Penginapan berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus penginapan');
        }
        redirect('penginapan');
    }

public function update_status()
{
    $id = $this->input->post('id');
    $status = $this->input->post('status');

    $this->db->where('id_penginapan', $id);
    $this->db->update('penginapan', ['status' => $status]);

    $this->session->set_flashdata('success', 'Status penginapan berhasil diperbarui.');
    redirect('admin/penginapan');
}

}
?>