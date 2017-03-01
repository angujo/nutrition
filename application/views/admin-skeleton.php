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

    <link href="<?= base_url('css/w3.css'); ?>" rel="stylesheet">
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

<body class="w3-white">
<div class="w3-top">
    <div class="w3-bar w3-light-gray nav">
        <div class="horizontal-space-between">
            <?php $this->load->view('include/logo'); ?>
            <a class="w3-text-black" title="log out"><i class="fa-power-off fa fa-fw fa-2x"></i></a>
        </div>
    </div>
</div>
<div class="">
    <nav class="w3-sidenav w3-collapse w3-teal w3-text-white" style="width:200px" id="mySidenav">
        <a href="#" onclick="w3_close()" class="w3-closenav w3-hide-large">Close &times;</a>
        <a href="<?= base_url('admin/'); ?>" class="w3-large w3-hover-grey w3-text-white w3-padding">
            <i class="fa fa-home fa-fw"></i>Home</a>
        <a href="<?= base_url('admin/nutrients'); ?>" class="w3-large w3-hover-grey w3-text-white w3-padding">
            <i class="fa-fw fa fa-tint"></i>Food & Nutrients</a>
        <a href="<?= base_url('admin/conditions'); ?>" class="w3-large w3-hover-grey w3-text-white w3-padding">
            <i class="fa fa-fw fa-smile-o"></i>Child Settings</a>
        <a href="<?= base_url('admin/children'); ?>" class="w3-large w3-hover-grey w3-text-white w3-padding">
            <i class="fa fa-fw fa-users"></i>Children</a>
        <a href="<?= base_url('admin/'); ?>" class="w3-large w3-hover-grey w3-text-white w3-padding">
            <i class="fa fa-fw fa-gear"></i>Settings</a>
    </nav>

    <div class="w3-main w3-padding" style="margin-left:200px">
        <span class="w3-opennav w3-hide-large" onclick="w3_open()">&#9776;</span>
        <div>
            <?php if (@$view) $this->load->view($view); ?>
        </div>
    </div>

    <script>
        function w3_open() {
            document.getElementById("mySidenav").style.display = "block";
        }
        function w3_close() {
            document.getElementById("mySidenav").style.display = "none";
        }
    </script>
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?= base_url('js/jquery.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('js/plugins/wysiwyg/summernote.js'); ?>"></script>
<!-- Bootstrap Tags -->
<script src="<?= base_url('js/plugins/tags/bootstrap-tagsinput.min.js'); ?>"></script>

<script src="<?= base_url('js/w3css.js'); ?>"></script>
<script src="<?= base_url('js/script.js'); ?>"></script>
</body>

</html>
