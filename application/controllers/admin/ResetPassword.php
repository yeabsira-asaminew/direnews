<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ResetPassword extends CI_Controller
{

    public function index()
    {
        $this->load->view('admin/reset_password');
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

    private function update_user_password($email, $new_password)
    {
        // Update the user's password in the database
        $this->db->where('email', $email);
        $this->db->update('tbladmin', array('password' => $new_password));
    }

    private function send_email($email, $new_password)
    {
        $this->load->library('email');

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'smtp.gmail.com';
        $config['smtp_port'] = '587';
        $config['smtp_user'] = 'superkebele12345@gmail.com';
        $config['smtp_pass'] = 'upalorfwhfshawab';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['smtp_crypto'] = 'tls'; //html tls


        $this->email->initialize($config);

        // Compose the email message
        $this->email->from('direnews@gmail.com', 'Dire News');
        $this->email->to($email);
        $this->email->subject('New Password');
        $this->email->message('Hello, your new password is: ' . $new_password);

        // Send the email
        if ($this->email->send()) {
            $this->session->set_flashdata('reset_success', 'Your new password is sent!');
            redirect('admin/Login');
        } else {

            $this->session->set_flashdata('reset_error', 'Something went wrong. Please try again.');
            redirect('admin/ResetPassword');
        }
    }

    public function send_new_password()
    {
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');

            // Generate a new random password
            $new_password = $this->generate_random_password();

            // Update the user's password in the database
            $this->update_user_password($email, $new_password);

            // Send the new password to the user's email
            $this->send_email($email, $new_password);
        }
    }
}
