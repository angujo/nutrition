<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 28-Feb-17
 * Time: 8:36 PM
 */ ?>
<form class="w3-container" method="post" action="<?= base_url('admin/conditions'); ?>">
    <input type="hidden" name="id" value="<?= @$item->id; ?>">
    <p>
        <label>Name of Condition</label>
        <input class="w3-input" required name="condition_name" value="<?= @$item->condition_name ?>">
    </p>
    <fieldset>
        <legend>Condition</legend>
        <label>Age</label>
        <div class="w3-row">
            <div class="w3-col s12 m3 w3-padding-small">
                <select class="w3-input" name="age_logic">
                    <option value="2">Above</option>
                    <option value="1" <?= 1 == @$item->age_logic ? 'selected' : ''; ?>>Below</option>
                </select>
            </div>
            <div class="w3-col s12 m9 w3-padding-small">
                <input class="w3-input" placeholder="Age" type="number" name="age" value="<?= @$item->age ?>" required>
            </div>
        </div>
        <div class="horizontal-center">
            <div class="s12 m3 w3-padding-12">
                <select class="w3-input" name="joining_logic">
                    <option value="2">AND</option>
                    <option value="1" <?= 1 == @$item->joining_logic ? 'selected' : ''; ?>>OR</option>
                </select>
            </div>
        </div>
        <label>Weight</label>
        <div class="w3-row">
            <div class="w3-col s12 m3 w3-padding-small">
                <select class="w3-input" name="weight_logic">
                    <option value="2">Above</option>
                    <option value="1" <?= 1 == @$item->weight_logic ? 'selected' : ''; ?>>Below</option>
                </select>
            </div>
            <div class="w3-col s12 m9 w3-padding-small">
                <input class="w3-input" placeholder="Weight" type="number" name="weight" value="<?= @$item->weight ?>" required>
            </div>
        </div>
    </fieldset>
    </p>
    <p>
        <label>Brief description</label>
        <textarea class="w3-input" name="description"><?= @$item->description ?></textarea>
    </p>
    <p>
    <ul class="w3-ul w3-card-2">
        <?php if (!@$nutrients) {
            echo '<li>No Nutrients</li>';
        } else {
            foreach ($nutrients as $nut) {
                $v = @$condition_nutrients && is_array($condition_nutrients) && in_array($nut->id, array_keys($condition_nutrients)) ? $condition_nutrients[$nut->id]->nutrient_value : 0;
                ?>
                <li>
                    <div class="w3-row">
                        <div class="w3-col s12 m5 w3-padding-small">
                            <?= $nut->nutrient_name; ?>
                        </div>
                        <div class="w3-col s9 m6 w3-padding-small">
                            <input min="0" class="w3-input" placeholder="Nutrient Value" value="<?= $v ?>" type="number" name="nutrient[<?= $nut->id ?>]">
                        </div>
                        <div class="w3-col s3 m1 w3-padding-small"><?= $nut->nutrient_unit; ?></div>
                    </div>
                </li>
            <?php }
        } ?>
    </ul>
    </p>
    <hr/>
    <div class="horizontal-flex-end">
        <button type="submit" class="w3-button w3-blue">Save</button>
    </div>
</form>
