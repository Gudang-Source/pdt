<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Letter extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('letter/Letter_model');
        $this->load->model('type/Type_model');
        $this->load->model('uke/Uke_model');
    }

    public function index()
    {
        $this->load->library('pagination');
        $page = $this->input->get('per_page');
        $q = $this->input->get(NULL, TRUE);
        $data['q'] = $q;

        $params = array();
        
        if($this->role_id != 1) {
            $params['user_id'] = $this->uid;
        }
        if (isset($q['status']) && $q['status'] != '') {
            $params['letter_status'] = $q['status'];
        }

        if (isset($q['uke2']) && $q['uke2'] != '') {
            $params['uke_3.uke_2_id'] = $q['uke2'];
        }

        if (isset($q['uke3']) && $q['uke3'] != '') {
            $params['uke_4.uke_3_id'] = $q['uke3'];
        }

        if (isset($q['uke_4']) && $q['uke_4'] != '') {
            $params['letters.uke_4_id'] = $q['uke_4'];
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
        $config['base_url'] = site_url('letter');
        $config['per_page'] = $limit;
        $config['total_rows'] = $this->Letter_model->get($params)->num_rows();
        $this->pagination->initialize($config);

        $data['jlhpage'] = $page;
        if ($this->role_id == 1) {
            $data['uke2'] = $this->Uke_model->get_uke2()->result();
        }
        $data['letter'] = $this->Letter_model->get($params, $limit, $offset)->result();
        $data['title'] = 'Pengajuan Surat';
        $data['main'] = 'letter/index';
        $this->load->view('layout', $data);
    }

    function add()
    {
        $this->form_validation->set_rules('fullname', 'Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('type_id', 'Jenis Surat', 'trim|required|xss_clean');
        $this->form_validation->set_rules('phone', 'Nomor Tlp/Handphone', 'trim|required|xss_clean');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger"><button position="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>', '</div>');

        if ($_POST and $this->form_validation->run() == TRUE) {

            $lastno = $this->Letter_model->get_last(null, 1)->row_array();
            
            if (pretty_date($lastno['letter_created_at'], 'Y', false) < date('Y') or count($lastno) == 0) {
                $nomor = sprintf('%04d', '0001');
                $no_trx = $nomor . '/PDT-' . date('Ym');
            } else {
                $no = substr($lastno['letter_no'], 0, 4);
                $nomor = sprintf('%04d', $no + 0001);
                $no_trx = $nomor . '/PDT-' . date('Ym');
            }

            if($this->role_id == 1){
                $params['uke_4_id'] = $this->input->post('uke_4_id');
            } else {
                $params['uke_4_id'] = $this->ukeid;
            }
            
            $params['letter_no'] = $no_trx;
            $params['letter_fullname'] = $this->input->post('fullname');
            $params['letter_phone'] = $this->input->post('phone');
            $params['type_id'] = $this->input->post('type_id');
            $params['user_id'] = $this->uid;
            $params['user_fullname'] = $this->fullname;

            $full = 'S_' . time() . rand(1111, 9999);
            if (!empty($_FILES['letter_file']['name'])) {
                $params['letter_file'] = $this->upload_file('letter_file', $full);
            }
            $this->Letter_model->insert($params);
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan');
            redirect('letter');

        } else {
            if($this->role_id == 1) {
                $data['uke2'] = $this->Uke_model->get_uke2()->result();
            }
            $data['uke'] = $this->Uke_model->get_uke(['uke_4_id' => $this->ukeid])->row();            
            $data['type'] = $this->Type_model->get()->result();            
            $data['title'] = 'Tambah Pengajuan Surat';
            $data['main'] = 'letter/add';
            $this->load->view('layout', $data);
        }
    }

    function detail($id = null)
    {
        $letter = $this->Letter_model->get(['letter_id' => $id])->row();
        if($_POST) {
            if($this->role_id != 1) redirect('letter');
            $params['letter_status'] = $this->input->post('status');
            if($params['letter_status'] == 1) {
                $params['letter_approval_date'] = date('Y-m-d H:i:s');
            }
            if($this->input->post('cek')) {
                $path_to_file = 'uploads/submit/' . $letter->letter_file;
                unlink($path_to_file);
                $full = 'SC_' . time() . rand(1111, 9999);
                if (!empty($_FILES['letter_file']['name'])) {
                    $params['letter_file'] = $this->upload_file('letter_file', $full);
                }
            }
            $this->Letter_model->update($params, ['letter_id' => $id]);
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
            redirect('letter');
        } else {
            $data['letter'] = $letter;
            $data['title'] = 'Detail Pengajuan Surat';
            $data['main'] = 'letter/detail';
            $this->load->view('layout', $data);
        }
    }

    function upload_file($name = NULL, $fileName = NULL)
    {
        $this->load->library('upload');
        $config['upload_path'] = FCPATH . 'uploads/submit/';
        /* create directory if not exist */
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0755, TRUE);
        }
        $config['allowed_types'] = 'doc|docx|pdf';
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

/* End of file Letter.php */
