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

//화면에 뿌릴 캘린더 기본틀--------------------------------------------------------------------------------------------------------------------------
		$calendar_array = [];  //총 42개를 생각, 달력생성

		//과거일수 날짜
		for($i=$start_week; $i>0; $i--){
			$in_data = "-".$i." days";			
			array_push($calendar_array, array(
											'st_date'		=> date("Ymd",strtotime ($in_data, strtotime($to_year.$to_month."01"))),
											'st_bar_date'	=> date("Y-m-d",strtotime ($in_data, strtotime($to_year.$to_month."01"))),
											'weather_data'	=> array()
											));
		}
		//이번달 일수 날짜 전부
		for($i=0; $i<$to_total_day ; $i++){
			$in_data = "+".$i." days";			
			array_push($calendar_array, array(
											'st_date' => date("Ymd",strtotime ($in_data, strtotime($to_year.$to_month."01"))),
											'st_bar_date' => date("Y-m-d",strtotime ($in_data, strtotime($to_year.$to_month."01"))),
											'weather_data'	=> array()
											));
		}
		//미래일수 날짜 전부
		for($i=0; $i<$future_day ; $i++){
			$in_data = "+".$i." days";			
			array_push($calendar_array, array(
											'st_date' => date("Ymd",strtotime ($in_data, strtotime ("+1 months", strtotime($to_year.$to_month."01")))),
											'st_bar_date' => date("Y-m-d",strtotime ($in_data, strtotime ("+1 months", strtotime($to_year.$to_month."01")))),
											'weather_data'	=> array()
											));
		}
//달력 생성 완료--------------------------------------------------------------------------------------------------------------------------------------
		
		$calendar_first_date 	= $calendar_array[0]['st_bar_date'].' 00:00:00'; //20230430 00:00:00
		$calendar_last_date		= $calendar_array[41]['st_bar_date'].' 00:00:00';//20230610 00:00:00
		$calendar_today			= date("Y-m-d").' 00:00:00';
		$calendar_yesterday		= date("Y-m-d",strtotime ("-1 days")).' 00:00:00'; 
		$calendar_now_time		= date("h").'00'; //현재시간

	//지난달 과거일 + 이번달 과거일 (단기예보)
		//단기 과거 SKY(아이콘 출력)
		$lastday_sky_arr = $this->main_model->select_last_month_sky(
																	$calendar_first_date,
		 															$calendar_today,
																	$calendar_now_time
																	);
		//단기 과거 TMN 최저기온 (마지막 과거일 ~ 오늘)
		$lastday_tmn_arr = $this->main_model->select_last_month_tmn(
																	$calendar_first_date,
																	$calendar_today
																	);															
		//단기 과거 TMX 최고기온			
		$lastday_tmx_arr = $this->main_model->select_last_month_tmx(
																	$calendar_first_date,
																	$calendar_today
																	);										
		//php는 for문 안에 배열의 값을 저장시 for문이 끝날때 같이 사라져서 배열에 반영되지않는다.	****************************			
	//------------------------------------------------------------------------------------------------------------------------------------------------		
	
	//단기예보 
		//단기예보 SKY (당일 포함 향후2일)	
		$today_sky_arr = $this->main_model->select_term_today_sky(
																$calendar_today,
																$calendar_now_time
																);		
		//단기예보 TMN 최저기온 당일 하루 데이터			
		$today_tmn_arr = $this->main_model->select_term_today_tmn(
																$calendar_today,
																$calendar_yesterday
																);		
		//단기예보 TMN 최저기온 당일제외 향후2일			
		$two_days_tmn_arr = $this->main_model->select_term_two_days_tmn(
																		$calendar_today
																		);	
		//단기예보 TMX 최고기온	(당일 포함 향후2일)		
		$today_tmx_arr = $this->main_model->select_term_today_tmx(
																$calendar_today
																);		
	//------------------------------------------------------------------------------------------------------------------------------------------------	

	//중기예보
		//중기육상예보 (당일로부터 3일 후 ~ 10일치의 하늘상태)	
		$midAthletics_arr = $this->main_model->select_midAthletics(
																$calendar_today
																);		
		//중기예보 (당일로부터 3일 후 ~ 10일치의 최저,최고기온)	
		$midTerm_arr = $this->main_model->select_midTerm(
														$calendar_today
														);	

	//------------------------------------------------------------------------------------------------------------------------------------------------

		//단기 과거 SKY 데이터 가공
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($lastday_sky_arr);$y++){
				if($calendar_array[$x]['st_date'] == $lastday_sky_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'category' 	=> $lastday_sky_arr[$y]['category'],
																		'fcstValue' => $lastday_sky_arr[$y]['fcstValue']
																	));
				}
			}
		}		
		//단기 과거 TMN 데이터 가공
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($lastday_tmn_arr);$y++){
				if($calendar_array[$x]['st_date'] == $lastday_tmn_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'category'	=> $lastday_tmn_arr[$y]['category'],
																		'fcstValue' => $lastday_tmn_arr[$y]['fcstValue']
																	));
				}
			}
		}	
		//단기 과거 TMX 데이터 가공
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($lastday_tmx_arr);$y++){
				if($calendar_array[$x]['st_date'] == $lastday_tmx_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'category' 	=> $lastday_tmx_arr[$y]['category'],
																		'fcstValue' => $lastday_tmx_arr[$y]['fcstValue']
																	));
				}
			}
		}		

	//------------------------------------------------------------------------------------------------------------------------------------------------
		//단기예보 SKY 데이터 가공 (당일 포함 향후2일)
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($today_sky_arr);$y++){
				if($calendar_array[$x]['st_date'] == $today_sky_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'category'	=> $today_sky_arr[$y]['category'],
																		'fcstValue' => $today_sky_arr[$y]['fcstValue']
																	));
				}
			}
		}	
		//단기예보 TMN 데이터 가공 (당일)
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($today_tmn_arr);$y++){
				if($calendar_array[$x]['st_date'] == $today_tmn_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'category'	=> $today_tmn_arr[$y]['category'],
																		'fcstValue' => $today_tmn_arr[$y]['fcstValue']
																	));
				}
			}
		}	
		//단기예보 TMN 데이터 가공 (당일 제외 향후2일)
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($two_days_tmn_arr);$y++){
				if($calendar_array[$x]['st_date'] == $two_days_tmn_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'category'	=> $two_days_tmn_arr[$y]['category'],
																		'fcstValue' => $two_days_tmn_arr[$y]['fcstValue']
																	));
				}
			}
		}	
		//단기예보 TMX 데이터 가공 (당일 포함 향후2일)
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($today_tmx_arr);$y++){
				if($calendar_array[$x]['st_date'] == $today_tmx_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'category'	=> $today_tmx_arr[$y]['category'],
																		'fcstValue' => $today_tmx_arr[$y]['fcstValue']
																	));
				}
			}
		}	
	//-------------------------------------------------------------------------------------------------------------------------------------------------
	
		//이번달 3일뒤부터 10일 (중기육상예보)
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($midAthletics_arr);$y++){
				if($calendar_array[$x]['st_date'] == $midAthletics_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'fcstValue' => $midAthletics_arr[$y]['weatherType']
																	));
				}
			}
		}	
		//이번달 3일뒤부터 10일 (중기기온예보)      
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($midTerm_arr);$y++){
				if($calendar_array[$x]['st_date'] == $midTerm_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'taMin' => $midTerm_arr[$y]['taMin'],
																		'taMax' => $midTerm_arr[$y]['taMax']
																	));
				}
			}
		}	

		var_dump($calendar_array);
		exit;
	}//calendar_ajax

		
}

