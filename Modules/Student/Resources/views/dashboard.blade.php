{{ Auth::guard('student')->user()->id }}
{{ Auth::guard('student')->user()->name }}

<a class="dropdown-item" href="{{ route('student.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ออกจากระบบ</a>
<form id="logout-form" action="{{ route('student.logout') }}" method="POST" style="display: none;">
    @csrf
</form>