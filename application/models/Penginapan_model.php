<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penginapan_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_penginapan() {
        $this->db->select('p.*, u.nama as nama_mitra');
        $this->db->from('penginapan p');
        $this->db->join('users u', 'p.id_user = u.id_user');
        return $this->db->get()->result();
    }

    public function count_penginapan() {
        return $this->db->count_all('penginapan');
    }

    public function get_penginapan_by_id($id_penginapan) {
        return $this->db->get_where('penginapan', array('id_penginapan' => $id_penginapan))->row();
    }

    public function update_status_penginapan($id_penginapan, $status) {
        $this->db->where('id_penginapan', $id_penginapan);
        return $this->db->update('penginapan', array('status' => $status));
    }

    // CRUD operations
    public function insert_penginapan($data) {
        return $this->db->insert('penginapan', $data);
    }

    public function update_penginapan($id, $data) {
        $this->db->where('id_penginapan', $id);
        return $this->db->update('penginapan', $data);
    }

    public function delete_penginapan($id) {
        $this->db->where('id_penginapan', $id);
        return $this->db->delete('penginapan');
    }
}
?>
