{{-- Menu for Super user --}}
<li class="nav-header">ตรวจสอบข้อมูลผู้เข้าร่วมโครงการ</li>
{{-- View User Menu--}}
<li class="nav-item has-treeview {{ Request::is('showRegisterEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/showRegisterEmployee') }}" class="nav-link {{ Request::is('showRegisterEmployee') ? 'active' : '' }}">
        <i class="fa fa-user-friends nav-icon"></i>
        <p>รายชื่อผู้เข้าร่วมโครงการทั้งหมด</p>
    </a>
</li>
{{-- View User Login Menu --}}
<li class="nav-item has-treeview {{ Request::is('showLoginEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/showLoginEmployee') }}" class="nav-link {{ Request::is('showLoginEmployee') ? 'active' : '' }}">
        <i class="nav-icon fa fa-sign-in-alt"></i>
        <p>รายชื่อผู้ที่ล็อกอินเข้าระบบแล้ว</p>
    </a>
</li>
{{-- View User Unlogin Menu --}}
<li class="nav-item has-treeview {{ Request::is('showUnloginEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/showUnloginEmployee') }}" class="nav-link {{ Request::is('showUnloginEmployee') ? 'active' : '' }}">
        <i class="nav-icon fas fa-frown-open"></i>
        <p>รายชื่อผู้ที่ยังไม่ล็อกอิน</p>
    </a>
</li>
{{-- Edit User Detail--}}
@if (Auth::user()->role_id == 1)    
<li class="nav-item has-treeview {{ Request::is('viewRegisterEmployee') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/viewRegisterEmployee') }}" class="nav-link {{ Request::is('viewRegisterEmployee') ? 'active' : '' }}">
        <i class="fa fa-user-cog nav-icon"></i>
        <p>แก้ไขรายชื่อผู้เข้าร่วมโครงการ</p>
    </a>
</li>
@endif