<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 * Authit Authentication Library
 *
 * @package Authentication
 * @category Libraries
 * @author Ron Bailey
 * @version 1.0
 */

class Authit {

	private $CI;
	protected $PasswordHash;
	
	public function __construct()
	{
		$this->CI =& get_instance();

		$this->CI->load->database();
		$this->CI->load->library('session'); 
		//세션클래스는 각 사용자에대한 정보를 직렬화하여 쿠키에 저장, 암호화 가능 보안을 강화하기 위하여 세션데이터를 데이터베이스 테이블에 저장할수도있다.
		$this->CI->load->model('authit_model');
		$this->CI->config->load('authit');

	}
	
	public function logged_in()
	{
		echo '라이브러리';
		return $this->CI->session->userdata('logged_in'); 
		//세션배열에 있는 logged_in(가져오고자하는 데이터의 배열 인덱스) 정보를 가져올수있다. 존재하지 않는경우에는 FALSE 를 리턴
	}


	public function login()
	{
		//리턴값이 없는경우 null이나오고 있으면 array로 출력됨
		$user = $this->CI->authit_model->get_userId($this->CI->input->post('userId'));

		//리턴값이 false가 나온 경우 리턴해준다
		if(is_null($user)){
			return false;
		}
		
		if(password_verify($this->CI->input->post('pw'), $user->pw)){ //password_verify=> password_hash()로 암호화한 비밀번호가 사용자가 입력한 값과 같은지 확인하는 함수
			unset($user->pw);	//세션에 유저의 데이터를 넣기 위해 pw의 중요한 data는 파괴함
			$this->CI->session->set_userdata(
				array( //set_userdata() => 한 번에 한 값씩 ​​userdata를 추가하려는 경우
					'logged_in' => true,
					'user' 		=> $user
				)
			);
			return true;
		}
		return false;
	}

	
	public function logout($redirect = false)
	{
		$this->CI->session->sess_destroy(); //sess_destroy() => 세션 제거 사용자가 호출한 함수중 제일 마지막이어야함
		if($redirect){						//redirect 다른페이지 이동?? refresh??
			$this->CI->load->helper('url');
			redirect($redirect, 'refresh'); 
		}
	}

	public function signup($email, $password)
	{
		$user = $this->CI->authit_model->get_user_by_email($email);
		if($user) return false; //메일을 조회 후 이미 가입이 된 유저일 경우 
		 
		$password = password_hash($password, PASSWORD_DEFAULT);
		$this->CI->authit_model->create_user($email, $password);
		return true;
	}
	
	public function reset_password($user_id, $new_password) //비밀번호 재설정 
	{
		$new_password = password_hash($new_password, PASSWORD_DEFAULT);
		$this->CI->authit_model->update_user($user_id, array('password' => $new_password));
	}
	
}