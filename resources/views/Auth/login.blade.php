<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description"
        content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities." />
    <meta name="keywords"
        content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="PIXINVENT" />
    <title>GOMEDICAL</title>
    <link rel="apple-touch-icon" href="../../../app-assets/images/logo/medical_logo_icon.png" />
    <link rel="shortcut icon" type="image/x-icon" href="../../../app-assets/images/logo/medical_logo_icon.png" />
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/vendors.min.css" />
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/icheck.css" />
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/css/forms/icheck/custom.css" />
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/bootstrap-extended.css" />
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/colors.css" />
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/components.css" />
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css" />
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/core/colors/palette-gradient.css" />
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/login-register.css" />
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../../assets/css/style.css" />
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 1-column bg-full-screen-image blank-page blank-page" data-open="click"
    data-menu="vertical-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay overlaynow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body overlay-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="box-shadow-2 p-0 loginwrapper">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0 loginbox">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="../../../app-assets/images/logo/medical_logo.png" class="img-fluid"
                                            alt="branding logo" />
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h2>Login Now</h2>
                                            <form class="form-horizontal" action="/save-login" method="POST">
                                                @if (Session::get('fail'))
                                                    <div class="alert alert-danger">
                                                        {{ Session::get('fail') }}
                                                    </div>
                                                @endif
                                                @if (Session::get('success'))
                                                    <div class="alert alert-success">
                                                        {{ Session::get('success') }}
                                                    </div>
                                                @endif @csrf
                                                <fieldset class="form-group position-relative has-icon-left">
                                                    <input type="text" name="email" class="form-control"
                                                        id="user-name" placeholder="Your Email or Username" />
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <span class="danger text-danger">
                                                        @error('email'){{ $message }}@enderror
                                                    </span>
                                                </fieldset>
                                                <fieldset
                                                    class="form-group position-relative has-icon-right has-icon-left">
                                                    <input type="password" name="password" class="form-control"
                                                        id="user-password" placeholder="Enter Password" />
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                    <div class="form-control-position"
                                                        style="right: 0 !important; cursor: pointer;">
                                                        <i class="fa fa-eye" id="togglePassword"></i>
                                                    </div>
                                                    <span class="danger text-danger">
                                                        @error('password'){{ $message }}@enderror
                                                    </span>
                                                </fieldset>
                                                <button type="submit"
                                                    class="btn btn-outline-primary btn-block registerbtn">
                                                    <i class="feather icon-unlock"></i>
                                                    Login
                                                </button>
                                            </form>
                                        </div>
                                        <div class="card-body my-2 ">
                                            <a href="/password_forget_form" class="loginbtn primary">Forgot
                                                Password?</a>
                                        </div>
                                        <p
                                            class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                            <span>New to Merita ?</span>
                                        </p>
                                        <div class="card-body">
                                            <a href="/register" class="loginbtn">Click Here To Register
                                                Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#user-password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="../../../app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../app-assets/js/core/app-menu.js"></script>
    <script src="../../../app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="../../../app-assets/js/scripts/forms/form-login-register.js"></script>
    <!-- END: Page JS-->
</body>
<!-- END: Body-->

</html>
