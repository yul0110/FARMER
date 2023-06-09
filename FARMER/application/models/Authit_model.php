<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Authit Authentication Library
 *
 * @package Authentication
 * @category Libraries
 * @author Ron Bailey
 * @version 1.0
 */

class Authit_model extends CI_Model {

	public $users_table;
	
	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->config->load('authit');

        //한국시간으로 디폴트 설정
        date_default_timezone_set("Asia/Seoul");

		//중요한 정보는 분리하여 설정해줌
		$this->users_table = $this->config->item('authit_users_table');
	
	}
	
	// public function get_user($user_id)   
	// {
	// 	$query = $this->db->get_where($this->users_table, array('id' => $user_id));
	// 	if($query->num_rows()) return $query->row();
	// 	return false;
	// }


	public function get_userId($userId) 
	{
		//SELECT * FROM member WHERE user_id = 'user_id' 
		$query = $this->db->get_where($this->users_table, array('userId' => $userId));

		//num_rows() 테이블의 행 개수를 구해준다

		return $query->row();
	}
	
	// public function get_users($order_by = 'id', $order = 'asc', $limit = 0, $offset = 0)
	// {
	// 	$this->db->order_by($order_by, $order); 
	// 	if($limit) $this->db->limit($limit, $offset);
	// 	$query = $this->db->get($this->users_table);
	// 	return $query->result();
	// }

	// public function get_user_count()
	// {
	// 	return $this->db->count_all($this->users_table);
	// }

   	//회원가입 insert
	public function insert_member($number_result)
	{
		$password 	= password_hash( $this->input->post('pw'), PASSWORD_DEFAULT); //비밀번호 암호화
		
		$data = array(
			'id'          => $number_result + 1,
			'nm' 		  => $this->input->post('nm'),
			'nickName' 	  => $this->input->post('nickName'),
			'pw' 		  => $password,
			'pno' 		  => $this->input->post('pno'),
			'userId' 	  => $this->input->post('userId'),  //email
			'branchCode'  => $this->input->post('branchCode'),
			'regDt'       => date('Y-m-d H:i:s'),
            'regId'       => 1,
            'updateDt'    => date('Y-m-d H:i:s'),
            'updateId'    => 1,
            'useYn'       => 'Y'
		);
		//$this->db->insert($this->member, $data);
		//return $this->db->insert_id();
		// insert 쿼리  //액티브레코드 = JPA
		$insert_flag = $this->db->insert('member', $data);

		return $insert_flag;
	}

	// public function create_user($email, $password)
	// {
	// 	$data = array(
	// 		'email' => filter_var($email, FILTER_SANITIZE_EMAIL),
	// 		'password' => $password, // Should be hashed
	// 		'created' => date('Y-m-d H:i:s')			
	// 	);
	// 	$this->db->insert($this->users_table, $data);
	// 	return $this->db->insert_id();
	// }
	

	public function update_user($userId, $data)
	{
		$this->db->where('userId', $userId);
		$this->db->update($this->member, $data); 
	}
	
	public function delete_user($user_id)
	{
		$this->db->delete($this->users_table, array('id' => $user_id));
	}
	
	// private function create_users_table()
	// {
	// 	$this->load->dbforge();
	// 	$this->dbforge->add_field('id');
	// 	$this->dbforge->add_field('email VARCHAR(200) NOT NULL');
	// 	$this->dbforge->add_field('password VARCHAR(200) NOT NULL');
	// 	$this->dbforge->add_field('created DATETIME NOT NULL');
	// 	$this->dbforge->add_field('last_login DATETIME NULL');
	// 	$this->dbforge->create_table($this->users_table);
	// }
	
}

/* End of file: Authit_model.php */
/* Location: application/models/Authit_model.php */