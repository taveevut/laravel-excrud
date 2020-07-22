@extends('user::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('user.article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}    
            <div class="tile">
                <h3 class="tile-title">แก้ไขรายการ</h3>
                <div class="tile-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>หัวข้อ</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="ระบุหัวข้อ" value="{{ $article->title }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>ลิงค์เชื่อมโยง</label>
                            <input type="text" name="url" class="form-control" value="{{ $article->url }}" placeholder="ระบุลิงค์เชื่อมโยง">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>การแสดง (Target)</label>
                            <select name="target" class="form-control">
                                <option value="">-เลือก-</option>
                                <option value="_parent" @if($article->target == "_parent") selected @endif >_parent (เปิดหน้าต่างที่เป็นหน้าต่างระดับ Parent)</option>
                                <option value="_blank" @if($article->target == "_blank") selected @endif>_blank (เปิดหน้าต่างใหม่ทุกครั้ง)</option>
                                <option value="_self" @if($article->target == "_self") selected @endif >_self (เปิดหน้าต่างเดิม)</option>
                                <option value="_top" @if($article->target == "_top") selected @endif >_top (เปิดหน้าต่างในระดับบนสุด)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>วันที่เขียน</label>
                            <div class="input-group">
                                <input class="form-control datepicker @error('date') is-invalid @enderror" type="text" name="date" placeholder="ระบุวันที่" value="{{ $article->date }}" >
                                <div class="input-group-append"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                @error('date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>เขียนโดย</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" placeholder="ระบุผู้เขียน" value="{{ $article->author }}">
                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-5">
                            <label>หน้าปก</label>
                            <input type="file" name="cover" class="form-control krajee-input @error('cover') is-invalid @enderror" data-msg-placeholder="เลือกไฟล์หน้าปก" accept="image/*" data-initial-caption="{{ $article->cover }}">
                            <small class="form-text text-muted">ขนาดรูปภาพที่เหมาะสม 1200 x 630 pixcel (กว้าง x สูง) ภาพจะถูก crop อัตโนมัติ</small>
                            @error('cover')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>รายละเอียด</label>
                            <textarea class="form-control" name="details" id="details" rows="8" placeholder="ระบุรายละเอียด...">{{ $article->details }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o fa-fw"></i>บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-light"><i class="fa fa-times-circle fa-fw"></i>ยกเลิก</button>

                    @if (session('message'))
                    <div class="alert alert-success mt-2">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
