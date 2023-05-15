<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_model extends CI_Model {

    public function main_model()
    {       
        parent::__construct();
    }

    function insert_diary($number_result){
        $this->load->database();

        //한국시간으로 디폴트 설정
        date_default_timezone_set("Asia/Seoul");

        $data = array(
            'id'          => $number_result + 1,
            'title'       => $this->input->post('title'),
            'contents'    => $this->input->post('contents'),
            'imgGroupId'  => '123',
            'regDt'       => date('Y-m-d H:i:s'),
            'regId'       => 1,
            'updateDt'    => date('Y-m-d H:i:s'),
            'updateId'    => 1,
            'useYn'       => 'Y'

        );

        // insert 쿼리  //액티브레코드 = JPA
        $update_flag = $this->db->insert('farmDiary', $data);

        return $update_flag;
    }
}