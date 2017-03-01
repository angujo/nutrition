<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 28-Feb-17
 * Time: 7:48 PM
 */ ?>
<div class="w3-container w3-light-grey">
    <h3>Children</h3>
    <div class="w3-text-grey">List of children whose details have been captured in the system.</div>
</div>
<div class="w3-container">
    <table class="w3-table w3-striped w3-bordered">
        <thead>
        <tr>
            <th>Child Name</th>
            <th>DoB - (Age)<br/>
                <div class="small w3-small w3-text-grey">(In Months)</div>
            </th>
            <th>Status</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach (range(1, rand(10, 25)) as $nutrient) { ?>
            <tr>
                <td>Jane Doe</td>
                <td><?= date('F j, Y',strtotime('-'.($m=rand(4,36)).'months')),' - ('.$m.')'; ?></td>
                <td><?= rand(5, 20) % 2 ? '<div class="w3-tag w3-small w3-green">Good</div>' : '<div class="w3-tag w3-small w3-red">Attention</div>'; ?></td>
                <td>
                    <a><i class="fa fa-eye fa-fw"></i></a>
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
