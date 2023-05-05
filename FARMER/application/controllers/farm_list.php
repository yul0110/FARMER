<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class farm_list extends CI_Controller {

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
		$this->load->view('farm_list');

		//로그인이 되어있지 않은경우
		if(!logged_in()){
			redirect('/auth/login');
		}
	}
}

