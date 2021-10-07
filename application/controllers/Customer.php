<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation', 'session']);
        $this->load->database();
        $this->load->model('CustomerModal');
    }

    public function index()
    {
        $this->load->view('customer/customer_login');
    }

    public function login()
    {

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('customer/customer_login');
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $result = $this->CustomerModal->login($email, $password);

            if ($result) {
                echo 'Login success!';
                exit;
            } else {
                redirect(uri_string());
            }
        }
    }
}
