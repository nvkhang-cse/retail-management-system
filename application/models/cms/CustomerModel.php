<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model
{
    protected $customer_table = 'customer';
    public function get_customer()
    {
        $query = $this->db->get($this->customer_table);
        return $query->result();
    }

    // public function insert_user($data)
    // {
    //     $this->db->insert($this->user_table, $data);
    //     return $this->db->insert_id();
    // }

    // public function user_login($email, $password)
    // {
    //     // Query users
    //     $query = $this->db
    //     ->from($this->user_table)
    //     ->where(['email' => $email, 'pwd' => md5($password)])
    //     ->get();
    //     if ($query->num_rows() > 0) 
    //     {
    //         // $object = $query->row();
    //         // return (object) ['type' => 'user', 'object' => $object];
    //         return $query->row();
    //     }
    //     // Not found
    //     return false;      
    // }


  
    
}

?>