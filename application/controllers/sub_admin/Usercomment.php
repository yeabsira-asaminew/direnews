<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usercomment extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Usercomment_model', 'comment');
		if (!$this->session->userdata('uid')) {
			redirect('admin/login');
		} elseif ($this->session->userdata('role') !== 'sub_admin' && $this->session->userdata('role') !== 'admin') {
			redirect('admin/login');
		}
	}
	public function index()
	{
		$usercomment = $this->comment->managecomment();
		$this->load->view('sub_admin/user_manage_comment', ['managecomment' => $usercomment]);
	}

	public function commentApproved()
	{
		//Form Validation
		$this->form_validation->set_rules('status', 'status', 'required');

		if ($this->form_validation->run()) {
			//Getting Post Values
			$status = $this->input->post('status');
			$id = $this->input->post('id');

			$this->load->model('admin/Usercomment_model', 'comit');
			$profiledetails = $this->comit->Approvedcomment($id, $status);
			$this->session->set_flashdata('success', ' updated successfull');
			redirect('sub_admin/Usercomment');
		} else {
			$this->session->set_flashdata('error', 'Something went wrong. Please try again.');
			redirect('sub_admin/Usercomment');
		}
	}
}
