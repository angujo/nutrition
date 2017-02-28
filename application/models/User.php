<?php

/**
 * Created by PhpStorm.
 * User: bangujo
 * Date: 17/02/2017
 * Time: 09:50 AM
 */
class User extends MY_Model
{
    static $C_USER;
    
    function newUser($details)
    {
        $this->DB->insert('user', $details);
        return $this->DB->insert_id();
    }
    
    function login($usermail, $password)
    {
        if (!$u = @$this->DB->where('username', $usermail)->or_where('email', $usermail)->get('user', 1)->row()) return NULL;
        return self::$C_USER = password_verify($password, $u->password) ? $u : NULL;
    }
    
    function newSession($details)
    {
        $this->DB->insert('session', $details);
        return $this->DB->insert_id();
    }
    
    function sessionSet($slug)
    {
        if ($ses = $this->DB->where('slug', $slug)->where('ended IS NULL')->get('session', 1)->row()) {
            $this->setUser($ses->user_id);
        }
    }
    
    private function setUser($user_id)
    {
        self::$C_USER = @$this->DB->where('id', $user_id)->get('user', 1)->row();
    }
    
    function stopSession($slug)
    {
        $this->DB->where('slug', $slug)->update('session', ['ended' => date('Y-m-d H:i:s')]);
        return $this->DB->affected_rows();
    }
}