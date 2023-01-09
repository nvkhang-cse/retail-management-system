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

    public function get_receipt_by_code($code)
    {
        $query = $this->db->from($this->cashbook_table)
            ->where(['code' => $code])
            ->get();
        return $query->result();
    }

    public function insert_receipt($receipt_data)
    {
        $this->db->insert($this->cashbook_table, $receipt_data);
    }

    public function update_receipt($code, $update_info)
    {
        $this->db->where('code', $code);
        $this->db->update($this->cashbook_table, $update_info);
    }

    public function delete_receipt($code)
    {
        $this->db->where('code', $code);
        $this->db->delete($this->cashbook_table);
    }
}
