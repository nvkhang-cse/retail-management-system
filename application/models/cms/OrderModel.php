<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderModel extends CI_Model
{
    protected $order_table = 'order';
    protected $order_detail_table = 'order_detail';

    public function get_order_by_branchcode($branch_code)
    {
        $query = $this->db->from($this->order_table)
            ->where('branch_code', $branch_code)
            ->get();
        return $query->result();
    }

    public function get_order_info_by_code($order_code)
    {
        $query = $this->db->from($this->order_table)
            ->where('order_code', $order_code)
            ->get();
        return $query->result();
    }

    public function get_order_detail_list_by_code($order_code)
    {
        $query = $this->db->from($this->order_detail_table)
            ->where('order_code', $order_code)
            ->get();
        return $query->result();
    }

    public function update_order_online_by_code($order_code, $update_data)
    {
        $this->db->where('order_code', $order_code);
        $this->db->update($this->order_table, $update_data);
    }
}
