<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class year_calendar extends CI_Controller {

	public function index()
	{
		$this->load->view('menubar');
		$this->load->view('year_calendar');
	}

}

