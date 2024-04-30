<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegisterUser extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('uid')) {
            redirect('admin/login');
        } elseif ($this->session->userdata('role') !== 'admin') {
            redirect('admin/login');
        }

        $this->load->model('admin/AddUser_model', 'user');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $userRole = $this->user->getRoles();
        $this->load->view('admin/register_user', ['viewrole' => $userRole]);
    }
    private function generate_random_password()
    {
        // Generate a random password using any desired method
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $password .= substr($characters, $index, 1);
        }
        return $password;
    }

    private function insert_user($fname, $mname, $lname, $name, $email, $password, $role)
    {
        // Insert user data into the database
        $data = array(
            'first_name' => $fname,
            'middle_name' => $mname,
            'last_name' => $lname,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        );

        $this->db->insert('tbladmin', $data);
    }

    private function send_email($email, $new_password)
    {
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = '587';

        // use your email address here like
        $config['smtp_user'] = "emailaddress@gmail.com";

        // use the email address' two step verification code like
        $config['smtp_pass'] =  "abshsdvjksd";
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['smtp_crypto'] = 'tls'; //html tls


        $this->email->initialize($config);

        // Compose the email message
        $this->email->from('direnews@gmail.com', 'Dire News');
        $this->email->to($email);
        $this->email->subject(' Successful Registeration');
        $this->email->message('Hello, your password is: ' . $new_password);

        // Send the email
        $this->email->send();
    }
    public function add()
    {
        // $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');

        $userRole = $this->user->getRoles();

        $this->form_validation->set_rules('first_name', 'first_name', 'required');
        $this->form_validation->set_rules('middle_name', 'middle_name', 'required');
        $this->form_validation->set_rules('last_name', 'last_name', 'required');
        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');
        $this->form_validation->set_rules('role', 'role');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('adduser_error', 'Something went wrong. Please try again!');
            $this->load->view('admin/register_user', ['viewrole' => $userRole]);
        } else {
            // Form validation passed, register the user
            $new_password = $this->generate_random_password();

            $this->insert_user(
                $this->input->post('first_name'),
                $this->input->post('middle_name'),
                $this->input->post('last_name'),
                $this->input->post('name'),
                $this->input->post('email'),
                $new_password,
                $this->input->post('role'),
            );

            $this->send_email($this->input->post('email'), $new_password);
            // Save the user to the database


            $this->session->set_flashdata('adduser_success', 'Added successfully! Check email for Password.');
            // Redirect to a success page or login page
            redirect('admin/RegisterUser');
        }
    }
}
