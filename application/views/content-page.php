<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Contents and Categories
            <small>Informational content.</small>
        </h1>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#t-pages" aria-controls="t-pages" role="tab" data-toggle="tab">Pages</a></li>
            <li role="presentation"><a href="#t-categories" aria-controls="t-categories" role="tab" data-toggle="tab">Categories</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="t-pages">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8">
                        <div class="collapse news-link-holder" id="collapseExample">
                            <div class="clearfix">
                                <a class="btn btn-primary btn-sm pull-right" role="button" data-toggle="collapse" href=".news-link-holder" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-list-ol fa-fw"></i>Pages list
                                </a>
                            </div>
                            <hr/>
                            <?php $this->load->view('content-form'); ?>
                        </div>
                        <div class="collapse in news-link-holder" id="collapseExample">
                            <div class="clearfix">
                                <a class="btn btn-primary btn-sm pull-right" role="button" data-toggle="collapse" href=".news-link-holder" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-plus-circle fa-fw"></i>Add Page
                                </a>
                            </div>
                            <hr/>
                            <?php $this->load->view('content-list'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="t-categories">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-8">
                        <div>
                            <fieldset class="default">
                                <legend>Category Entry/Edit</legend>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="i-cat-name" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="i-cat-name" placeholder="Category Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-primary pull-right">Save</button>
                                    </div>
                                </form>
                            </fieldset>
                            <hr/>
                            <div>
                                <ul class="list-group">
                                    <?php foreach (range(1, rand(5, 25)) as $c) { ?>
                                        <li class="list-group-item clearfix">
                                            <div class="pull-right"><a><i class="fa fa-pencil fa-fw"></i></a><a class="text-warning"><i class="fa fa-trash fa-fw"></i></a></div>
                                            <div><b>The title here</b></div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>