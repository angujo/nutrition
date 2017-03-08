<?php

/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 15-Feb-17
 * Time: 2:42 AM
 */
class MY_Controller extends CI_Controller
{
    protected $data = [];
    protected $POST = [];
    /** @var User */
    public $user;
    public $model;
    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Africa/Nairobi');
        $this->load->model('basicmodel');
        $this->POST  = $this->input->post(NULL, TRUE);
        $this->user  = $this->theUser;
        $this->model = new Basicmodel();
        $this->user->sessionSet(get_cookie(HASH_COOKIE_SECURITY));
    }
    
    protected function view($view)
    {
        $this->data['view'] = $view;
        $this->load->view('admin-skeleton', $this->data);
    }
    
    protected function front($view)
    {
        $this->data['view'] = $view;
        $this->load->view('user-skeleton', $this->data);
    }
}