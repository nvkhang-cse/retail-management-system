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

    public function search_customer($data)
    {
        $this->db->from($this->customer_table);
        $this->db->like('phone', $data);

        $query = $this->db->get();
        return $query->result();
    }

    public function search_customer_by_code($data)
    {
        $this->db->from($this->customer_table);
        $this->db->where('customer_code', $data);

        $query = $this->db->get();
        return $query->result();
    }

    public function update_customer_spend($customer_code, $spend)
    {
        $this->db->where('customer_code', $customer_code);
        $this->db->update($this->customer_table, array('spend' => $spend));
    }
}
