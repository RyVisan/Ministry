<nav class="navbar navbar-expand-lg top-menu">
{{--    <a class="navbar-brand" href="#"><img src="{{asset('asset')}}/dist/img/ប្រាក់ ប្រានីដ្ឋា.jpg" class="img-circle elevation-2" width="50" height="50"></a>--}}
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <div class="container-fluid">
                <ul class="navbar-nav menu">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route('index.index')}}"><span style="font-family: 'Angkor', cursive;">ទំព័រដើម</span></a>
                    </li>
                    @foreach($menus as $menu)
                        @if(count($menu->submenu) > 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span style="font-family: 'Angkor', cursive;">{{$menu->name}}</span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($menu->submenu as $submenu)
                                        @if($submenu->status == 1)
                                            <li class="top-menu"><a class="dropdown-item" href="{{route('link',[$submenu->id,"submenu"])}}"><span style="font-family: 'Angkor', cursive;">{{$submenu->name}}</span></a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{route('link',[$menu->id,"menu"])}}"><span style="font-family: 'Angkor', cursive;">{{$menu->name}}</span></a>
                            </li>
                        @endif
                    @endforeach
                    <li class="nav-item" style="margin-right: 0px">
                        <a class="nav-link active" aria-current="page" href="{{route('user.logout')}}"><span style="font-family: 'Angkor', cursive; color: red;">ចូលទៅAdmin</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
