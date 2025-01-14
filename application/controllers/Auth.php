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
            // Ambil data dari form  
            $fullName = $this->input->post('fullName');  
            $email = $this->input->post('email');  
            $password = $this->input->post('password');  
            $confirmPassword = $this->input->post('confirmPassword');
            // Validasi password  
            if ($password !== $confirmPassword) {  
                $this->session->set_flashdata('error', 'Password tidak cocok.');  
                redirect('auth/register');  
            }  
    
            // Cek apakah email sudah terdaftar  
            if ($this->User_model->email_exists($email)) {  
                $this->session->set_flashdata('error', 'Email sudah terdaftar.');  
                redirect('auth/register');  
            }
            $data = [
                'name' => $fullName,
                'email' => $email,
                'password' => md5($password),
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