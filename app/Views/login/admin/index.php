<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=G-XY1VQKQHG4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-XY1VQKQHG4');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&amp;family=Roboto+Mono&amp;display=swap" rel="stylesheet">
    <link href="<?= base_url('public/assets/build/styles/ltr-core.css') ?>" rel="stylesheet">
    <link href="<?= base_url('public/assets/build/styles/ltr-vendor.css') ?>" rel="stylesheet">
    <link href="https://dashboard2.panely-html.blueupcode.com/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
    <title>Login Smart PDAM</title>
</head>

<body class="theme-light preload-active">
    <!-- <div class="preload">
        <div class="preload-dialog">
            <div class="spinner-border text-primary preload-spinner"></div>
        </div>
    </div> -->
    <div class="holder">
        <div class="wrapper">
            <div class="content">
                <div class="container-fluid">
                    <div class="row no-gutters align-items-center justify-content-center h-100">
                        <div class="col-sm-8 col-md-6 col-lg-4 col-xl-3">
                            <div class="portlet">
                                <div class="portlet-body">
                                    <div class="text-center mb-4">
                                        <div class="avatar avatar-label-primary avatar-circle widget12">
                                            <div class="avatar-display"><i class="fa fa-user-alt"></i></div>
                                        </div>
                                    </div>
                                    <!-- alert -->
                                    <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                                        <div class="alert alert-warning">
                                            <?php echo session()->getFlashdata('gagal') ?>
                                        </div>
                                    <?php } ?>
                                    <?php if (!empty(session()->getFlashdata('sukses'))) { ?>
                                        <div class="alert alert-success">
                                            <?php echo session()->getFlashdata('sukses') ?>
                                        </div>
                                    <?php } ?>
                                    
                                    <form action="<?= base_url('Login/cek_login') ?>" method="POST" id="validate-1">
                                        <div class="form-group">
                                            <div class="float-label float-label-lg">
                                                <input type="text" class="form-control" name="username" require="" placeholder="Insert your username">
                                                <label for="username">Username Admin</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="float-label float-label-lg">
                                                <input class="form-control form-control-lg" type="password" require="" name="password1" placeholder="Please insert your password">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            <div class="form-group mb-0">
                                                <div class="custom-control custom-control-lg custom-switch"><input type="checkbox" class="custom-control-input" id="remember" name="remember"> <label class="custom-control-label" for="remember">Remember me</label></div>
                                            </div><a href="#">Forgot password?</a>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span></span>
                                            <button type="submit" class="btn btn-label-primary btn-lg btn-widest">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('public/assets/build/scripts/mandatory.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('public/assets/build/scripts/core.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('public/assets/build/scripts/vendor.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('public/assets/app/pages/login.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('public/assets/app/form/validation.js') ?>"></script>
</body>

</html>