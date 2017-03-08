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
<?php if (@$error) { ?>
    <div class="alert alert-warning"><?= $error; ?></div> <?php } ?>
<?php if (@$msg) { ?>
    <div class="alert alert-success"><?= $msg; ?></div> <?php } ?>
<div class="w3-bar w3-light-gray w3-tab">
    <a class="w3-bar-item w3-button w3-gray" href="#conditions-list">Conditions List</a>
    <a class="w3-bar-item w3-button" href="#cond-entry">Conditions Entry</a>
</div>
<div class="w3-container w3-animate-left" id="cond-entry">
    <?php $this->load->view('admin/nutrition-condition'); ?>
</div>
<div class="w3-container w3-animate-left" id="conditions-list">
    <?php $this->load->view('admin/tabular-conditions'); ?>
</div>
