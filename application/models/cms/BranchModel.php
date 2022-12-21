<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BranchModel extends CI_Model
{
    protected $branch_table = 'branch';

    public function get_all_branch()
    {
        $query = $this->db->get($this->branch_table);

        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function get_branch_by_branchcode($branch_code)
    {
        $query = $this->db->from($this->branch_table)
            ->where(['code' => $branch_code])
            ->get();
        return $query->result();
    }

    public function insert_branch($data)
    {
        $this->db->insert($this->branch_table, $data);
    }
}
