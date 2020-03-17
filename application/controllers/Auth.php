<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        if ($this->session->userdata('status') == "login") {

            redirect(base_url('user'), 'refresh');
        }
    }


    public function index()
    {
        $config = array(
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|trim|valid_email',
            ),
        );
        $this->form_validation->set_rules($config);
        if ($this->form_validation->run() == FALSE) {
            $data = array('content' => 'auth/login', 'title' => 'login page');
            $this->load->view('auth/template', $data);
        } else {
            $this->_login();
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'status' => "login"
                    ];

                    $this->session->set_userdata($data);
                    // jika sukses login
                    redirect('user');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Your password is wrong!</div>');
                    redirect('auth', 'refresh');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Your email is not been activated !</div>');
                redirect('auth', 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Your email is not registered !</div>');
            redirect('auth', 'refresh');
        }
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
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => date("y:m:d"),
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your account has been created !</div>');

            redirect('auth', 'refresh');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('status');

        $this->session->sess_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Your have been log out !</div>');

        redirect(base_url(), 'refresh');
    }
}

/* End of file Auth.php */
