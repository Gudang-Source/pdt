<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$data['title'] = 'Beranda';
		$data['main'] = 'home/index';
		$this->load->view('layout', $data);
	}

}

/* End of file Home.php */
/* Location: ./application/modules/home/Home.php */