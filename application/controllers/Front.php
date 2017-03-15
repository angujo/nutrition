<?php

/**
 * Created by PhpStorm.
 * User: bangujo
 * Date: 08/03/2017
 * Time: 07:27 AM
 */
class Front extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!User::$C_USER) redirect(base_url('welcome'));
        $this->load->library('chart');
    }
    
    function recommendations() { $this->index(); }
    
    function index() { $this->front('front/recommendations'); }
    
    function history()
    {
        $this->data['child']     = $this->user->getUserChild();
        $this->data['weightNow'] = $this->user->getChildLatestWeight();
        $this->front('front/food-history-page');
    }
    
    function child()
    {
        $child = $this->user->getUserChild();
        if (@$this->POST['child_name']
        ) {
            if ($child && !$this->user->updateChild(['child_name' => $this->POST['child_name'], 'date_of_birth' => $this->POST['date_of_birth'], 'gender' => $this->POST['gender'],
                                                     'updated'    => date('Y-m-d H:i:s')])
            ) $this->data['error'] = 'Error encountered updating child details!';
            elseif (!$child) {
                $this->user->newChild(['child_name' => $this->POST['child_name'], 'date_of_birth' => $this->POST['date_of_birth'], 'gender' => $this->POST['gender'],
                                       'updated'    => date('Y-m-d H:i:s'), 'user_id' => User::$C_USER->id]);
            }
        }
        $this->data['child'] = $child = $this->user->getUserChild();
        if (@$this->POST['weight'] && !$this->user->newChildWeight(['child_id' => $child->id, 'weight_date' => $this->POST['weight_date'], 'updated' => date('Y-m-d H:i:s'),
                                                                    'weight'   => (float)$this->POST['weight']])
        ) {
            $this->data['error'] = 'Error encountered setting new Weight!';
        }
        if (isset($_FILES['child_image']) && ($file = $this->uploadImage('child_image'))) {
            if ('dummy.png' != $child->image) {
                unlink(FCPATH . 'img' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $child->image);
            }
            $this->user->updateChild(['image' => $file]);
        }
        if ($this->POST && !isset($this->data['error'])) $this->data['msg'] = 'Details successfully saved!';
        $this->data['weightNow'] = $this->user->getChildLatestWeight();
        $this->data['weights']   = $this->user->getChildWeights();
        $this->front('front/child-page');
    }
    
    function weight_graph()
    {
        $data    = [];
        $weights = $this->user->getChildWeights();
        foreach ($weights as $weight) {
            $week             = date('W', strtotime($weight->weight_date));
            $data[(int)$week] = [date('d/m/Y (W)', strtotime($weight->weight_date)), $weight->weight];
        }
        //var_dump($data);die();
        $data = array_values($data);
        
        $plot = new Chart(800, 600);
        $plot->SetImageBorderType('plain');
        
        $plot->SetPlotType('bars');
        $plot->SetDataType('text-data');
        $plot->SetDataValues($data);

# Let's use a new color for these bars:
        $plot->SetDataColors('#87ceeb');

# Force bottom to Y=0 and set reasonable tick interval:
        $plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
        $plot->SetYTickIncrement(5);
# Format the Y tick labels as numerics to get thousands separators:
        $plot->SetYLabelType('data');
        $plot->SetPrecisionY(0);

# Main plot title:
        $plot->SetTitle('Change in Child\'s weight over weeks');
# Y Axis title:
        $plot->SetYTitle('Weight in KG');

# Turn off X tick labels and ticks because they don't apply here:
        $plot->SetXTickLabelPos('none');
        $plot->SetXTickPos('none');
        
        $plot->DrawGraph();
    }
}