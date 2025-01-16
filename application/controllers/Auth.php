<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Auth extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->model('Auth_model');
        }

        public function login(){
            if ($this->session->userdata('logged_in')) {  
                redirect('Dashboard');  
            } 
            $data['title'] = 'Login Page';
            $this->load->view('auth/login', $data);
        }

        public function proses_login(){
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $user = $this->Auth_model->login($email, $password);
            if ($user) {
                $cek_kategori = $this->Auth_model->cek_kategori($user['id']);
                if(empty($cek_kategori) && empty($cek_notifikasi)){
                    $this->session->set_flashdata('error', 'Anda belum memilih kategori.');
                    $this->session->set_userdata([
                        'user_id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'created_at' => $user['created_at'],
                        'logged_in' => TRUE
                    ]);
                    redirect('Insert_Kategori', 'refresh');
                }else{
                    $this->session->set_userdata([
                        'user_id' => $user['id'],
                        'name' => $user['name'],
                        'email' => $user['email'],
                        'created_at' => $user['created_at'],
                        'logged_in' => TRUE
                    ]);
                    $this->session->set_flashdata('success', 'Login berhasil.');
                    redirect('Dashboard', 'refresh');
                }
                
            } else {
                $this->session->set_flashdata('error', 'Email atau password salah.');
                redirect('Login', 'refresh');
            }
        }

        public function register(){
            $data['title'] = 'Register Page';
            $this->load->view('auth/register', $data);
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
                redirect('Register', 'refresh');  
            }  
    
            // Cek apakah email sudah terdaftar  
            if ($this->Auth_model->email_exists($email)) {  
                $this->session->set_flashdata('error', 'Email sudah terdaftar.');  
                redirect('Login', 'refresh');  
            }
            $data = [
                'name' => $fullName,
                'email' => $email,
                'password' => md5($password),
                'created_at' => date('Y-m-d H:i:s')
            ];

            if($this->Auth_model->register($data)){
                $this->session->set_flashdata('success', 'Registrasi berhasil.');
                redirect('Login', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Email sudah terdaftar.');
                redirect('Register', 'refresh');
            }
        }

        public function logout(){
            $this->session->sess_destroy();
            redirect('Login', 'refresh');
        }
    }
?>