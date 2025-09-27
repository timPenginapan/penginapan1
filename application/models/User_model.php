<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_user_by_email($email) {
        return $this->db->get_where('users', array('email' => $email))->row();
    }

    public function get_all_customers() {
        return $this->db->get_where('users', array('role' => 'customer'))->result();
    }

    public function get_all_mitra() {
        return $this->db->get_where('users', array('role' => 'mitra'))->result();
    }

    public function count_customers() {
        return $this->db->where('role', 'customer')->count_all_results('users');
    }

    public function count_mitra() {
        return $this->db->where('role', 'mitra')->count_all_results('users');
    }

    public function get_user_by_id($id_user) {
        return $this->db->get_where('users', array('id_user' => $id_user))->row();
    }

    // crud

    public function insert_user($data) {
    return $this->db->insert('users', $data);
}

public function update_user($id, $data) {
    $this->db->where('id_user', $id);
    return $this->db->update('users', $data);
}

public function delete_user($id) {
    $this->db->where('id_user', $id);
    return $this->db->delete('users');
}
}
?>