<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('subadmin_model');
    }

    public function addSubadmin()
    {
        if ($this->session->userdata('login') == FALSE) {
            redirect('administrator/Login.php');
        } else {
            $data['msg'] = '';

            if ($this->input->post('submit')) {
                $username = $this->input->post('sadminusername');
                $email = $this->input->post('emailid');
                $password = md5($this->input->post('pwd'));
                $usertype = '0';

                $result = $this->subadmin_model->addSubadmin($username, $email, $password, $usertype);

                if ($result) {
                    $data['msg'] = "Sub-admin details added successfully";
                    redirect('add-subadmins');
                } else {
                    $data['msg'] = "Something went wrong. Please try again";
                }
            }

            $this->load->view('includes/topheader');
            $this->load->view('includes/leftsidebar');
            $this->load->view('add_subadmin', $data);
            $this->load->view('includes/footer');
        }
    }
    public function getSubadmin()
    {
        if ($this->session->userdata('login') == FALSE) {
            redirect('administrator/Login.php');
        } else {
            $data['subadmins'] = $this->subadmin_model->getAllSubadmins();

            $this->load->view('includes/topheader');
            $this->load->view('includes/leftsidebar');
            $this->load->view('manage_subadmins', $data);
            $this->load->view('includes/footer');
        }
    }

    public function deleteSubadmin($id)
    {
        $result = $this->subadmin_model->deleteSubadmin($id);

        if ($result) {
            $this->session->set_flashdata('success', 'Sub-admin details deleted');
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again');
        }

        redirect('Subadmin/getSubadmin');
    }
}
