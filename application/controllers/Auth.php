<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Auth extends CI_Controller{
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('Auth_model');
        }

        public function login(){
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
                'required' => '{field} Wajib di isi',
                'valid_email' => 'Masukkan {field} yang Valid',
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim', [
                'required' => '{field} Wajib diisi'
            ]);
            if ($this->form_validation->run() == FALSE){
                $data['title'] = 'Login Page';
                $this->load->view('auth/login', $data);
            }else{
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
            
        }

        public function register(){
            $this->form_validation->set_message('required', '{field} Wajib di isi');
            $this->form_validation->set_rules('fullName', 'Full Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
                'is_unique' => '{field} ini sudah terdaftar',
                'valid_email' => 'Masukkan {field} yang Valid',
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]',[
                'min_length' => 'Password minimal 6 karakter',
            ]);
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]',[
                'matches' => 'Password tidak cocok',
            ]);
            if ($this->form_validation->run() == FALSE){
                $data['title'] = 'Register Page';
                $this->load->view('auth/register', $data);
            }else{
                // Ambil data dari form  
                $fullName = $this->input->post('fullName');  
                $email = $this->input->post('email');  
                $password = $this->input->post('password');  
                // $confirmPassword = $this->input->post('confirmPassword');
                // // Validasi password  
                // if ($password !== $confirmPassword) {  
                //     $this->session->set_flashdata('error', 'Password tidak cocok.');  
                //     redirect('Register', 'refresh');  
                // }  
        
                // // Cek apakah email sudah terdaftar  
                // if ($this->Auth_model->email_exists($email)) {  
                //     $this->session->set_flashdata('error', 'Email sudah terdaftar.');  
                //     redirect('Login', 'refresh');  
                // }
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
            
        }

        public function proses_register(){
            // Ambil data dari form  
            $fullName = $this->input->post('fullName');  
            $email = $this->input->post('email');  
            $password = $this->input->post('password');  
            // $confirmPassword = $this->input->post('confirmPassword');
            // // Validasi password  
            // if ($password !== $confirmPassword) {  
            //     $this->session->set_flashdata('error', 'Password tidak cocok.');  
            //     redirect('Register', 'refresh');  
            // }  
    
            // // Cek apakah email sudah terdaftar  
            // if ($this->Auth_model->email_exists($email)) {  
            //     $this->session->set_flashdata('error', 'Email sudah terdaftar.');  
            //     redirect('Login', 'refresh');  
            // }
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