<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class photo_album extends CI_Controller {

	public function index()
	{
		$this->load->view('menu_bar');
		$this->load->view('photo_album');
	}

}

