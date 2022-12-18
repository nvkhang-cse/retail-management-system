<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    protected $user_table = 'user';

    public function get_user()
    {
        $query = $this->db->get($this->user_table);
        return $query->result();
    }

    public function get_user_list_by_admin($brand_code)
    {
        $query = $this->db
            ->from($this->user_table)
            ->where(['permission !=' => 1, 'brand_code' => $brand_code])
            ->get();
        return $query->result();
    }

    public function get_user_list_by_manager($brand_code)
    {
        $query = $this->db
            ->from($this->user_table)
            ->where_not_in('permission', [1, 2])
            ->where(['brand_code' => $brand_code])
            ->get();
        return $query->result();
    }

    public function get_brandcode_of_user($id)
    {
        $query = $this->db->select('brand_code')->from($this->user_table)
            ->where(['id' => $id])
            ->get();
        return $query->result();
    }

    public function get_permission_of_user($id)
    {
        $query = $this->db->select('permission')->from($this->user_table)
            ->where(['id' => $id])
            ->get();
        return $query->result();
    }

    public function insert_user($data)
    {
        $this->db->insert($this->user_table, $data);
        return $this->db->insert_id();
    }

    public function user_login($email, $password)
    {
        $query = $this->db
            ->from($this->user_table)
            ->where(['email' => $email, 'pwd' => md5($password)])
            ->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }
        return false;
    }
}
