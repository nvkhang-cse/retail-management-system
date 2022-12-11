<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    protected $product_table = 'product';

    public function get_product($trash, $published)
    {
        $query = $this->db->from($this->product_table)
            ->where(['trash' => $trash, 'published' => $published])
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_product_by_user($warehouse, $trash, $published)
    {
        $query = $this->db->from($this->product_table)
            ->where(['warehouse' => $warehouse, 'trash' => $trash, 'published' => $published])
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_trash_product($trash)
    {
        $query = $this->db->from($this->product_table)
            ->where(['trash' => $trash])
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function get_trash_product_by_user($warehouse, $trash)
    {
        $query = $this->db->from($this->product_table)
            ->where(['warehouse' => $warehouse, 'trash' => $trash])
            ->get();
        return $query->result();
    }

    public function get_warehouse_product_by_user($warehouse, $trash)
    {
        $query = $this->db->from($this->product_table)
            ->where(['warehouse' => $warehouse, 'trash' => $trash])
            ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }

    public function insert_product($data)
    {
        $this->db->insert($this->product_table, $data);
    }
}
