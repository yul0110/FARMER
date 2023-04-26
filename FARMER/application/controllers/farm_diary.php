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
		$this->load->model('common_model'); 
		$this->load->model('diary_model'); 
		
		$table_nm = 'farmDiary';
		//테이블id 넘버링
		$number_result = $this->common_model->numbering($table_nm);  
		$result = $this->diary_model->insert_diary($number_result);  
		
		//데이터 result
		echo json_encode(array(
			'result'	=> $result
		));

	}
}

