<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
    }

    public function index(){
        // halaman login
        $this->load->view('admin/login');
    }

    public function login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->db->from('users')->where('email', $email);
        $cek = $this->db->get()->row();

        if ($cek == NULL) {
            $this->session->set_flashdata('notifikasi', '
                <div class="alert alert-danger">Email tidak ditemukan!</div>
            ');
            redirect('auth');
        } elseif (password_verify($password, $cek->password)) {
            $data = array(
                'id_user'   => $cek->id_user,
                'nama'      => $cek->nama,
                'email'     => $cek->email,
                'role'      => $cek->role,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($data);

            // arahkan sesuai role
            if ($cek->role == 'admin') {
                redirect('admin/dashboard');
            } elseif ($cek->role == 'mitra') {
                redirect('mitra/dashboard');
            } else {
                redirect('customer/home');
            }

        } else {
            $this->session->set_flashdata('notifikasi', '
                <div class="alert alert-danger">Password salah!</div>
            ');
            redirect('auth');
        }
    }

    public function registrasi(){
        // halaman form registrasi
        $this->load->view('admin/registrasi');
    }

    public function simpan_registrasi(){
        $nama     = $this->input->post('nama');
        $email    = $this->input->post('email');
        $password = $this->input->post('password');
        $role     = $this->input->post('role');

        $data = array(
            'nama'     => $nama,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role'     => $role
        );

        $this->db->insert('users', $data);

        $this->session->set_flashdata('notifikasi', '
            <div class="alert alert-success">Registrasi berhasil, silakan login.</div>
        ');
        redirect('auth');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('auth');
    }
}
