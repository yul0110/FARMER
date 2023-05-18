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

            // insert 쿼리 for문 만큼 넣어줌
            $insert_flag = $this->db->insert('shortTerm', $data);
        }
        
        
        return $insert_flag;
    }

    //중기육상예보  insert
    function insert_mid_athletics($arr_mid){
        $this->load->database();
        $this->load->model('common_model'); 

        $insert_data_size   = sizeof($arr_mid); //가공된 데이터 사이즈 8개 예상       
        $insert_flag        = 0;    //0인 경우 insert 실패 / 1이상인 경우 성공!!

        for($i = 0; $i < $insert_data_size; $i++){
    
            //$arr_mid[$i];
            $id = 0;
            $table_nm       = 'midAthletics';
            $number_result  = $this->common_model->numbering($table_nm);  

            $data = array(
                'id'            => $number_result + 1,
                'weatherType'   => $arr_mid[$i]['weather'],
                'realTime'      => date("Y-m-d H:i:s", strtotime(date("Ymd"))),
                'inquireDate'   => date("Y-m-d H:i:s", strtotime(date("Ymd") + $arr_mid[$i]['day'])),
                'stTime'        => date("Ymd", strtotime(date("Ymd") + $arr_mid[$i]['day']))                 
            );
            var_dump($data);


            // insert 쿼리 
            $insert_flag = $this->db->insert('midAthletics', $data);
        }

        return $insert_flag;
    }

    //중기기온예보  insert
    function insert_mid_term($arr_mid){
        $this->load->database();
        $this->load->model('common_model'); 

        $insert_data_size   = sizeof($arr_mid); //8
        $insert_flag        = 0;    

        // var_dump($insert_data_size);
        // exit;
        for($i = 0; $i < $insert_data_size; $i++){
    
            //$arr_mid[$i];
            $id = 0;
            $table_nm       = 'midTerm';
            $number_result  = $this->common_model->numbering($table_nm);  

            $data = array(
                'id'            => $number_result + 1,
                'taMin'         => $arr_mid[$i]['taMin'],
                'taMax'         => $arr_mid[$i]['taMax'],
                'realTime'      => date("Y-m-d H:i:s", strtotime(date("Ymd"))),
                'inquireDate'   => date("Y-m-d H:i:s", strtotime(date("Ymd") + $arr_mid[$i]['day'])),
                'stTime'        => date("Ymd", strtotime(date("Ymd") + $arr_mid[$i]['day']))                 
            );
            
            // insert 쿼리 
            $insert_flag = $this->db->insert('midTerm', $data);
        }

        return $insert_flag;
    }

}