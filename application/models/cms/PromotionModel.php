<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PromotionModel extends CI_Model
{
    protected $promotion_table = 'promotion';

    public function get_promotion_by_branchcode($branch_code)
    {
        $query = $this->db->from($this->promotion_table)
            ->where_in('branch', ['ALL', $branch_code])
            ->get();
        return $query->result();
    }

    public function insert_promotion($data)
    {
        $this->db->insert($this->promotion_table, $data);
    }
}
