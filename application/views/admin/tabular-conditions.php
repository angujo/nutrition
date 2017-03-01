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
        <?php foreach (range(1, rand(10, 25)) as $nutrient) { ?>
            <tr>
                <td>Random Condition <?= $nutrient; ?></td>
                <td>Age <?=(rand(2,5)%2?'>':'<'), ' ',rand(0.4,36),' ', (rand(2,5)%2?'And':'Or'); ?>  Weight <?=(rand(2,5)%2?'>':'<'), ' ',rand(10,50); ?>kg</td>
                <td><?= rand(5, 20); ?></td>
                <td>
                    <a><i class="fa fa-eye fa-fw"></i></a>
                    <a><i class="fa fa-pencil fa-fw"></i></a>
                    <a class="text-danger"><i class="fa fa-trash fa-fw"></i></a>
                </td>
            </tr>
        <?php } ?>
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
