<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 28-Feb-17
 * Time: 7:48 PM
 */ ?>
<div>
    <table class="w3-table w3-striped w3-bordered">
        <thead>
        <tr>
            <th>Condition Name</th>
            <th>Logic</th>
            <th>Nutrients Count</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!@$conditions) {
            echo '<tr><td colspan="4" class="text-muted small text-center">No Conditions So far!</td></tr>';
        } else {
            foreach ($conditions as $condition) { ?>
                <tr>
                    <td><?= $condition->condition_name; ?></td>
                    <td>Age <?= (2 == $condition->age_logic ? '>' : '<'), ' ', $condition->age, ' ', (2 == $condition->joining_logic ? 'And' : 'Or'); ?>
                        Weight <?= (2 == $condition->weight_logic ? '>' : '<'), ' ', $condition->weight; ?>kg
                    </td>
                    <td><?= $condition->nutrients; ?></td>
                    <td>
                        <a><i class="fa fa-eye fa-fw"></i></a>
                        <a href="<?= base_url('admin/conditions/' . $condition->id); ?>"><i class="fa fa-pencil fa-fw"></i></a>
                        <a class="text-danger"><i class="fa fa-trash fa-fw"></i></a>
                    </td>
                </tr>
            <?php }
        } ?>
        </tbody>
    </table>
    <hr/>
    <div class="horizontal-flex-end">
        <div>
            <div class="w3-bar">
                <a href="#" class="w3-button">&laquo;</a>
                <a href="#" class="w3-button w3-green">1</a>
                <a href="#" class="w3-button">2</a>
                <a href="#" class="w3-button">3</a>
                <a href="#" class="w3-button">4</a>
                <a href="#" class="w3-button">&raquo;</a>
            </div>
        </div>
    </div>
</div>
