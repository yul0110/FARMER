<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {

	public function index()
	{
		$this->load->view('menu_bar');
		$this->load->view('base_form');
	}
	
}

