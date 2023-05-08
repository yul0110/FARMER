<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Model {

     public function base()
    {
            parent::__construct();
    }
    
    function file_upload_ajax($id)
    {
        echo $id;
    }
}