<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_us extends CI_Controller
{
    function index()
    {
        $language = $this->session->userdata('site_lang');

        $data['language'] = $language;
        $this->load->view('contact_us', $data);
    }

    function switchLang($lang = "")
    {
        $this->session->set_userdata('site_lang', $lang);
        redirect('Contact_us');
    }
}
