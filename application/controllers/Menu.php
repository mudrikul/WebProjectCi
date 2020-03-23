<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function index()
    {

        $userData = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'userDateCreated' => $userData['date_created'],
            'userName' => $userData['name'],
            'userEmail' => $userData['email'],
            'userPicture' => $userData['image'],
            'content' => 'menu/menu_management',
            'title' => 'Menu Management',
            'menu' => $this->db->get('user_menu')->result_array()
        );

        $this->form_validation->set_rules('menu', 'Menu', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template', $data);
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New menu added!</div>');
            redirect('menu', 'refresh');
        }
    }

    public function submenu()
    {
        $this->load->model('Menu_model', 'menu');

        $userData = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data = array(
            'userDateCreated' => $userData['date_created'],
            'userName' => $userData['name'],
            'userEmail' => $userData['email'],
            'userPicture' => $userData['image'],
            'content' => 'menu/submenu',
            'title' => 'Submenu Management',
            'subMenu' => $this->menu->getSubMenu(),
            'menu' => $this->db->get('user_menu')->result_array()

        );
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/template', $data);
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New sub menu added!</div>');
            redirect('menu/submenu', 'refresh');
        }
    }
}

/* End of file Menu.php */
