<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_pengeluaran() {
        $query = $this->db->get('pengeluaran');
        return $query->result_array();
    }

    public function tambah_pengeluaran($data) {
        return $this->db->insert('pengeluaran', $data);
    }

    public function get_pengeluaran_by_id($id) {
        $query = $this->db->get_where('pengeluaran', array('id' => $id));
        return $query->row_array();
    }

    public function update_pengeluaran($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pengeluaran', $data);
    }

    public function hapus_pengeluaran($id) {
        $this->db->where('id', $id);
        return $this->db->delete('pengeluaran');
    }
}