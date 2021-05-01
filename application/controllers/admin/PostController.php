<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PostController extends CI_Controller{
	public function __construct()
    {
        parent::__construct();

		$this->load->model('admin/PostModel','PostModel');

        if($this->session->userdata('login')=='admin'){
			redirect( "admin/login" );
			$this->session->set_flashdata( 'login'!='not login' );
		}
    }

	public function listPost()
	{
		$data['page_name'] = "List Post";
		$data['posts']      = $this->PostModel->getList();
		$data['categories']  = $this->PostModel->getCategory();
		$this->load->view('admin/post/list',$data);
	}

	public function listPostByCategory($category)
	{
		$data['page_name'] = "Kategori ".$category;
		
		$data['post']      = $this->PostModel->getList($category);
		$data['category']  = $this->PostModel->getCategory();
		
		$this->load->view('admin/post/list',$data);
	}
}
