<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/templates/user/img/fav.png') }}">
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Merch Store</title>

    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/templates/user/css/main.css') }}">
</head>

<body>

    @include('sweetalert::alert')

    <section class="login_box_area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login_box_img">
                        <img class="img-fluid" src="{{ asset('assets/templates/user/img/login.jpg') }}" alt="">
                        <div class="hover">
                            <h4>New to our website?</h4>
                            <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                            <a class="primary-btn" href="{{ route('register') }}">Create an Account</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="login_form_inner">
                        <h3>Log in to enter</h3>

                        <form class="row login_form" action="/post-login" method="POST" id="contactForm" novalidate="novalidate">
                            @csrf

                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" value="submit" class="primary-btn">
                                    Log In
                                </button>

                                <a href="#">Forgot Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/templates/user/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/templates/user/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/templates/user/js/main.js') }}"></script>

</body>

</html>