<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_transaksi() {
        $this->db->select('t.*, r.id_reservasi, u.nama as nama_customer, p.nama_penginapan');
        $this->db->from('transaksi t');
        $this->db->join('reservasi r', 't.id_reservasi = r.id_reservasi');
        $this->db->join('users u', 'r.id_user = u.id_user');
        $this->db->join('penginapan p', 'r.id_penginapan = p.id_penginapan');
        $this->db->order_by('t.created_at', 'DESC');
        return $this->db->get()->result();
    }

    public function count_transaksi() {
        return $this->db->count_all('transaksi');
    }

    public function update_status_pembayaran($id_transaksi, $status) {
        $this->db->where('id_transaksi', $id_transaksi);
        $data = array('status_pembayaran' => $status);
        if ($status == 'lunas') {
            $data['tanggal_pembayaran'] = date('Y-m-d H:i:s');
        }
        return $this->db->update('transaksi', $data);
    }
}
?>