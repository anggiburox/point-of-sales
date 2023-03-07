<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Point Of Sales Soya Crunch</title>

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link href="{{asset('assets/styles/core.css') }}" rel="stylesheet">
    <link href="{{asset('assets/styles/icon-font.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/styles/style-login.css') }}" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <h2 class="text-center text-primary mt-3" style="color: #b46b1b !important;">Poin Of Sales Soya Crunch
                </h2>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{asset('assets/images/logo.png') }}" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary" style="color: #b46b1b !important;">Login</h2>
                        </div>
                        @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif
                        <form action="login" method="post">
                            @csrf
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username" required
                                    name="username">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********"
                                    required name="password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-lg btn-block" style="color: white;
    background-color: #b46b1b;
    border-color: #b46b1b;">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{asset('assets/scripts/core.js') }}"></script>
    <script src="{{asset('assets/scripts/script.min.js') }}"></script>
    <script src="{{asset('assets/scripts/process.js') }}"></script>
    <script src="{{asset('assets/scripts/layout-settings.js') }}"></script>
</body>

</html>