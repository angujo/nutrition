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
        $this->view('');
    }
    
    function chat()
    {
        $page = $this->model->getPaged(NULL, PAGED_CHAT_MODERATION);
        if ($this->POST) {
            $d['key_code'] = PAGED_CHAT_MODERATION;
            $d['content']  = $this->POST['keywords'];
            if (!$page) {
                $d['created_by'] = User::$C_USER->id;
                $d['created']    = date('Y-m-d H:i:s');
                if (!$this->model->newPage($d)) $this->data['Error encountered inserting the new record!'];
            } else {
                $d['updated']    = date('Y-m-d H:i:s');
                $d['updated_by'] = User::$C_USER->id;
                if (!$this->model->updatePage($d, $page->id)) $this->data['error'] = 'Error updating the data';
            }
            $page                  = $this->model->getPaged(NULL, PAGED_CHAT_MODERATION);
            $this->data['message'] = @$this->data['error'] ? '' : 'Chat Keywords Successfully saved!';
        }
        $this->data['page'] = $page;
        $this->view('chat-moderation');
    }
    
    function abc()
    {
        $page = $this->model->getPaged(NULL, PAGED_ABC);
        if ($this->POST) {
            $d['key_code'] = PAGED_ABC;
            $d['content']  = $this->POST['content'];
            if (!$page) {
                $d['created_by'] = User::$C_USER->id;
                $d['created']    = date('Y-m-d H:i:s');
                if (!$this->model->newPage($d)) $this->data['error'] = 'Error encountered inserting the new record!';
            } else {
                $d['updated']    = date('Y-m-d H:i:s');
                $d['updated_by'] = User::$C_USER->id;
                if (!$this->model->updatePage($d, $page->id)) $this->data['error'] = 'Error updating the data';
            }
            $page                  = $this->model->getPaged(NULL, PAGED_ABC);
            $this->data['message'] = @$this->data['error'] ? '' : 'Successfully saved!';
        }
        $this->data['page'] = $page;
        $this->view('abcs-hiv');
    }
    
    function links($linkId = NULL)
    {
        $link = NULL;
        if ((int)$linkId) {
            $link = $this->model->category($linkId);
        }
        if ($this->POST) {
            $d['name']         = $this->POST['name'];
            $d['publisher']    = $this->POST['publisher'];
            $d['organization'] = $this->POST['organization'];
            $d['dated']        = $this->POST['dated'];
            $d['url']          = $this->POST['url'];
            $d['is_link']      = 1;
            $d['thumbnail']    = $this->POST['thumbnail'];
            if (!$link) {
                $d['created_by'] = User::$C_USER->id;
                $d['created']    = date('Y-m-d H:i:s');
                if (!$linkId = $this->model->newCategory($d)) {
                    $this->data['error'] = 'An error occurred while inserting new record. Check your entries and try again.';
                }
            } else {
                $d['updated']    = date('Y-m-d H:i:s');
                $d['updated_by'] = User::$C_USER->id;
                if (!$this->model->updateCategory($d, $link->id)) $this->data['error'] = 'No changes were made on the record!';
            }
            $this->data['message'] = @$this->data['error'] ? '' : 'Successfully saved!';
            $link                  = $this->model->category($linkId);
        }
        $this->data['tab']   = ('new' == $linkId) || $link ? 2 : 1;
        $this->data['link']  = $link;
        $this->data['links'] = $this->model->links();
        $this->view('news-links');
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