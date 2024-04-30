<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Changepassword extends CI_Controller
{
	//Validating login
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('uid'))
			redirect('admin/login');
	}

	public function index()
	{

		$this->form_validation->set_rules('currentpassword', 'Current Password', 'required|min_length[8]');
		$this->form_validation->set_rules('newpassword', 'New Password', 'required|min_length[8]');
		$this->form_validation->set_rules('confirmpassword', 'Confirm Password', 'required|min_length[8]|matches[newpassword]');
		if ($this->form_validation->run()) {
			$currentpassword = $this->input->post('currentpassword');
			$newpassword = $this->input->post('newpassword');
			$uid = $this->session->userdata('uid');

			$this->load->model('admin/Changepassword_Model', 'changepwd');


			$currentpwd = $this->changepwd->getcurrentpassword($uid);

			$dbcurrentpwd = $currentpwd->password;
			if ($currentpassword == $dbcurrentpwd) {

				$this->changepwddd->updatepassword($uid, $newpassword);

				$this->session->set_flashdata('changepass_success', 'Password changed successfully!');
				redirect('sub_admin/Changepassword');
			} else {
				$this->session->set_flashdata('changepass_error', 'Incorrect Password!');
				redirect('sub_admin/Changepassword');
			}
		} else {
			$this->load->view('sub_admin/change_password');
		}
	}
}
