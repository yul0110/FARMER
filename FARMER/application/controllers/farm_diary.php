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
		$number_result = $this->diarymodel->numbering_diary();  
		$result = $this->diarymodel->insert_diary($number_result);  
		
		//데이터 result
		echo json_encode(array(
			'result'	=> $result
		));

	}
}

