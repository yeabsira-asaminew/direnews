<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Profile extends CI_Controller
{
	//Validating login
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('uid'))
			redirect('admin/login');
	}
	//For fetching user data
	public function index()
	{

		$uid = $this->session->userdata('uid');
		$this->load->model('admin/Profile_Model', 'profile');
		$data['profile'] = $this->profile->getusedetails($uid);
		$this->load->view('admin/profile', $data);
	}
	//For Updating Profile
	public function updateprofile()
	{
		//Form Validation
		$this->form_validation->set_rules('name', 'User Name', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email Id', 'required|valid_email');

		if ($this->form_validation->run()) {
			//Getting Post Values
			$uname = $this->input->post('name');
			$email = $this->input->post('email');
			$uid = $this->session->userdata('uid');
			$this->load->model('admin/Profile_Model', 'profilees');
			$profiledetails = $this->profilees->updateuserprofile($uid, $uname, $email);
			$this->session->set_flashdata('profile_success', 'Profile updated successfully!');
			redirect('admin/Profile');
		} else {
			$this->session->set_flashdata('profile_error', 'Something went wrong. Please try again!');
			redirect('admin/Profile');
		}
	}
}
