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
		return $this->CI->session->userdata('logged_in'); 
		//세션배열에 있는 logged_in(가져오고자하는 데이터의 배열 인덱스) 정보를 가져올수있다. 존재하지 않는경우에는 FALSE 를 리턴
	}
	


	public function login($email, $password)
	{
		$user = $this->CI->authit_model->get_user_by_email($email);

		$password 	= password_hash( $this->input->post('pw'), PASSWORD_DEFAULT); //비밀번호 암호화
		 echo $this->input->post('pw'); exit;

		if($user){
			if(password_verify($password, $user->password)){ //password_verify=> password_hash()로 암호화한 비밀번호가 사용자가 입력한 값과 같은지 확인하는 함수
				unset($user->password);						 //unset => 변수 또는 배열 내의 요소를 제거하는 함수
				$this->CI->session->set_userdata(array(
					'logged_in' => true,
					'user' => $user
				));
				$this->CI->authit_model->update_user($user->id, array('last_login' => date('Y-m-d H:i:s')));
				return true;
			}
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

/* End of file: Authit.php */
/* Location: application/libraries/Authit.php */