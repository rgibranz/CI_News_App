<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('HomeModel');
	}

	public function index()
	{
		$data['page_name'] = 'My News App';

		// paginaton config
		$numPost = $this->HomeModel->numPost();
		$this->load->library('pagination');
		$config['base_url'] = base_url()."pages";
		$config['total_rows'] = $numPost;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		

		$data['posts'] = $this->HomeModel->postList($config['per_page'],$from);
		$this->load->view('welcome',$data);
	}

	public function about()
	{
		$data['page_name'] = 'About';
		$this->load->view('about', $data);
	}

	public function contact()
	{
		$data['page_name'] = 'contact';
		$this->load->view('contact', $data);
	}
	
}
