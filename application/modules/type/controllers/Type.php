<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->role_id != 1) redirect('home');
		$this->load->model('type/Type_model');
	}

	public function index()
	{

		$this->load->library('pagination');
		$page = $this->input->get('per_page');

		$limit=5; 

		if(!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;

		$config['page_query_string'] = TRUE;
		$config['enable_query_strings'] = TRUE;
		$config['query_string_segment'] = 'per_page';
		$config['base_url'] = site_url('type');
		$config['per_page'] = $limit;
		$config['total_rows'] = $this->Type_model->get()->num_rows();
		$this->pagination->initialize($config);

		$data['jlhpage']= $page;
		$data['type'] = $this->Type_model->get(null,$limit,$offset)->result();

		$data['title'] = 'Jenis Surat';
		$data['main'] = 'type/index';
		$this->load->view('layout', $data);
	}

	function add(){
		$data['type_name'] = htmlspecialchars($this->input->post('type_name'));
		$data['type_status'] = htmlspecialchars($this->input->post('type_status'));

		$status = $this->Type_model->insert($data);

		if($status){
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan');
			redirect('type');
		} else {
			$this->session->set_flashdata('failed', 'Data gagal disimpan');
			redirect('type');
		}
	}

	function edit(){
		$id = $this->input->post('id');
		$data['type_name'] = htmlspecialchars($this->input->post('type_name'));
		$data['type_status'] = htmlspecialchars($this->input->post('type_status'));

		$status = $this->Type_model->update($data, ['type_id'=>$id]);

		if($status){
			$this->session->set_flashdata('success', 'Update berhasil');
			redirect('type');
		} else {
			$this->session->set_flashdata('failed', 'Update gagal');
			redirect('type');
		}
	}

}

/* End of file Type.php */
/* Location: ./application/modules/grade/controllers/Type.php */