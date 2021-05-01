<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller{

	public function __construct()
    {
        parent::__construct();
		
        if($this->session->userdata('status') != "admin"){
			redirect('admin/login');
		}
    }

	public function index(){
		$data['page_name'] = "Dashboard";

		$this->load->view('admin/dashboard',$data);
	}
}
