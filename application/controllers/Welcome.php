<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    public function index()
    {
        $this->doLog();
        if (User::$C_USER) redirect(base_url('admin'));
        $this->load->view('login', $this->data);
    }
    
    private function doLog()
    {
        if (empty($this->POST)) return;
        $this->data['_usermail'] = @$this->POST['usermail'];
        $this->data['_password'] = @$this->POST['password'];
        if (empty($this->POST['usermail']) || empty($this->POST['password'])) {
            $this->data['error'] = 'Missing username or password!';
            return;
        }
        if (!$user = $this->user->login($this->POST['usermail'], $this->POST['password'])) {
            $this->data['error'] = 'Invalid username or password!';
            return;
        }
        $this->data['message'] = 'Successfully logged-in.Wait to be redirected to next page!';
        if ($this->user->newSession(['slug' => ($slug = md5(uniqid('hash'))), 'user_id' => $user->id, 'started' => date('Y-m-d H:i:s'), 'app' => 1])) {
            set_cookie(HASH_COOKIE_SECURITY, $slug, 5 * 24 * 60 * 60);
        }
    }
    
    function logout()
    {
        if ($this->user->stopSession(get_cookie(HASH_COOKIE_SECURITY))) delete_cookie(HASH_COOKIE_SECURITY);
        redirect(base_url('welcome'));
    }
}
