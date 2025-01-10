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
            $this->db->insert('income', $data);
            $income_id = $this->db->insert_id();

            // Simpan ke tabel transactions
            $transaction_data = [
                'user_id' => $data['user_id'],
                'type' => 'income',
                'transaction_id' => $income_id,
                'amount' => $data['amount'],
                'description' => $data['description'],
                'transaction_date' => $data['transaction_date']
            ];
            $this->db->insert('transactions', $transaction_data);
        }

        // Tambah expense
        public function add_expense($data) {
            $this->db->insert('expense', $data);
            $expense_id = $this->db->insert_id();

            // Simpan ke tabel transactions
            $transaction_data = [
                'user_id' => $data['user_id'],
                'type' => 'expense',
                'transaction_id' => $expense_id,
                'amount' => $data['amount'],
                'description' => $data['description'],
                'transaction_date' => $data['transaction_date']
            ];
            $this->db->insert('transactions', $transaction_data);
        }

        // Ambil kategori berdasarkan tipe (income/expense)
        public function get_categories($type) {
            $this->db->where('type', $type);
            $query = $this->db->get('categories');
            return $query->result();
        }
    }
?>