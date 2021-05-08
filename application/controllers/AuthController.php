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
            $userdata = array(
                'username' => $username,
                'password' => $password,
				'status' => 'admin',
			);

            $this->session->set_userdata($userdata);
            $this->session->set_flashdata('login', 'success');

            redirect('admin');
        } else {
           echo 'salah';
        }
    }

	public function adminLogout()
	{		
		$this->session->sess_destroy();
		redirect('admin/login');
	}

    public function userRegistration()
    {
        $data['page_name'] = "Registration";
        $this->load->view('user/registration', $data);
    }

    public function userRegister()
    {
        // get user input
        $username  = $this->input->post('username');
        $firstName = $this->input->post('firstName');
        $lastName  = $this->input->post('lastName');
        $email     = $this->input->post('email');
        $password  = $this->input->post('password');

        // check username available
        $usernameCheck = $this->AuthModel->usernameCheck($username);
        // email check available
        $emailCheck = $this->AuthModel->emailCheck($email);

        if ($usernameCheck > 0) {
            // if username is conflict
            $this->session->set_flashdata('registration', 'username');
            redirect('register');
        }else if ($emailCheck > 0) {
            // if email is conflict
            $this->session->set_flashdata('registration', 'email');
            redirect('register');
        }else{
            // otherwise the usernames and email don't conflict
            // make data array
            $dataRegister = array(
                'username'   => $username,
                'first_name' => $firstName,
                'last_name'  => $lastName,
                'email'      => $email,
                'password'   => $password
            );

            // send data to model
            $this->AuthModel->userRegister($dataRegister);

            // redirect to login
            $this->session->set_flashdata('registration', 'success');
            redirect('login');
        }
    }
}
