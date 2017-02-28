<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 15-Feb-17
 * Time: 5:03 AM
 */ ?>
<div class="row">
    <div class="col-xs-12">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="i-title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="i-title" placeholder="Title">
                </div>
            </div>
            <div class="form-group">
                <label for="i-dated" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-10">
                    <select class="form-control" id="i-dated">
                        <option></option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="i-link" class="col-sm-2 control-label">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control summernote" id="i-link"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="i-source" class="col-sm-2 control-label">Thumbnail</label>
                <div class="col-sm-10">
                    <input type="file" class="" id="i-source" placeholder="Publisher">
                </div>
            </div>
            <div class="form-group">
                <hr/>
                <button type="submit" class="btn btn-sm btn-primary pull-right">Save</button>
            </div>
        </form>
    </div>
</div>
