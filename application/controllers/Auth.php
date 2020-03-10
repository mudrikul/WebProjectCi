<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $data = array('content' => 'auth/login');
        $this->load->view('auth/template', $data);
    }

    public function registration()
    {
        $data = array('content' => 'auth/registration');
        $this->load->view('auth/template', $data);
    }

    public function hal()
    {
        echo 'hal';
    }
}

/* End of file Controllername.php */
