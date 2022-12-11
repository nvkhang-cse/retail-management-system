<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CashBookModel extends CI_Model
{
    protected $cashbook_table = 'cash_book';
    public function get_cashbook()
    {
        $query = $this->db->get($this->cashbook_table);
        return $query->result();
    }

    public function get_cashbook_by_user($brand_code)
    {
        $query = $this->db->from($this->cashbook_table)
            ->where(['brand' => $brand_code])
            ->get();
        return $query->result();
    }
}
