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
}


?>