<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BranchModel extends CI_Model
{
    protected $branch_table = 'branch';

    public function get_all_branch()
    {
        $this->db->select('code, name');
        $this->db->from($this->branch_table);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_branch_by_code($branch_code)
    {
        $query = $this->db->select('code, name')
            ->from($this->branch_table)
            ->where(['code' => $branch_code])
            ->get();
        return $query->result();
    }

    public function get_branch_list_data()
    {
        $query = $this->db->get($this->branch_table);
        return $query->result();
    }

    public function insert_branch($data)
    {
        $this->db->insert($this->branch_table, $data);
    }

    public function get_branch_info_by_code($branch_code)
    {
        $query = $this->db->from($this->branch_table)
            ->where(['code' => $branch_code])
            ->get();
        return $query->result();
    }

    public function update_branch($branch_code, $update_info)
    {
        $this->db->where('code', $branch_code);
        $this->db->update($this->branch_table, $update_info);
    }
}
