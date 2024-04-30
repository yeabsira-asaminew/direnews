<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Website_model');
		$this->load->library("pagination");
	}

	public function index()
	{
		$language = $this->session->userdata('site_lang');

		$data['language'] = $language;

		//pagination settings

		$config['total_rows'] = $this->db->count_all('tbladdnews');
		$config['per_page'] = "6";
		$config["uri_segment"] = 1;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		//config for bootstrap pagination class integration
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data["links"] = $this->pagination->create_links();

		// Filter news based on language ID
		$lang_id = 1;
		if ($language === 'amharic') {
			$lang_id = 2; // Amharic (2)
		} elseif ($language === 'oromo') {
			$lang_id = 3; // Oromo (3)
		} elseif ($language === 'somali') {
			$lang_id = 4; // Somali (4)
		}

		//$data['student'] = $this->StudentPagination_Model->get_students($config["per_page"], $page);
		$data['category'] = $this->Website_model->categoryList();
		$data['resentlypost'] = $this->Website_model->resentlypost();
		$data['viewdetails'] = $this->Website_model->getnewsubdetailsByLang($lang_id, $config["per_page"], $page);
		$this->load->view('welcome_message', $data);
	}

	function switchLang($lang = "")
	{

		$this->session->set_userdata('site_lang', $lang);
		redirect('Welcome');  // ($_SERVER['HTTP_REFERER'])
	}


	public function post($id)
	{
		$usernewdetails['category'] = $this->Website_model->categoryList();
		$usernewdetails['viewdetail'] = $this->Website_model->resentlypost();
		$usernewdetails['viewdetails'] = $this->Website_model->getwebsitedetails($id);
		$usernewdetails['comment'] = $this->Website_model->getcomment($id);

		$this->load->view('post', $usernewdetails);
	}


	public function comment()
	{
		if ($this->input->post('type') == 1) {
			$postid = $this->input->post('postid');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$comment = $this->input->post('comment');
			$status = 0;
			$this->load->model('Website_model');
			$this->Website_model->commentsave($postid, $name, $email, $comment, $status);
			echo json_encode(array(
				"statusCode" => 200
			));
		}
	}
}
