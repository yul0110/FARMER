<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class farm_list extends CI_Controller {

	public function index()
	{
		$this->load->view('menubar');
		$this->load->view('farm_list');
	}
	
}

