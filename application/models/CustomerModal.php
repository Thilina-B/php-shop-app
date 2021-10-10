<?php


class CustomerModal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(['form_validation', 'session']);
        $this->load->database();
    }

    function login($email, $password)
    {
        $user = $this->db->get_where('users', ['email' => $email])->row();

        if (!$user) {
            $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
            return false;
        }


        if (!password_verify($password, $user->password)) {
            $this->session->set_flashdata('login_error', 'Please check your email or password and try again.', 300);
            return false;
        }

        $data = array(
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
        );

        $this->session->set_userdata($data);
        return true;
    }

    function register($first_name, $last_name, $email, $password, $address, $phone_number)
    {
        $data = array(
            'first_name' => $first_name,
            'last_name' =>  $last_name,
            'email' =>  $email,
            'address' => $address,
            'phone_number' => $phone_number,
            'password' => $this->hash_password($password),
        );

        $this->db->insert('users', $data);
    }

    function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}
