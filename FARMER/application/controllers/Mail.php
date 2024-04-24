<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{

	}

	public function mail_push_ajax()
	{

        //이메일을 아이디로 사용하기 떄문에 인증메일을 보내기전에 이미 존재하는지 체크해야함

        $this->config->load('custom');

        $send_id = $this->config->item('email_id');
        $send_pw = $this->config->item('email_pw');

		$title 		= "FARMER 인증번호 입니다.";

        //난수를 생성하여 4자리 코드를 만들어줌
        $code = mt_rand(1,10000);

		$contents 	= "인증번호 : ".$code;		
		$to_email	= $this->input->post('userId'); //값을 받아와야함

		$this->load->library('email');
        $config['useragent'] = '';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.naver.com';
        $config['smtp_user'] = $send_id;
        $config['smtp_pass'] = $send_pw;
        $config['smtp_port'] = 465;
        $config['smtp_timeout'] = 5;
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['bcc_batch_mode'] = FALSE;
        $config['bcc_batch_size'] = 200;
         
        $this->email->initialize($config);
 
        $this->email->from($send_id,'FARMER');
        $this->email->to($to_email);
 
        $this->email->subject($title);
        $data = "<div>".$contents."</div>";
        $this->email->message($data);

		$email_send = $this->email->send();
        

        //데이터 result
		echo json_encode(array(
			'result'	=> $email_send,
            'code'      => $code
            // 'err'       => $this->email->print_debugger()
		));	
	}

}