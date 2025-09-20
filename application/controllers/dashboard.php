<?php 
class Dashboard extends CI_Controller{
    // public function __construct(){
    //     parent::__construct();
    // }
    public function index(){
        // $this->db->select('')->from('user');
        // $this->db->order_by('nama','ASC');
        // $user = $this->db->get()->result_array();
        // $data = array(
        //     'user' => $user
        // );
        // $data['user'] = $this->Model_user->tampil_data();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }
    // public function tambah_user(){
    //     $this->load->view('template/header');
    //     $this->load->view('template/sidebar');
    //     $this->load->view('tambah_user');
    //     $this->load->view('template/footer');
    // }
    // public function simpan(){
    //     $username   =   $this->input->post('username');
    //     $this->db->from('user');
    //     $this->db->where('username', $username);
    //     $cek = $this->db->get()->result_array();
    //     if ($cek) {
    //         $this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                 <i class="fa fa-exclamation-circle me-2"></i>Maaf, Username sudah digunakan !!
    //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //             </div>');
    //             redirect(site_url('user'));
    //     }else {
    //         $this->Model_user->simpan();
    //         $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
    //                 <i class="fa fa-exclamation-circle me-2"></i>Selamat, Berhasil Disimpan !!
    //                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //             </div>');
    //             redirect(site_url('user'));
    //     }
    //     }
    //     public function hapus($id){
    //         $where = array(
    //             'id_user'=> $id
    //             );
    //             $this->db->delete('user', $where);
    //             $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show" role="alert">
    //                     <i class="fa fa-exclamation-circle me-2"></i>Selamat, Berhasil Dihapus !!
    //                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //                 </div>');
    //             redirect('User');
    //             }
    //     public function edit($id){
    //         $this->db->select('')->from('user');
    //         $this->db->where('id_user', $id);
    //         $user = $this->db->get()->result_array();
    //         $data = array('user'=> $user);
            
    //         // $where = array('id_user'=> $id);
    //         // $data['user'] = $this->Model_user->edit($where,'user')->result();

    //         $this->load->view('template/header');
    //         $this->load->view('template/sidebar');
    //         $this->load->view('edit', $data);
    //         $this->load->view('template/footer');
    //     }
    //     public function update(){
    //         $id          = $this->input->post('id_user');
    //         $nama        = $this->input->post('nama');
    //         $level       = $this->input->post('level');    
    //         $data = array(
    //             'id_user'       => $id,
    //             'nama'          => $nama,
    //             'level'         => $level
    //         );
    //         $where = array(
    //             'id_user'=> $id
    //         );
    //         $this->Model_user->update($where,$data,'user');
    //         $this->session->set_flashdata('alert','<div class="alert alert-success alert-dismissible fade show mt-1" role="alert">
    //             <i class="fa fa-exclamation-circle me-2 "></i>Selamat, Berhasil Diperbarui !!
    //             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //         </div>');
    //         redirect ('user');
    //     }
    }

?>
