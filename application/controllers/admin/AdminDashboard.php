<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminDashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Dashboard_Model');
		if (!$this->session->userdata('uid')) {
			redirect('admin/login');
		} elseif ($this->session->userdata('role') !== 'admin') {
			redirect('admin/login');
		}
	}

	public function index()
	{
		$this->load->model('admin/Dashboard_Model', 'Dashboard');
		$data['totalnew'] = $this->Dashboard->totalnewcount();
		$data['totalcategory'] = $this->Dashboard->totalcategorycount();
		$data['totalsubcategory'] = $this->Dashboard->totalsubcategorycount();
		$data['totalcomment'] = $this->Dashboard->totalcommentcount();

		// $this->load->view('views/admin/include/header.php');
		// $this->load->view('views/admin/include/sidebar.php');
		$this->load->view('admin/dashboard', $data);
	}
}
