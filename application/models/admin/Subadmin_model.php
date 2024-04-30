<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subadmin_model extends CI_Model
{

    public function addSubadmin($username, $email, $password, $usertype)
    {
        $data = array(
            'AdminUserName' => $username,
            'AdminEmailId' => $email,
            'AdminPassword' => $password,
            'userType' => $usertype
        );

        return $this->db->insert('tbladmin', $data);
    }

    public function getAllSubadmins()
    {
        $this->db->where('userType', '0');
        $query = $this->db->get('tbladmin');
        return $query->result_array();
    }

    public function deleteSubadmin($id)
    {
        $this->db->where('id', $id);
        $this->db->where('userType', '0');
        $this->db->delete('tbladmin');
        return $this->db->affected_rows() > 0;
    }
}
