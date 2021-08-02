<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	// admin auth
	public function adminAuth($where)
	{
		return $this->db->where($where)->get('admin');
	}

	// user registration
	public function usernameCheck($username)
	{
		return $this->db->where('username', $username)->get('user')->num_rows();
	}

	public function emailCheck($email)
	{
		return $this->db->where('email', $email)->get('user')->num_rows();
	}

	public function userRegister($data)
	{
		$this->db->insert('user', $data);
	}

	public function userAuth($where)
	{
		return $this->db->where($where)->get('user');
	}
}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */