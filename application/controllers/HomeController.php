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

		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

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

	public function post($slug)
	{
		
		$data['post'] = $this->HomeModel->getPost($slug);
		
		$data['page_name'] = 'contact';
		$this->load->view('post', $data);
	}
	
}
