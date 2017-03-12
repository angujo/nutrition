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

<body class="w3-light-grey">
<div class="w3-white cover-bg" id="get-started">
    <div class="started collapse in">
        <div class="vertical-center window-attached">
            <?php $this->load->view('include/logo'); ?>
            <h1 class="w3-text-white welc">Welcome</h1>
            <div class="w3-text-white col-xs-12 col-sm-12 col-md-6 desc text-center">Monitor your child's nutrients and weight. Get Daily food recommendations to keep your little one healthy and
                happy.
            </div>
            <div class="horizontal-space-between col-xs-12 col-sm-12 col-md-6 btns">
                <a class="w3-button w3-teal" href="<?= base_url('login') ?>">Login</a>
                <a class="w3-button w3-teal" data-toggle="collapse" data-target=".started" aria-expanded="false" aria-controls="started">Get Started</a>
            </div>
        </div>
    </div>
    <div class="window-attached started collapse">
        <div class="window-attached vertical-center">
            <div class="carousel slide col-xs-12 col-sm-12 col-md-6" data-ride="carousel" id="started-slider" data-interval="false" data-pause="null" data-wrap="false" data-keyboard="false">
                <form class="carousel-inner" role="listbox">
                    <div class="item active">
                        <div class="slide-item vertical-center">
                            <h3 class="w3-text-white text-center">What is the name of your child?</h3>
                            <input class="form-control text-center" type="text">
                            <hr/>
                            <div class="horizontal-space-between col-xs-12">
                                <a></a>
                                <a class="w3-button w3-teal" href="#started-slider" role="button" data-slide="next">Next ></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-item vertical-center">
                            <h3 class="w3-text-white text-center">What is your child's Date of Birth?</h3>
                            <input class="form-control text-center" type="date">
                            <hr/>
                            <div class="horizontal-space-between col-xs-12">
                                <a class="w3-button w3-teal" href="#started-slider" role="button" data-slide="prev">< Previous</a>
                                <a class="w3-button w3-teal" href="#started-slider" role="button" data-slide="next">Next ></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-item vertical-center">
                            <h3 class="w3-text-white text-center">What is your child's Gender?</h3>
                            <div class="w3-text-white">
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Female
                                </label>
                            </div>
                            <hr/>
                            <div class="horizontal-space-between col-xs-12">
                                <a class="w3-button w3-teal" href="#started-slider" role="button" data-slide="prev">< Previous</a>
                                <a class="w3-button w3-teal" href="#started-slider" role="button" data-slide="next">Next ></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-item vertical-center">
                            <h3 class="w3-text-white text-center">How much does your child weigh now?</h3>
                            <input class="form-control text-center" step="0.01" min="0" type="number">
                            <hr/>
                            <div class="horizontal-space-between col-xs-12">
                                <a class="w3-button w3-teal" href="#started-slider" role="button" data-slide="prev">< Previous</a>
                                <a class="w3-button w3-teal" href="#started-slider" role="button" data-slide="next">Next ></a>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="slide-item vertical-center">
                            <h3 class="w3-text-white text-center">Enter your new username and password</h3>
                            <div class="horizontal-center col-xs-12">
                                <input type="text" name="usermail" required class="w3-input text-center w3-animate-input col-xs-12 col-sm-10 col-md-6" id="i-title" placeholder="Username" value="">
                            </div><hr/>
                            <div class="horizontal-center col-xs-12">
                                <input type="password" name="password" required class="w3-input text-center w3-animate-input col-xs-12 col-sm-10 col-md-6" id="i-title" placeholder="Password" value="">
                            </div>
                            <hr/>
                            <div class="horizontal-space-between col-xs-12">
                                <a class="w3-button w3-teal" href="#started-slider" role="button" data-slide="prev">< Previous</a>
                                <button class="w3-button w3-teal" href="#started-slider" role="button" type="submit" data-slide="next">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <hr/>
            <div class="text-center w3-text-white">Already Registered? <a href="#" data-toggle="collapse" data-target=".started" aria-expanded="false" aria-controls="started">Login Here!</a></div>
        </div>
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