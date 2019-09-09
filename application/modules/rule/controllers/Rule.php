<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rule extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
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
}

/* End of file Rule.php */
