<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Day_list_model extends CI_Model {

    public function diary_model()
    {       
        parent::__construct();
    }

    //선택 날짜의 일지 리스트를 가져오는 쿼리
    function select_today_list($date){
        $this->load->database();

        $this->db
        ->select('id, title, contents, difficultyLevel, stTime, updateDt, useYn')
        ->from('farmDiary')
        ->where('stTime =', $date);

    $diary_arr = $this->db->get(); 
    return $diary_arr->result_array();
    }

    //일정 상태버튼 클릭시 Y-> N 상태 전환 쿼리
    function update_useyn($id, $useYn){
        $this->load->database();

        if($useYn=='Y'){
            $useYn_reverce = 'N';
        }else{
            $useYn_reverce = 'Y';
        }

        $update_flag = $this->db
                            ->set('useYn', $useYn_reverce) 
                            ->where('id', $id)
                            ->update('farmDiary');

    return $update_flag;
    }


}