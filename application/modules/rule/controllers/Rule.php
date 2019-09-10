<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        if($this->role_id != 1) redirect('home');
        $this->load->model('uke/Uke_model');
        $this->load->model('rule/Rule_model');
    }

    public function index()
    {
        $this->load->library('pagination');
        $page = $this->input->get('per_page');
        $q = $this->input->get(NULL, TRUE);
        $data['q'] = $q;

        $params = array();
        if (isset($q['uke_2']) && $q['uke_2'] != '') {
            $params['rules.uke_2_id'] = $q['uke_2'];
        }

        $limit = 5;

        if (!$page) :
            $offset = 0;
        else :
            $offset = $page;
        endif;

        $config['page_query_string'] = TRUE;
        $config['enable_query_strings'] = TRUE;
        $config['query_string_segment'] = 'per_page';
        $config['base_url'] = site_url('rule');
        $config['per_page'] = $limit;
        $config['total_rows'] = $this->Rule_model->get($params)->num_rows();
        $this->pagination->initialize($config);

        $data['jlhpage'] = $page;
        $data['uke2'] = $this->Uke_model->get_uke2()->result();
        $data['rule'] = $this->Rule_model->get($params, $limit, $offset)->result();
        $data['title'] = 'Lumbung Data';
        $data['main'] = 'rule/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('uke_2_id', 'Instansi', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_no', 'Nomor Peraturan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_about', 'Tentang', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_year', 'Tahun Peraturan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_date', 'Tanggal Ditetapkan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_status', 'Keterangan Publish', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($_POST and $this->form_validation->run() == TRUE) {

            $params['uke_2_id'] = $this->input->post('uke_2_id');
            $params['rule_no'] = $this->input->post('rule_no');
            $params['rule_about'] = $this->input->post('rule_about');
            $params['rule_year'] = $this->input->post('rule_year');
            $params['rule_date'] = $this->input->post('rule_date');
            $params['rule_status'] = $this->input->post('rule_status');
            $params['user_id'] = $this->uid;
            $params['user_fullname'] = $this->fullname;

            $full = 'L_' . time() . rand(1111, 9999);
            if (!empty($_FILES['rule_file']['name'])) {
                $params['rule_file'] = $this->upload_file('rule_file', $full);
            }
            $this->Rule_model->insert($params);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('rule');
        } else {
            $data['uke2'] = $this->Uke_model->get_uke2()->result();
            $data['title'] = 'Tambah Lumbung Data';
            $data['main'] = 'rule/add';
            $this->load->view('layout', $data);
        }
    }

    function edit($id = null)
    {
        $rule = $this->Rule_model->get(['rule_id' => $id])->row();
        if(!isset($id) || !isset($rule)) redirect('rule');
        $this->form_validation->set_rules('uke_2_id', 'Instansi', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_no', 'Nomor Peraturan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_about', 'Tentang', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_year', 'Tahun Peraturan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_date', 'Tanggal Ditetapkan', 'trim|required|xss_clean');
        $this->form_validation->set_rules('rule_status', 'Keterangan Publish', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($_POST and $this->form_validation->run() == TRUE) {

            $params['uke_2_id'] = $this->input->post('uke_2_id');
            $params['rule_no'] = $this->input->post('rule_no');
            $params['rule_about'] = $this->input->post('rule_about');
            $params['rule_year'] = $this->input->post('rule_year');
            $params['rule_date'] = $this->input->post('rule_date');
            $params['rule_status'] = $this->input->post('rule_status');

            $full = 'LC_' . time() . rand(1111, 9999);
            if (!empty($_FILES['rule_file']['name'])) {
                $path_to_file = 'uploads/publish/' . $rule->rule_file;
                unlink($path_to_file);
                $params['rule_file'] = $this->upload_file('rule_file', $full);
            }
            $this->Rule_model->update($params, ['rule_id' => $id]);
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
            redirect('rule');
        } else {
            $data['uke2'] = $this->Uke_model->get_uke2()->result();
            $data['rule'] = $rule;
            $data['title'] = 'Edit Lumbung Data';
            $data['main'] = 'rule/add';
            $this->load->view('layout', $data);
        }
    }

    function detail($id = null)
    {
        $data['rule'] = $this->Rule_model->get(['rule_id' => $id])->row();
        $data['title'] = 'Detail Lumbung Data';
        $data['main'] = 'rule/detail';
        $this->load->view('layout', $data);
    }

    function upload_file($name = NULL, $fileName = NULL)
    {
        $this->load->library('upload');
        $config['upload_path'] = FCPATH . 'uploads/publish/';
        /* create directory if not exist */
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, TRUE);
        }
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $fileName;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($name)) {
            $this->session->set_flashdata('failed', $this->upload->display_errors('', ''));
            redirect(uri_string());
        }
        $upload_data = $this->upload->data();
        return $upload_data['file_name'];
    }
}

/* End of file Rule.php */
