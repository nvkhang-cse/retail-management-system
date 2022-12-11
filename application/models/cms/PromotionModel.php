<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PromotionModel extends CI_Model
{
    protected $promotion_table = 'promotion';
    public function get_promotion()
    {
        $query = $this->db->get($this->promotion_table);
        return $query->result();
    }

    public function get_promotion_by_user($brand_code)
    {
        $query = $this->db->from($this->promotion_table)
            ->where_in('brand', [$brand_code, "ALL"])
            ->get();
        return $query->result();
    }

    public function insert_promotion($data)
    {
        $this->db->insert($this->promotion_table, $data);
    }
}
