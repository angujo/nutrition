<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 28-Feb-17
 * Time: 8:36 PM
 */ ?>
<hr/>
<?php if (!@$manualFood && @$food) { ?>
    <div class="clearfix">
        <a class="btn btn-info pull-right btn-sm" href="<?= base_url('admin/nutrients'); ?>"><i class="fa fa-plus fa-fw"></i>Upload New Food Nutrient</a>
    </div>
    <hr/>
<?php } ?>
<form class="w3-container" method="post" action="<?= base_url('admin/nutrients'); ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= (!@$manualFood && @$food) ? $food->id : 0; ?>">
    <p>
        <label>Name of Food</label>
        <input class="w3-input" required name="food_name" value="<?= (!@$manualFood && @$food) ? $food->food_name : ''; ?>">
    </p>
    <p>
        <label>Serving Measurement</label>
    <div class="w3-row">
        <div class="w3-col s12 m6 w3-padding-small"><input class="w3-input" placeholder="Amount" type="number" name="serving_amount" required
                                                           value="<?= (!@$manualFood && @$food) ? $food->serving_amount : ''; ?>"></div>
        <div class="w3-col s12 m6 w3-padding-small"><input class="w3-input" placeholder="Unit" name="serving_unit" required value="<?= (!@$manualFood && @$food) ? $food->serving_unit : ''; ?>"></div>
    </div>
    <p>
        <label>CSV of nutrients</label>
        <input class="w3-input" type="file" accept="text/csv,.csv" required name="nutrients_file">
    </p>
    <p>
        <label>Brief description</label>
        <textarea class="w3-input" name="description"><?= (!@$manualFood && @$food) ? $food->description : ''; ?></textarea>
    </p>
    <div class="horizontal-flex-end">
        <button type="submit" class="w3-button w3-blue">Upload</button>
    </div>
</form>
