<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 01-Mar-17
 * Time: 4:26 AM
 */ ?>
<div class="w3-container w3-teal">
    <div class="horizontal-space-between">
        <h3>Jane Doe Smith</h3>
        <div>
            <a class="w3-text-white" data-toggle="modal" data-target="#child-det-modal" href="#"><i class="fa fa-pencil fa-fw"></i></a>
            <a class="w3-text-white" data-toggle="modal" data-target="#child-weight-modal" href="#"><i class="fa fa-plus fa-fw"></i></a>
        </div>
    </div>
</div>
<div class="w3-container">
    <div class="w3-row horizontal-flex-start stretch">
        <div class="w3-col s12 m4 l3">
            <div class="w3-card-4"><img class="w3-image w3-hover-grayscale" src="<?= base_url('img/child-101.jpg'); ?>"></div>
        </div>
        <div class="w3-col s12 m8 l9">
            <div class="w3-padding-medium w3-large">
                <b>Born</b> <?= date('F j, Y', strtotime('-' . rand(2, 9) . 'months')); ?><br/>
                <b><?= rand(10, 20); ?>Kg</b>
            </div>
        </div>
    </div>
</div>
<hr/>
<div class="w3-container w3-grey">
    <h3>Age Changes</h3>
</div>
<div class="w3-container">
    <div class="w3-padding-8">
        <img src="<?= base_url('front/weight-graph'); ?>" class="img-responsive img-thumbnail">
    </div>
    <hr/>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="child-det-modal">
    <div class="modal-dialog modal-smx" role="document">
        <form class="modal-content form-horizontal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Child Details</h4>
            </div>
            <div class="modal-body w3-padding-16">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" name="child_name" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Date of Birth</label>
                            <input type="date" name="birth_date" required class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Picture</label>
                            <input type="file" name="child_name" accept="image/*">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="child-weight-modal">
    <div class="modal-dialog modal-smx" role="document">
        <form class="modal-content form-horizontal">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">New Child Weight</h4>
            </div>
            <div class="modal-body w3-padding-16">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input type="date" name="weight_date" required class="form-control" value="<?= date('Y-m-d'); ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Weight</label>
                            <input type="number" min="0" step="0.01" name="weight" required class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
    </div>
</div>