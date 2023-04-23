<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class diarymodel extends CI_Model {

     public function diarymodel()
    {
            parent::__construct();
    }
    
    function file_upload_ajax($id)
    {
        echo $id;
    }
}