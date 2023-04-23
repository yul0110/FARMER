<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

	public function index()
	{
		$this->load->view('menubar');
		$this->load->view('main');
	}

	public function test()
	{
		$result = $this->db->get('member')->result();
//      $result = $this->db->query('select * from member')->result();
		$this->load->view('menubar');
		$this->load->view('main');
	}

	public function day()
	{
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

	public function time()
	{
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

	public function forecast()
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
}

