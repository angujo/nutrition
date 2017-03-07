<?php

/**
 * Created by PhpStorm.
 * User: bangujo
 * Date: 07/03/2017
 * Time: 05:34 PM
 */
class Adminmodel extends MY_Model
{
    function getFoods($limitCount = NULL, $start = 0)
    {
        if (!is_numeric($limitCount)) return $this->DB->count_all_results('food');
        $res = $this->DB->get('food', $limitCount, $start);
        return $res->num_rows() > 0 ? $res->result() : NULL;
    }
    
    function checkFoodNutrients($food_id, array $details, $return = FALSE)
    {
        $this->DB->where('food_id', $food_id);
        foreach ($details as $col => $val) {
            $this->DB->where($col, $val);
        }
        if ($return) {
            $res = $this->DB->get('food_nutrition', 1);
            return $res->num_rows() > 0 ? $res->row() : NULL;
        }
        return $this->DB->count_all_results('food_nutrition') > 0;
    }
    
    function getFoodNutrients($food_id)
    {
        $res = $this->DB->where('food_id', $food_id)->get('food_nutrition');
        return $res->num_rows() > 0 ? $res->result() : NULL;
    }
    
    function getFood($id)
    {
        $res = $this->DB->where('id', $id)->get('food', 1);
        return $res->num_rows() > 0 ? $res->row() : NULL;
    }
    
    function getFoodNutrient($id)
    {
        $res = $this->DB->where('id', $id)->get('food_nutrition', 1);
        return $res->num_rows() > 0 ? $res->row() : NULL;
    }
    
    function saveFood($details)
    {
        $this->DB->insert('food', $details);
        return $this->DB->insert_id();
    }
    
    function updateFood($id, $details)
    {
        $this->DB->where('id', (int)$id)->update('food', $details);
        return $this->DB->affected_rows();
    }
    
    function deleteFood($id)
    {
        $this->DB->where('id', (int)$id)->delete('food');
        return $this->DB->affected_rows();
    }
    
    function saveFoodNutrient($details)
    {
        $this->DB->insert('food_nutrition', $details);
        return $this->DB->insert_id();
    }
    
    function updateFoodNutrient($id, $details)
    {
        $this->DB->where('id', (int)$id)->update('food_nutrition', $details);
        return $this->DB->affected_rows();
    }
    
    function deleteFoodNutrient($id)
    {
        $this->DB->where('id', (int)$id)->delete('food_nutrition');
        return $this->DB->affected_rows();
    }
    
    function clearFoodNutrients($foodID, array $ids = [])
    {
        if ($ids) {
            $this->DB->where_not_in('id', $ids);
        }
        $this->DB->where('food_id', $foodID)->delete('food_nutrition');
        return $this->DB->affected_rows();
    }
}