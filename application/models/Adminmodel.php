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
    
    function getFoodsList($limitCount = NULL, $start = 0)
    {
        $this->DB->group_by('f.id')->join('food_nutrition n', 'n.food_id = f.id', 'left')->select('f.*, COUNT(DISTINCT n.id) nutrients', FALSE);
        if (!is_numeric($limitCount)) return $this->DB->count_all_results('food f');
        $res = $this->DB->get('food f', $limitCount, $start);
        return $res->num_rows() > 0 ? $res->result() : NULL;
    }
    
    function getConditions($limitCount = NULL, $start = 0)
    {
        $this->DB->group_by('c.id')->join('condition_nutrients n', 'n.condition_id = c.id AND n.nutrient_value > 0 AND n.nutrient_value IS NOT NULL', 'left')->select('c.*, COUNT(DISTINCT n.id) nutrients', FALSE);
        if (!is_numeric($limitCount)) return $this->DB->count_all_results('child_condition c');
        $res = $this->DB->get('child_condition c', $limitCount, $start);
        return $res->num_rows() > 0 ? $res->result() : NULL;
    }
    
    function checkFoodNutrients($food_id, array $details, $return = FALSE)
    {
        $this->DB->where('food_id', $food_id)->join('nutrients', 'nutrients.id = food_nutrition.nutrient_id');
        foreach ($details as $col => $val) {
            $this->DB->where($col, $val);
        }
        if ($return) {
            $res = $this->DB->select('food_nutrition.*')->get('food_nutrition', 1);
            return $res->num_rows() > 0 ? $res->row() : NULL;
        }
        return $this->DB->count_all_results('food_nutrition') > 0;
    }
    
    function getFoodNutrients($food_id)
    {
        $res = $this->DB->where('food_id', $food_id)->select('food_nutrition.*, nutrients.nutrient_name, nutrient_unit')
            ->where('nutrients.id = food_nutrition.nutrient_id')->get('food_nutrition, nutrients');
        return $res->num_rows() > 0 ? $res->result() : NULL;
    }
    
    function getNutrients()
    {
        $res = $this->DB->get('nutrients');
        return $res->num_rows() > 0 ? $res->result() : NULL;
    }
    
    function getFood($id)
    {
        $res = $this->DB->where('id', $id)->get('food', 1);
        return $res->num_rows() > 0 ? $res->row() : NULL;
    }
    
    function getCondition($id)
    {
        $res = $this->DB->where('id', $id)->get('child_condition', 1);
        return $res->num_rows() > 0 ? $res->row() : NULL;
    }
    
    function getConditionNutrients($condition_id)
    {
        $det = [];
        $res = $this->DB->where('condition_id', $condition_id)->get('condition_nutrients');
        $d   = $res->num_rows() > 0 ? $res->result() : [];
        foreach ($d as $item) {
            $det[$item->nutrient_id] = $item;
        }
        return $det;
    }
    
    function getFoodNutrient($id)
    {
        $res = $this->DB->where('id', $id)->select('food_nutrition.*, nutrients.nutrient_name, nutrient_unit')
            ->where('nutrients.id = food_nutrition.nutrient_id')->get('food_nutrition, nutrients', 1);
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
    
    function saveConditionNutrient($details)
    {
        $this->DB->insert('condition_nutrients', $details);
        return $this->DB->insert_id();
    }
    
    function updateConditionNutrient($id, $details)
    {
        $this->DB->where('id', (int)$id)->update('condition_nutrients', $details);
        return $this->DB->affected_rows();
    }
    
    function deleteConditionNutrient($id)
    {
        $this->DB->where('id', (int)$id)->delete('condition_nutrients');
        return $this->DB->affected_rows();
    }
    
    function saveChildCondition($details)
    {
        $this->DB->insert('child_condition', $details);
        return $this->DB->insert_id();
    }
    
    function updateChildCondition($id, $details)
    {
        $this->DB->where('id', (int)$id)->update('child_condition', $details);
        return $this->DB->affected_rows();
    }
    
    function deleteChildCondition($id)
    {
        $this->DB->where('id', (int)$id)->delete('child_condition');
        return $this->DB->affected_rows();
    }
    
    function saveFoodNutrient($details)
    {
        $details['nutrient_id'] = $this->addNutrient($details['nutrient_name'], $details['nutrient_unit']);
        unset($details['nutrient_name']);
        unset($details['nutrient_unit']);
        $this->DB->insert('food_nutrition', $details);
        return $this->DB->insert_id();
    }
    
    function updateFoodNutrient($id, $details)
    {
        $details['nutrient_id'] = $this->addNutrient($details['nutrient_name'], $details['nutrient_unit']);
        unset($details['nutrient_name']);
        unset($details['nutrient_unit']);
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
    
    function addNutrient($name, $unit)
    {
        $id  = NULL;
        $res = $this->DB->where('nutrient_name', trim($name))->get('nutrients', 1);
        if ($res->num_rows()) {
            $det = $res->row();
            $id  = $det->id;
            $this->DB->where('id', $det->id)->update('nutrients', ['nutrient_name' => trim($name), 'nutrient_unit' => trim($unit)]);
        } else {
            $this->DB->insert('nutrients', ['nutrient_name' => trim($name), 'nutrient_unit' => trim($unit)]);
            $id = $this->DB->insert_id();
        }
        return $id;
    }
    
    function addConditionNutrient($conditionID, $nutrientID, $nutrientValue)
    {
        $id  = NULL;
        $res = $this->DB->where('condition_id', $conditionID)->where('nutrient_id', $nutrientID)->get('condition_nutrients', 1);
        if ($res->num_rows()) {
            $det = $res->row();
            $id  = $det->id;
            $this->DB->where('id', $det->id)->update('condition_nutrients', ['nutrient_id' => (int)$nutrientID, 'nutrient_value' => (float)$nutrientValue]);
        } else {
            $this->DB->insert('condition_nutrients', ['nutrient_id' => (int)$nutrientID, 'nutrient_value' => (float)$nutrientValue, 'condition_id' => (int)$conditionID]);
            $id = $this->DB->insert_id();
        }
        return $id;
    }
}