{{-- Menu for Super user --}}
<li class="nav-header">ตรวจสอบข้อมูลผู้เข้าร่วมโครงการ</li>
{{-- View User Menu--}}
<li class="nav-item has-treeview {{ Request::is('showRegisterEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/showRegisterEmployee') }}" class="nav-link {{ Request::is('showRegisterEmployee') ? 'active' : '' }}">
        <i class="fa fa-user-friends nav-icon"></i>
        <p>รายชื่อผู้เข้าร่วมโครงการ</p>
    </a>
</li>
{{-- View User Login Menu --}}
<li class="nav-item has-treeview {{ Request::is('showLoginEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/showLoginEmployee') }}" class="nav-link {{ Request::is('showLoginEmployee') ? 'active' : '' }}">
        <i class="nav-icon fa fa-sign-in-alt"></i>
        <p>รายชื่อผู้ที่ล็อกอินเข้าสู่ระบบแล้ว</p>
    </a>
</li> 
