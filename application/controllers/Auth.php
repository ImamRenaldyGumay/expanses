<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Auth extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Auth_model');
        }

        public function login(){
            $this->load->view('auth/login');
        }

        public function proses_login(){
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $user = $this->Auth_model->login($email, $password);
            if ($user) {
                $this->session->set_userdata('user_id', $user['id']);
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah.');
                redirect('Login');
            }
        }

        public function register(){
            $this->load->view('auth/register');
        }

        public function proses_register(){
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'created_at' => date('Y-m-d H:i:s')
            ];
            if($this->Auth_model->register($data)){
                $this->session->set_flashdata('success', 'Registrasi berhasil.');
                redirect('Login');
            }else{
                $this->session->set_flashdata('error', 'Email sudah terdaftar.');
                redirect('Register');
            }
        }

        public function logout(){
            $this->session->unset_userdata('user_id');
            redirect('Login');
        }
    }
?>