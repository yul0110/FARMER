<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bath_model extends CI_Model {

    public function bath_model()
    {       
        parent::__construct();
    }

    //단기예보 insert
    function shortTerm(){
        $this->load->database();

        $data = array(
            'fcstDate'      => 'Y',
            'fcstTime'      => 'Y',
            'fcstValue'     => 'Y',
            'category'      => 'Y',
            'accurateDay'   => 'Y'
        );

        // insert 쿼리  //액티브레코드 = JPA
        $insert_flag = $this->db->insert('shortTerm', $data);

        return $insert_flag;
    }
}