<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    protected $product_table = 'product';

    public function get_product_by_brandcode($warehouse, $trash, $published)
    {
        $query = $this->db->from($this->product_table)
            ->where(['warehouse' => $warehouse, 'trash' => $trash, 'published' => $published])
            ->get();
        return $query->result();
    }

    public function get_warehouse_product_by_brandcode($warehouse, $trash)
    {
        $query = $this->db->from($this->product_table)
            ->where(['warehouse' => $warehouse, 'trash' => $trash])
            ->get();
        return $query->result();
    }

    public function get_trash_product_by_brandcode($warehouse, $trash)
    {
        $query = $this->db->from($this->product_table)
            ->where(['warehouse' => $warehouse, 'trash' => $trash])
            ->get();
        return $query->result();
    }

    public function insert_product($data)
    {
        $this->db->insert($this->product_table, $data);
    }

    public function search_product($data)
    {
        $this->db->from($this->product_table);
        $this->db->like('title', $data);
        $this->db->or_like('brand', $data);

        $query = $this->db->get();
        return $query->result();
    }

    public function search_product_by_code($data)
    {
        $this->db->from($this->product_table);
        $this->db->where('product_code', $data);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function update_product_quantity($data)
    {
        $this->db->update_batch($this->product_table, $data, 'product_code');
    }

    public function update_productInfobyCode($product_code, $product_new_info)
    {
        $this->db->where('product_code', $product_code);
        $this->db->update($this->product_table, $product_new_info);
    }

    public function delete_product_temp($product_code)
    {
        $this->db->where('product_code', $product_code);
        $this->db->update($this->product_table, array('trash' => 1));
    }

    public function restore_product_item($product_code)
    {
        $this->db->where('product_code', $product_code);
        $this->db->update($this->product_table, array('trash' => 0));
    }
}
