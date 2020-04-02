<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clinical Data Management</title>
    <meta name="description" content="Clinical Data Management">
    <meta property="og:title" content="Clinical Data Management">
    <meta property="og:site_name" content="Clinical Data Management">
    <meta property="og:description" content="Clinical Data Management">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/'); ?>media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url('assets/'); ?>media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/'); ?>media/favicons/apple-touch-icon-180x180.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/'); ?>css/oneui.min.css"> 
</head>

<body>
	<div id="page-container">
        <main id="main-container">
            <div class="bg-image" style="background-image: url('<?php echo base_url('assets/') ?>media/photos/photo6@2x.jpg');">
                <div class="hero-static bg-white-95">
                    <div class="content">
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-4">
                                <div class="block block-themed block-fx-shadow mb-0">
                                    <div class="block-header">
                                        <h3 class="block-title">Sign In</h3>
                                        <div class="block-options"> <a class="btn-block-option font-size-sm" href="#">Forgot Password?</a>
                                            <!-- <a class="btn-block-option" href="op_auth_signup.html" data-toggle="tooltip" data-placement="left" title="New Account"> <i class="fa fa-user-plus"></i> </a> -->
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <div class="p-sm-3 px-lg-4 py-lg-5">
                                            <h1 class="mb-2">Clinical Data Management</h1>
                                            <p>Welcome, please login.</p>
                                            <?php
                                                if($this->session->flashdata('error'))
                                                {
                                                    echo '<div class="alert alert-danger alert-dismissable" role="alert">
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <p class="mb-0">'.$this->session->flashdata("error").'!</p>
                                                    </div>';
                                                }
                                            ?>
                                            <form  id="login_form" action="#" method="POST">
                                                <div class="py-3">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-alt form-control-lg" id="login-username" name="login-username" placeholder="Username" required=""> </div>
                                                    <div class="form-group">
                                                        <input type="password" class="form-control form-control-alt form-control-lg" id="login-password" name="login-password" placeholder="Password" required=""> </div>
                                                    <div class="form-group">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="login-remember" name="login-remember">
                                                            <label class="custom-control-label font-w400" for="login-remember">Remember Me</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12 col-xl-12">
                                                        <input type="submit" name="btnSignIn" value="Sign In" class="btn btn-block btn-primary">
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content content-full font-size-sm text-muted text-center"> <strong>Clinical Data Management</strong> &copy; <span data-toggle="year-copy"></span> </div>
                </div>
            </div>
        </main>
    </div>

    <script src="<?php echo base_url('assets/'); ?>js/oneui.core.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/oneui.app.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/pages/op_auth_signin.min.js"></script>

    <!-- <script src="<?php echo base_url('assets/') ?>jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            $('#login_form').submit(function(e) {
                e.preventDefault();

                var dataString = $(this).serialize();
                
                $.ajax({
                   url: "<?php echo base_url(); ?>login/ajax_request",
                   type: 'POST',
                   data: $(this).serialize(),
                   success: function(data) {
                        alert("Login Succesfull");  
                   },
                   error: function() {
                      alert('Something is wrong');
                   },
                   
                });
            });
        });
       


    </script> -->
</body>

</html>