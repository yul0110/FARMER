<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class farmDiary extends CI_Controller {

	public function index()
	{
		$this->load->view('menubar');
		$this->load->view('farmDiary');
	}
	
}

