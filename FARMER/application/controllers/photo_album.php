<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class photo_album extends CI_Controller {

	public function index()
	{
		$this->load->view('menubar');
		$this->load->view('photo_album');
	}

}

