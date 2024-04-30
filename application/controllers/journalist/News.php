<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Category_model', 'usecategory');
		$this->load->model('admin/Addnews_model', 'addpost');
		$this->load->model('admin/Language_model', 'useLang');
		$this->load->library("pagination");
		if (!$this->session->userdata('uid')) {
			redirect('admin/login');
		} elseif ($this->session->userdata('role') !== 'journalist') {
			redirect('admin/login');
		}
	}

	function fetch_subcategory()
	{
		if ($this->input->post('category_name')) {
			echo $this->addpost->fetch_subcate($this->input->post('category_name'));
		}
	}

	public function add()
	{
		$posted_by = $this->session->userdata('uid');
		$userdetails = $this->usecategory->categoryList();
		$langDetails = $this->useLang->languageList();



		$this->form_validation->set_rules('title', 'Title:', 'required');
		$this->form_validation->set_rules('lang_id', 'lang_id:', 'required');
		$this->form_validation->set_rules('category', 'category:', 'required');
		$this->form_validation->set_rules('subcategory', 'subcategory:', 'required');
		$this->form_validation->set_rules('description', 'description:', 'required');
		if ($this->form_validation->run()) {
			$title = $this->input->post('title');
			$lang = $this->input->post('lang_id');
			$category = $this->input->post('category');
			$subcategory = $this->input->post('subcategory');
			$description = $this->input->post('description');
			$uploadimage = '';

			//image upload
			if (isset($_FILES['image']['name'])) {
				$this->load->library('upload');
				$config['upload_path'] = 'uploads/files/';
				$config['allowed_types'] = 'jpg|jpeg|png|pdf|gif';
				$config['file_name'] = date('YmdHms') . '-' . rand(1, 999999);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('image')) {
					$uploaded = $this->upload->data();
					$uploadimage = $uploaded['file_name'];
				}
			}

			$this->addpost->addnewss($title, $lang, $category, $subcategory, $description, $uploadimage, $posted_by);
			$this->load->view('journalist/add-post', ['viewdetails' => $userdetails, 'viewLang' => $langDetails]);
		} else {
			$this->load->view('journalist/add-post', ['viewdetails' => $userdetails, 'viewLang' => $langDetails]);
		}
	}

	public function managenews()
	{
		//pagination settings
		$config['base_url'] = site_url('journalist/News/managenews');
		$config['total_rows'] = $this->db->count_all('tbladdnews');
		$config['per_page'] = "10";
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
		$data['viewdetails'] = $this->addpost->getnewsubdetails($config["per_page"], $page);
		$this->load->view('journalist/manage-post', $data);
	}


	//Delete Record  
	public function delete($uid)
	{
		$this->addpost->deletenews($uid);
		$this->session->set_flashdata('deletenews_success', 'News deleted successfully!');
		redirect('journalist/News/managenews');
	}

	public function editdata($uid)
	{
		$data['viewdetails'] = $this->usecategory->categoryList();
		$data['editdata'] = $this->addpost->editdata($uid);
		$this->load->view('journalist/update_post', $data);
	}

	public function newupdate()
	{
		$posted_by = $this->session->userdata('uid');
		$userdetails = $this->usecategory->categoryList();
		$this->form_validation->set_rules('title', 'Title:', 'required');

		if ($this->form_validation->run()) {
			//Getting Post Values
			$uid = $this->input->post('id');
			$lang = $this->input->post('lang_id');
			$title = $this->input->post('title');
			$category = $this->input->post('category');
			$subcategory = $this->input->post('subcategory');
			$description = $this->input->post('description');
			$uploadimage = '';


			//image upload
			if (isset($_FILES['image']['name'])) {
				$this->load->library('upload');
				$config['upload_path'] = 'uploads/files/';
				$config['allowed_types']        = 'jpg|jpeg|png|pdf|gif';
				$config['file_name']  = date('YmdHms') . '-' . rand(1, 999999);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('image')) {

					$uploaded = $this->upload->data();
					$uploadimage = $uploaded['file_name'];
				}
			}
			$this->addpost->updatenews($uid, $title, $lang,  $category, $subcategory, $description, $uploadimage, $posted_by);
			$this->session->set_flashdata('updatenews_success', 'News updated successfully!');
			redirect('journalist/News/managenews', $userdetails);
		} else {
			$this->session->set_flashdata('updatenews_error', 'Something went wrong. Please try again!');
			redirect('journalist/News/managenews');
		}
	}

	public function getmarks()
	{
		$id = $_POST['id'];
		$data = $this->addpost->getwebsitedetails($id);
		$this->load->view("journalist/modal.php", ['data' => $data]);
	}
}
