<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class farm_diary extends CI_Controller {

	public function index()
	{
		$this->load->view('menu_bar');
		$this->load->view('farm_diary');

	}
	
	//일지등록 ajax
	public function diary()
	{
		// model('diarymodel')로드시킴
		$this->load->model('diarymodel'); 
		$result = $this->diarymodel->insert_diary();  
		
		//데이터 result
		echo json_encode(array(
			'result'	=> $result
		));

	}
}

