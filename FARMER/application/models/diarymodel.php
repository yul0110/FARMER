<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class diarymodel extends CI_Model {

    public function diarymodel()
    {       
        //생성자를 사용하고자 할때 부모를 수동으로 호출해주어야함 
        parent::__construct();
    }

    function numbering_diary(){
        
        $this->load->database();

        $this->db->select('id');
        $this->db->from('farmDiary');
        $this->db->order_by("id", "desc");
        $this->db->limit(1,0);
        $query=$this->db->get();

        //결과 값을 배열로($row) 가져오기 때문에 foreach로 값을 꺼내줌
        foreach ($query->result() as $row){
            $numbering = $row->id;
        }

        return $numbering;
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