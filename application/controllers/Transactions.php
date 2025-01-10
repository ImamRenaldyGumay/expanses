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

    // Form Tambah Income
    public function add_income() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('amount', 'Jumlah', 'required|numeric');
            $this->form_validation->set_rules('description', 'Deskripsi', 'required');
            $this->form_validation->set_rules('transaction_date', 'Tanggal Transaksi', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'user_id' => 1, // Sesuaikan dengan sesi user
                    'amount' => $this->input->post('amount'),
                    'description' => $this->input->post('description'),
                    'category_id' => $this->input->post('category_id'),
                    'transaction_date' => $this->input->post('transaction_date'),
                ];

                $this->Transaction_model->add_income($data);
                redirect('dashboard');
            }
        }

        // Ambil daftar kategori income untuk dropdown
        $data['categories'] = $this->Transaction_model->get_categories('income');
        $data['title'] = 'Tambah Pemasukan';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('add_income_view', $data);
        $this->load->view('templates/footer_dashboard');
    }

    // Form Tambah Expense
    public function add_expense() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('amount', 'Jumlah', 'required|numeric');
            $this->form_validation->set_rules('description', 'Deskripsi', 'required');
            $this->form_validation->set_rules('transaction_date', 'Tanggal Transaksi', 'required');

            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'user_id' => 1, // Sesuaikan dengan sesi user
                    'amount' => $this->input->post('amount'),
                    'description' => $this->input->post('description'),
                    'category_id' => $this->input->post('category_id'),
                    'transaction_date' => $this->input->post('transaction_date'),
                ];

                $this->Transaction_model->add_expense($data);
                redirect('dashboard');
            }
        }

        // Ambil daftar kategori expense untuk dropdown
        $data['categories'] = $this->Transaction_model->get_categories('expense');
        $data['title'] = 'Tambah Pengeluaran';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('add_expense_view', $data);
        $this->load->view('templates/footer_dashboard');
    }
}
