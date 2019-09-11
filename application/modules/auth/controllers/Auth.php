<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user/User_model');
	}

	public function index()
	{
		$this->log();
	}

	function log()
	{
		if ($this->session->userdata('logged')) {
			redirect('home');
		}
		$data['title'] = 'Login';
		$data['redirect'] = 'home';
		$this->load->view('login', $data);
	}

	function login()
	{
		if ($this->session->userdata('logged')) redirect('home');

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			exit(json_encode(array('kode' => 0, 'pesan' => 'error login')));
		} else {
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);

			$user = $this->User_model->get(['username' => $username])->row();

			if (!empty($user) && password_verify($password, $user->user_password)) {

				$session = [
					'user_data' => [
						'uid' => $user->user_id,
						'ukeid' => $user->uke_3_id,
						'username' => $user->username,
						'fullname' => $user->user_fullname,
						'role_id' => $user->role_id
					],
					'logged' => TRUE
				];

				$this->session->set_userdata($session);
				exit(json_encode(array('kode' => 1, 'pesan' => 'OK')));
			} else {
				exit(json_encode(array('kode' => 2, 'pesan' => 'username atau password salah!')));
			}
		}
	}

	function logout()
	{
		$sessions_items = array('user_data', 'logged');
		$this->session->unset_userdata($sessions_items);
		redirect('auth/log');
	}
}

/* End of file Auth_client.php */
/* Location: ./application/modules/auth/controllers/Auth_client.php */
