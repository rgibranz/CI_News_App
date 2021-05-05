<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PostController extends CI_Controller{
	public function __construct()
    {
        parent::__construct();

		$this->load->model('admin/PostModel','PostModel');

        if($this->session->userdata('status') != "admin"){
			redirect('admin/login');
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
		
		$data['posts']      = $this->PostModel->getList($category);
		$data['categories']  = $this->PostModel->getCategory();
		
		$this->load->view('admin/post/list',$data);
	}

	public function addPost()
	{
		$data['page_name'] = "Tambah Post";
		$data['categories']  = $this->PostModel->getCategory();
		
		$this->load->view('admin/post/add',$data);
	}

	public function savePost()
	{
		$title = $this->input->post('title');
		$slug = $this->slug($title);
		$subject = $this->input->post('subject');
		$image = $this->imageUpload($slug);
		$timestamp = date('Y-m-d H:i:s');
		$category = $this->input->post('category');
		$dataInput = array(
			'title' => $title,
			'slug' => $slug,
			'subject' => $subject,
			'image' => $image,
			'created_at' => $timestamp,
			'updated_at' => $timestamp,
			'category' => $category,
		);
		$this->PostModel->savePost($dataInput);
		$this->session->set_flashdata('post', 'add');
		redirect('admin/post/list');
	}

	public function addCategory()
	{
		$category = $this->input->post('category');
		$dataInput = array('category' => $category);
		
		$this->PostModel->saveCategory($dataInput);
		$this->session->set_flashdata('category', 'add');
		redirect('admin/post/list');
	}

	public function slug($text)
	{
		$text = trim($text);
	  	if (empty($text)) return '';
	    $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
	    $text = strtolower(trim($text));
	    $text = str_replace(' ', '-', $text);
	    $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
	    return $text;
	}

	public function imageUpload($slug)
	{
		$config['upload_path']          = './assets/upload/images/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['file_name']            = $slug.date('Y-m-d'); 
		// $config['max_size']             = 100;
		// $config['max_width']            = 1024;
		// $config['max_height']           = 768;
		$config['encrypt_name']			= false;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('image'))
		{
			print_r($this->upload->display_errors());
		}
		else
		{
			return $this->upload->data("file_name");
		}
	}
}
