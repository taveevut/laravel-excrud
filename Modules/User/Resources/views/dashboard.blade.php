{{ Auth::guard('user')->user()->id }}
{{ Auth::guard('user')->user()->name }}

<a class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ออกจากระบบ</a>
<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
    @csrf
</form>