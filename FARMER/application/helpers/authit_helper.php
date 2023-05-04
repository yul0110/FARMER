<?php
/**
 * Authit Authentication Library
 *
 * @package Authentication
 * @category Libraries
 * @author Ron Bailey
 * @version 1.0
 */

function logged_in()
{
	$CI =& get_instance(); //ci에서 & get_instance() 역할은 ci 내부 객체를 컨트롤러, 모델, 뷰 이외에서 사용할 수 있도록 하기 위함이다.
	$CI->load->library('authit');
	
	return $CI->authit->logged_in();
}

function user($key = '')
{
	$CI =& get_instance();     
	$CI->load->library('session');
	
	$user = $CI->session->userdata('user');
	if($key && isset($user->$key)) return $user->$key;  //isset() => 변수가 설정되었는지 확인하고, 설정되었으면 TRUE, 설정되지 않았으면 FALSE를 반환
	return $user;
}

/* End of file: authit_helper.php */
/* Location: application/helpers/authit_helper.php */