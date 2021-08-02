<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {

	public function postList($number,$offset)
	{
		return $this->db->get('post',$number,$offset)->result();
	}

	public function numPost()
	{
		return $this->db->get('post')->num_rows();
	}

	public function getPost($slug)
	{
		return $this->db->where('slug',$slug)->get('post')->row();
	}

}

/* End of file HomeModel.php */
/* Location: ./application/models/HomeModel.php */