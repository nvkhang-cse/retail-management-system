<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CashBookModel extends CI_Model
{
    protected $cashbook_table = 'cash_book';

    public function get_cashbook_by_branchcode($branch_code)
    {
        $query = $this->db->from($this->cashbook_table)
            ->where(['branch' => $branch_code])
            ->get();
        return $query->result();
    }

    public function insert_receipt($receipt_data)
    {
        $this->db->insert($this->cashbook_table, $receipt_data);
    }
}
