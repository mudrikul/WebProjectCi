<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

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
