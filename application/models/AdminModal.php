<?php


class AdminModal extends CI_Model
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
        $user = $this->db->get_where('admin', ['email' => $email])->row();

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
}
