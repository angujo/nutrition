<?php

/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 15-Feb-17
 * Time: 2:45 AM
 */
class Admin extends MY_Controller
{
    private $modelAdmin;
    
    public function __construct()
    {
        parent::__construct();
        if (!User::$C_USER) redirect(base_url('welcome'));
        $this->load->model('adminmodel');
        $this->modelAdmin = new Adminmodel();
    }
    
    function index()
    {
        $this->view('admin/welcome');
    }
    
    function nutrients($food_id = NULL)
    {
        if ($this->POST) {
            $food_id = $this->saveFoodNutrient();
        }
        if ($food_id) {
            $this->data['food']      = $this->modelAdmin->getFood($food_id);
            $this->data['nutrients'] = $this->modelAdmin->getFoodNutrients($food_id);
        }
        $this->data['foods'] = $this->modelAdmin->getFoodsList(99999);
        $this->view('admin/nutrition-entry');
    }
    
    private function saveFoodNutrient($foodOnly = FALSE)
    {
        $food                     = [
            'food_name'      => $this->POST['food_name'],
            'serving_amount' => (float)$this->POST['serving_amount'],
            'serving_unit'   => $this->POST['serving_unit'],
            'description'    => $this->POST['description'],
            'updated'        => date('Y-m-d H:i:s'),
        ];
        $this->data['manualFood'] = FALSE;
        $foodID                   = @$this->POST['id'];
        $foodSet                  = FALSE;
        if ($foodID) {
            $foodSet = (bool)$this->modelAdmin->updateFood($foodID, $food);
        } else {
            $foodSet = (bool)$foodID = $this->modelAdmin->saveFood($food);
        }
        if ($foodSet) $this->data['msg'] = 'Food details successfully saved!';
        else $this->data['error'] = 'An Error encountered trying to save the food details!!';
        if ($foodSet && $foodID && !$foodOnly && (isset($this->POST['nutrient_name']) && is_array($this->POST['nutrient_name']))) {
            $this->data['manualFood'] = TRUE;
            $this->saveNutrient($foodID);
        } else {
            $this->uploadNutrientFile($foodID);
        }
        return $foodID;
    }
    
    private function uploadNutrientFile($foodID)
    {
        $config['upload_path']      = FCPATH . 'tmp' . DIRECTORY_SEPARATOR;
        $config['allowed_types']    = 'csv';
        $config['max_size']         = 1000;
        $config['file_name']        = uniqid('fnu-');
        $config['file_ext_tolower'] = TRUE;
        $config['overwrite']        = TRUE;
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('nutrients_file')) {
            $this->data['error'] = $this->upload->display_errors();
        } else {
            $d       = $this->upload->data();
            $content = [];
            if (($handle = fopen($d['full_path'], "r")) !== FALSE) {
                $gotIt       = FALSE;
                $valueColumn = NULL;
                $unitColumn  = NULL;
                $r           = 0;
                while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $count = count($row);
                    $rc    = [];
                    for ($c = 0; $c < $count; $c++) {
                        if (FALSE === $gotIt && 0 == $c) {
                            $gotIt = trim(strtolower($row[$c])) == 'nutrient' ? $r : FALSE;
                        }
                        if (FALSE !== $gotIt && $gotIt == $r && NULL === $valueColumn) {
                            $valueColumn = ((FALSE !== strpos($row[$c], 'per 100 g') || FALSE !== strpos($row[$c], 'per 100g')) ? $c : NULL);
                        }
                        if (FALSE !== $gotIt && $gotIt == $r && NULL === $unitColumn) {
                            $unitColumn = (trim(strtolower($row[$c])) == 'unit' ? $c : NULL);
                        }
                        if (FALSE !== $gotIt && NULL !== $valueColumn && $c == $valueColumn) $rc['nutrient_value'] = $row[$c];
                        if (FALSE !== $gotIt && NULL !== $valueColumn && $c == 0) $rc['nutrient_name'] = $row[$c];
                        if (FALSE !== $gotIt && NULL !== $unitColumn && $c == $unitColumn) $rc['nutrient_unit'] = $row[$c];
                    }
                    if ($rc && 2 <= count($rc))
                        $content[] = $rc;
                    $r++;
                }
            }
            $ids = [];
            foreach ($content as $index => $nutrient) {
                if (empty($nutrient['nutrient_name']) || !trim($nutrient['nutrient_name']) || !strlen($nutrient['nutrient_value'])) continue;
                $nutrient['food_id']       = $foodID;
                $nutrient['nutrient_unit'] = @$nutrient['nutrient_unit'] ?: 'g';
                $nutrient['updated']       = date('Y-m-d H:i:s');
                if ($nut = $this->modelAdmin->checkFoodNutrients($foodID, ['nutrient_name' => $nutrient['nutrient_name']])) {
                    $this->modelAdmin->updateFoodNutrient($nut->id, $nutrient);
                    $ids[] = $nut->id;
                } else {
                    $ids[] = $this->modelAdmin->saveFoodNutrient($nutrient);
                }
            }
            $this->modelAdmin->clearFoodNutrients($foodID, $ids);
            //unlink($d['full_path']);
        }
    }
    
    private function saveNutrient($foodID, $returnIDs = FALSE)
    {
        $ids = [];
        foreach ($this->POST['nutrient_name'] as $index => $nutrient_name) {
            if (!trim($nutrient_name) || !strlen($this->POST['nutrient_value'][$index])) continue;
            $nutrient['food_id']        = $foodID;
            $nutrient['nutrient_name']  = $nutrient_name;
            $nutrient['nutrient_value'] = $this->POST['nutrient_value'][$index];
            $nutrient['nutrient_unit']  = $this->POST['nutrient_unit'][$index];
            $nutrient['updated']        = date('Y-m-d H:i:s');
            if ($nut = $this->modelAdmin->checkFoodNutrients($foodID, ['nutrient_name' => $nutrient['nutrient_name']])) {
                $this->modelAdmin->updateFoodNutrient($nut->id, $nutrient);
                $ids[] = $nut->id;
            } else {
                $ids[] = $this->modelAdmin->saveFoodNutrient($nutrient);
            }
        }
        if (!$returnIDs) $this->modelAdmin->clearFoodNutrients($foodID, $ids);
        else return $ids;
    }
    
    function conditions($id = NULL)
    {
        if ($this->POST) {
            $id = $this->saveCondition();
        }
        if ($id) {
            $this->data['item']                = $this->modelAdmin->getCondition($id);
            $this->data['condition_nutrients'] = $this->modelAdmin->getConditionNutrients($id);
        }
        $this->data['nutrients'] = $this->modelAdmin->getNutrients();
        $this->view('admin/conditions-tabs');
    }
    
    private function saveCondition()
    {
        $condition = [
            'condition_name' => $this->POST['condition_name'],
            'age_logic'      => $this->POST['age_logic'],
            'joining_logic'  => $this->POST['joining_logic'],
            'weight_logic'   => $this->POST['weight_logic'],
            'weight'         => $this->POST['weight'],
            'age'            => $this->POST['age'],
            'description'    => $this->POST['description'],
            'updated'        => date('Y-m-d H:i:s'),];
        $condID    = @$this->POST['id'];
        $effected  = FALSE;
        if ($condID) {
            $effected = $this->modelAdmin->updateChildCondition($condID, $condition);
        } else {
            $effected = $condID = $this->modelAdmin->saveChildCondition($condition);
        }
        if ($effected && $condID && !empty($this->POST['nutrient']) && is_array($this->POST['nutrient'])) {
            foreach ($this->POST['nutrient'] as $nutID => $value) {
                $this->modelAdmin->addConditionNutrient($condID, $nutID, $value);
            }
            $this->data['msg'] = 'Condition successfully saved!';
        } else {
            $this->data['error'] = 'An error encountered! Ensure condition has nutrient value!';
        }
        return $condID;
    }
    
    function children()
    {
        $this->view('admin/tabular-children');
    }
    
    function child()
    {
        $this->view('front/child-page');
    }
    
    
    function users()
    {
        $this->data['users'] = $this->modelAdmin->users();
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
        if (!$this->modelAdmin->user($user)) {
            $d['msg'] = 'The user doesn\'t exist!';
            echo json_encode($d);
            die();
        }
        if (!$this->modelAdmin->updateUser(['is_admin' => (int)$v], $user)) {
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
        if (!$this->modelAdmin->user($user)) {
            $d['msg'] = 'The user doesn\'t exist!';
            echo json_encode($d);
            die();
        }
        if (!$this->modelAdmin->updateUser(['is_enabled' => (int)$v], $user)) {
            $d['msg'] = 'Error changing the user status!';
            echo json_encode($d);
            die();
        }
        $d['code'] = 1;
        echo json_encode($d);
        die();
    }
}