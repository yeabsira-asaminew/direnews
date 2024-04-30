<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        // Validation for login form
        $this->form_validation->set_rules('email', 'Email or Username', 'required|valid_email');

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('admin/Login_Model', 'adminLogin');
            $validate = $this->adminLogin->index($email, $password);

            if ($validate) {
                $this->session->set_userdata('uid', $validate->id);
                $this->session->set_userdata('role', $validate->role);


                // Validate the role
                if ($validate->role == 'admin') {
                    redirect('admin/admindashboard');
                } elseif ($validate->role == 'sub_admin') {
                    redirect('sub_admin/subadmindashboard');;
                } elseif ($validate->role == 'journalist') {
                    redirect('journalist/journalistdashboard');
                } else {
                    $this->session->set_flashdata('loginrole_error', 'Role unidentified. Please contact admin!');
                    redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('login_error', 'Invalid login details. Please try again.');
                redirect('admin/login');
            }
        } else {
            $this->load->view('admin/login');
        }
    }


    public function admindashboard()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('uid')) {
            redirect('admin/login');
        }
    }

    public function journalistdashboard()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('uid')) {
            redirect('admin/login');
        }
    }

    public function subadmindashboard()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('uid')) {
            redirect('admin/login');
        }
    }
}
