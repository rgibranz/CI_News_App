<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {

	public function adminAuth($where)
	{
		return $this->db->where($where)->get('admin');
	}

}

/* End of file AuthModel.php */
/* Location: ./application/models/AuthModel.php */