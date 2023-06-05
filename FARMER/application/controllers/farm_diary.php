<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farm_diary extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->library('authit');
		$this->load->helper('authit');
		$this->config->load('authit');
		$this->load->helper('url');
    }

	public function index()
	{	
		//로그인 세션
		$this->load->library('session'); 
		$data = array(
			'login_in' => false	
		);
		if(isset($this->session->userdata['logged_in'])){
			$data['login_in'] = $this->session->userdata['logged_in'];
		}
		$this->load->view('menu_bar', $data);
		$this->load->view('farm_diary');

		//로그인이 되어있지 않은경우
		if(!logged_in()){
			redirect('/auth/login');
		}
	}
	
	//일지등록 ajax
	public function diary_ajax()
	{		
		// model('diarymodel')로드시킴
		$this->load->model('common_model'); 
		$this->load->model('diary_model'); 
		
		//테이블id 넘버링
		$table_nm 		= 'farmDiary';
		$number_result 	= $this->common_model->numbering($table_nm);
		$result 		= $this->diary_model->insert_diary($number_result);  
		
		//데이터 result
		echo json_encode(array(
			'result'	=> $result
		));

	}
}

