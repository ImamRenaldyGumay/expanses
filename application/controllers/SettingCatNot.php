<?php
class SettingCatNot extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_id')) {
            redirect('Login');
        }
        $this->load->model('SettingCatNot_model', 'SCN');
    }

    public function add_new_index(){
        $data['title'] = 'Tambah Kategori';
        $this->load->view('create_categories', $data);
    }

    public function add_process(){
        if ($this->input->post()) {  
            // Mengambil data dari formulir  
            $user_id = $this->session->userdata('user_id');
            $income1 = $this->input->post('income1');  
            $income2 = $this->input->post('income2');  
            $expense1 = $this->input->post('expense1');  
            $expense2 = $this->input->post('expense2');  
  
            // Validasi di server  
            if (!preg_match('/^[A-Za-z\s]+$/', $income1) ||   
                !preg_match('/^[A-Za-z\s]+$/', $income2) ||   
                !preg_match('/^[A-Za-z\s]+$/', $expense1) ||   
                !preg_match('/^[A-Za-z\s]+$/', $expense2) ||   
                preg_match('/^\s/', $income1) ||   
                preg_match('/^\s/', $income2) ||   
                preg_match('/^\s/', $expense1) ||   
                preg_match('/^\s/', $expense2)) {  
                // Jika ada input yang tidak valid, kembali ke formulir dengan pesan kesalahan  
                $this->session->set_flashdata('error', 'Input tidak boleh dimulai dengan spasi dan hanya huruf serta spasi yang diperbolehkan.');  
                redirect('Insert_Kategori', 'refresh');  
            }  
  
            // Lakukan sesuatu dengan data, misalnya simpan ke database  
            // Contoh: Simpan ke database menggunakan model  
  
            // Tampilkan data yang diterima  
            // Save income categories  
            $this->SCN->insert_category($user_id, $income1, 'income');  
            $this->SCN->insert_category($user_id, $income2, 'income');  
    
            // Save expense categories  
            $this->SCN->insert_category($user_id, $expense1, 'expense');  
            $this->SCN->insert_category($user_id, $expense2, 'expense');
  
            $this->session->set_flashdata('success', 'Data berhasil disimpan.');  
            redirect('Insert_Notification', 'refresh');
        } else {  
            redirect('Insert_Kategori', 'refresh'); // Kembali ke formulir jika tidak ada data  
        } 
    }

    public function add_Notification(){
        $data['title'] = 'Tambah Notifikasi';
        $this->load->view('create_notification', $data);
    }

    public function add_Notification_process(){
        if ($this->input->post()) {
            $user_id = $this->session->userdata('user_id');
            $reminder_month = $this->input->post('reminder_month');  
            $reminder_date = $this->input->post('reminder_day');
            $treshold_amount = $this->input->post('treshold_amount');
            $email = $this->input->post('email');

            $data = [
                'user_id' => $user_id,
                'reminder_date' => $reminder_date,
                'threshold_amount' => $treshold_amount,
                'email' => $email,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $input = $this->SCN->insert_notification($data);
            if ($input) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan.');
                redirect('Dashboard', 'refresh');
            }else{
                $this->session->set_flashdata('error', 'Data gagal disimpan.');
                redirect('Insert_Notification', 'refresh');
            }
        }
    }
}

?>