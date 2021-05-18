<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$data['page_name'] = 'My News App';
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
