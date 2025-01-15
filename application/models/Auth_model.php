<?php
class Auth_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }

    public function login($email, $password){
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('users');
        return $query->row_array();
    }

    public function register($data){
        $this->db->insert('users', $data);
    }

    public function email_exists($email) {  
        $this->db->where('email', $email);  
        $query = $this->db->get('users'); // Ganti 'users' dengan nama tabel yang sesuai  
  
        // Mengembalikan true jika email ada, false jika tidak  
        return $query->num_rows() > 0;  
    } 

    public function cek_kategori($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function cek_notifikasi($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('notification_settings');
        return $query->result_array();
    }
}


?>