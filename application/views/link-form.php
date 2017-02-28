<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 15-Feb-17
 * Time: 5:03 AM
 */ ?>
<div class="row">
    <div class="col-xs-12">
        <?php if (@$error) { ?>
            <div class="alert alert-danger"><?= $error; ?></div><?php } ?>
        <?php if (@$message) { ?>
            <div class="alert alert-success"><?= $message; ?></div><?php } ?>
        <form class="form-horizontal" method="post" action="<?= base_url('admin/links/' . (int)@$link->id); ?>">
            <div class="form-group">
                <label for="i-title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" id="i-title" placeholder="Title" name="name" value="<?= @$link->name; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="i-source" class="col-sm-2 control-label">Organization</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" id="i-source" placeholder="Publisher" name="organization" value="<?= @$link->organization; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="i-source" class="col-sm-2 control-label">Publisher/Author name</label>
                <div class="col-sm-10">
                    <input type="text" required class="form-control" id="i-source" placeholder="Publisher" name="publisher" value="<?= @$link->publisher; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="i-dated" class="col-sm-2 control-label">Publish Date</label>
                <div class="col-sm-10">
                    <input type="date" required class="form-control" id="i-dated" placeholder="Publish Date" name="dated" value="<?= @$link->dated; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="i-link" class="col-sm-2 control-label">Page URL</label>
                <div class="col-sm-10">
                    <input type="url" required class="form-control" id="i-link" placeholder="Link to page" name="url" value="<?= @$link->url; ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="i-link" class="col-sm-2 control-label">Thumbnail Image link</label>
                <div class="col-sm-10">
                    <input type="url" required class="form-control" id="i-link" name="thumbnail" value="<?= @$link->thumbnail; ?>" placeholder="Thumb image">
                </div>
            </div>
            <div class="horizontal-space-between">
                <a href="<?= base_url('admin/links/new'); ?>" class="btn btn-sm btn-primary">Add News Link</a>
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
