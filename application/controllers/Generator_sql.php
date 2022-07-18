<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Generator_sql extends CI_Controller
{

    public function index()
    {
        $this->load->view('generator/run');
    }
}
 
 /* End of file Generator_sql.php */
