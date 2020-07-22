@extends('user::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-10">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title">ข้อมูลรายการ</h3>
                <p>
                    <a class="btn btn-primary icon-btn" href="{{ route('user.article.create') }}"><i class="fa fa-plus-circle fa-fw"></i>สร้างรายการ </a>
                    <a class="btn btn-secondary icon-btn" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refrash </a>
                </p>
            </div>
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-sm">
                        <thead>
                            <tr>
                                <th scope="col" class="text-nowrap text-center">#</th>
                                <th scope="col" class="text-nowrap text-center">ชื่อบทความ</th>
                                <th scope="col" class="text-nowrap text-center">ผู้เขียน</th>
                                <th scope="col" class="text-nowrap text-center">วันที่</th>
                                <th scope="col" class="text-nowrap text-center">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $index => $article)
                            <tr>
                                <th scope="row" width="1">{{ $articles->firstItem() + $index }}</th>
                                <td>{{ $article->title }}</td>
                                <td width="100" class="text-nowrap">{{ $article->author }}</td>
                                <td width="100" class="text-nowrap">{{ $article->date }}</td>
                                <td width="1">
                                    <div class="text-nowrap">
                                        <form method="POST" action="{{ route('user.article.destroy', $article->id) }}">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <a class="btn btn-sm btn-outline-warning" href="{{ route('user.article.show', [$article->slug]) }}"> ดูเพิ่มเติม</a>
                                            <a class="btn btn-sm btn-info" href="{{ route('user.article.edit', [$article->id]) }}"> แก้ไข</a>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('ท่านต้องการลบรายการนี้ใช่หรือไม่ ?')">ยกเลิก</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tile-footer">
                {{ $articles->render()  }}
            </div>
        </div>
    </div>
</div>
@endsection
