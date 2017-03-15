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

    <title>Mother to Child:Nutrition</title>

    <link href="<?= base_url('css/w3.css'); ?>" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('js/plugins/tags/bootstrap-tagsinput.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('js/plugins/wysiwyg/summernote.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('js/plugins/date/css/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">

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
<?php $segment = $this->uri->segment(2); ?>
<body class="w3-white">
<div class="w3-top">
    <div class="w3-bar w3-light-gray nav">
        <div class="horizontal-space-between">
            <?php $this->load->view('include/logo'); ?>
            <?php if (User::$C_USER) { ?>
                <a class="w3-text-black" title="log out" href="<?= base_url('welcome/logout') ?>"><i class="fa-power-off fa fa-fw fa-2x"></i></a>
            <?php } else { ?>
                <a class="w3-text-black" title="log out" href="<?= base_url('welcome/') ?>">Login</a>
            <?php } ?>
        </div>
    </div>
</div>
<div class="">
    <div class="w3-main">
        <div class="w3-bar w3-border w3-green">
            <a class="w3-bar-item w3-button w3-padding-16 <?= $segment == 'recommendations' || !$segment ? 'w3-grey' : ''; ?>" href="<?= base_url('front/'); ?>">Recommendations</a>
            <a class="w3-bar-item w3-button w3-padding-16 <?= $segment == 'history' ? 'w3-grey' : ''; ?>" href="<?= base_url('front/history'); ?>">Food History</a>
            <a class="w3-bar-item w3-button w3-padding-16 <?= $segment == 'child' ? 'w3-grey' : ''; ?>" href="<?= base_url('front/child'); ?>">Child Details</a>
            <?php if (User::$C_USER->is_admin) { ?>
                <a class="w3-bar-item w3-button w3-padding-16" href="<?= base_url('admin'); ?>">Admin Portal</a>
            <?php } ?>
        </div>
        <?php if (@$error) { ?>
            <div class="alert alert-warning"><?= $error; ?></div> <?php } ?>
        <?php if (@$msg) { ?>
            <div class="alert alert-success"><?= $msg; ?></div> <?php } ?>
        <div class="w3-padding">
            <?php if (@$view) $this->load->view($view); ?>
        </div>
    </div>
</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="<?= base_url('js/jquery.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('js/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('js/plugins/wysiwyg/summernote.js'); ?>"></script>
<script src="<?= base_url('js/plugins/date/js/bootstrap-datepicker.min.js'); ?>" type="application/javascript"></script>
<script src="<?= base_url('js/plugins/validate/jquery.validate.js'); ?>" type="application/javascript"></script>
<!-- Bootstrap Tags -->
<script src="<?= base_url('js/plugins/tags/bootstrap-tagsinput.min.js'); ?>"></script>

<script src="<?= base_url('js/w3css.js'); ?>"></script>
<script src="<?= base_url('js/script.js'); ?>"></script>
</body>

</html>
