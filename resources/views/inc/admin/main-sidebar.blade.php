<aside class="main-sidebar elevation-4 sidebar-dark-success">
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
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-compact" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-header d-none">Display None</li>
                {{-- Basic Informations Menu  --}}
            <li class="nav-header">Role : {!! auth()->user()->role_id !!}</li>

            @if(Auth::user()->role_id == 1)
            <li class="nav-header">ข้อมูลพื้นฐานของระบบ</li>
                {{-- List of Menu --}}
                <li class="nav-item has-treeview {{ Request::is('labLocation*','industrialEstate*','organisationType*','businessType*','saleProduct*','industrialType*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-arrow-circle-right"></i>
                    <p>
                        ข้อมูลองค์กร
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview {{ Request::is('labLocation*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('labLocation*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-search-location"></i>
                                <p>ที่ตั้งห้องปฏิบัติการ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/labLocation') }}" class="nav-link {{ Request::is('labLocation') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการที่ตั้งห้องปฏิบัติการ</p>
                                    </a>
                                    <a href="{{ url('/labLocation/create') }}" class="nav-link {{ Request::is('labLocation/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลที่ตั้งห้องปฏิบัติการ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
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
                        <li class="nav-item has-treeview {{ Request::is('saleProduct*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('saleProduct*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-briefcase"></i>
                                <p>การจำหน่ายสินค้า/บริการ <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/saleProduct') }}" class="nav-link {{ Request::is('saleProduct') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการจำหน่ายสินค้า</p>
                                    </a>
                                    <a href="{{ url('/saleProduct/create') }}" class="nav-link {{ Request::is('saleProduct/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลการจำหน่ายสินค้า</p>
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
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ Request::is('laboratoryType*','areaService*','fixedCost*','incomePerYear*','employeeTraining*','environmentManage*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-arrow-circle-right"></i>
                    <p>
                        ข้อมูลห้องปฏิบัติการ
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
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
                        <li class="nav-item has-treeview {{ Request::is('areaService*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('areaService*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-meteor"></i>
                                <p>ขอบเขตการให้บริการ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/areaService') }}" class="nav-link {{ Request::is('areaService') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายชื่อขอบเขต</p>
                                    </a>
                                    <a href="{{ url('/areaService/create') }}" class="nav-link {{ Request::is('areaService/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลขอบเขต</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('fixedCost*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('fixedCost*') ? 'active' : '' }}">
                                <i class="nav-icon fab fa-bitcoin"></i>
                                <p>ต้นทุนคงที่<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/fixedCost') }}" class="nav-link {{ Request::is('fixedCost') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ช่วงต้นทุนคงที่</p>
                                    </a>
                                    <a href="{{ url('/fixedCost/create') }}" class="nav-link {{ Request::is('fixedCost/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลต้นทุนคงที่</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('incomePerYear*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('incomePerYear*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-dollar-sign"></i>
                                <p>รายได้รวมต่อปี<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/incomePerYear') }}" class="nav-link {{ Request::is('incomePerYear') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายได้ต่อปี</p>
                                    </a>
                                    <a href="{{ url('/incomePerYear/create') }}" class="nav-link {{ Request::is('incomePerYear/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลรายได้ต่อปี</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('employeeTraining*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('employeeTraining*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chalkboard-teacher"></i>
                                <p>การฝึกอบรมต่อปี<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/employeeTraining') }}" class="nav-link {{ Request::is('employeeTraining') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>จำนวนคนที่ได้รับการฝึก</p>
                                    </a>
                                    <a href="{{ url('/employeeTraining/create') }}" class="nav-link {{ Request::is('employeeTraining/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลจำนวนคนที่รับการฝึก</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('environmentManage*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('environmentManage*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-air-freshener"></i>
                                <p>การจัดการสิ่งแวดล้อม<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/environmentManage') }}" class="nav-link {{ Request::is('environmentManage') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>การจัดการสิ่งแวดล้อม</p>
                                    </a>
                                    <a href="{{ url('/environmentManage/create') }}" class="nav-link {{ Request::is('environmentManage/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลการจัดการสิ่งแวดล้อม</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ Request::is('equipments*','majorTechnology*','technicalEquipment*','objectiveUsage*','equipmentUsage*','equipmentCalibration*','equipmentMaintenance*','equipmentManual*','equipmentRent*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-arrow-circle-right"></i>
                    <p>
                        ข้อมูลเครื่องมือวิทยาศาสตร์
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview {{ Request::is('equipments*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('equipments*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-flask"></i>
                                <p>เครื่องมือวิทยาศาสตร์<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/equipment') }}" class="nav-link {{ Request::is('equipment') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายชื่อเครื่องมือวิทยาศาสตร์</p>
                                    </a>
                                    <a href="{{ url('/equipment/create') }}" class="nav-link {{ Request::is('equipment/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลเครื่องมือวิทยาศาสตร์</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('majorTechnology*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('majorTechnology*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-microchip"></i>
                                <p>สาขาเทคโนโลยีเครื่องมือ<i class="right fas fa-angle-left"></i></p>
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
                        <li class="nav-item has-treeview {{ Request::is('objectiveUsage*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('objectiveUsage*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-paw"></i>
                                <p>วัตถุประสงค์การใช้ <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/objectiveUsage') }}" class="nav-link {{ Request::is('objectiveUsage') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการวัตถุประสงค์</p>
                                    </a>
                                    <a href="{{ url('/objectiveUsage/create') }}" class="nav-link {{ Request::is('objectiveUsage/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลวัตถุประสงค์</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('equipmentUsage*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('equipmentUsage*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-user-circle"></i>
                                <p>ขอบเขตการใช้เครื่องมือ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/equipmentUsage') }}" class="nav-link {{ Request::is('equipmentUsage') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการขอบเขตการใช้</p>
                                    </a>
                                    <a href="{{ url('/equipmentUsage/create') }}" class="nav-link {{ Request::is('equipmentUsage/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลขอบเขตการใช้</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('equipmentCalibration*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('equipmentCalibration*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-clipboard-check"></i>
                                <p>การสอบเทียบเครื่องมือ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/equipmentCalibration') }}" class="nav-link {{ Request::is('equipmentCalibration') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการสอบเทียบเครื่องมือ</p>
                                    </a>
                                    <a href="{{ url('/equipmentCalibration/create') }}" class="nav-link {{ Request::is('equipmentCalibration/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลสอบเทียบเครื่องมือ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('equipmentMaintenance*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('equipmentMaintenance*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-toolbox"></i>
                                <p>การบำรุงรักษาเครื่องมือ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/equipmentMaintenance') }}" class="nav-link {{ Request::is('equipmentMaintenance') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการบำรุงรักษา</p>
                                    </a>
                                    <a href="{{ url('/equipmentMaintenance/create') }}" class="nav-link {{ Request::is('equipmentMaintenance/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลรายการบำรุงรักษา</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('equipmentManual*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('equipmentManual*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-book"></i>
                                <p>คู่มือการใช้เครื่องมือ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/equipmentManual') }}" class="nav-link {{ Request::is('equipmentManual') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการข้อมูลคู่มือ</p>
                                    </a>
                                    <a href="{{ url('/equipmentManual/create') }}" class="nav-link {{ Request::is('equipmentManual/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลคู่มือ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('equipmentRent*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('equipmentRent*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-hand-holding-usd"></i>
                                <p>การให้เช่าใช้เครื่องมือ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/equipmentRent') }}" class="nav-link {{ Request::is('equipmentRent') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการให้เช่าเครื่องมือ</p>
                                    </a>
                                    <a href="{{ url('/equipmentRent/create') }}" class="nav-link {{ Request::is('equipmentRent/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลการให้เช่าเครื่องมือ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ Request::is('productType*','testingCalibratingList*','testingCalibratingType*','testingCalibratingMethod*','resultControl*','proficiencyTesting*','certifyLaboratory*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-arrow-circle-right"></i>
                    <p>
                        ผลิตภัณฑ์ และการทดสอบ
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview {{ Request::is('productType*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('productType*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-layer-group"></i>
                                <p>ประเภทผลิตภัณฑ์<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/productType') }}" class="nav-link {{ Request::is('productType') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายชื่อประเภทผลิตภัณฑ์</p>
                                    </a>
                                    <a href="{{ url('/productType/create') }}" class="nav-link {{ Request::is('productType/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลประเภทผลิตภัณฑ์</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('testingCalibratingList*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('testingCalibratingList*') ? 'active' : '' }}">
                                <i class="nav-icon fab fa-elementor"></i>
                                <p>ประเภทรายการทดสอบ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/testingCalibratingList') }}" class="nav-link {{ Request::is('testingCalibratingList') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายชื่อประเภทรายการ</p>
                                    </a>
                                    <a href="{{ url('/testingCalibratingList/create') }}" class="nav-link {{ Request::is('testingCalibratingList/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลประเภทรายการ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('testingCalibratingType*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('testingCalibratingType*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tape"></i>
                                <p>ประเภทการทดสอบ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/testingCalibratingType') }}" class="nav-link {{ Request::is('testingCalibratingType') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการประเภทการทดสอบ</p>
                                    </a>
                                    <a href="{{ url('/testingCalibratingType/create') }}" class="nav-link {{ Request::is('testingCalibratingType/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลประเภทการทดสอบ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('testingCalibratingMethod*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('testingCalibratingMethod*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-vial"></i>
                                <p>วิธีทดสอบ/สอบเทียบ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/testingCalibratingMethod') }}" class="nav-link {{ Request::is('testingCalibratingMethod') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการวิธีทดสอบ/สอบเทียบ</p>
                                    </a>
                                    <a href="{{ url('/testingCalibratingMethod/create') }}" class="nav-link {{ Request::is('testingCalibratingMethod/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลวิธีทดสอบ/สอบเทียบ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('resultControl*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('resultControl*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-check-double"></i>
                                <p>ควบคุมคุณภาพผลทดสอบ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/resultControl') }}" class="nav-link {{ Request::is('resultControl') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการควบคุมคุณภาพ</p>
                                    </a>
                                    <a href="{{ url('/resultControl/create') }}" class="nav-link {{ Request::is('resultControl/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลการควบคุมคุณภาพ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('proficiencyTesting*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('proficiencyTesting*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-kaaba"></i>
                                <p>การทดสอบความชำนาญ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/proficiencyTesting') }}" class="nav-link {{ Request::is('proficiencyTesting') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการทดสอบความชำนาญ</p>
                                    </a>
                                    <a href="{{ url('/proficiencyTesting/create') }}" class="nav-link {{ Request::is('proficiencyTesting/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลทดสอบความชำนาญ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview {{ Request::is('certifyLaboratory*') ? 'menu-open' : '' }}">
                            {{-- active --}}
                            <a href="#" class="nav-link {{ Request::is('certifyLaboratory*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-certificate"></i>
                                <p>การรับรองห้องปฏิบัติการ<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    {{-- active --}}
                                    <a href="{{ url('/certifyLaboratory') }}" class="nav-link {{ Request::is('certifyLaboratory') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>รายการการรับรอง</p>
                                    </a>
                                    <a href="{{ url('/certifyLaboratory/create') }}" class="nav-link {{ Request::is('certifyLaboratory/create') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon "></i>
                                        <p>เพิ่มข้อมูลการรับรอง</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ Request::is ('country*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is ('country*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-flag"></i>
                        <p>ข้อมูลประเทศ <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/country') }}" class="nav-link {{ Request::is('country') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>รายชื่อประเทศ</p>
                            </a>
                            <a href="{{ url('/country/create') }}" class="nav-link {{ Request::is ('country/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>เพิ่มข้อมูลประเทศ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

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
                        <p>รายการทดสอบ/สอบเทียบ<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/productLab') }}" class="nav-link {{ Request::is('productLab') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ข้อมูลรายการทดสอบ</p>
                            </a>
                            <a href="{{ url('/productLab/create') }}" class="nav-link {{ Request::is('productLab/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>เพิ่มข้อมูลรายการทดสอบ</p>
                            </a>
                        </li>
                    </ul>
                </li>            
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>