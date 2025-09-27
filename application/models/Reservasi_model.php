<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservasi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_reservasi() {
        $this->db->select('r.*, u.nama as nama_customer, p.nama_penginapan');
        $this->db->from('reservasi r');
        $this->db->join('users u', 'r.id_user = u.id_user');
        $this->db->join('penginapan p', 'r.id_penginapan = p.id_penginapan');
        $this->db->order_by('r.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function get_reservasi_terbaru($limit = 5) {
        $this->db->select('r.*, u.nama as nama_customer, p.nama_penginapan');
        $this->db->from('reservasi r');
        $this->db->join('users u', 'r.id_user = u.id_user');
        $this->db->join('penginapan p', 'r.id_penginapan = p.id_penginapan');
        $this->db->order_by('r.created_at', 'DESC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }

    public function count_reservasi() {
        return $this->db->count_all('reservasi');
    }

    public function update_status($id_reservasi, $status) {
        $this->db->where('id_reservasi', $id_reservasi);
        return $this->db->update('reservasi', array('status' => $status));
    }

    public function get_reservasi_by_id($id_reservasi) {
        return $this->db->get_where('reservasi', array('id_reservasi' => $id_reservasi))->row();
    }
}
?>