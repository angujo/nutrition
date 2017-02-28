<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 15-Feb-17
 * Time: 4:32 AM
 */ ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ABCs of HIV
            <small>alias <b>Learn More...</b></small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-10 col-lg-8">
        <div>
            <?php if (@$error) { ?>
                <div class="alert alert-danger"><?= $error; ?></div><?php } ?>
            <?php if (@$message) { ?>
                <div class="alert alert-success"><?= $message; ?></div><?php } ?>
            <form method="post" action="<?= base_url('admin/abc'); ?>">
                <textarea class="summernote" name="content"><?= @$page->content; ?></textarea>
                <hr/>
                <div class="clearfix">
                    <button type="submit" class="btn btn-sm btn-primary pull-right">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xs-12 col-md-2 col-lg-4">
        <div class="alert alert-info">
            Enter contents for the ABCs' page on the app. These contents will be pulled and displayed for the user on the given app page.
        </div>
    </div>
</div>
