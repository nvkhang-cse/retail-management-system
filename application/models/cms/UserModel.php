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

    public function get_user_list_by_admin($branch_code)
    {
        $query = $this->db
            ->from($this->user_table)
            ->where(['permission !=' => 1, 'branch_code' => $branch_code])
            ->get();
        return $query->result();
    }

    public function get_user_list_by_manager($branch_code)
    {
        $query = $this->db
            ->from($this->user_table)
            ->where_not_in('permission', [1, 2])
            ->where(['branch_code' => $branch_code])
            ->get();
        return $query->result();
    }

    public function get_branchcode_of_user($id)
    {
        $query = $this->db->select('branch_code')->from($this->user_table)
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

    public function get_user_name($id)
    {
        $query = $this->db->select('fullname')->from($this->user_table)
            ->where(['id' => $id])
            ->get();
        return $query->result();
    }

    public function get_user_info_by_admin($employee_id)
    {
        $query = $this->db
            ->from($this->user_table)
            ->where('id', $employee_id)
            ->get();
        return $query->result();
    }

    public function get_user_info_by_manager($employee_id, $branch_code)
    {
        $query = $this->db
            ->from($this->user_table)
            ->where(array('id' => $employee_id, 'branch_code' => $branch_code))
            ->get();
        return $query->result();
    }

    public function update_user($id, $update_data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->user_table, $update_data);
    }

    public function delete_employee_by_admin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->user_table);
    }

    public function delete_employee_by_manager($id, $branch_code)
    {
        $this->db->where(array('id' => $id, 'branch_code' => $branch_code));
        $this->db->delete($this->user_table);
    }
}
