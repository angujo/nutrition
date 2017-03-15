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
    
    protected function uploadImage($fieldName)
    {
        $config['upload_path']      = FCPATH . 'img' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
        $config['allowed_types']    = 'png|jpg|jpeg|bmp';
        $config['max_size']         = 1000;
        $config['file_name']        = uniqid('child-');
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite']        = TRUE;
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($fieldName)) {
            $this->data['error'] = $this->upload->display_errors();
            return NULL;
        }
        $d = $this->upload->data();
        return $d['file_name'];
    }
}