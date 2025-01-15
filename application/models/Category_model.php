<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    // Mengambil semua kategori
    public function get_all_categories($user_id) {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('categories');
        return $query->result();
    }

    // Menambahkan kategori baru
    public function insert_category($user_id, $name, $type) {
        $data = [
            'user_id' => $user_id,
            'name' => $name,
            'type' => $type,
            'created_at' => date('Y-m-d H:i:s')
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
