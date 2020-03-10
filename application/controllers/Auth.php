<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $data = array('content' => 'auth/login');
        $this->load->view('theme/index', $data);
    }
}

/* End of file Controllername.php */
