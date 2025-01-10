<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->helper('url');
    }

    // Menampilkan daftar kategori
    public function index() {
        $data['categories'] = $this->Category_model->get_all_categories();
        $data['title'] = 'Kelola Kategori';
        $this->load->view('templates/header_dashboard', $data);
        $this->load->view('templates/sidebar_dashboard');
        $this->load->view('manage_categories', $data);
        $this->load->view('templates/footer_dashboard');
    }

    // Menambahkan kategori
    public function add() {
        $name = $this->input->post('name');
        $type = $this->input->post('type');

        if ($name && $type) {
            $this->Category_model->insert_category($name, $type);
            redirect('categories');
        } else {
            echo "Data tidak valid.";
        }
    }

    // Menghapus kategori
    public function delete($id) {
        $this->Category_model->delete_category($id);
        redirect('categories');
    }
}
