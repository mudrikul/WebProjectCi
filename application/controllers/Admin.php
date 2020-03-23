<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
            'userDateCreated' => $userData['date_created'],
            'userName' => $userData['name'],
            'userEmail' => $userData['email'],
            'userPicture' => $userData['image'],
            'content' => 'admin/admin_home',
            'title' => 'Dashboard'
        );
        $this->load->view('admin/template', $data);
    }
}

/* End of file Admin.php */
