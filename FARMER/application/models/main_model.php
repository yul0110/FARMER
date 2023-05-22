<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_model extends CI_Model {

    public function main_model()
    {       
        parent::__construct();
    }

    function select_now_month(){
        $this->load->database();

    }

} 