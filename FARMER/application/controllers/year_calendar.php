<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Year_calendar extends CI_Controller {

	public function index()
	{
		$this->load->view('menu_bar');
		$this->load->view('year_calendar');
	}

}

