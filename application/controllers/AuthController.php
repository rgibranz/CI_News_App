<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
    }

    public function adminLogin()
    {
        $data['page_name'] = "Admin Login";

        $this->load->view('admin/login', $data);
    }

    public function adminAuth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = [
            'username' => $username,
            'password' => $password
        ];

        $auth = $this->AuthModel->adminAuth($where)->num_rows();

        if ($auth > 0) {
            $userdata = [
                'login' => true,
                'username' => $username,
                'password' => $password
            ];

            $this->session->set_userdata($userdata);
            $this->session->set_flashdata('login', 'success');

            redirect('admin');
        } else {
            $this->session->set_flashdata('login', 'failed');

            redirect('admin/login');
        }
    }
}
