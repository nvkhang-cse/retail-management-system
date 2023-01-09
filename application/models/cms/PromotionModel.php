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

    public function get_promotion_by_promotioncode($branch_code, $promotion_code)
    {
        $query = $this->db->from($this->promotion_table)
            ->where_in('branch', ['ALL', $branch_code])
            ->where('code', $promotion_code)
            ->get();
        return $query->result();
    }

    public function insert_promotion($data)
    {
        $this->db->insert($this->promotion_table, $data);
    }

    public function update_promotion_info($promotion_code, $promotion_info)
    {
        $this->db->where('code', $promotion_code);
        $this->db->update($this->promotion_table, $promotion_info);
    }

    public function delete_promotion_by_code($promotion_code)
    {
        $this->db->where('code', $promotion_code);
        $this->db->delete('promotion');
    }

    public function get_promotion_by_date($branch_code, $date_to_search)
    {
        $query = $this->db->from($this->promotion_table)
            ->where_in('branch', ['ALL', $branch_code])
            ->where('start_date <=', $date_to_search)
            ->where('end_date >=', $date_to_search)
            ->get();
        return $query->result();
    }
}
