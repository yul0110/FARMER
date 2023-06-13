<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    public function main_model()
    {       
        parent::__construct();

    }

//---지난달 과거일 - 이번달 과거일 (단기)---------------------------------------------------------------------------------------

    // SKY => 0900시 데이터 사용하기
    //#parameter 
    //$start_date    '2023-04-30 00:00:00'
    //$now_date      '2023-05-15 23:59:59'
    //$now_st_time   '2100'
    //#return array
    
    //단기 과거 SKY 하늘상태   
    function select_last_month_sky($start_date, $now_date, $now_st_time){
        $this->load->database();
        //SKY CODE => 맑음(1) , 구름많음(3) , 흐림(4)
        $now_st_time = '0900';
        
        $this->db
                ->select('stTime, category, fcstValue')
                ->from('shortTerm')
                ->where('category =', 'SKY')
                ->where('accurateDay =', 'Y')
                ->where('fcstTime =', $now_st_time)
                ->where('realTime >=', $start_date)
                ->where('realTime <', $now_date);

        $sky_arr = $this->db->get(); 
        return $sky_arr->result_array();
    }

    //단기 과거 PTY 강수상태   
    function select_last_month_pty($start_date, $now_date, $now_st_time){
        $this->load->database();
        //PTY CODE => 비(1) , 비/눈(3) , 눈(4)
        $now_st_time = '0900';
        
        $this->db
                ->select('stTime, category, fcstValue')
                ->from('shortTerm')
                ->where('category =', 'PTY')
                ->where('accurateDay =', 'Y')
                ->where('fcstTime =', $now_st_time)
                ->where('realTime >=', $start_date)
                ->where('realTime <', $now_date);

        $pty_arr = $this->db->get(); 
        return $pty_arr->result_array();
    }

    //단기 과거 TMN(최저기온) = '0600' 당일예보 없음 
    function select_last_month_tmn($start_date, $now_date){
        $this->load->database();

        $this->db
                ->select('stTime, category, fcstValue')
                ->from('shortTerm')
                ->where('category =', 'TMN')
                ->where('realTime >=', $start_date)
                ->where('realTime <', $now_date)
                ->where('realTime != date_add(inquireDate, interval +2 day)');

        $tmn_arr = $this->db->get(); 
        return $tmn_arr->result_array();
    }

    //단기 과거 TMX(최고기온) = '1500' 당일예보 있음  
    function select_last_month_tmx($start_date, $now_date){  
        $this->load->database();

        $this->db
        ->select('stTime, category, fcstValue')
        ->from('shortTerm')
        ->where('category =', 'TMX')
        ->where('accurateDay =', 'Y')
        ->where('realTime >=', $start_date)
        ->where('realTime <', $now_date);

        $tmx_arr = $this->db->get(); 
        return $tmx_arr->result_array();
    }
//---지난달 과거일 - 이번달 과거일 END----------------------------------------------------------------------------------------------

//---이번달 (당일 포함 향후2일) 

    //단기예보 SKY (당일 포함 향후2일)	
    //SKY CODE => 맑음(1) , 구름많음(3) , 흐림(4)
    function select_term_today_sky($now_date, $now_st_time){
        $this->load->database();
        $now_st_time = '0900';

        $this->db
        ->select('stTime, category, fcstValue')
        ->from('shortTerm')
        ->where('category =', 'SKY')
        ->where('fcstTime =', $now_st_time)
        ->where('inquireDate =', $now_date);

        $sky_arr = $this->db->get(); 
        return $sky_arr->result_array();
    }
    
    //단기예보 PTY (당일 포함 향후2일)	
    //PTY CODE => 비(1) , 비/눈(3) , 눈(4)
    function select_term_today_pty($now_date, $now_st_time){
        $this->load->database();
        $now_st_time = '0900';

        $this->db
        ->select('stTime, category, fcstValue')
        ->from('shortTerm')
        ->where('category =', 'PTY')
        ->where('fcstTime =', $now_st_time)// 예보시간 = 현재시간
        ->where('inquireDate =', $now_date); //조회날짜 = 현재날짜 시분초

        $pty_arr = $this->db->get(); 
        return $pty_arr->result_array();
    } 

    //단기예보 TMN(최저기온) 당일 데이터 = '0600' 당일예보 없음 =>>전날 예보를 당일 사용
    function select_term_today_tmn($now_date, $yesterday){
        $this->load->database();

        $this->db
        ->select('stTime, category, fcstValue')
        ->from('shortTerm')
        ->where('category =', 'TMN')
        ->where('realTime =', $now_date)
        ->where('inquireDate =', $yesterday);

        $today_tmn_arr = $this->db->get();
        return $today_tmn_arr->result_array();
    }

    //단기예보 TMN(최저기온) 당일제외 향후2일 
    function select_term_two_days_tmn($now_date){
        $this->load->database();

        $this->db
        ->select('stTime, category, fcstValue')
        ->from('shortTerm')
        ->where('category =', 'TMN')
        ->where('inquireDate =', $now_date);

        $two_days_tmn_arr = $this->db->get(); 
        return $two_days_tmn_arr->result_array();
    }

    //단기예보 TMX(최고기온) 당일 포함 향후2일 = '1500' 
    function select_term_today_tmx($now_date){
        $this->load->database();

        $this->db
        ->select('stTime, category, fcstValue')
        ->from('shortTerm')
        ->where('category =', 'TMX')
        ->where('inquireDate =', $now_date);

        $today_tmx_arr = $this->db->get();
        return $today_tmx_arr->result_array();
    }

//---단기예보 END-----------------------------------------------------------------------------------------------------------------

    //중기육상예보 (당일로부터 3일 후 ~ 10일치의 하늘상태) 
    function select_midAthletics($now_date){
        $this->load->database();

        $this->db
        ->select('stTime, weatherType')
        ->from('midAthletics')
        ->where('realTime =', $now_date);

        $midAthletics_arr = $this->db->get();
        return $midAthletics_arr->result_array();
    }

    //중기일기예보 (당일로부터 3일 후 ~ 10일치의 최저/최고온도) 
    function select_midTerm($now_date){
        $this->load->database();

        $this->db
        ->select('stTime, taMin, taMax')
        ->from('midTerm')
        ->where('realTime =', $now_date);

        $midTerm_arr = $this->db->get();
        return $midTerm_arr->result_array();
    }


    //일정
    function select_month_diary($start_date, $last_date){
        $this->load->database();

        $this->db
        ->select('id, title, contents, imgGroupId, difficultyLevel, inquireDate, stTime')
        ->from('farmDiary')
        ->where('useYn =', 'Y')
        ->where('inquireDate >=', $start_date)
        ->where('inquireDate <=', $last_date);

        $diary_arr = $this->db->get();
        return $diary_arr->result_array();
    }
} 