<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

      function __construct(){

        parent::__construct();

        if ($this->session->userdata('logged')== NULL) redirect('auth/log');

        $this->user_data            = $this->session->userdata('user_data');
        $this->uid           		= $this->user_data['uid'];
        $this->ukeid           		= $this->user_data['ukeid'];
        $this->fullname		   	    = $this->user_data['fullname'];
    }

}

/* End of file auth.php */
/* Location: ./application/controllers/auth.php */