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
	public function diary_insert_ajax()
	{		

		//모델 생성
		$this->load->model('diary_model');

		//변수
		$diary_date			= $_POST['diaryDate'];//D
		$diary_info			= $_POST['diaryInfo'];	//S
		$diary_tit			= $_POST['title'];		//S
		$diary_cont			= $_POST['contents'];	//S
		$diary_img_path_arr = isset($_POST['imgPathArr']) ? $_POST['imgPathArr'] : false;	//SA

		$diary_obj = []; //다이어리 오브젝트
		$diary_obj["diaryDate"] 	= $diary_date;
		$diary_obj["diaryInfo"] 	= $diary_info;
		$diary_obj["title"] 		= $diary_tit;
		$diary_obj["contents"] 		= $diary_cont;
		$diary_obj["imgPathArr"]	= $diary_img_path_arr;

		$diary_flag	= $this->diary_model->insert_diary($diary_obj);  


		//데이터 result
		echo json_encode(array(
			'result'		=> $diary_flag
		));
	}
}

