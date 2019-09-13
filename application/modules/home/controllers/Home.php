<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rule/Rule_model');
		$this->load->model('uke/Uke_model');
		$this->load->model('type/Type_model');
	}

	public function index()
	{
		$this->load->library('pagination');
		$page = $this->input->get('per_page');
		$q = $this->input->get(NULL, TRUE);
		$data['q'] = $q;

		$params = array();
		$param = array();
		$params['rule_status'] = 1;

		if (isset($q['uke_2']) && $q['uke_2'] != '') {
			$params['rules.uke_2_id'] = $q['uke_2'];
		}

		if (isset($q['sk']) && $q['sk'] != '') {
			$params['rules.type_id'] = $q['sk'];
		}

		if (isset($q['year']) && $q['year'] != '') {
			$params['rule_year'] = $q['year'];
		}

		if (isset($q['about']) && $q['about'] != '') {
			$param['about'] = $q['about'];
		}

		if (isset($q['no']) && $q['no'] != '') {
			$param['no'] = $q['no'];
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
		$config['base_url'] = site_url('home');
		$config['per_page'] = $limit;
		$config['total_rows'] = $this->Rule_model->get_rule($params)->num_rows();
		$this->pagination->initialize($config);

		$data['jlhpage'] = $page;
		$data['rules'] = $this->Rule_model->get_rule($params, $limit, $offset, $param)->result_array();
		$data['uke2'] = $this->Uke_model->get_uke2()->result();
		$data['sk'] = $this->Type_model->get(['type_status' => 1])->result();
		$data['title'] = 'Beranda';
		$data['main'] = 'home/index';
		$this->load->view('layout', $data);
	}

	function detail($id = null)
	{
		if(!isset($id)) redirect('home');
		$data['rule'] = $this->Rule_model->get(['rule_id' => $id])->row();
		$data['title'] = 'Detail Peraturan';
		$data['main'] = 'home/detail';
		$this->load->view('layout', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/modules/home/Home.php */