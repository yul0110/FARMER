<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();

		$this->load->model('main_model');
		$this->load->library('authit');
		$this->load->helper('authit');
		$this->config->load('authit');
		$this->load->helper('url');
    }

	public function index()
	{
		$this->load->library('session'); 
		//화면에 데이터를 내리기 위한 주머니
		$data = array(
			'login_in' => false
			
		);
		//$data['login_in'] = false;
		if(isset($this->session->userdata['logged_in'])){
			$data['login_in'] = $this->session->userdata['logged_in'];
		}
		$this->load->view('menu_bar', $data);
		$this->load->view('main');
	}
	
	public function calendar_ajax(){

		// GET으로 넘겨 받은 year값이 있다면 넘겨 받은걸 year변수에 적용, 없다면 현재 년도
		$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
		$month = isset($_GET['month']) ? $_GET['month'] : date('m');

		$date = $year."-".$month."-01"; //기준을 잡기 위해 해당달의 1일을 만들어줌 
		// strtotime() 날짜 형식의 문자열을 1970년 1월 1일 0시 부터 시작하는 유닉스 타임스탬프로 변환
		$time = strtotime($date);
		$start_week = date('w', $time); // 시작 요일   date('w')=>>  0(일요일) ~ 6(토요일)
		$total_day = date('t', $time);  // 현재 달의 총 날짜   date('t')=>> 주어진 월의 일 수 28~31
		$total_week = ceil(($total_day + $start_week) / 7);  // 3. 현재 달의 총 주차  
		//ceil =>>입력값에 소수부분이 존재할 때 값을 올려서 리턴하는 함수

		echo "$year 년 $month 월  $date / $time / $start_week / $total_day / $total_week" ;
		exit;

		//현재가 1월이고 이전달이 12월인 경우
		if($month <= 1){
			$year  = $year-1;
			$month = 12;
		}
		//현재가 12월이고 다음달이 내년인 경우
		if($month >= 12){
			$year  = $year+1;
			$month = 1;
		}




	}


}

