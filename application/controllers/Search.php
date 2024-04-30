<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Website_model');
		//$this->load->model('Search_Model');

		$this->load->library("pagination");
	}

	public function index()
	{
		$this->session->set_userdata('site_lang', "english");
		$sdata = $this->input->post('searchdata');
		$data['sresult'] = $this->Website_model->getsearch($sdata);
		$data['category'] = $this->Website_model->categoryList();
		$data['resentlypost'] = $this->Website_model->resentlypost();

		$this->load->view('search', $data);
	}


	function switchLang($lang = "")
	{
		$this->session->set_userdata('site_lang', $lang);
		redirect('Search');
	}
}
