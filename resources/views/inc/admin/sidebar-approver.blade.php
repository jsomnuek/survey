
                {{-- Menu for Verify and Approve --}}
                <li class="nav-header">ตรวจสอบและยืนยันข้อมูลแบบสำรวจ</li>
                {{-- Verify Menu--}}
                <li class="nav-item has-treeview {{ Request::is('approvedQuestionnaire','unApproveQuestionnaire') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('approvedQuestionnaire','unApproveQuestionnaire') ? 'active' : '' }}">
                        <i class="nav-icon fab fa-wpforms"></i>
                        <p>ตรวจสอบข้อมูลแบบสำรวจ <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/approvedQuestionnaire') }}" class="nav-link {{ Request::is('approvedQuestionnaire') ? 'active' : '' }}">
                                <i class="far fa-check-circle nav-icon"></i>
                                <p>แบบสำรวจที่อนุมัติแล้ว</p>
                            </a>
                            <a href="{{ url('/unApproveQuestionnaire') }}" class="nav-link {{ Request::is('unApproveQuestionnaire') ? 'active' : '' }}">
                                <i class="fas fa-question-circle nav-icon "></i>
                                <p>แบบสำรวจที่รอการอนุมัติ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Approve Menu --}}
                <li class="nav-item has-treeview {{ Request::is('verifyQuestionnaire') ? 'menu-open' : '' }}">
                    {{-- active --}}
                    <a href="#" class="nav-link {{ Request::is('verifyQuestionnaire') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clipboard-check"></i>
                        <p>อนุมัติข้อมูลแบบสำรวจ <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            {{-- active --}}
                            <a href="{{ url('/verifyQuestionnaire') }}" class="nav-link {{ Request::is('verifyQuestionnaire') ? 'active' : '' }}">
                                <i class="fas fa-tasks nav-icon"></i>
                                <p>ตรวจสอบข้อมูลแบบสำรวจ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                
