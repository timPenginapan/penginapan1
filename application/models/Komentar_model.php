<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Komentar_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_komentar_pending() {
        $this->db->select('k.*, u.nama as nama_customer, p.nama_penginapan');
        $this->db->from('komentar k');
        $this->db->join('users u', 'k.id_user = u.id_user');
        $this->db->join('penginapan p', 'k.id_penginapan = p.id_penginapan');
        $this->db->where('k.status', 'pending');
        $this->db->order_by('k.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function approve_komentar($id_komentar) {
        $this->db->where('id_komentar', $id_komentar);
        return $this->db->update('komentar', array('status' => 'disetujui'));
    }

    public function reject_komentar($id_komentar) {
        $this->db->where('id_komentar', $id_komentar);
        return $this->db->update('komentar', array('status' => 'ditolak'));
    }

    public function count_komentar_pending() {
        return $this->db->where('status', 'pending')->count_all_results('komentar');
    }
}
?>