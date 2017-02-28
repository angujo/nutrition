<?php

/**
 * Created by PhpStorm.
 * User: bangujo
 * Date: 17/02/2017
 * Time: 12:13 PM
 */
class Basicmodel extends MY_Model
{
    function newPage($details)
    {
        $this->DB->insert('paged', $details);
        return $this->DB->insert_id();
    }
    
    function newCategory($details)
    {
        $this->DB->insert('category_link', $details);
        return $this->DB->insert_id();
    }
    
    function updatePage($details, $id = NULL, $keyCode = NULL)
    {
        if (is_null($id) && is_numeric($keyCode)) return NULL;
        if (is_null($keyCode)) $this->DB->where('id', (int)$id);
        else $this->DB->where('key_code', $keyCode);
        $this->DB->update('paged', $details);
        return $this->DB->affected_rows();
    }
    
    function updateCategory($details, $id)
    {
        $this->DB->where('id', (int)$id)->update('category_link', $details);
        return $this->DB->affected_rows();
    }
    
    function updateUser($details, $id)
    {
        $this->DB->where('id', (int)$id)->update('user', $details);
        return $this->DB->affected_rows();
    }
    
    function getPaged($id = NULL, $keyCode = NULL)
    {
        if (is_null($id) && is_null($keyCode)) return NULL;
        if (is_null($keyCode)) $this->DB->where('id', (int)$id);
        else $this->DB->where('key_code', $keyCode);
        $res = @$this->DB->get('paged', 1)->row();
        return $res;
    }
    
    function category($id)
    {
        $this->DB->where('id', (int)$id);
        $res = @$this->DB->get('category_link', 1)->row();
        return $res;
    }
    
    function links()
    {
        $res = @$this->DB->where('is_link', 1)->get('category_link');
        return $res->num_rows() ? $res->result() : [];
    }
    
    function users()
    {
        $res = @$this->DB->get('user');
        return $res->num_rows() ? $res->result() : [];
    }
    
    function user($id)
    {
        $this->DB->where('id', (int)$id);
        $res = @$this->DB->get('user', 1)->row();
        return $res;
    }
}