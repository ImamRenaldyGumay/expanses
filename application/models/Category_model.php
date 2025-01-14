<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    // Mengambil semua kategori
    public function get_all_categories() {
        $query = $this->db->get('categories');
        return $query->result();
    }

    // Menambahkan kategori baru
    public function insert_category($name, $type) {
        $data = [
            'name' => $name,
            'type' => $type
        ];
        $this->db->insert('categories', $data);
    }

    // Mengubah kategori
    public function update_category($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('categories', $data);
    }

    // Menghapus kategori
    public function delete_category($id) {
        $this->db->where('id', $id);
        $this->db->delete('categories');
    }
}
