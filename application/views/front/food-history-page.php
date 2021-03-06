<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 01-Mar-17
 * Time: 4:26 AM
 */ ?>
<?php if (@$child) { ?>
    <div class="w3-container w3-teal">
        <h3><?= $child->child_name; ?></h3>
    </div>
    <div class="w3-container">
        <div class="w3-row horizontal-flex-start stretch">
            <div class="w3-col s12 m4 l3">
                <div class="w3-card-4"><img class="w3-image w3-hover-grayscale" src="<?= base_url('img/uploads/' . $child->image); ?>"></div>
            </div>
            <div class="w3-col s12 m8 l9">
                <div class="w3-padding-medium w3-large">
                    <b>Born</b> <?= date('F j, Y', strtotime($child->date_of_birth)); ?><br/>
                    <b><?= number_format(@$weightNow->weight, 0); ?>Kg</b>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <div class="w3-container w3-grey">
        <h3>Food Selections</h3>
    </div>
    <div class="w3-container">
        <ul class="w3-ul">
            <?php foreach (range(4, 12) as $rec) { ?>
                <li class="w3-padding-8">
                    <div class="w3-row">
                        <div class="w3-col s12 m3">
                            <div class="w3-display-container image-container">
                                <img class="w3-image w3-hover-grayscale" src="<?= base_url('img/food-dummy.jpg'); ?>">
                            </div>
                        </div>
                        <div class="w3-col s12 m9">
                            <div class="w3-light-grey w3-container ">
                                <div class="horizontal-space-between">
                                    <h4 class=""><?= date('F j, Y', strtotime('-' . $rec . 'days')); ?></h4>
                                    <a>Full view</a></div>
                            </div>
                            <div class="w3-container">
                                <table class="w3-table w3-striped w3-small">
                                    <tbody>
                                    <?php foreach (range(2, 6) as $tr) { ?>
                                        <tr>
                                            <th>Broccoli Carrot</th>
                                            <td>23 Nutrients</td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>
    </div>
<?php } else {
    echo '<div class="alert alert-warning text-center"><h3>No Child entered yet. Click on <b>Child Details</b> and <em>ADD NEW CHILD!</em></h3></div>';
} ?>