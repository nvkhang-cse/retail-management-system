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
}
