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

    public function register()
    {
        $this->load->view('customer/customer_register');
    }
    public function register_user()
    {

        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('customer/customer_register');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $address = $this->input->post('address');
            $phone_number = $this->input->post('phone_number');

            $result = $this->CustomerModal->register($first_name, $last_name, $email, $password, $address, $phone_number);

            if ($result) {
                echo 'Register success!';
                exit;
            } else {
                redirect(uri_string());
            }
        }
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
