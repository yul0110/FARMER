<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class day_list extends CI_Controller {

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
		//로그인 세션------------------------------------------------------------
		$this->load->library('session'); 
		$data = array(
			'login_in' => false	
		);
		if(isset($this->session->userdata['logged_in'])){
			$data['login_in'] = $this->session->userdata['logged_in'];
		}
		$this->load->view('menu_bar', $data);
		
		//로그인이 되어있지 않은경우
		if(!logged_in()){
			redirect('/auth/login');
		}
		//END 로그인 세션 ------------------------------------------------------
		
		//모델
		$this->load->model('day_list_model');
		
		//변수
		$date = $_GET['dateNum']; //20230610 선택한 날짜

		//일지 리스트
		$today_list_arr = $this->day_list_model->select_today_list($date);

		if(sizeof($today_list_arr) == 0){
			redirect('/');
		}

		$data['today_list_arr'] = $today_list_arr;
		$data['yyyy']			= date("Y",strtotime ($date));
		$data['mm']				= date("m",strtotime ($date));
		$data['dd']				= date("d",strtotime ($date));

		$this->load->view('day_list', $data);
	}

	//일정 진행중/종료 수정 ajax
	public function useYn_update_ajax()
	{
		$this->load->model('day_list_model');

		$diary_id		= $_POST['diaryId'];
		$diary_useYn	= $_POST['useYn'];

		$updat_flag = $this->day_list_model->update_useyn($diary_id, $diary_useYn);
	}
}

