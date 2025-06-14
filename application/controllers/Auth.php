<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        // Redirect ke halaman login jika belum login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
        redirect('dashboard');
    }

    public function login()
    {
        // Cek jika user sudah login
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        // Set rules validasi
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            // Proses login
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember');

            // Cek user di database
            $user = $this->User_model->get_user_by_email($email);

            if ($user) {
                // Verifikasi password
                if (password_verify($password, $user['password'])) {
                    // Set session
                    $user_data = array(
                        'user_id' => $user['id'],
                        'email' => $user['email'],
                        'name' => $user['first_name'] . ' ' . $user['last_name'],
                        'role' => $user['role'],
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($user_data);

                    // Set remember me cookie jika dicentang
                    if ($remember) {
                        $this->set_remember_cookie($user['id']);
                    }

                    // Redirect berdasarkan role
                    switch ($user['role']) {
                        case 'admin':
                            redirect('admin/dashboard');
                            break;
                        case 'manager':
                            redirect('manager/dashboard');
                            break;
                        default:
                            redirect('user/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('error', 'Password salah!');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('error', 'Email tidak ditemukan!');
                redirect('auth/login');
            }
        }
    }

    public function register()
    {
        if ($this->session->userdata('logged_in')) {
            redirect('dashboard');
        }

        $this->form_validation->set_rules('first_name', 'Nama Depan', 'required|trim');
        $this->form_validation->set_rules('last_name', 'Nama Belakang', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|trim');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'Register';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            $data = array(
                'first_name' => $this->security->xss_clean($this->input->post('first_name')),
                'last_name' => $this->security->xss_clean($this->input->post('last_name')),
                'email' => $this->security->xss_clean($this->input->post('email')),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => 'user', // Default role untuk user baru
                'created_at' => date('Y-m-d H:i:s')
            );

            if ($this->User_model->create_user($data)) {
                $this->session->set_flashdata('success', 'Registrasi berhasil! Silakan login.');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Registrasi gagal! Silakan coba lagi.');
                redirect('auth/register');
            }
        }
    }

    public function logout()
    {
        // Hapus session
        $this->session->unset_userdata(['user_id', 'email', 'name', 'logged_in']);

        // Hapus remember me cookie
        delete_cookie('remember_token');

        // Redirect ke login
        $this->session->set_flashdata('success', 'Anda telah logout');
        redirect('auth/login');
    }

    private function set_remember_cookie($user_id)
    {
        // Generate token
        $token = bin2hex(random_bytes(32));

        // Simpan token ke database
        $this->User_model->save_remember_token($user_id, $token);

        // Set cookie
        $cookie = array(
            'name' => 'remember_token',
            'value' => $token,
            'expire' => 30 * 24 * 60 * 60, // 30 hari
            'secure' => TRUE,
            'httponly' => TRUE
        );
        $this->input->set_cookie($cookie);
    }

    public function forgot_password()
    {
        $data['title'] = 'Lupa Password';
        $this->load->view('templates/header', $data);
        $this->load->view('auth/forgot_password');
        $this->load->view('templates/footer');
    }

    // Social login methods
    public function google_login()
    {
        // Implementasi Google login
        redirect('auth/login');
    }

    public function facebook_login()
    {
        // Implementasi Facebook login
        redirect('auth/login');
    }

    public function twitter_login()
    {
        // Implementasi Twitter login
        redirect('auth/login');
    }
}
?>