<!-- /*
* Template Name: Tour
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <link rel="icon" type="image/png" href="{{asset('admin/assets/img/plane-removebg.png')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('app/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('app/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{asset('app/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('app/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('app/css/styleLogin.css')}}">

    <title>Đăng ký</title>
</head>

<body>
    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">ĐĂNG KÝ</h2>
                        <form action="{{route('register')}}" method="POST" class="register-form" id="register-form">
                            @csrf
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Họ và tên" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Mật khẩu" class="@error('password') is-invalid @enderror" required autocomplete="new-password"/>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" id="password-confirm" placeholder="Nhập lại mật khẩu" name="password_confirmation" required autocomplete="new-password"/>
                            </div>
                            <div class="invalid-feedback">Mật khẩu không khớp.</div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="register" class="form-submit" value="Đăng ký" />
                                <a href="{{url('login')}}" class="btn-login-return">Đăng nhập</a>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="{{asset('app/images/signup-image.jpg')}}" alt="sing up image"></figure>
                        <!-- <a href="#" class="signup-image-link">I am already member</a> -->
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="{{asset('app/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('app/js/popper.min.js')}}"></script>
    <script src="{{asset('app/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('app/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('app/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('app/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('app/js/jquery.fancybox.min.js')}}"></script>
    <script src="{{asset('app/js/aos.js')}}"></script>
    <script src="{{asset('app/js/moment.min.js')}}"></script>
    <script src="{{asset('app/js/daterangepicker.js')}}"></script>

    <script src="{{asset('app/js/typed.js')}}"></script>
    <!-- JS -->
    <script src="{{asset('app/js/custom.js')}}"></script>
    <script>
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');
        const invalidFeedback = document.querySelector('.invalid-feedback');
        const registerButton = document.getElementById('register');
        const form = document.querySelector('form');
        registerButton.addEventListener('click', function(event) {
        event.preventDefault();
        const password = passwordInput.value;
        const confirmPassword = confirmPasswordInput.value;

        if (password !== confirmPassword) {
            confirmPasswordInput.classList.add('is-invalid');
            invalidFeedback.style.display = 'block';
        }
        else{
            form.submit();
        }
        });
    </script>
</body>

</html>