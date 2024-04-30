<?php
class AddUser_model extends CI_Model
{
    public function getRoles()
    {
        $this->db->select('role');
        $this->db->from('tbladmin');
        $query = $this->db->get();
        return $query->result();
    }

    function userList()
    {
        $query = $this->db->get('tbladmin');
        return $query->result();
    }


    function saverecords($fname, $mname, $lname, $uname, $email, $role)
    {

        $datas = array(
            'first_name' => $fname,
            'middle_name' => $mname,
            'last_name' => $lname,
            'name' => $uname,
            'email' => $email,
            'role' => $role
        );
        $query = $this->db->insert('tbladmin', $datas);
        if ($query) {
            $this->session->set_flashdata('adduser_success', 'Added successfully!');
            redirect('admin/AddUser/add');
        } else {
            $this->session->set_flashdata('adduser_error', 'Something went wrong. Please try again!');
            redirect('admin/AddUser/add');
        }
    }

    // For record Deletion
    public function delete($uid)
    {
        $query = $this->db->where('id', $uid)->delete('tbladmin');
    }


    public function getUpdate($id)
    {
        $query = $this->db->get_where('tbladmin', array('id' => $id));
        return $query->row();
    }

    public function update_userRecord($id, $data)
    {

        $this->db->where('id', $id);
        $this->db->update('tbladmin', $data);
    }

    public function insert_user($data)
    {
        $this->db->insert('tbladmin', $data);
        return $this->db->insert_id();
    }
}
