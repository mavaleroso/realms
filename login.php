<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/config/session.php');
$sess->check_reverse();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="/assets/cuba/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/cuba/assets/images/favicon.png" type="image/x-icon">
    <title><?php echo APP_NAME ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/cuba/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/assets/cuba/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/assets/cuba/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/assets/cuba/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/assets/cuba/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/assets/cuba/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/assets/cuba/assets/css/style.css">
    <link id="color" rel="stylesheet" href="/assets/cuba/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/assets/cuba/assets/css/responsive.css">
    <link rel="stylesheet" href="/assets/custom/css/login.css">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7"><img class="bg-img-cover bg-center" src="/assets/cuba/assets/images/login/2.jpg" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo text-start" href="index.html"><img class="img-fluid for-light" src="/assets/cuba/assets/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="/assets/cuba/assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form" action="http://realms.test/models/auth" method="POST">
                                <h4>Sign in to account</h4>
                                <p>Enter your username & password to login</p>
                                <?php
                                if (isset($_SESSION['flash_msg'])) {
                                    echo '<div class="alert alert-secondary outline alert-dismissible fade show d-flex" role="alert"><i data-feather="alert-triangle"></i>' .
                                        '<p class="my-0 mx-2">' . $_SESSION['flash_msg'] . '</p>' .
                                        '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>' .
                                        '</div>';
                                }
                                ?>
                                <div class="form-group">
                                    <label class="col-form-label">Username</label>
                                    <input class="form-control" type="text" name="username" required="" placeholder="fmsurname">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                </div>
                            </form>
                            <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                            <div class="social mt-4">
                                <button class="btn btn-block w-100 btn-isso" type="submit"><img class="isso-logo" src="/assets/custom/images/ISSO.png" alt="isso logo">ISSO</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- latest jquery-->
            <script src="/assets/cuba/assets/js/jquery-3.5.1.min.js"></script>
            <!-- Bootstrap js-->
            <script src="/assets/cuba/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
            <!-- feather icon js-->
            <script src="/assets/cuba/assets/js/icons/feather-icon/feather.min.js"></script>
            <script src="/assets/cuba/assets/js/icons/feather-icon/feather-icon.js"></script>
            <!-- scrollbar js-->
            <!-- Sidebar jquery-->
            <script src="/assets/cuba/assets/js/config.js"></script>
            <!-- Plugins JS start-->
            <!-- Plugins JS Ends-->
            <!-- Theme js-->
            <script src="/assets/cuba/assets/js/script.js"></script>
            <!-- login js-->
            <!-- Plugin used-->
        </div>

        <?php unset($_SESSION['flash_msg']); ?>
</body>

</html>