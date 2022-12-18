<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BrandModel extends CI_Model
{
    protected $brand_table = 'brand';

    public function get_all_brand()
    {
        $query = $this->db->get($this->brand_table);

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function get_brand_by_brandcode($brand_code)
    {
        $query = $this->db->from($this->brand_table)
            ->where(['code' => $brand_code])
            ->get();
        return $query->result();
    }

    public function insert_brand($data)
    {
        $this->db->insert($this->brand_table, $data);
    }
}
