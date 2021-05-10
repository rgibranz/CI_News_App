<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

	public function getPost()
	{
		return $this->db->get('post');
	}

}

/* End of file HomeModel.php */
/* Location: ./application/models/HomeModel.php */