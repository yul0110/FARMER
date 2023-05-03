<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class common_model extends CI_Model {

    public function common_model()
    {       
        //생성자를 사용하고자 할때 부모를 수동으로 호출해주어야함 
        parent::__construct();
    }

    //테이블 'id'넘버링 
    function numbering($table_nm){

        $numbering = 0; //heap,stak->>공부할것--------------------------------------------

        $this->load->database();
        $this->db->select('id');
        $this->db->from($table_nm);
        $this->db->order_by("id", "desc");
        $this->db->limit(1,0);
        $query=$this->db->get();

        //결과 값을 배열로($row) 가져오기 때문에 foreach로 값을 꺼내줌
        foreach ($query->result() as $row){
            $numbering = $row->id;
        }
        return $numbering;
    }

}