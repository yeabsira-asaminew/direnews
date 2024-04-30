<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ManageUser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('uid')) {
            redirect('admin/login');
        } elseif ($this->session->userdata('role') !== 'admin') {
            redirect('admin/login');
        }

        $this->load->model('admin/AddUser_model', 'user');
        $this->load->library('form_validation');
    }

    public function manage_user()
    {

        $userdetails = $this->user->userList();
        $this->load->view('admin/manage_user', ['viewdetails' => $userdetails]);
    }

    public function edit($id)
    {
        $userRole = $this->user->getRoles();
        $userdetails = $this->user->getUpdate($id);
        $this->load->view('admin/update_user', ['viewdetails' => $userdetails, 'viewrole' => $userRole]);
    }

    public function update($id)
    {
        $fname = $this->input->post('first_name');
        $mname = $this->input->post('middle_name');
        $lname = $this->input->post('last_name');
        $email = $this->input->post('email');
        $role = $this->input->post('role');

        $data = array(
            'first_name' => $fname,
            'middle_name' => $mname,
            'last_name' => $lname,
            'email' => $email,
            'role' => $role
        );

        if ($this->user->update_userRecord($id, $data)) {
            $this->session->set_flashdata('updateuser_success', 'Updated successfully!');
            redirect('admin/ManageUser/manage_user');
        } else {
            $this->session->set_flashdata('updateuser_error', 'Something went wrong. Please try again!');
            redirect('admin/ManageUser/edit');
        }
    }


    //Delete Record  
    public function delete($uid)
    {
        $this->user->delete($uid);
        $this->session->set_flashdata('deleteuser_success', 'Deleted sucessfully!');
        redirect('admin/ManageUser/manage_user');
    }
}
