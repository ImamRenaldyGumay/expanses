<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function get_user_by_email($email)
    {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }

    public function create_user($data)
    {
        return $this->db->insert('users', $data);
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