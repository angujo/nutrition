<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 28-Feb-17
 * Time: 7:32 PM
 */
?>
<div class="w3-container w3-light-gray">
    <h3>Conditions</h3>
</div>
<p class="w3-small w3-text-grey w3-container">Nutrient entry formats are as accessible from <a href="http://ndb.nal.usda.gov/" target="_blank">USDA Food Composition Databases</a>
    The system will automatically add new nutrients upon upload or entry.
</p>
<div class="w3-bar w3-light-gray">
    <a class="w3-bar-item w3-button" href="#">Conditions List</a>
    <a class="w3-bar-item w3-button" href="#">Conditions Entry</a>
</div>
<div class="w3-container" id="cond-entry">
    <?php $this->load->view('admin/nutrition-condition'); ?>
</div>
<div class="w3-container" id="conditions-list">
    <?php $this->load->view('admin/tabular-conditions'); ?>
</div>
