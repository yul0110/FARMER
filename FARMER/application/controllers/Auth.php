<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Example Auth controller using Authit
 *
 * @package Authentication
 * @category Libraries
 * @author Ron Bailey
 * @version 1.0
 */

class Auth extends CI_Controller {

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
		if(!logged_in()) redirect('auth/login');  //세션을 이용해서 로그인을 확인

		// Redirect to your logged in landing page here  여기서 로그인 한 방문페이지로 리다이렉션
		redirect('auth/dash');
	}
	
	/**
	 * Login page
	 */
	public function login()
	{
		if(logged_in()) redirect('auth/dash');
		 
		//검증폼 제작해야함

		
		$this->load->view('auth/login');
	}
	
//----------------------------------------------------------------------------------
	//회원가입 페이지
	public function signup()
	{
		// model('diarymodel')로드시킴
		$this->load->model('common_model'); 
		$this->load->model('Authit_model'); 
		$this->load->view('auth/signup');

		// Redirect to your logged in landing page here
		//if(logged_in()) redirect('auth/dash'); 
	}

	//회원가입 ajax
	public function join_ajax()
	{
		// model('diarymodel')로드시킴
		$this->load->model('common_model'); 
		$this->load->model('Authit_model'); 

		//서버에 데이터가 들어갔는지 확인하는 방법
		// echo $this->input->post('nm');
		// exit;

		//테이블id 넘버링
		$table_nm = 'member';
		$number_result = $this->common_model->numbering($table_nm);  
		$result = $this->Authit_model->insert_member($number_result);  

		//데이터 result
		echo json_encode(array(
			'result'	=> $result
		));
		// Redirect to your logged in landing page here
		//if(logged_in()) redirect('auth/dash'); 
	}
//----------------------------------------------------------------------------------

	/**
	 * Logout page
	 */
	public function logout()
	{
		if(!logged_in()) redirect('auth/login');

		// Redirect to your logged out landing page here
		$this->authit->logout('/');
	}
	
	/**
	 * Example dashboard page
	 */
	public function dash()
	{
		if(!logged_in()) redirect('auth/login');
		
		echo 'Hi, '. user('email') .'. You have successfully  logged in. <a href="'. site_url('auth/logout') .'">Logout</a>';
	}
	
	/**
	 * Forgot password page
	 */
	public function forgot()  
	{
		// Redirect to your logged in landing page here
		if(logged_in()) redirect('auth/dash');

        //검증폼 제작해야함
		
		
		$this->load->view('auth/forgot_password', $data);
	}
	
	/**
	 * Reset password page
	 */
	public function reset()   //비밀번호 재설정
	{
		// Redirect to your logged in landing page here
		if(logged_in()) redirect('auth/dash');
		 
		$this->load->library('form_validation');
		$this->load->helper('form');
		$data['success'] = false;
		 
		$user_id = $this->uri->segment(3);
		if(!$user_id) show_error('Invalid reset code.');
		$hash = $this->uri->segment(4);
		if(!$hash) show_error('Invalid reset code.');
		
		$this->load->model('authit_model');
		$user = $this->authit_model->get_user($user_id);
		if(!$user) show_error('Invalid reset code.');
		$slug = md5($user->id . $user->email . date('Ymd'));
		if($hash != $slug) show_error('Invalid reset code.');
	 
		$this->form_validation->set_rules('password', 'Password', 'required|min_length['. $this->config->item('authit_password_min_length') .']');
		$this->form_validation->set_rules('password_conf', 'Confirm Password', 'required|matches[password]');
		
		if($this->form_validation->run()){
			$this->authit->reset_password($user->id, $this->input->post('password'));
			$data['success'] = true;
		}
		
		$this->load->view('auth/reset_password', $data);
	}
	
}