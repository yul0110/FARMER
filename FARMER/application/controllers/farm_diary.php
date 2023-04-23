<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class farm_diary extends CI_Controller {

	public function index()
	{
		$this->load->view('menu_bar');
		$this->load->view('farm_diary');
	}
	
	public function diary_ajax()
	{
		$this->load->model('diarymodel');
		$this->diarymodel->file_upload_ajax(1);
	}
}

