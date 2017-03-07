<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 28-Feb-17
 * Time: 7:32 PM
 */
?>
<div class="w3-container w3-light-gray">
    <h3>Nutrients</h3>
</div>
<p class="w3-small w3-text-grey w3-container">Nutrient entry formats are as accessible from <a href="http://ndb.nal.usda.gov/" target="_blank">USDA Food Composition Databases</a>
    The system will automatically add new nutrients upon upload or entry.
</p>
<?php if (@$error) { ?>
    <div class="alert alert-warning"><?= $error; ?></div> <?php } ?>
<?php if (@$msg) { ?>
    <div class="alert alert-success"><?= $msg; ?></div> <?php } ?>
<div class="w3-bar w3-light-gray w3-tab">
    <a class="w3-bar-item w3-button" href="#nutrients-list">Nutrients List</a>
    <a class="w3-bar-item w3-button" href="#nutrient-upload">Upload</a>
    <a class="w3-bar-item w3-button" href="#nutrient-manual">Manual(Single) Entry</a>
</div>
<div class="w3-container w3-animate-left" id="nutrient-manual">
    <?php $this->load->view('admin/nutrition-manual'); ?>
</div>
<div class="w3-container w3-animate-left" id="nutrient-upload">
    <?php $this->load->view('admin/nutrition-upload'); ?>
</div>
<div class="w3-container w3-animate-left" id="nutrients-list">
    <?php $this->load->view('admin/tabular-nutrients'); ?>
</div>
