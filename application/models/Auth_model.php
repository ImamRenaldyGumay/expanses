<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        // Get user by email
        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        // If user exists and password matches
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }

    public function register($data)
    {
        // Hash password before saving
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return $this->db->insert('users', $data);
    }

    public function email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('users'); // Ganti 'users' dengan nama tabel yang sesuai  

        // Mengembalikan true jika email ada, false jika tidak  
        return $query->num_rows() > 0;
    }

    public function cek_kategori($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    public function cek_notifikasi($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('notification_settings');
        return $query->result_array();
    }

    public function save_remember_token($user_id, $token)
    {
        $data = [
            'user_id' => $user_id,
            'token' => $token,
            'created_at' => date('Y-m-d H:i:s')
        ];
        return $this->db->insert('remember_tokens', $data);
    }
}


?>