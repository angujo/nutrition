<?php

/**
 * Created by PhpStorm.
 * User: bangujo
 * Date: 17/02/2017
 * Time: 09:40 AM
 */
class MY_Model extends CI_Model
{
    protected $DB;
    
    public function __construct()
    {
        parent::__construct();
        $this->DB = $this->load->database('default',TRUE);
    }
}