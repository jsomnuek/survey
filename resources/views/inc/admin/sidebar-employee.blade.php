                {{-- Menu for Employee --}}
                <li class="nav-header">ข้อมูลแบบสำรวจ</li>
                {{-- Organization Menu--}}
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
                {{-- Laboratory Menu --}}
                <li class="nav-item has-treeview {{ Request::is('labs*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('labs*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-balance-scale"></i>
                        <p>ห้องปฏิบัติการ <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/labs') }}" class="nav-link {{ Request::is('labs') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ข้อมูลห้องปฏิบัติการทั้งหมด</p>
                            </a>
                            <a href="{{ url('/labs/create') }}" class="nav-link {{ Request::is('labs/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon "></i>
                                <p>เพิ่มข้อมูลห้องปฏิบัติการ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- EquipmentLab Menu --}}
                <li class="nav-item has-treeview {{ Request::is('equipments*') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('equipments*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-microscope"></i>
                        <p>เครื่องมือ<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/equipments') }}" class="nav-link {{ Request::is('equipments') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ข้อมูลเครื่องมือทั้งหมด</p>
                            </a>
                            <a href="{{ url('/equipments/create') }}" class="nav-link {{ Request::is('equipments/create') ? 'active' : '' }}">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>เพิ่มข้อมูลเครื่องมือ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ProductLab Menu --}}
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
