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
        $this->load->view('templates/navbar_dashboard');
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
            redirect('Categories');
        } else {
            echo "Data tidak valid.";
        }
    }

    public function edit(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $user_id = $this->session->userdata('user_id');
        $type = $this->input->post('type');

        $data = [
            'user_id' => $user_id,
            'name' => $name,
            'type' => $type,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $updated = $this->Category_model->update_category($id, $data);
        if ($updated) {
            $this->session->set_flashdata('message', 'Data berhasil diubah');
        } else {
            $this->session->set_flashdata('message', 'Data gagal diubah');
        }
        redirect('Categories', 'refresh');
    }

    // Menghapus kategori
    public function delete($id) {
        $delete = $this->Category_model->delete_category($id);
        if ($delete){
            $this->session->set_flashdata('message', 'Data berhasil dihapus');
        }else{
            $this->session->set_flashdata('message', 'Data gagal dihapus');
        }
        redirect('Categories', 'refresh');
    }
}
