<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    // Mengambil transaksi berdasarkan filter
    public function get_transactions($user_id, $type = null, $start_date = null, $end_date = null) {
        $this->db->select('transactions.id, transactions.type, transactions.amount, transactions.transaction_date, categories.name AS category_name');
        $this->db->from('transactions');
        $this->db->where('transactions.user_id', $user_id);
        $this->db->join('categories', 'categories.id = transactions.category_id', 'left');

        if ($type) {
            $this->db->where('transactions.type', $type);
        }
        if ($start_date && $end_date) {
            $this->db->where('transactions.transaction_date >=', $start_date);
            $this->db->where('transactions.transaction_date <=', $end_date);
        }

        $this->db->order_by('transactions.transaction_date', 'DESC');
        return $this->db->get()->result();
    }

    // Menghitung total pemasukan/pengeluaran
    public function get_total($user_id, $type, $start_date = null, $end_date = null) {
        $this->db->where('user_id', $user_id);
        $this->db->select_sum('amount');
        $this->db->from('transactions');
        $this->db->where('type', $type);

        if ($start_date && $end_date) {
            $this->db->where('transaction_date >=', $start_date);
            $this->db->where('transaction_date <=', $end_date);
        }

        $result = $this->db->get()->row();
        return $result->amount ?? 0;
    }

    // Laporan berdasarkan kategori
    public function get_by_category($user_id, $type = null, $start_date = null, $end_date = null) {
        $this->db->select('categories.name AS category_name, SUM(transactions.amount) AS total');
        $this->db->from('transactions');
        $this->db->where('transactions.user_id', $user_id);
        $this->db->join('categories', 'categories.id = transactions.transaction_id', 'left');
        $this->db->group_by('categories.name');

        if ($type) {
            $this->db->where('transactions.type', $type);
        }
        if ($start_date && $end_date) {
            $this->db->where('transactions.transaction_date >=', $start_date);
            $this->db->where('transactions.transaction_date <=', $end_date);
        }

        return $this->db->get()->result();
    }

    // Laporan bulanan
    public function get_monthly_report($user_id, $year, $month) {
        // Saldo awal bulan
        $this->db->select('
            SUM(CASE WHEN transactions.type = "income" THEN transactions.amount ELSE 0 END) -
            SUM(CASE WHEN transactions.type = "expense" THEN transactions.amount ELSE 0 END) AS opening_balance
        ');
        $this->db->from('transactions');
        $this->db->where('transactions.user_id', $user_id);
        $this->db->where('transaction_date <', "$year-$month-01");
        $opening_balance = $this->db->get()->row()->opening_balance ?? 0;

        // Semua pemasukan dan pengeluaran bulan ini
        $this->db->select('
            SUM(CASE WHEN transactions.type = "income" THEN transactions.amount ELSE 0 END) AS total_income,
            SUM(CASE WHEN transactions.type = "expense" THEN transactions.amount ELSE 0 END) AS total_expense
        ');
        $this->db->from('transactions');
        $this->db->where('transactions.user_id', $user_id);
        $this->db->where('YEAR(transaction_date)', $year);
        $this->db->where('MONTH(transaction_date)', $month);
        $totals = $this->db->get()->row();

        return [
            'opening_balance' => $opening_balance,
            'total_income' => $totals->total_income ?? 0,
            'total_expense' => $totals->total_expense ?? 0,
            'closing_balance' => $opening_balance + ($totals->total_income ?? 0) - ($totals->total_expense ?? 0)
        ];
    }

    public function get_category_report($user_id, $year, $month, $type) {  
        $this->db->select('categories.name AS category_name, SUM(transactions.amount) AS total');  
        $this->db->from('transactions');  
        $this->db->join('categories', 'categories.id = transactions.category_id', 'left');  
        $this->db->where('YEAR(transactions.transaction_date)', $year);  
        $this->db->where('MONTH(transactions.transaction_date)', $month);  
        $this->db->where('transactions.user_id', $user_id);
        $this->db->where('transactions.type', $type); // Filter by type  
        $this->db->group_by('categories.id');  
        return $this->db->get()->result();  
    }  


    public function get_income_expense_by_month($year, $month = null) {
        $this->db->select('
            SUM(CASE WHEN transactions.type = "income" THEN transactions.amount ELSE 0 END) AS total_income,
            SUM(CASE WHEN transactions.type = "expense" THEN transactions.amount ELSE 0 END) AS total_expense
        ');
        $this->db->from('transactions');
        $this->db->where('YEAR(transactions.transaction_date)', $year);

        if ($month) {
            $this->db->where('MONTH(transactions.transaction_date)', $month);
        }

        return $this->db->get()->row();
    }


    // Laporan tahunan
    public function get_yearly_report($year) {  
        // Calculate the previous year  
        $previous_year = $year - 1;  

        // Ensure the previous year is correctly calculated before using it in the query
        if ($previous_year <= 0) {
            $previous_year = 1; // To avoid invalid previous year (e.g., year 0)
        }

        // Fetch total income, total expense, opening and closing balance for the year  
        $this->db->select('  
            SUM(CASE WHEN type = "income" THEN amount ELSE 0 END) AS total_income,   
            SUM(CASE WHEN type = "expense" THEN amount ELSE 0 END) AS total_expense,  
            (SELECT SUM(amount) FROM transactions WHERE YEAR(transaction_date) = ' . (int)$previous_year . ' AND user_id = ?) AS opening_balance,  
            (SELECT SUM(amount) FROM transactions WHERE YEAR(transaction_date) = ? AND MONTH(transaction_date) = 12 AND user_id = ?) AS closing_balance  
        ', [$this->session->userdata('user_id'), $year, $this->session->userdata('user_id')]);  

        $this->db->from('transactions');  
        $this->db->where('user_id', $this->session->userdata('user_id')); // Ensure you filter by user_id if necessary  
        return $this->db->get()->row_array();  
    }


    public function get_category_report_by_year($user_id, $year, $type) {  
        $this->db->select('categories.name AS category_name, SUM(transactions.amount) AS total');  
        $this->db->from('transactions');  
        $this->db->join('categories', 'categories.id = transactions.category_id', 'left');  
        $this->db->where('YEAR(transactions.transaction_date)', $year);  
        $this->db->where('transactions.type', $type); // Filter by type  
        $this->db->where('transactions.user_id', $user_id);
        $this->db->group_by('categories.id');  
        return $this->db->get()->result();  
    } 
}
