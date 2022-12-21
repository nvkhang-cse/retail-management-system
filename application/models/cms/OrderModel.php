<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderModel extends CI_Model
{
    protected $order_table = 'order';

    public function get_order_by_brandcode($brand_code)
    {
        $query = $this->db->from($this->order_table)
            ->where('brand_code', $brand_code)
            ->get();
        return $query->result();
    }
}
