<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Uke extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('uke/Uke_model');
    }
    
    public function index()
    {
        $this->load->library('pagination');
        $page = $this->input->get('per_page');

        $limit = 5;

        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;

        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['base_url'] = site_url('uke');
        $config['per_page'] = $limit;
        $config['total_rows'] = $this->Uke_model->get_uke2()->num_rows();
        $this->pagination->initialize($config);

        $data['jlhpage'] = $page;
        $data['uke'] = $this->Uke_model->get_uke2(null, $limit, $offset)->result();

        $data['title'] = 'Unit Kerja Eselon';
        $data['main'] = 'uke/index';
        $this->load->view('layout', $data);
    }

    function sub_uke3($id=null)
    {
        $this->load->library('pagination');
        $page = $this->input->get('per_page');

        $limit = 5;

        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;

        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['base_url'] = site_url('uke');
        $config['per_page'] = $limit;
        $config['total_rows'] = $this->Uke_model->get_uke3(['uke_2_id' => $id])->num_rows();
        $this->pagination->initialize($config);

        $data['jlhpage'] = $page;
        $data['uke'] = $this->Uke_model->get_uke3(['uke_2_id' => $id], $limit, $offset)->result();

        $data['title'] = 'Unit Kerja Eselon III';
        $data['main'] = 'uke/uke3';
        $this->load->view('layout', $data);
    }

    function sub_uke4($id = null)
    {
        $this->load->library('pagination');
        $page = $this->input->get('per_page');

        $limit = 5;

        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;

        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['base_url'] = site_url('uke');
        $config['per_page'] = $limit;
        $config['total_rows'] = $this->Uke_model->get_uke4(['uke_3_id' => $id])->num_rows();
        $this->pagination->initialize($config);

        $data['jlhpage'] = $page;
        $data['uke'] = $this->Uke_model->get_uke4(['uke_3_id' => $id], $limit, $offset)->result();

        $data['title'] = 'Unit Kerja Eselon IV';
        $data['main'] = 'uke/uke4';
        $this->load->view('layout', $data);
    }

    function add()
    {
        $data['uke_2_name'] = htmlspecialchars($this->input->post('uke_name'));

        $status = $this->Uke_model->insert($data);

        if ($status) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('uke');
        } else {
            $this->session->set_flashdata('failed', 'Data gagal disimpan');
            redirect('uke');
        }
    }

    function edit()
    {
        $id = $this->input->post('id');
        $data['uke_2_name'] = htmlspecialchars($this->input->post('uke_name'));

        $status = $this->Uke_model->update($data, ['uke_2_id' => $id]);

        if ($status) {
            $this->session->set_flashdata('success', 'Update berhasil');
            redirect('uke');
        } else {
            $this->session->set_flashdata('failed', 'Update gagal');
            redirect('uke');
        }
    }

    function add_uke_3($id = null)
    {
        $data['uke_3_name'] = htmlspecialchars($this->input->post('uke_name'));
        $data['uke_2_id'] = $id;

        $status = $this->Uke_model->insert_uke_3($data);

        if ($status) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('uke/sub_uke3/'.$id);
        } else {
            $this->session->set_flashdata('failed', 'Data gagal disimpan');
            redirect('uke/sub_uke3/'.$id);
        }
    }

    function edit_uke3($id = null)
    {
        $uke_id = $this->input->post('id');
        $data['uke_3_name'] = htmlspecialchars($this->input->post('uke_name'));
        $data['uke_2_id'] = $id;

        $status = $this->Uke_model->update_uke_3($data, ['uke_3_id' => $uke_id]);

        if ($status) {
            $this->session->set_flashdata('success', 'Update berhasil');
            redirect('uke/sub_uke3/' . $id);
        } else {
            $this->session->set_flashdata('failed', 'Update gagal');
            redirect('uke/sub_uke3/' . $id);
        }
    }

    function add_uke_4($id = null)
    {
        $data['uke_4_name'] = htmlspecialchars($this->input->post('uke_name'));
        $data['uke_3_id'] = $id;

        $status = $this->Uke_model->insert_uke_4($data);

        if ($status) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('uke/sub_uke4/' . $id);
        } else {
            $this->session->set_flashdata('failed', 'Data gagal disimpan');
            redirect('uke/sub_uke4/' . $id);
        }
    }

    function edit_uke4($id = null)
    {
        $uke_id = $this->input->post('id');
        $data['uke_4_name'] = htmlspecialchars($this->input->post('uke_name'));
        $data['uke_3_id'] = $id;

        $status = $this->Uke_model->update_uke_4($data, ['uke_4_id' => $uke_id]);

        if ($status) {
            $this->session->set_flashdata('success', 'Update berhasil');
            redirect('uke/sub_uke4/' . $id);
        } else {
            $this->session->set_flashdata('failed', 'Update gagal');
            redirect('uke/sub_uke4/' . $id);
        }
    }

}

/* End of file Uke.php */
