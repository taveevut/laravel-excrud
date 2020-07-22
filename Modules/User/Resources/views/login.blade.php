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