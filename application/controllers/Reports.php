<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Report_model');
        $this->load->helper('url');
    }

    // Menampilkan laporan transaksi
    public function index() {
        $type = $this->input->get('type');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');
        $user_id = $this->session->userdata('user_id');

        $data['transactions'] = $this->Report_model->get_transactions($user_id, $type, $start_date, $end_date);
        $data['total_income'] = $this->Report_model->get_total($user_id, 'income', $start_date, $end_date);
        $data['total_expense'] = $this->Report_model->get_total($user_id, 'expense', $start_date, $end_date);

        $data['title'] = 'Laporan Transaksi';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/navbar_dashboard');
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('transaction_report', $data);
        $this->load->view('templates/footer_dashboard');
    }

    // Laporan berdasarkan kategori
    public function by_category() {
        $user_id = $this->session->userdata('user_id');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        // Ambil data income dan expense
        $income_reports = $this->Report_model->get_by_category($user_id, 'income', $start_date, $end_date);
        $expense_reports = $this->Report_model->get_by_category($user_id, 'expense', $start_date, $end_date);

        $data['income_reports'] = $income_reports;
        $data['expense_reports'] = $expense_reports;

        $data['title'] = 'Laporan Berdasarkan Kategori';
        $data['start_date'] = $start_date;
        $data['end_date'] = $end_date;
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/navbar_dashboard');
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('report_by_category', $data);
        $this->load->view('templates/footer_dashboard');
    }

    // Laporan bulanan
    public function by_month() {
        $user_id = $this->session->userdata('user_id');
        $year = $this->input->get('year') ?? date('Y');
        $month = $this->input->get('month') ?? date('m');

        $data['report'] = $this->Report_model->get_monthly_report($user_id, $year, $month);
        $data['income_categories'] = $this->Report_model->get_category_report($user_id, $year, $month, 'income');
        $data['expense_categories'] = $this->Report_model->get_category_report($user_id, $year, $month, 'expense');
        $data['year'] = $year;
        $data['month'] = $month;

        $data['title'] = 'Laporan Bulanan';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/navbar_dashboard');
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('report_by_month', $data);
        $this->load->view('templates/footer_dashboard');
    }


    // Laporan tahunan
    public function by_year() {
        $user_id = $this->session->userdata('user_id');
        $year = $this->input->get('year');
        // Fetch report data  
        $report = $this->Report_model->get_yearly_report($user_id, $year);  
        
        // Fetch category-wise income data  
        $income_categories = $this->Report_model->get_category_report_by_year($user_id, $year, 'income');  
        
        // Fetch category-wise expense data  
        $expense_categories = $this->Report_model->get_category_report_by_year($user_id, $year, 'expense');  
    
        $data = [  
            'year' => $year,  
            'report' => $report,  
            'income_categories' => $income_categories, // Pass income categories to the view  
            'expense_categories' => $expense_categories // Pass expense categories to the view  
        ];

        $data['title'] = 'Laporan Tahunan';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/navbar_dashboard');
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('report_by_year', $data);
        $this->load->view('templates/footer_dashboard');
    }
}
