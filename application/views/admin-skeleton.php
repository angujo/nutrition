<?php
/**
 * Created by PhpStorm.
 * User: Angujo Barrack
 * Date: 15-Feb-17
 * Time: 2:44 AM
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HIV Anti-stigma">
    <meta name="author" content="Barrack Angujo">
    <meta name="twitter" content="@angujomondi">

    <title>HIV-Antistigma : Admin Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('js/plugins/tags/bootstrap-tagsinput.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('js/plugins/wysiwyg/summernote.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('css/sb-admin.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('css/style.css'); ?>" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="<?= base_url('font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url('admin'); ?>">Admin Portal</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="<?= base_url('welcome/logout'); ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li class="<?= 'admin' == $this->uri->segment(1) && '' == $this->uri->segment(2) ? 'active' : ''; ?>">
                    <a href="<?= base_url(); ?>"><i class="fa fa-fw fa-home"></i> Home</a>
                </li>
                <li class="<?= 'admin' == $this->uri->segment(1) && 'chat' == $this->uri->segment(2) ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/chat'); ?>"><i class="fa fa-fw fa-comments"></i> Chat Moderation</a>
                </li>
                <li class="<?= 'admin' == $this->uri->segment(1) && 'links' == $this->uri->segment(2) ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/links'); ?>"><i class="fa fa-fw fa-link"></i> News Links</a>
                </li>
                <li class="<?= 'admin' == $this->uri->segment(1) && 'content' == $this->uri->segment(2) ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/content'); ?>"><i class="fa fa-fw fa-newspaper-o"></i> HIV Content</a>
                </li>
                <li class="<?= 'admin' == $this->uri->segment(1) && 'abc' == $this->uri->segment(2) ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/abc'); ?>"><i class="fa fa-fw fa-list"></i> ABCs of HIV</a>
                </li>
                <li class="<?= 'admin' == $this->uri->segment(1) && 'users' == $this->uri->segment(2) ? 'active' : ''; ?>">
                    <a href="<?= base_url('admin/users'); ?>"><i class="fa fa-fw fa-users"></i> Users</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">
            
            <?php if (@$view) $this->load->view($view); ?>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?= base_url('js/jquery.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('js/plugins/wysiwyg/summernote.js'); ?>"></script>
<!-- Bootstrap Tags -->
<script src="<?= base_url('js/plugins/tags/bootstrap-tagsinput.min.js'); ?>"></script>

<script src="<?= base_url('js/script.js'); ?>"></script>
</body>

</html>
