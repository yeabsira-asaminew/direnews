<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('uid')) {
			redirect('admin/login');
		} elseif ($this->session->userdata('role') !== 'sub_admin' && $this->session->userdata('role') !== 'admin') {
			redirect('admin/login');
		}
		$this->load->model('admin/subCategory', 'usecategory');
	}
	public function add()
	{
		$this->load->view('sub_admin/category');
	}

	public function savedata()
	{
		if ($this->input->post('type') == 1) {
			$name = $this->input->post('name');

			$this->usecategory->saverecords($name);
			echo json_encode(array(
				"statusCode" => 200
			));
		}
	}
	public function view()
	{
		$userdetails = $this->usecategory->categoryList();
		$this->load->view('sub_admin/manage_category', ['viewdetails' => $userdetails]);
	}

	//Delete Record  
	public function delete($uid)
	{
		$this->usecategory->delete($uid);
		$this->session->set_flashdata('deletecat_success', 'Delete Record deleted');
		redirect('sub_admin/Category/view');
	}


	public function subcategory()
	{
		$data['cate'] = $this->usecategory->categoryList();
		$this->form_validation->set_rules('category', 'category', 'required');
		$this->form_validation->set_rules('subcategory', 'subcategory', 'required');
		if ($this->form_validation->run()) {
			//Getting Post Values
			$category = $this->input->post('category');
			$subcategory = $this->input->post('subcategory');
			$this->usecategory->subcategorys($category, $subcategory);
		} else {
			$this->load->view('sub_admin/sub_category', $data);
		}
	}

	public function managesubcategory()
	{
		$subcat = $this->usecategory->getsubdetails();
		$this->load->view('sub_admin/manage_sub_category', ['viewdetails' => $subcat]);
	}
	//Delete Record  
	public function subdelete($uid)
	{
		$this->usecategory->subdelete($uid);
		$this->session->set_flashdata('deletesub_success', 'Delete Record deleted');
		redirect('sub_admin/Category/managesubcategory');
	}
}
