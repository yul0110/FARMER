<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diary_model extends CI_Model {

    public function diary_model()
    {       
        //생성자를 사용하고자 할때 부모를 수동으로 호출해주어야함 
        parent::__construct();
    }

    function insert_diary($diary_obj){

        //설정 및 세팅
        date_default_timezone_set("Asia/Seoul");
        $this->load->database();

        //모델
        $this->load->model('common_model'); 
 
        //변수
        $img_group_id = 0;


        if($diary_obj['imgPathArr'] != false){
            $imgGroup_tb 		  = 'imgGroup';
            $imgGroup_number 	  = $this->common_model->numbering($imgGroup_tb);
            $img_group_id =  $imgGroup_number + 1;
    
            $data_img_group = array(
    
                'id'        => $img_group_id,
                'regDt'     => date('Y-m-d H:i:s'),
                'regId'     => 999,
                'updateDt'  => date('Y-m-d H:i:s'),
                'updateId'  => 999,
                'useYn'     => 'Y'
            );
            $this->db->insert($imgGroup_tb, $data_img_group);
    
    
            $img_path_arr = $diary_obj['imgPathArr'];
            $diary_obj_item = '';
            
            //이미지가 1개이상 들어옴
            for($i=0; $i>=sizeof($img_path_arr); $i++){
                //이미지 넘버링
                //이미지 등록
                $img_tb 		  = 'img';
                $img_number 	  = $this->common_model->numbering($img_tb);
                $diary_obj_item   = $img_path_arr[$i];
    
                //img insert
                $data_img = array(
        
                    'id'            => $img_number + 1,
                    'imgGroupId'    => $img_group_id,
                    'nm'            => '다이어리 이미지',
                    'path'          => $diary_obj_item,
                    'regDt'         => date('Y-m-d H:i:s'),
                    'regId'         => 999,
                    'updateDt'      => date('Y-m-d H:i:s'),
                    'updateId'      => 999,
                    'useYn'         => 'Y'
                );
                $this->db->insert($img_tb, $data_img);
            }
        }

        //다이어리 넘버링
        //다이어리 등록
        $diary_tb 		  = 'farmDiary';
        $diary_number 	  = $this->common_model->numbering($diary_tb);

        $data_diary = array(
            'id'                => $diary_number + 1,
            'title'             => $diary_obj['title'],
            'contents'          => $diary_obj['contents'],
            'imgGroupId'        => $img_group_id,
            'difficultyLevel'   => $diary_obj['diaryInfo'],
            'inquireDate'       => $diary_obj['diaryDate'],
            'stTime'            => date('Ymd',strtotime($diary_obj['diaryDate'])),
            'regDt'             => date('Y-m-d H:i:s'),
            'regId'             => 1,
            'updateDt'          => date('Y-m-d H:i:s'),
            'updateId'          => 1,
            'useYn'             => 'Y'

        );

        $diary_flag = $this->db->insert($diary_tb, $data_diary);
        return $diary_flag;
    }


}