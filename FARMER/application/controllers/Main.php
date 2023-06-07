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

		$now_year		= isset($_POST['nowYear']) ? $_POST['nowYear'] : date('Y');
		$now_month 		= isset($_POST['nowMonth']) ? $_POST['nowMonth'] : date('m');
		$update_month 	= isset($_POST['updateMonth']) ? $_POST['updateMonth'] : date('m');
		$to_year 		= $now_year == 0 ? date('Y') : $now_year;
		$to_month 		= 0;

		if($now_month != 0){ //최초 1회만 타지 않는다

			//현재가 1월이고 이전달이 12월인 경우
			if($now_month <= 1){
				$to_year  = $to_year - 1;
				$to_month = 12;
			}
			//현재가 12월이고 다음달이 내년인 경우
			if($now_month >= 12){
				$to_year  = $to_year + 1;
				$to_month = 1; 
			}
			//2월~11월 처리
			if($now_month > 1 && $now_month < 12){  
				$to_month = $update_month;
			}
		}

		// POST으로 넘겨 받은 month값이 1~12이면 넘겨 받은걸 month변수에 적용, 없다면 현재 월
		$to_month 	= $now_month >= 1 && $now_month <= 12 ?  $to_month : date('m');

		//기준을 잡기 위해 해당달의 1일을 만들어줌 
		$first_date = $to_year."-".$to_month."-01"; //2023-05-01

		$calendar_all_day 	= 42; //화면에 보여져야하는 달력 한달의 칸 수
		
		$to_one_time_stamp	= strtotime($first_date);// 1682866800   날짜 형식의 문자열을 1970년 1월 1일 0시 부터 시작하는 유닉스 타임스탬프로 변환
		$start_week 		= date('w', $to_one_time_stamp); // 1                 시작 요일   date('w')=>>  0(일요일) ~ 6(토요일)
		$to_total_day 		= date('t', $to_one_time_stamp); // 31                현재 달의 총 날짜   date('t')=>> 주어진 월의 일 수 28~31
		$last_week			= $start_week + $to_total_day; 	 // 
		$future_day			= $calendar_all_day - $last_week;	

//화면에 뿌릴 캘린더 기본틀--------------------------------------------------------------------------------------------------------------------------

		/* icon_code = '';
			S	: 맑음
			CM	: 구름많음
			C	: 흐림
			R	: 비
			RS	: 비/눈
			SN	: 눈
		*/
		$calendar_array = [];  //총 42개를 생각, 달력생성

		//과거일수 날짜
		for($i=$start_week; $i>0; $i--){
			$in_data = "-".$i." days";			
			array_push($calendar_array, array(
											'st_date'		=> date("Ymd",strtotime ($in_data, strtotime($to_year.$to_month."01"))),
											'st_bar_date'	=> date("Y-m-d",strtotime ($in_data, strtotime($to_year.$to_month."01"))),
											'weather_data'	=> array(),
											'icon_code'		=> '',
											'diary_data'	=> array()
											));
		}
		//이번달 일수 날짜 전부
		for($i=0; $i<$to_total_day ; $i++){
			$in_data = "+".$i." days";			
			array_push($calendar_array, array(
											'st_date'		=> date("Ymd",strtotime ($in_data, strtotime($to_year.$to_month."01"))),
											'st_bar_date'	=> date("Y-m-d",strtotime ($in_data, strtotime($to_year.$to_month."01"))),
											'weather_data'	=> array(),
											'icon_code'		=> '',
											'diary_data'	=> array()
											));
		}
		//미래일수 날짜 전부
		for($i=0; $i<$future_day ; $i++){
			$in_data = "+".$i." days";			
			array_push($calendar_array, array(
											'st_date'		=> date("Ymd",strtotime ($in_data, strtotime ("+1 months", strtotime($to_year.$to_month."01")))),
											'st_bar_date'	=> date("Y-m-d",strtotime ($in_data, strtotime ("+1 months", strtotime($to_year.$to_month."01")))),
											'weather_data'	=> array(),
											'icon_code'		=> '',
											'diary_data'	=> array()
											));
		}
//달력 생성 완료--------------------------------------------------------------------------------------------------------------------------------------
		
		$calendar_first_date 	= $calendar_array[0]['st_bar_date'].' 00:00:00'; //20230528 00:00:00
		$calendar_last_date		= $calendar_array[41]['st_bar_date'].' 00:00:00';//20230708 00:00:00
		$calendar_today			= date("Y-m-d").' 00:00:00';
		$calendar_yesterday		= date("Y-m-d",strtotime ("-1 days")).' 00:00:00'; 
		$calendar_now_time		= date("h").'00'; //현재시간

		$select_shortTerm_date = date('Y-m-d H').':00:00';

		if($select_shortTerm_date < date('Y-m-d').'06:00:00'){ //당일 06시 12시에 발표함 
			//발표전 시각이라 어제데이터를 불러옴
			$select_shortTerm_date = date("Y-m-d",strtotime ("-1 days")).' 00:00:00';
		}

	//지난달 과거일 + 이번달 과거일 (단기예보)
		//단기 과거 SKY(아이콘 출력)
		$lastday_sky_arr = $this->main_model->select_last_month_sky(
																	$calendar_first_date,
		 															$calendar_today,
																	$calendar_now_time
																	);
		//단기 과거 PTY(아이콘 출력)
		$lastday_pty_arr = $this->main_model->select_last_month_pty(
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
																$select_shortTerm_date,
																$calendar_now_time
																);		
		//단기예보 PTY (당일 포함 향후2일)	
		$today_pty_arr = $this->main_model->select_term_today_pty(
																$select_shortTerm_date,
																$calendar_now_time
																);	
		//단기예보 TMN 최저기온 당일 하루 데이터			
		$today_tmn_arr = $this->main_model->select_term_today_tmn(
																$select_shortTerm_date,
																$calendar_yesterday
																);		
		//단기예보 TMN 최저기온 당일제외 향후2일			
		$two_days_tmn_arr = $this->main_model->select_term_two_days_tmn(
																		$select_shortTerm_date
																		);	
		//단기예보 TMX 최고기온	(당일 포함 향후2일)		
		$today_tmx_arr = $this->main_model->select_term_today_tmx(
																$select_shortTerm_date
																);		
	//------------------------------------------------------------------------------------------------------------------------------------------------	

	$select_midTerm_date = strtotime(date('Y-m-d H').':00:00');
    $pt_already			 = strtotime(date('Y-m-d').' 06:00:00');																

	if($select_midTerm_date < $pt_already){ //당일 06시 12시에 발표함 
		//발표전 시각이라 어제데이터를 불러옴
		$select_midTerm_date = date("Y-m-d",strtotime ("-1 days")).' 00:00:00';
	}else{
		$select_midTerm_date = date("Y-m-d").' 00:00:00';
	}

	//중기예보
	//중기육상예보 (당일로부터 3일 후 ~ 10일치의 하늘상태)	
	$midAthletics_arr = $this->main_model->select_midAthletics(
															$select_midTerm_date
															);		
	//중기예보 (당일로부터 3일 후 ~ 10일치의 최저,최고기온)	
	$midTerm_arr = $this->main_model->select_midTerm(
													$select_midTerm_date
													);	

	//일정	
	$diary_arr = $this->main_model->select_month_diary(
													$calendar_first_date,
													$calendar_last_date	
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


		//단기 과거 PTY 데이터 가공
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($lastday_pty_arr);$y++){
				if($calendar_array[$x]['st_date'] == $lastday_pty_arr[$y]['stTime']){ //캘린더의 날짜 == DB데이터의 날짜가 겹칠때
					array_push($calendar_array[$x]['weather_data'], array(
																		'category' 	=> $lastday_pty_arr[$y]['category'],
																		'fcstValue' => $lastday_pty_arr[$y]['fcstValue']
																	));

					//icon_code를 넣어줌																	
					if($lastday_pty_arr[$y]['fcstValue'] !== '-' && $lastday_pty_arr[$y]['fcstValue'] !== 'null' && $lastday_pty_arr[$y]['fcstValue'] !== '0'){
						//pty의 코드를 사용
						if($lastday_pty_arr[$y]['fcstValue'] == '1'){//비 = R
							$calendar_array[$x]['icon_code'] = 'R';
						}else if($lastday_pty_arr[$y]['fcstValue'] == '2'){//비눈 = RS
							$calendar_array[$x]['icon_code'] = 'RS';
						}else if($lastday_pty_arr[$y]['fcstValue'] == '3'){//눈 = SN
							$calendar_array[$x]['icon_code'] = 'SN';
						}
					}else{
						//sky의 코드를 사용
						for($y=0;$y < sizeof($calendar_array[$x]['weather_data']);$y++){
							if($calendar_array[$x]['weather_data'][$y]['category'] == 'SKY'){
								if($calendar_array[$x]['weather_data'][$y]['fcstValue'] == '1'){//맑음 = S
									$calendar_array[$x]['icon_code'] = 'S';
								}else if($calendar_array[$x]['weather_data'][$y]['fcstValue'] == '3'){//구름많음 = CM
									$calendar_array[$x]['icon_code'] = 'CM';
								}else if($calendar_array[$x]['weather_data'][$y]['fcstValue'] == '4'){//흐림 = C
									$calendar_array[$x]['icon_code'] = 'C';
								}
							}
						}
					}
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

		//단기예보 PTY 데이터 가공 (당일)
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($today_pty_arr);$y++){
				if($calendar_array[$x]['st_date'] == $today_pty_arr[$y]['stTime']){ //캘린더의 날짜 == DB데이터의 날짜가 겹칠때
					array_push($calendar_array[$x]['weather_data'], array(
																		'category' 	=> $today_pty_arr[$y]['category'],
																		'fcstValue' => $today_pty_arr[$y]['fcstValue']
																	));

					//icon_code를 넣어줌																	
					if($today_pty_arr[$y]['fcstValue'] !== '-' && $today_pty_arr[$y]['fcstValue'] !== 'null' && $today_pty_arr[$y]['fcstValue'] !== '0'){
						//pty의 코드를 사용
						if($today_pty_arr[$y]['fcstValue'] == '1'){//비 = R
							$calendar_array[$x]['icon_code'] = 'R';
						}else if($today_pty_arr[$y]['fcstValue'] == '2'){//비눈 = RS
							$calendar_array[$x]['icon_code'] = 'RS';
						}else if($today_pty_arr[$y]['fcstValue'] == '3'){//눈 = SN
							$calendar_array[$x]['icon_code'] = 'SN';
						}
					}else{
						//sky의 코드를 사용
						for($y=0;$y < sizeof($calendar_array[$x]['weather_data']);$y++){
							if($calendar_array[$x]['weather_data'][$y]['category'] == 'SKY'){
								if($calendar_array[$x]['weather_data'][$y]['fcstValue'] == '1'){//맑음 = S
									$calendar_array[$x]['icon_code'] = 'S';
								}else if($calendar_array[$x]['weather_data'][$y]['fcstValue'] == '3'){//구름많음 = CM
									$calendar_array[$x]['icon_code'] = 'CM';
								}else if($calendar_array[$x]['weather_data'][$y]['fcstValue'] == '4'){//흐림 = C
									$calendar_array[$x]['icon_code'] = 'C';
								}
							}
						}
					}
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
			/* icon_code = '';
			S	: 맑음
			CM	: 구름많음
			C	: 흐림
			R	: 비
			RS	: 비/눈
			SN	: 눈
			- 맑음
			- 구름많음, 구름많고 비, 구름많고 눈, 구름많고 비/눈, 구름많고 소나기
			- 흐림, 흐리고 비, 흐리고 눈, 흐리고 비/눈, 흐리고 소나기
		*/
		//이번달 3일뒤부터 10일 (중기육상예보)
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($midAthletics_arr);$y++){
				if($calendar_array[$x]['st_date'] == $midAthletics_arr[$y]['stTime']){
					array_push($calendar_array[$x]['weather_data'], array(
																		'fcstValue' => $midAthletics_arr[$y]['weatherType']
																	));
					
					$add_zero = ' '.$midAthletics_arr[$y]['weatherType'];
					//strpos();=>> 위치를 정수로 반환하며, 0부터 시작한다. 
					//만약 needle를 발견하지 못하면, strpos() 함수는 False를 반환한다.
					//False == 0 은 같다 인식하므로 위치값이 정수 0 일때 공백이나 문자를 넣어서 0이 안나오게 막으면 처리가능 ******

					//icon_code를 넣어줌
					if(strpos($add_zero,'맑음')){
						$calendar_array[$x]['icon_code'] = 'S';

					}else if(strpos($add_zero,'구름많음')){
						$calendar_array[$x]['icon_code'] = 'CM';

					}else if(strpos($add_zero,'비') && !strpos($add_zero,'눈')){
						$calendar_array[$x]['icon_code'] = 'R';
						
					}else if(strpos($add_zero,'눈' && !strpos($add_zero,'비'))){
						$calendar_array[$x]['icon_code'] = 'SN';
						
					}else if(strpos($add_zero,'비' && strpos($add_zero,'눈'))){
						$calendar_array[$x]['icon_code'] = 'RS';
						
					}else if(strpos($add_zero,'소나기')){
						$calendar_array[$x]['icon_code'] = 'R';

					}else if(strpos($add_zero,'흐림')){
						$calendar_array[$x]['icon_code'] = 'C';
					}
				}
			}
		}	

		//이번달 3일뒤부터 10일 (중기기온예보)      
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($midTerm_arr);$y++){
				
				if($calendar_array[$x]['st_date'] == $midTerm_arr[$y]['stTime']){		
					array_push($calendar_array[$x]['weather_data'], array(
																		'category'	=> 'TMN',
																		'fcstValue' => $midTerm_arr[$y]['taMin']
																	));
																	
					array_push($calendar_array[$x]['weather_data'], array(
																		'category'	=> 'TMX',
																		'fcstValue' => $midTerm_arr[$y]['taMax']
																	));
				}
			}
		}
		
		//일정 데이터 가공   difficultyLevel = 난이도 1=>easy , 2=>nomal , 3=>hard 로 나눠 표시 
		for($x=0;$x < sizeof($calendar_array);$x++){ 			
			for($y=0;$y < sizeof($diary_arr);$y++){
				if($calendar_array[$x]['st_date'] == $diary_arr[$y]['stTime']){
					array_push($calendar_array[$x]['diary_data'], array(
																		'difficultyLevel' => $diary_arr[$y]['difficultyLevel']
																	));
				}
			}
		}	

		// var_dump($calendar_array);
		// exit;

		//데이터 result
		echo json_encode(array(
			'result'		=> sizeof($calendar_array),
			'toYear'  		=> $to_year,
			'toMonth'	  	=> $to_month,
			'calendarArray' => $calendar_array
		));
	}//calendar_ajax

		
}

