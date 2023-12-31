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

    public function getCusGroupDiscount($data)
    {
        $this->db->select('code, name, discount');
        $this->db->from($this->customer_group_table);
        $this->db->where('code', $data);

        $query = $this->db->get();
        return $query->result();
    }

    public function search_customer_group_by_code($code)
    {
        $this->db->from($this->customer_group_table);
        $this->db->where('code', $code);

        $query = $this->db->get();
        return $query->result();
    }

    public function update_customer_group($code, $update_data)
    {
        $this->db->where('code', $code);
        $this->db->update($this->customer_group_table, $update_data);
    }

    public function delete_customer_group_by_code($code)
    {
        $this->db->where('code', $code);
        $this->db->delete($this->customer_group_table);
    }
}
