<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Model {

     public function __construct()
    {
            parent::__construct();
    }
    
    function file_upload_ajax($id)
    {
        echo $id;
    }
}