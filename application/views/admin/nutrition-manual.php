<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 28-Feb-17
 * Time: 8:36 PM
 */ ?>
<hr/>
<?php if (@$manualFood && @$food) { ?>
    <div class="clearfix">
        <a class="btn btn-info pull-right btn-sm" href="<?= base_url('admin/nutrients'); ?>"><i class="fa fa-plus fa-fw"></i>Add Food</a>
    </div>
    <hr/>
<?php } ?>
<form class="w3-container" method="post" action="<?= base_url('admin/nutrients/'); ?>">
    <input type="hidden" name="id" value="<?= (@$manualFood && @$food) ? $food->id : 0; ?>">
    <p>
        <label>Name of Food</label>
        <input class="w3-input" required name="food_name" value="<?= (@$manualFood && @$food) ? $food->food_name : ''; ?>">
    </p>
    <p>
        <label>Serving Measurement</label>
    <div class="w3-row">
        <div class="w3-col s12 m6 w3-padding-small"><input class="w3-input" placeholder="Amount" type="number" name="serving_amount" required
                                                           value="<?= (@$manualFood && @$food) ? $food->serving_amount : ''; ?>"></div>
        <div class="w3-col s12 m6 w3-padding-small"><input class="w3-input" placeholder="Unit" name="serving_unit" required value="<?= (@$manualFood && @$food) ? $food->serving_unit : ''; ?>"></div>
    </div>
    </p>
    <p>
        <label>Brief description</label>
        <textarea class="w3-input" name="description"><?= (@$manualFood && @$food) ? $food->description : ''; ?></textarea>
    </p>
    <p>
    <ul class="w3-ul w3-card-2">
        <?php
        if (@$nutrients && is_array($nutrients)) {
            foreach ($nutrients as $nut) { ?>
                <li>
                <span onclick="this.parentElement.style.display='none'"
                      class="w3-closebtn w3-margin-right w3-medium">&times;</span>
                    <div class="w3-row">
                        <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" value="<?= $nut->nutrient_name; ?>" name="nutrient_name[]" placeholder="Nutrient Name"></div>
                        <div class="w3-col s12 m4 w3-padding-small">
                            <input class="w3-input" value="<?= $nut->nutrient_value; ?>" name="nutrient_value[]" placeholder="Nutrient Value" type="number">
                        </div>
                        <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" value="<?= $nut->nutrient_unit; ?>" name="nutrient_unit[]" placeholder="Nutrient Unit"></div>
                    </div>
                </li>
            <?php }
        } ?>
        <li id="fn-template">
                <span onclick="this.parentElement.style.display='none'"
                      class="w3-closebtn w3-margin-right w3-medium hidden">&times;</span>
            <div class="w3-row">
                <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" name="nutrient_name[]" placeholder="Nutrient Name"></div>
                <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" name="nutrient_value[]" placeholder="Nutrient Value" type="number"></div>
                <div class="w3-col s12 m4 w3-padding-small"><input class="w3-input" name="nutrient_unit[]" placeholder="Nutrient Unit"></div>
            </div>
        </li>
        <li>
            <div class="horizontal-center">
                <a class="w3-button w3-btn-block" data-template="#fn-template">&plus; Add Nutrient</a>
            </div>
        </li>
    </ul>
    </p>
    <hr/>
    <div class="horizontal-flex-end">
        <button type="submit" class="w3-button w3-blue">Save</button>
    </div>
</form>
