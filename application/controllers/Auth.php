<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data = array('content' => 'auth/login', 'title' => 'login page');
        $this->load->view('auth/template', $data);
    }

    public function registration()
    {
        $config = array(
            array(
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email|is_unique[user.email]',
                'errors' => array(
                    'is_unique' => 'Email already exist',
                )
            ),
            array(
                'field' => 'password1',
                'label' => 'Password',
                'rules' => 'required|trim|min_length[3]|matches[password2]',
                'errors' => array(
                    'required' => 'Password is empty',
                    'matches' => 'Password is not match',
                    'min_length' => 'Password too short'
                )
            ),
            array(
                'field' => 'password2',
                'label' => 'Password',
                'rules' => 'required|trim|matches[password1]'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            $data = array('content' => 'auth/registration', 'title' => 'Register page');
            $this->load->view('auth/template', $data);
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => date("y:m:d"),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account has been created !
          </div>');

            redirect('auth', 'refresh');
        }
    }

    public function hal()
    {
        echo 'hal';
    }
}

/* End of file Controllername.php */
