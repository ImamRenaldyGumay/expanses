<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transactions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Transaction_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    // Melihat daftar transaksi
    public function index() {
        $data['transactions'] = $this->Transaction_model->get_all_transactions();
        $data['title'] = 'Daftar Transaksi';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('view_transactions', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function add_income(){
        $user_id = $this->session->userdata('user_id');
        $data['categories'] = $this->Transaction_model->get_categories($user_id, 'income');
        $data['title'] = 'Tambah Pemasukan';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/navbar_dashboard');
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('add_income_view', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function income_process(){
        $data = [
            'user_id' => $this->session->userdata('user_id'), // Sesuaikan dengan sesi user
            'amount' => $this->input->post('amount'),
            'description' => $this->input->post('description'),
            'category_id' => $this->input->post('category_id'),
            'transaction_date' => $this->input->post('transaction_date'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $input = $this->Transaction_model->add_income($data);
        if ($input){
            $this->session->set_flashdata('success', 'Input Pemasukan ditambahkan');
            redirect('Dashboard', 'refresh');
        }else{
            $this->session->set_flashdata('error', 'Input Pemasukan gagal ditambahkan');
            redirect('add_income', 'refresh');
        }
    }

    public function add_expense() {
        $user_id = $this->session->userdata('user_id');
        $data['categories'] = $this->Transaction_model->get_categories($user_id, 'expense');
        $data['title'] = 'Tambah Pengeluaran';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/navbar_dashboard');
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('add_expense_view', $data);
        $this->load->view('templates/footer_dashboard');
    }

    public function expanse_process(){

        $data = [
            'user_id' => $this->session->userdata('user_id'), // Sesuaikan dengan sesi user
            'amount' => $this->input->post('amount'),
            'description' => $this->input->post('description'),
            'category_id' => $this->input->post('category_id'),
            'transaction_date' => $this->input->post('transaction_date'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // echo '<pre>';
        // print_r($data);
        // echo '</pre>';
        // die();

        $input = $this->Transaction_model->add_expense($data);
        if ($input){
            $this->session->set_flashdata('success', 'Pengeluaran ditambahkan');
            redirect('Dashboard', 'refresh');
        }else{
            $this->session->set_flashdata('error', 'Pengeluaran gagal ditambahkan');
            redirect('add-expense', 'refresh');
        }
    }
}
