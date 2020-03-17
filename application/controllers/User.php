<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $log = $this->session->userdata('status');

        if ($log != "login") {

            redirect(base_url('auth'), 'refresh');
        }
    }


    public function index()
    {
        $userData = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'userName' => $userData['name'],
            'userPicture' => $userData['image'],
            'content' => 'user/user_home',
            'title' => 'user home'
        );
        $this->load->view('user/template', $data);
    }
}

/* End of file User.php */
