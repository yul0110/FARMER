<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

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
	public function short_term_forecast()
	{
		$ch = curl_init();
		$url = 'http://apis.data.go.kr/1360000/VilageFcstInfoService_2.0/getVilageFcst'; /*URL*/
		$queryParams = '?' . urlencode('serviceKey') . '=6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
		$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('1000'); /**/
		$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('JSON'); /**/
		$queryParams .= '&' . urlencode('base_date') . '=' . urlencode('20230415'); /**/
		$queryParams .= '&' . urlencode('base_time') . '=' . urlencode('0500'); /**/
		$queryParams .= '&' . urlencode('nx') . '=' . urlencode('128'); /**/
		$queryParams .= '&' . urlencode('ny') . '=' . urlencode('37'); /**/
		
		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$response = curl_exec($ch);
		curl_close($ch);
		
		var_dump($response);
	}

	//중기예보
	public function mid_term_forecast()
	{
		$ch = curl_init();
		$url = 'http://apis.data.go.kr/1360000/MidFcstInfoService/getMidFcst'; /*URL*/
		$queryParams = '?' . urlencode('serviceKey') . '=6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
		$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
		$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('XML'); /**/
		$queryParams .= '&' . urlencode('stnId') . '=' . urlencode('108'); /**/
		$queryParams .= '&' . urlencode('tmFc') . '=' . urlencode('201310170600'); /**/
		
		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$response = curl_exec($ch);
		curl_close($ch);
		
		var_dump($response);
	
	}
	
	//일자별 예보
	public function day()
	{
		$this->load->database();

		$ch = curl_init();
		$url = 'http://apis.data.go.kr/1360000/AsosDalyInfoService/getWthrDataList'; /*URL*/
		$queryParams = '?' . urlencode('serviceKey') . '=6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
		$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
		$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('JSON'); /**/
		$queryParams .= '&' . urlencode('dataCd') . '=' . urlencode('ASOS'); /**/
		$queryParams .= '&' . urlencode('dateCd') . '=' . urlencode('DAY'); /**/
		$queryParams .= '&' . urlencode('startDt') . '=' . urlencode('20230414'); /**/
		$queryParams .= '&' . urlencode('endDt') . '=' . urlencode('20230414'); /**/
		$queryParams .= '&' . urlencode('stnIds') . '=' . urlencode('108'); /**/

		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$response = curl_exec($ch);
		curl_close($ch);

		var_dump($response);
	}

	//시간별 예보
	public function time()
	{

		$this->load->database();

		$ch = curl_init();
		$url = 'http://apis.data.go.kr/1360000/AsosHourlyInfoService/getWthrDataList'; /*URL*/
		$queryParams = '?' . urlencode('serviceKey') . '=6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
		$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
		$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('JSON'); /**/
		$queryParams .= '&' . urlencode('dataCd') . '=' . urlencode('ASOS'); /**/
		$queryParams .= '&' . urlencode('dateCd') . '=' . urlencode('HR'); /**/
		$queryParams .= '&' . urlencode('startDt') . '=' . urlencode('20230414'); /**/
		$queryParams .= '&' . urlencode('startHh') . '=' . urlencode('00'); /**/
		$queryParams .= '&' . urlencode('endDt') . '=' . urlencode('20230414'); /**/
		$queryParams .= '&' . urlencode('endHh') . '=' . urlencode('23'); /**/
		$queryParams .= '&' . urlencode('stnIds') . '=' . urlencode('108'); /**/
		
		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$response = curl_exec($ch);
		curl_close($ch);
		
		var_dump($response);
	}

	//영향예보
	public function impact_forecast()
	{
		$ch = curl_init();
		$url = 'http://apis.data.go.kr/1360000/ImpactInfoService/getHWImpactValue'; /*URL*/
		$queryParams = '?' . urlencode('serviceKey') . '=6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
		$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
		$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('XML'); /**/
		$queryParams .= '&' . urlencode('regId') . '=' . urlencode('L1071600'); /**/
		$queryParams .= '&' . urlencode('tm') . '=' . urlencode('20200115'); /**/
	
		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$response = curl_exec($ch);
		curl_close($ch);
	
		var_dump($response);	

	}

	//생활지수
	public function living_forecast()
	{


	}

	//태풍예보
	public function typhoon_forecast()
	{
		$ch = curl_init();
		$url = 'http://apis.data.go.kr/1360000/TyphoonInfoService/getTyphoonInfo'; /*URL*/
		$queryParams = '?' . urlencode('serviceKey') . '=6c1ibqxDdUm7DmnffdCUeTER%2Fa1%2FV9Rjwxla0UInk3ChEu50QanAdDiap49sJz9QFI90qRrEIvGTVfSaZBIHBw%3D%3D'; /*Service Key*/
		$queryParams .= '&' . urlencode('pageNo') . '=' . urlencode('1'); /**/
		$queryParams .= '&' . urlencode('numOfRows') . '=' . urlencode('10'); /**/
		$queryParams .= '&' . urlencode('dataType') . '=' . urlencode('XML'); /**/
		$queryParams .= '&' . urlencode('fromTmFc') . '=' . urlencode('20120928'); /**/
		$queryParams .= '&' . urlencode('toTmFc') . '=' . urlencode('20120928'); /**/
		
		curl_setopt($ch, CURLOPT_URL, $url . $queryParams);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
		$response = curl_exec($ch);
		curl_close($ch);
		
		var_dump($response);
	}


}

