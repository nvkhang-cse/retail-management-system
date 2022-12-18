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

    public function search_productbyId($data)
    {
        $this->db->from($this->product_table);
        $this->db->where('id', $data);

        $query = $this->db->get();
        return $query->result_array();
    }
}
