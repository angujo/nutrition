<?php

/**
 * Created by PhpStorm.
 * User: bangujo
 * Date: 08/03/2017
 * Time: 07:27 AM
 */
class Front extends MY_Controller
{
    function index() { $this->front('front/recommendations'); }
}