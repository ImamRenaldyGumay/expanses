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

        $data['transactions'] = $this->Report_model->get_transactions($type, $start_date, $end_date);
        $data['total_income'] = $this->Report_model->get_total('income', $start_date, $end_date);
        $data['total_expense'] = $this->Report_model->get_total('expense', $start_date, $end_date);

        $data['title'] = 'Laporan Transaksi';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('transaction_report', $data);
        $this->load->view('templates/footer_dashboard');
    }

    // Laporan berdasarkan kategori
    public function by_category() {
        $type = $this->input->get('type');
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        $data['reports'] = $this->Report_model->get_by_category($type, $start_date, $end_date);
        $data['type'] = $type;
        $this->load->view('report_by_category', $data);
    }

    // Laporan bulanan
    public function by_month() {
        $year = $this->input->get('year') ?? date('Y');
        $month = $this->input->get('month') ?? date('m');

        $data['report'] = $this->Report_model->get_monthly_report($year, $month);
        $data['year'] = $year;
        $data['month'] = $month;

        $this->load->view('report_by_month', $data);
    }


    // Laporan tahunan
    public function by_year() {
        $data['reports'] = $this->Report_model->get_by_year();
        $this->load->view('report_by_year', $data);
    }
}