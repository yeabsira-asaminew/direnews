<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_Model extends CI_Model
{
	//for getting user details
	public function getusedetails($uid)
	{
		$query = $this->db->select('name, email')
			->where('id', $uid)
			->from('tbladmin')
			->get();
		return $query->row();
	}

	//For updating user details
	public function updateuserprofile($uid, $uname, $email)
	{
		$data = array(
			'name' => $uname,
			'email' => $email

		);
		$query = $this->db->where('id', $uid)
			->update('tbladmin', $data);
	}
}
