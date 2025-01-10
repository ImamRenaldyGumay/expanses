<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Dashboard_model', 'DM');
        }

        public function index() {
            $user_id = $this->session->userdata('user_id');
            
            // Data untuk dashboard
            $data['total_income'] = $this->DM->get_total_income($user_id);
            $data['total_expense'] = $this->DM->get_total_expense($user_id);
            $data['current_balance'] = $data['total_income'] - $data['total_expense'];
            $data['recent_transactions'] = $this->DM->get_recent_transactions($user_id);
            // $data['user_id'] = $user_id;
            $data['title'] = 'Dashboard';

            // Load view
            $this->load->view('templates/header_dashboard', $data);
            $this->load->view('templates/sidebar_dashboard');
            $this->load->view('dashboard_view', $data);
            $this->load->view('templates/footer_dashboard');
        }
    }
?>
