<li class="nav-header">ข้อมูลการส่งงานของผู้สำรวจข้อมูล</li>
{{-- Committee Menu--}}
<li class="nav-item has-treeview {{ Request::is('committee-questionaire') ? 'menu-open' : '' }}">
    {{-- active --}}
    <a href="{{ url('/committee-questionaire') }}" class="nav-link {{ Request::is('committee-questionaire') ? 'active' : '' }}">
        <i class="nav-icon fas fa-spell-check"></i>
        <p>ตรวจสอบสถานะการส่งงาน</p>
    </a>
</li>
