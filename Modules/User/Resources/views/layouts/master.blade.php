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
                <div class="top-navbar text-right py-2 px-3 bg-white border-bottom">
                    {{ Auth::guard('user')->user()->id }}
                    {{ Auth::guard('user')->user()->name }}

                    <span class="badge badge-warning">
                    @if(Auth::guard('user')->user()->isSuperAdmin())
                        ผู้ดูแลระบบสูงสุด
                    @elseif(Auth::guard('user')->user()->isAdmin())
                        ผู้ดูแลระบบ
                    @endif
                    </span>

                    [<a href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ออกจากระบบ</a>]
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <div class="app-title">
                    <div>
                        <h1>{!! $body['app_title']['h1'] !!}</h1>
                        <p>{!! $body['app_title']['p'] !!}</p>
                    </div>
        
                    @if(isset($breadcrumb)) {!! breadcrumb($breadcrumb) !!} @endif
                </div>
                @yield('app-content')
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
