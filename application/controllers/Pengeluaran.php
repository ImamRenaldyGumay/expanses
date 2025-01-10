<?php
class Pengeluaran extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model("Pengeluaran_model");
    }

    public function index() {
        $data['pengeluaran'] = $this->Pengeluaran_model->get_all_pengeluaran();
        $this->load->view('pengeluaran/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $data = array(
                'jumlah' => $this->input->post('jumlah'),
                'kategori' => $this->input->post('kategori'),
                'tanggal' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->Pengeluaran_model->tambah_pengeluaran($data);
            redirect('pengeluaran');
        }
        $this->load->view('pengeluaran/tambah');
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = array(
                'jumlah' => $this->input->post('jumlah'),
                'kategori' => $this->input->post('kategori'),
                'tanggal' => $this->input->post('tanggal'),
                'keterangan' => $this->input->post('keterangan')
            );
            $this->Pengeluaran_model->update_pengeluaran($id, $data);
            redirect('pengeluaran');
        }
        $data['pengeluaran'] = $this->Pengeluaran_model->get_pengeluaran_by_id($id);
        $this->load->view('pengeluaran/edit', $data);
    }

    public function hapus($id) {
        $this->Pengeluaran_model->hapus_pengeluaran($id);
        redirect('pengeluaran');
    }
}

?>