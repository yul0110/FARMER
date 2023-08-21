<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Year_calendar extends CI_Controller {

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

		$this->load->view('menu_bar');
		$this->load->view('year_calendar');
	}

}

