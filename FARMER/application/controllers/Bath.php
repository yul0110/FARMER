<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bath extends CI_Controller {

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

	//단기예보
	public function short_term_ajax()
	{		
		$this->load->model('bath_model');
		$today = date("Ymd");
		
		//Rest API를 구축하였다면 PHP를 사용하여 curl로 json 문자열을 주고 받을 수 있다
		$ch 			= curl_init();
		$url 			= 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst'; //URL
		$queryParams 	= '?' . urlencode('serviceKey') . '=6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; //Service Key
		$queryParams 	.= '&' . urlencode('pageNo') . '=' . urlencode('1'); //페이지 수
		$queryParams 	.= '&' . urlencode('numOfRows') . '=' . urlencode('1000'); // 페이지 내에 출력할 결과 수 
		$queryParams 	.= '&' . urlencode('dataType') . '=' . urlencode('JSON'); //전송방식
		$queryParams 	.= '&' . urlencode('base_date') . '=' . urlencode($today); //발표일자
		$queryParams 	.= '&' . urlencode('base_time') . '=' . urlencode('0500'); //발표시간
		$queryParams 	.= '&' . urlencode('nx') . '=' . urlencode('37'); // X좌표
		$queryParams 	.= '&' . urlencode('ny') . '=' . urlencode('128'); // Y좌표
		
		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);  //URL 지정하기
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);      //요청 결과를 문자로 반환
		curl_setopt($ch, CURLOPT_HEADER, FALSE);			 //결과값에 HEADER값을 포함 FALSE 
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');		 //전송방식
		$response = curl_exec($ch);  
		//curl_exec()의 결과는 Boolean 값. 
		//출력되는 결과(문자)물을 받기위해서는 CURLOPT_RETURNTRANSFER 옵션을 사용해야 한다.
		curl_close($ch);

		//php배열로 파싱
		$data_value = json_decode($response, true);
		$data_value_response 					= $data_value['response'];
		$data_value_response_body 				= $data_value_response['body'];
		$data_value_response_body_items 		= $data_value_response_body['items'];
		$data_value_response_body_items_item 	= $data_value_response_body_items['item'];

		//리스폰된 데이터를 정리후에 배열의 사이즈를 변수에 담아둠
		$arr_size = sizeof($data_value_response_body_items_item); //809
		
		$arr_short		= array(); //1차원 list - db에 넣을 데이터
		$i_used 		= 0; //필요한 0600 1200인 데이터만 배열에 담기 위한 카운트

		for($i = 0 ; $i < $arr_size; $i++){

			$items_item = $data_value_response_body_items_item[$i]; //반복문 809회 반복중

			//fcstTime이 0600 이거나 1200 애들만 담아줘야하고 809개의 배열이 아닌 있는 만큼만 배열이 생성해야됨
			if($items_item['fcstTime'] === "0600"){
				
				$accurateDay = 'N';

				if($items_item['fcstDate'] == $today){
					$accurateDay = 'Y';
				}
				//1차원 안에 -> 2차원 배열 map 형성
				$arr_short[$i_used] = 
				array(
					'fcstDate'		=> $items_item['fcstDate'],
					'fcstTime'		=> $items_item['fcstTime'],
					'fcstValue'		=> $items_item['fcstValue'],
					'category'		=> $items_item['category'],
					'accurateDay'	=> $accurateDay
				);
				$i_used++;
			}
			
			if($items_item['fcstTime'] === "1200"){

				$accurateDay = 'N';

				if($items_item['fcstDate'] == $today){
					$accurateDay = 'Y';
				}
				//1차원 안에 -> 2차원 배열 map 형성
				$arr_short[$i_used] = array(
					
					'fcstDate'		=> $items_item['fcstDate'],
					'fcstTime'		=> $items_item['fcstTime'],
					'fcstValue'		=> $items_item['fcstValue'],
					'category' 		=> $items_item['category'],
					'accurateDay'	=> $accurateDay
				);
				$i_used++;
			}		
		}//for end
		
		$result_flag = $this->bath_model->insert_shortTerm($arr_short);
		echo json_encode(array(
			'result'	=> $result_flag
		));

	}


	//중기육상예보 	
	public function mid_athletics_ajax()
	{	
		$this->load->model('bath_model');
		$today = date("Ymd");

		$ch = curl_init();
		$url = 'http://apis.data.go.kr/1360000/MidFcstInfoService/getMidLandFcst'; /*URL*/
		$queryParams = '?' . urlencode('serviceKey') . '=6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
		$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
		$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('JSON'); /**/
		$queryParams .= '&' . urlencode('regId') . '=' . urlencode('11D10000'); /**/
		$queryParams .= '&' . urlencode('tmFc') . '=' . urlencode($today.'0600'); /**/
		
		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$response = curl_exec($ch);
		curl_close($ch);

		//php배열로 파싱
		$data_value = json_decode($response, true);
		$data_value_response 					= $data_value['response'];
		$data_value_response_body 				= $data_value_response['body'];
		$data_value_response_body_items 		= $data_value_response_body['items'];
		$data_value_response_body_items_item 	= $data_value_response_body_items['item'];
		
		//리스폰된 데이터를 정리후에 배열의 사이즈를 변수에 담아둠
		$arr_size 	= sizeof($data_value_response_body_items_item[0]);
		$value_it 	= $data_value_response_body_items_item[0];

		$arr_mid = array();

		array_push($arr_mid, array(
			'day' 		=> 3,
			'weather'	=> $value_it['wf3Am']
		));

		array_push($arr_mid, array(
			'day' 		=> 4,
			'weather'	=> $value_it['wf4Am']
		));

		array_push($arr_mid, array(
			'day' 		=> 5,
			'weather'	=> $value_it['wf5Am']
		));

		array_push($arr_mid, array(
			'day' 		=> 6,
			'weather'	=> $value_it['wf6Am']
		));

		array_push($arr_mid, array(
			'day' 		=> 7,
			'weather'	=> $value_it['wf7Am']
		));

		array_push($arr_mid, array(
			'day' 		=> 8,
			'weather'	=> $value_it['wf8']
		));

		array_push($arr_mid, array(
			'day' 		=> 9,
			'weather'	=> $value_it['wf9']
		));

		array_push($arr_mid, array(
			'day' 		=> 10,
			'weather'	=> $value_it['wf10']
		));

		$result_flag = $this->bath_model->insert_mid_athletics($arr_mid);
		echo json_encode(array(
			'result'	=> $result_flag
		));

	}


	//중기기온예보	=>> 최근 24시간 자료만 제공	
	public function mid_term_ajax()
	{
		$this->load->model('bath_model');
		//현재 날짜,시간 가져오는 함수
		$today = date("Ymd");

		$ch = curl_init();
		$url = 'http://apis.data.go.kr/1360000/MidFcstInfoService/getMidTa'; /*URL*/
		$queryParams = '?' . urlencode('serviceKey') . '=6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
		$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
		$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('JSON'); /**/
		$queryParams .= '&' . urlencode('regId') . '=' . urlencode('11D10402'); /**/
		$queryParams .= '&' . urlencode('tmFc') . '=' . urlencode($today.'0600'); /**/
		
		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$response = curl_exec($ch);
		curl_close($ch);

		//php배열로 파싱
		$data_value = json_decode($response, true);
		$data_value_response 					= $data_value['response'];
		$data_value_response_body 				= $data_value_response['body'];
		$data_value_response_body_items 		= $data_value_response_body['items'];
		$data_value_response_body_items_item 	= $data_value_response_body_items['item'];
		
		//리스폰된 데이터를 정리후에 배열의 사이즈를 변수에 담아둠
		$arr_size 	= sizeof($data_value_response_body_items_item[0]);
		$value_it 	= $data_value_response_body_items_item[0];
		
		$arr_mid = array();

		array_push($arr_mid, array(
			'day' 		=> 3,
			'taMin'		=> $value_it['taMin3'],
			'taMax' 	=> $value_it['taMax3']
		));
		
		array_push($arr_mid, array(
			'day' 		=> 4,
			'taMin'		=> $value_it['taMin4'],
			'taMax' 	=> $value_it['taMax4']
		));

		array_push($arr_mid, array(
			'day' 		=> 5,
			'taMin'		=> $value_it['taMin5'],
			'taMax' 	=> $value_it['taMax5']
		));

		array_push($arr_mid, array(
			'day' 		=> 6,
			'taMin'		=> $value_it['taMin6'],
			'taMax' 	=> $value_it['taMax6']
		));

		array_push($arr_mid, array(
			'day' 		=> 7,
			'taMin'		=> $value_it['taMin7'],
			'taMax' 	=> $value_it['taMax7']
		));

		array_push($arr_mid, array(
			'day' 		=> 8,
			'taMin'		=> $value_it['taMin8'],
			'taMax' 	=> $value_it['taMax8']
		));

		array_push($arr_mid, array(
			'day' 		=> 9,
			'taMin'		=> $value_it['taMin9'],
			'taMax' 	=> $value_it['taMax9']
		));

		array_push($arr_mid, array(
			'day' 		=> 10,
			'taMin'		=> $value_it['taMin10'],
			'taMax' 	=> $value_it['taMax10']
		));

		$result_flag = $this->bath_model->insert_mid_term($arr_mid);
		echo json_encode(array(
			'result'	=> $result_flag
		));
	}
}

