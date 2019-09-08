<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
    }

    public function index()
    {
        $data['user'] = $this->User_model->get(['user_id' => $this->uid])->row(); 
        $data['title'] = 'Profil';
        $data['main'] = 'profile/index';
        $this->load->view('layout', $data);
    }

    public function edit() {
        $id = $this->input->post('id');
        $params['user_fullname'] = $this->input->post('fullname');
        $this->User_model->update($params, ['user_id'=>$id]);

        $this->session->set_flashdata('success', 'Edit profil berhasil, silahkan login kembali');
        redirect('profile');
    }

    function cpw() {
        $params['user_password'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);
        $this->User_model->update($params, ['user_id' => $this->input->post('id')]);

        $this->session->set_flashdata('success', 'Ubah password pengguna berhasil');
        redirect('profile');
    }

}

/* End of file Profile_client.php */
/* Location: ./application/modules/profile/controllers/Profile_client.php */