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
                'rules' => 'required|trim|valid_email'
            )
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == false) {
            $data = array('content' => 'auth/registration', 'title' => 'Register page');
            $this->load->view('auth/template', $data);
        } else {
            echo "data done";
        }
    }

    public function hal()
    {
        echo 'hal';
    }
}

/* End of file Controllername.php */
