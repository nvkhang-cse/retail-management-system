<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SaleModel extends CI_Model
{
    protected $order_table = 'order';
    protected $order_detail_table = 'order_detail';

    public function insert_order($order_info, $order_detail)
    {
        $this->db->insert($this->order_table, $order_info);
        $this->db->insert_batch($this->order_detail_table, $order_detail);
    }
}
