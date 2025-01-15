<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Transaction_model extends CI_Model{
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        // Ambil semua transaksi
        public function get_all_transactions() {
            $this->db->select('transactions.id, transactions.type, transactions.amount, transactions.transaction_date, categories.name AS category_name');
            $this->db->from('transactions');
            $this->db->join('categories', 'categories.id = transactions.transaction_id', 'left');
            $this->db->order_by('transactions.transaction_date', 'DESC');
            $query = $this->db->get();
            return $query->result();
        }

        // Total pemasukan
        public function get_total_income($user_id) {
            $this->db->select_sum('amount');
            $this->db->where('user_id', $user_id);
            $this->db->where('type', 'income');
            $query = $this->db->get('transactions');
            return $query->row()->amount ?? 0; // Jika null, return 0
        }

        // Total pengeluaran
        public function get_total_expense($user_id) {
            $this->db->select_sum('amount');
            $this->db->where('user_id', $user_id);
            $this->db->where('type', 'expense');
            $query = $this->db->get('transactions');
            return $query->row()->amount ?? 0; // Jika null, return 0
        }

        // Transaksi terbaru
        public function get_recent_transactions($user_id, $limit = 5) {
            $this->db->where('user_id', $user_id);
            $this->db->order_by('transaction_date', 'DESC');
            $this->db->limit($limit);
            $query = $this->db->get('transactions');
            return $query->result();
        }

        // Tambah income
        public function add_income($data) {
            // Gunakan transaksi database untuk memastikan integritas data
            $this->db->trans_start();

            // Simpan data ke tabel income
            $this->db->insert('income', $data);

            // Ambil ID dari data yang baru saja disimpan
            $income_id = $this->db->insert_id();

            if ($income_id) {
                // Data untuk tabel transactions
                $transaction_data = [
                    'user_id' => isset($data['user_id']) ? $data['user_id'] : null,
                    'type' => 'income',
                    'transaction_id' => $income_id,
                    'amount' => isset($data['amount']) ? $data['amount'] : 0,
                    'description' => isset($data['description']) ? $data['description'] : '',
                    'transaction_date' => isset($data['transaction_date']) ? $data['transaction_date'] : date('Y-m-d H:i:s')
                ];

                // Simpan data ke tabel transactions
                $this->db->insert('transactions', $transaction_data);
            } else {
                // Jika gagal mendapatkan ID dari tabel income
                log_message('error', 'Gagal menyimpan data ke tabel income');
            }

            // Selesaikan transaksi database
            $this->db->trans_complete();

            // Periksa apakah transaksi berhasil
            if ($this->db->trans_status() === FALSE) {
                log_message('error', 'Transaksi gagal: ' . json_encode($data));
                return false; // Kembalikan nilai false jika terjadi kesalahan
            }

            return true; // Kembalikan nilai true jika berhasil
        }

        // Tambah expense
        public function add_expense($data) {
            // Gunakan transaksi database untuk memastikan integritas data
            $this->db->trans_start();

            // Simpan data ke tabel expense
            $this->db->insert('expense', $data);

            // Ambil ID dari data yang baru saja disimpan
            $expense_id = $this->db->insert_id();

            if ($expense_id) {
                // Data untuk tabel transactions
                $transaction_data = [
                    'user_id' => isset($data['user_id']) ? $data['user_id'] : null,
                    'type' => 'expense',
                    'transaction_id' => $expense_id,
                    'amount' => isset($data['amount']) ? $data['amount'] : 0,
                    'description' => isset($data['description']) ? $data['description'] : '',
                    'transaction_date' => isset($data['transaction_date']) ? $data['transaction_date'] : date('Y-m-d H:i:s')
                ];

                // Simpan data ke tabel transactions
                $this->db->insert('transactions', $transaction_data);
            } else {
                // Jika gagal mendapatkan ID dari tabel expense
                log_message('error', 'Gagal menyimpan data ke tabel expense');
            }

            // Selesaikan transaksi database
            $this->db->trans_complete();

            // Periksa apakah transaksi berhasil
            if ($this->db->trans_status() === FALSE) {
                log_message('error', 'Transaksi gagal: ' . json_encode($data));
                return false; // Kembalikan nilai false jika terjadi kesalahan
            }

            return true; // Kembalikan nilai true jika berhasil
        }

        // Ambil kategori berdasarkan tipe (income/expense)
        public function get_categories($user_id, $type) {
            $this->db->where('user_id', $user_id);
            $this->db->where('type', $type);
            $query = $this->db->get('categories');
            return $query->result();
        }
    }
?>