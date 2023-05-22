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
	
	public function calendar_ajax()
	{
		$this->load->model('main_model');

		// POST으로 넘겨 받은 year값이 있다면 넘겨 받은걸 year변수에 적용, 없다면 현재 년도
		$to_year 	= isset($_POST['year']) ? $_POST['year'] : date('Y');
		$to_month 	= isset($_POST['month']) ? $_POST['month'] : date('m');

		//현재가 1월이고 이전달이 12월인 경우
		if($to_month <= 1){
			$to_year  = $to_year - 1;
			$to_month = 12;
		}
		//현재가 12월이고 다음달이 내년인 경우
		if($to_month >= 12){
			$to_year  = $to_year + 1;
			$to_month = 1;
		}

		//기준을 잡기 위해 해당달의 1일을 만들어줌 
		$first_date = $to_year."-".$to_month."-01"; //2023-05-01

		$calendar_all_day 	= 42; //화면에 보여져야하는 달력 한달의 칸 수
		
		$to_one_time_stamp	= strtotime($first_date);// 1682866800   날짜 형식의 문자열을 1970년 1월 1일 0시 부터 시작하는 유닉스 타임스탬프로 변환
		$start_week 		= date('w', $to_one_time_stamp); // 1                 시작 요일   date('w')=>>  0(일요일) ~ 6(토요일)
		$to_total_day 		= date('t', $to_one_time_stamp); // 31                현재 달의 총 날짜   date('t')=>> 주어진 월의 일 수 28~31
		$last_week			= $start_week + $to_total_day; 
		$future_day			= $calendar_all_day - $last_week;	

		//화면에 뿌릴 캘린더 기본틀-------------------------------------------------------------------------------------------------------------
		$calendar_array = array();

		//과거일수 날짜
		//이번달 일수 날짜 전부
		//미래일수 날짜 전부
		//총 42개를 생각, 달력생성
		for($i=$start_week; $i>0; $i--){
			$in_data = "-".$i." days";			
			array_push($calendar_array, array(
											'cdata' => date("Ymd",strtotime ($in_data, strtotime($to_year.$to_month."01")))
											));
		}

		for($i=0; $i<$to_total_day ; $i++){
			$in_data = "+".$i." days";			
			array_push($calendar_array, array(
											'cdata' => date("Ymd",strtotime ($in_data, strtotime($to_year.$to_month."01")))
											));
		}


		for($i=0; $i<$future_day ; $i++){
			$in_data = "+".$i." days";			
			array_push($calendar_array, array(
											'cdata' => date("Ymd",strtotime ($in_data, strtotime ("+1 months", strtotime($to_year.$to_month."01"))))
											));
		}
//-------------------------------------------------------------------------------------------------------------------------------------------------

		
		//지난달 과거일 + 이번달 과거일 (단기)
		//이번달 오늘부터 2일 (단기)
		//이번달 3일뒤부터 10일 (중기)
		//나머지 날짜

		//배열 42개 짜리 배열만든다
		


		// $result_flag = $this->main_model->select_now_month();
		// echo json_encode(array(
		// 	'result'	=> $result_flag
		// ));


	}


}

