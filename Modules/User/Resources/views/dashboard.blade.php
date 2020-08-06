@extends('user::layouts.master')

@section('app-content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4><a href="" class="text-body">นักเรียน</a></h4>
                    <p><b>{{ number_format($count_student) }}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-book fa-3x"></i>
                <div class="info">
                    <h4><a href="{{ route('user.article.index') }}" class="text-body">บทความ</a></h4>
                    <p><b>{{ number_format($count_article) }}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="tile">
                <div class="tile-title-w-btn">
                    <h3 class="title">Laravel ChartsJS Example</h3>
                    <div class="btn-group">
                        <a class="btn btn-primary btn-sm" href="#" id="downloadMyLine" download="ChartImage.jpg"><i class="fa fa-download" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="tile-body">
                    <canvas class="embed-responsive-item" id="lineChart" width="600" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.js" charset="utf-8"></script>
    <script>
        var config = @json($getChartsJS);
        var ctx = document.getElementById("lineChart").getContext('2d');
        new Chart(ctx, config);

        document.getElementById("downloadMyLine").addEventListener('click', function () {
            var url_base64jp = document.getElementById("lineChart").toDataURL("image/jpg");
            var a = document.getElementById("downloadMyLine");
            a.href = url_base64jp;
        });
    </script>
@endsection
