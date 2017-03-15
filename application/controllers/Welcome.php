<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller
{
    public function index()
    {
        $this->doLog();
        if (User::$C_USER) redirect(base_url('front'));
        $this->load->view('login', $this->data);
    }
    
    function login() { $this->index(); }
    
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
        redirect(base_url());
    }
    
    function started()
    {
        if ($this->POST) {
            $this->startRegister();
        }
        $this->load->view('start');
    }
    
    private function startRegister()
    {
        if (6 > count(array_filter($this->POST, 'trim'))) {
            $this->data['error'] = 'Ensure you have entered values for all fields!';
            return;
        }
        $user  = ['username' => $this->POST['usermail'], 'password' => password_hash($this->POST['password'], PASSWORD_BCRYPT)];
        $child = ['child_name' => $this->POST['child_name'], 'date_of_birth' => $this->POST['date_of_birth'], 'gender' => $this->POST['gender'],];
        if ($this->user->getUser($this->POST['usermail'])) {
            $this->data['error'] = 'Username already taken!';
            return;
        }
        if (!$uId = $this->user->newUser($user)) {
            $this->data['error'] = 'Error encountered saving child details! Login to proceed!';
            return;
        }
        $child['user_id'] = $uId;
        if (!$cId = $this->user->newChild($child)) {
            $this->data['error'] = 'Error encountered saving child details! Login to proceed!';
            return;
        }
        $this->user->newChildWeight(['child_id' => $cId, 'weight_date' => date('Y-m-d'), 'weight' => (float)$this->POST['weight']]);
        $this->doLog();
        if (User::$C_USER) {
            redirect(base_url('front'));
        }
    }
}
