<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bath_model extends CI_Model {

    public function bath_model()
    {       
        parent::__construct();
    }

    //단기예보 insert
    function insert_shortTerm($arr_short){
        $this->load->database();
        $this->load->model('common_model'); 

        $insert_data_size   = sizeof($arr_short); //가공된 데이터 사이즈 74개 예상됨            
        $insert_flag        = 0;    //0인 경우 insert 실패 / 1이상인 경우 성공!!

        //for문 model에서 돌리는 이유 = 74개의 데이터를 넣는동안 생길 문제에 대비하기위해 (트렌젝션)  
        for($i = 0; $i < $insert_data_size; $i++){
            
            //$arr_short[$i];
            $id = 0;
            $table_nm       = 'shortTerm';
            $number_result  = $this->common_model->numbering($table_nm);  
            
            $data = array(
                'id'            => $number_result + 1,
                'fcstDate'      => $arr_short[$i]['fcstDate'],
                'fcstTime'      => $arr_short[$i]['fcstTime'],
                'fcstValue'     => $arr_short[$i]['fcstValue'],
                'category'      => $arr_short[$i]['category'],
                'accurateDay'   => $arr_short[$i]['accurateDay'],
                'realTime'      => date("Y-m-d", strtotime($arr_short[$i]['fcstDate']))
            );

            // insert 쿼리 for문 만큼 넣어줌 74번인가?
            $insert_flag = $this->db->insert('shortTerm', $data);
        }
        
        
        return $insert_flag;
    }
}