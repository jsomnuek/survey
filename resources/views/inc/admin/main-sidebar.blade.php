<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app_name', 'Lab Survey') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if (Route::has('login'))
                @auth
                    <div class="image">
                        <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                    @else
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">My Username.</a>
                    </div>
                @endauth
            @endif
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-legacy nav-compact" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-header d-none">Display None</li>
                {{-- Menu for Admin --}}
                <li class="nav-header">Basic Informations</li>
                {{-- menu open --}}
                <li class="nav-item has-treeview {{ Request::is('industrialEstate*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('industrialEstate*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-industry"></i>
                        <p>นิคมอุตสาหกรรม <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/industrialEstate') }}" class="nav-link {{ Request::is('industrialEstate') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายชื่อนิคมอุตสาหกรรม</p>
                            </a>
                            <a href="{{ url('/industrialEstate/create') }}" class="nav-link {{ Request::is('industrialEstate/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon "></i>
                                <p>เพิ่มข้อมูลนิคมอุตสาหกรรม</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('organisationType*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('organisationType*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-building"></i>
                        <p>ประเภทองค์กร <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/organisationType') }}" class="nav-link {{ Request::is('organisationType') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายชื่อประเภทองค์กร</p>
                            </a>
                            <a href="{{ url('/organisationType/create') }}" class="nav-link {{ Request::is('organisationType/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon "></i>
                                <p>เพิ่มข้อมูลประเภทองค์กร</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('businessType*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('businessType*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>ประเภทธุรกิจ <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/businessType') }}" class="nav-link {{ Request::is('businessType') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายชื่อประเภทธุรกิจ</p>
                            </a>
                            <a href="{{ url('/businessType/create') }}" class="nav-link {{ Request::is('businessType/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon "></i>
                                <p>เพิ่มข้อมูลประเภทธุรกิจ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('industrialType*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('industrialType*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>ประเภทอุตสาหกรรม <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/industrialType') }}" class="nav-link {{ Request::is('industrialType') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายชื่อประเภทอุตสาหกรรม</p>
                            </a>
                            <a href="{{ url('/industrialType/create') }}" class="nav-link {{ Request::is('industrialType/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon "></i>
                                <p>เพิ่มข้อมูลประเภทอุตสาหกรรม</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('laboratoryType*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('laboratoryType*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-vials"></i>
                        <p>ประเภทห้องปฏิบัติการ <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/laboratoryType') }}" class="nav-link {{ Request::is('laboratoryType') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายชื่อประเภทห้องปฏิบัติการ</p>
                            </a>
                            <a href="{{ url('/laboratoryType/create') }}" class="nav-link {{ Request::is('laboratoryType/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon "></i>
                                <p>เพิ่มข้อมูลประเภทห้องปฏิบัติการ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('majorTechnology*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('majorTechnology*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-microchip"></i>
                        <p>สาขาเทคโนโลยี<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/majorTechnology') }}" class="nav-link {{ Request::is('majorTechnology') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายชื่อสาขาเทคโนโลยี</p>
                            </a>
                            <a href="{{ url('/majorTechnology/create') }}" class="nav-link {{ Request::is('majorTechnology/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon "></i>
                                <p>เพิ่มข้อมูลสาขาเทคโนโลยี</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('technicalEquipment*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('technicalEquipment*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>เทคนิคของเครื่องมือ <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/technicalEquipment') }}" class="nav-link {{ Request::is('technicalEquipment') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายชื่อเทคนิคของเครื่องมือ</p>
                            </a>
                            <a href="{{ url('/technicalEquipment/create') }}" class="nav-link {{ Request::is('technicalEquipment/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon "></i>
                                <p>เพิ่มข้อมูลเทคนิคของเครื่องมือ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Menu for Employee --}}
                <li class="nav-header">ข้อมูลแบบสำรวจ</li>
                {{-- menu-open --}}
                <li class="nav-item has-treeview {{ Request::is('organization*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('organization*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-city"></i>
                        <p>ข้อมูลหน่วยงาน <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/organization') }}" class="nav-link {{ Request::is('organization') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ข้อมูลหน่วยงานทั้งหมด</p>
                            </a>
                            <a href="{{ url('/organization/create') }}" class="nav-link {{ Request::is('organization/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon "></i>
                                <p>เพิ่มข้อมูลหน่วยงาน</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('lab*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('lab*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-balance-scale"></i>
                        <p>ห้องปฏิบัติการ <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/lab') }}" class="nav-link {{ Request::is('lab') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ข้อมูลห้องปฏิบัติการทั้งหมด</p>
                            </a>
                            <a href="{{ url('/lab/create') }}" class="nav-link {{ Request::is('lab/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>เพิ่มข้อมูลห้องปฏิบัติการ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('equipmentLab*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('equipmentLab*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-microscope"></i>
                        <p>เครื่องมือ<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/equipmentLab') }}" class="nav-link {{ Request::is('equipmentLab') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ข้อมูลเครื่องมือทั้งหมด</p>
                            </a>
                            <a href="{{ url('/equipmentLab/create') }}" class="nav-link {{ Request::is('equipmentLab/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>เพิ่มข้อมูลเครื่องมือ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('productLab*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('productLab*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-dolly-flatbed"></i>
                        <p>ผลิตภัณฑ์<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/productLab') }}" class="nav-link {{ Request::is('productLab') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ข้อมูลผลิตภัณฑ์ทั้งหมด</p>
                            </a>
                            <a href="{{ url('/productLab/create') }}" class="nav-link {{ Request::is('productLab/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>เพิ่มข้อมูลผลิตภัณฑ์</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Basic Multi Level Example</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-circle"></i>
                    <p>
                        Level 1
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Level 2
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Level 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Level 3</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                            <i class="far fa-dot-circle nav-icon"></i>
                            <p>Level 3</p>
                            </a>
                        </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Level 2</p>
                        </a>
                    </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Level 1</p>
                    </a>
                </li>            
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>