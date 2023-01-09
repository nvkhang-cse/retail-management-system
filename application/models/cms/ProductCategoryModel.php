<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductCategoryModel extends CI_Model
{
    protected $product_category_table = 'product_category';
    public function get_product_category()
    {
        $query = $this->db->get($this->product_category_table);
        return $query->result();
    }

    public function insert_product_category($data)
    {
        $this->db->insert($this->product_category_table, $data);
    }

    public function search_product_category_by_code($code)
    {
        $this->db->from($this->product_category_table);
        $this->db->where('code', $code);

        $query = $this->db->get();
        return $query->result();
    }

    public function update_category($code, $data)
    {
        $this->db->where('code', $code);
        $this->db->update($this->product_category_table, $data);
    }

    public function delete_product_category($code)
    {
        $this->db->where('code', $code);
        $this->db->delete($this->product_category_table);
    }
}
