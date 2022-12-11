<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerGroupModel extends CI_Model
{
    protected $customer_group_table = 'customer_group';
    
    public function get_customer_group()
    {
        $query = $this->db->get($this->customer_group_table);
        return $query->result();
    }

    public function insert_customer_group($data)
    {
        $this->db->insert($this->customer_group_table, $data);
    }
}
