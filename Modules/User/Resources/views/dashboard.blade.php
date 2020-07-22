@extends('user::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4><a href="" class="text-body">นักเรียน</a></h4>
                <p><b>25</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-book fa-3x"></i>
            <div class="info">
                <h4><a href="{{ route('user.article.index') }}" class="text-body">บทความ</a></h4>
                <p><b>5</b></p>
            </div>
        </div>
    </div>
</div>
@endsection
