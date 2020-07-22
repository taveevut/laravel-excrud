@extends('user::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="tile">
            <h3 class="tile-title">แสดงผลรายการ</h3>
            <div class="tile-body">
                <p class="text-center">
                    @if(strpos($article->cover, "http") !== false)
                    <img src="https://via.placeholder.com/603x213" class="img-fluid">
                    @else
                    <img src="{{ Storage::url("public/article/".$article->cover) }}" class="img-fluid">
                    @endif
                </p>

                
                <h5 class="mb-0">{{ $article->title }}</h5>
                <div class="border-bottom pb-2 mb-3 font-smaller">
                    <i class="fa fa-pencil-square" aria-hidden="true"></i> {{ $article->author }}  <i class="fa fa-calendar ml-3" aria-hidden="true"></i> {{ $article->date }}
                </div>

                {!! $article->details !!}

            </div>
            <div class="tile-footer">
               
            </div>
        </div>
    </div>
</div>
@endsection
