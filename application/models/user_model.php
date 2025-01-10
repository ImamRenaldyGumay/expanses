<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class user_model extends CI_Model{
        public function __construct(){
            parent::__construct();
        }

        public function get_user($email, $password) {
            return $this->db->get_where('users', ['email' => $email, 'password' => $password])->row();
        }
    }
?>