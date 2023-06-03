<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('asset')}}/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <h4><span style="font-family: 'Siemreap', cursive; color: white;">Admin</span></h4>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <span style="font-family: 'Siemreap', cursive;">មីនុយ</span>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('menu.create')}}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បង្កើតមីនុយថ្មី</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('menu.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បញ្ជីមីនុយ</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <span style="font-family: 'Siemreap', cursive;">Subមីនុយ</span>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('sub_menu.create')}}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <span style="font-family: 'Siemreap', cursive;">បង្កើតSubមីនុយថ្មី</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sub_menu.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បញ្ជីSubមីនុយ</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            <span style="font-family: 'Siemreap', cursive;">ស្លាយរូបភាព</span>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('img_slide.create')}}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បង្កើតស្លាយរូបភាពថ្មី</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('img_slide.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បញ្ជីស្លាយរូបភាព</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            <span style="font-family: 'Siemreap', cursive;">ឯកសារ</span>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('document.create')}}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បង្កើតឯកសារថ្មី</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('document.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បញ្ជីឯកសារ</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            {{-- <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            <span style="font-family: 'Siemreap', cursive;">កម្មវិធីផ្សេងៗ</span>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('other.create')}}" class="nav-link">
                                <i class="nav-icon fas fa-plus"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បង្កើតកម្មវិធីផ្សេងៗថ្មី</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('other.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-list-ul"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បញ្ជីកម្មវិធីផ្សេងៗ</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul> --}}
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
{{--                        <i class="nav-icon fas fa-users-cog"></i>--}}
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            <span style="font-family: 'Siemreap', cursive;">ការកំណត់</span>
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('role.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-pencil-ruler"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បញ្ជីតួនាទី</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p><span style="font-family: 'Siemreap', cursive;">បញ្ជីអ្នកប្រើប្រាស់</span></p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <hr style="color: white;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{url('/')}}" class="nav-link active">
                        <i class="nav-icon fas fa-eye" ></i>
                        <p>
                            <span style="font-family: 'Siemreap', cursive;">ចូលទៅមើល Website</span>
                        </p>
                    </a>
                </li>
            </ul>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="{{route('user.logout')}}" class="nav-link active">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            <span style="font-family: 'Siemreap', cursive;">ចាកចេញ</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
