<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 15-Feb-17
 * Time: 5:03 AM
 */ ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            News and Events
            <small>Links to external sources of information.</small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8">
        <div class="collapse news-link-holder <?= $tab == 2 ? 'in' : ''; ?> " id="collapseExamplex">
            <div class="clearfix">
                <a class="btn btn-primary btn-sm pull-right" role="button" data-toggle="collapse" href=".news-link-holder" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-list-ol fa-fw"></i>Links list
                </a>
            </div>
            <hr/>
            <?php $this->load->view('link-form'); ?>
        </div>
        <div class="collapse <?= $tab == 2 ? '' : 'in'; ?> news-link-holder" id="collapseExample">
            <div class="clearfix">
                <a class="btn btn-primary btn-sm pull-right" role="button" data-toggle="collapse" href=".news-link-holder" aria-expanded="false" aria-controls="collapseExamplex">
                    <i class="fa fa-plus-circle fa-fw"></i>Add Link
                </a>
            </div>
            <hr/>
            <?php $this->load->view('link-list'); ?>
        </div>
    </div>
</div>
