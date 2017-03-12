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
        $this->load->library('chart');
    }
    
    function recommendations() { $this->index(); }
    
    function index() { $this->front('front/recommendations'); }
    
    function history() { $this->front('front/food-history-page'); }
    
    function child() { $this->front('front/child-page'); }
    
    function weight_graph()
    {
        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [date('m/Y', strtotime('+' . $i . 'week')), rand(4, 20)];
        }
        
        $plot = new Chart(800, 600);
        $plot->SetImageBorderType('plain');
        
        $plot->SetPlotType('bars');
        $plot->SetDataType('text-data');
        $plot->SetDataValues($data);

# Let's use a new color for these bars:
        $plot->SetDataColors('#87ceeb');

# Force bottom to Y=0 and set reasonable tick interval:
        $plot->SetPlotAreaWorld(NULL, 0, NULL, NULL);
        $plot->SetYTickIncrement(3);
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