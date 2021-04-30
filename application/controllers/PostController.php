<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PostController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("PostModel");
	}

	public function listPost()
	{
		$data['page_name'] = "Post List";

		$this->load->view("admin/post/list",$data);
	}

	public function addPost()
	{
		$data['page_name'] = "Add Post";
		$data['category'] = $this->PostModel->getCategory()->result();

		$this->load->view("admin/post/add",$data);
	}

	public function savePost()
	{
		$title   = $this->input->post('title');
		$slug    = $this->_slug($title);
		$subject = $this->input->post('subject');
	}

}

/* End of file PostController.php */
/* Location: ./application/controllers/PostController.php */