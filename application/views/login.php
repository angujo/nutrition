<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="HIV Anti-stigma">
    <meta name="author" content="Barrack Angujo">
    <meta name="twitter" content="@angujomondi">

    <title>Mother to CHild:Nutrition</title>

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

<body class="vertical-center w3-light-grey">
<div class="col-xs-12 col-sm-8 col-md-5 w3-white">
    <div class="login-page clearfix">
        <div class="horizontal-center">
            <?php $this->load->view('include/logo'); ?>
        </div>
        <hr/>
        <?php if (@$error) { ?>
            <div class="alert alert-danger"><?= $error; ?></div><?php } ?>
        <?php if (@$message) { ?>
            <div class="alert alert-success"><?= $message; ?></div><?php } ?>
        <div class="w3-card">
            <div class="w3-container w3-green">
                <h2 class="w3-xlarge">Login Page<br/>
                <small class="small w3-text-white">Enter your username and password below to login. </small></h2>
            </div>
            <form class=" w3-container" method="post" action="<?= base_url('welcome/'); ?>">
                <div class="horizontal-center">
                    <input type="text" name="usermail" class="w3-input text-center w3-animate-input col-xs-12 col-sm-10 col-md-6" id="i-title" placeholder="Username" value="<?= @$_usermail; ?>">
                </div>
                <div class="horizontal-center">
                    <input type="password" name="password" class="w3-input text-center w3-animate-input col-xs-12 col-sm-10 col-md-6" id="i-title" placeholder="Password" value="<?= @$_password; ?>">
                </div>
                <div class="text-center">
                    <hr/>
                    <div class="horizontal-space-between">
                        <a class="pull-left" data-toggle="modal" data-target="#password-modal" href="javascript:void();">Forgot Password?</a>
                        <button type="submit" class="w3-button w3-indigo">Login</button>
                    </div>
                    <p>Only <b>Admin</b> users are allowed to use this interface.</p>
                    <hr/>
                </div>
            </form>
        </div>
        <p class="text-center small" title="Developed by angujomondi@gmail.com">&copy; Hope &middot; <?= date('Y'); ?> &middot; Nutrition Tool</p>
    </div>
</div>
<div class="modal fade" id="password-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm" role="document">
        <form class="modal-content w3-container">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Forgotten Password</h5>
            </div>
            <div class="modal-body">
                <input type="email" required class="form-control" id="i-title" placeholder="Email Address">
                <div class="text-muted small">
                    Enter the email address used during registration to be able to login.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
            </div>
        </form>
    </div>
</div>
<?php if (@$message) { ?>
    <script>
        setTimeout("location.href='<?php echo base_url("admin"); ?>'", 3000);
    </script>
<?php } ?>
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