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
    
    function newChild($details)
    {
        $this->DB->insert('child_details', $details);
        return $this->DB->insert_id();
    }
    
    function updateChild($details)
    {
        $this->DB->where('user_id', @self::$C_USER->id)->update('child_details', $details);
        return $this->DB->affected_rows();
    }
    
    function newChildWeight($details)
    {
        $this->DB->insert('child_weights', $details);
        return $this->DB->insert_id();
    }
    
    function getUser($id)
    {
        return @$this->DB->where('id', $id)->or_where('username', $id)->or_where('email', $id)->get('user', 1)->row() ?: NULL;
    }
    
    function getUserChild()
    {
        return @$this->DB->where('user_id', @self::$C_USER->id)->get('child_details', 1)->row() ?: NULL;
    }
    
    function getChildLatestWeight()
    {
        return @$this->DB->select('child_weights.*')->where('user_id', @self::$C_USER->id)->where('child_id = child_details.id')->order_by('child_weights.weight_date', 'desc')
            ->get('child_details,child_weights', 1)->row() ?: NULL;
    }
    
    function getChildWeights()
    {
        return @$this->DB->select('child_weights.*')->group_by('child_weights.id')->where('user_id', @self::$C_USER->id)
            ->where('child_id = child_details.id')->order_by('child_weights.weight_date', 'asc')
            ->get('child_details,child_weights')->result() ?: [];
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