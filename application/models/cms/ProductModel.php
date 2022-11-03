<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model
{
    protected $product_table = 'product';
    public function get_product()
    {
        $query = $this->db->get($this->product_table);
        return $query->result();
    }

    public function insert_product($data)
    {
        $this->db->insert($this->product_table, $data);
    }
}
