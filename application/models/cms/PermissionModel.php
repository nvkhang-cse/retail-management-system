<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermissionModel extends CI_Model
{
    protected $permission_table = 'permission';

    public function get_permission_list_by_admin()
    {
        $query = $this->db
            ->from($this->permission_table)
            ->where(['id !=' => 1])
            ->get();
        return $query->result();
    }

    public function get_permission_list_by_manager()
    {
        $query = $this->db
            ->from($this->permission_table)
            ->where_not_in('id', [1, 2])
            ->get();
        return $query->result();
    }
}
