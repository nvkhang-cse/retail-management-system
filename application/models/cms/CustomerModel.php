<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerModel extends CI_Model
{
    protected $customer_table = 'customer';

    public function get_customer()
    {
        $query = $this->db->get($this->customer_table);
        return $query->result();
    }
    
    public function insert_customer($data)
    {
        $this->db->insert($this->customer_table, $data);
    }
}
