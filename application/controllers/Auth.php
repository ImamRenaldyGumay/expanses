<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Auth extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Auth_model');
        }

        public function login(){
            if ($this->session->userdata('logged_in')) {  
                redirect('dashboard');  
            } 
            $data['title'] = 'Login Page';
            $this->load->view('auth/login', $data);
        }

        public function proses_login(){
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
            $user = $this->Auth_model->login($email, $password);
            if ($user) {
                $this->session->set_userdata([
                    'user_id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'logged_in' => TRUE
                ]);
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