<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
    <meta charset="utf-8">
    <title>{{ isset($body['title']) ? $body['title']. ' ::'. env('APP_NAME') . '::': 'Admin Panel' }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="author" content="{{ URL::to('/') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <meta name="description" content="">
    <!-- Main CSS-->
    <link rel="stylesheet" href="https://pratikborsadiya.in/vali-admin/css/main.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-3 mt-5">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                
                        <form action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tile">
                                <h3 class="tile-title text-center">เข้าสู่ระบบ</h3>
                                <form class="login-form" method="POST" action="{{ route('user.login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label">ชื่อผู้ใช้งาน</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" name="username" placeholder="ระบุชื่อผู้ใช้งาน" required autofocus>
                                
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">รหัสผ่าน</label>
                                        <input type="password" class="form-control  @error('password') is-invalid @enderror" placeholder="ระบุรหัสผ่าน" name="password" required>
                                
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group text-center">
                                        <button class="btn btn-success btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>เข้าสู่ระบบ</button>
                                        <div class="hr-or">หรือ</div>
                                        <a href="#" class="btn btn-outline-success btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>ลงทะเบียน</a>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Essential javascripts for application to work-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
    @yield('script-content')
</body>

</html>
