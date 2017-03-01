<?php

/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 15-Feb-17
 * Time: 2:45 AM
 */
class Admin extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!User::$C_USER) redirect(base_url('welcome'));
    }
    
    function index()
    {
        $this->view('admin/welcome');
    }
    
    function nutrients()
    {
        $this->view('admin/nutrition-entry');
    }
    
    function conditions()
    {
        $this->view('admin/conditions-tabs');
    }
    
    function children()
    {
        $this->view('admin/tabular-children');
    }
    
    
    function users()
    {
        $this->data['users'] = $this->model->users();
        $this->view('users-list');
    }
    
    function content()
    {
        $this->view('content-page');
    }
    
    function set_admin($user, $v)
    {
        header('Content-Type: application/json;charset:utf8;');
        $d         = [];
        $d['code'] = 0;
        $d['msg']  = 'User admin settings successfully changed!';
        if (!$this->model->user($user)) {
            $d['msg'] = 'The user doesn\'t exist!';
            echo json_encode($d);
            die();
        }
        if (!$this->model->updateUser(['is_admin'=>(int)$v], $user)) {
            $d['msg'] = 'Error changing the user status!';
            echo json_encode($d);
            die();
        }
        $d['code'] = 1;
        echo json_encode($d);
        die();
    }
    function set_enabled($user, $v)
    {
        header('Content-Type: application/json;charset:utf8;');
        $d         = [];
        $d['code'] = 0;
        $d['msg']  = 'User access settings successfully changed!';
        if (!$this->model->user($user)) {
            $d['msg'] = 'The user doesn\'t exist!';
            echo json_encode($d);
            die();
        }
        if (!$this->model->updateUser(['is_enabled'=>(int)$v], $user)) {
            $d['msg'] = 'Error changing the user status!';
            echo json_encode($d);
            die();
        }
        $d['code'] = 1;
        echo json_encode($d);
        die();
    }
}