<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('register/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('register/assets/images/favicon.png')}}" type="image/x-icon">
    <title>Tizimga kirish</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('register/assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('register/assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('register/assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('register/assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('register/assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('register/assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('register/assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('register/assets/css/color-1.css')}}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('register/assets/css/responsive.css')}}">
</head>
<body>
<!-- login page start-->
<div class="container-fluid">
    <div class="row">
{{--        <div class="col-xl-5">--}}
{{--            <img class="bg-img-cover bg-center" src="{{asset('register/assets/images/login/3.jpg')}}" alt="looginpage">--}}
{{--        </div>--}}
        <div class="">
{{--            //col-xl-7 p-0--}}
            <div class="login-card">
                <div>
{{--                    <div><a class="logo text-start" href="">--}}
{{--                            <img class="img-fluid for-light" src="{{asset('register/assets/images/logo/login.png')}}" --}}
{{--                                 alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/logo_dark.png" --}}
{{--                                                       alt="looginpage">--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <div class="login-main">
                        <form   class="theme-form" action="{{route('sing')}}" method="post">
                            @csrf
                            <h4>Hisobga kiring</h4>
                            <p>Kirish uchun email va parolingizni kiriting</p>
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input class="form-control" name="email" type="email" required="" placeholder="Elektron pochta">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Parol</label>
                                <div class="form-input position-relative">
                                    <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                    <div class="show-hide"><span class="show"></span></div>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <div class="checkbox p-0">
                                    <input id="checkbox1" type="checkbox">
{{--                                    <label class="text-muted" for="checkbox1">Remember password</label>--}}
                                </div>
                                <button class="btn btn-primary btn-block w-100" type="submit">tizimga kirish</button>
                            </div>

                            <p class="mt-4 mb-0 text-center">Hisobingiz yo'qmi ?<a class="ms-2" href="{{route('register')}}">Hisob yaratish</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- latest jquery-->
    <script src="{{asset('register/assets/js/jquery-3.5.1.min.js')}}"></script>
    <!-- Bootstrap js-->
    <script src="{{asset('register/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
    <!-- feather icon js-->
    <script src="{{asset('register/assets/js/icons/feather-icon/feather.min.js')}}"></script>
    <script src="{{asset('register/assets/js/icons/feather-icon/feather-icon.js')}}"></script>
    <!-- scrollbar js-->
    <!-- Sidebar jquery-->
    <script src="{{asset('register/assets/js/config.js')}}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{asset('register/assets/js/script.js')}}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js" type="text/javascript"></script>
</div>



</body>
</html>
