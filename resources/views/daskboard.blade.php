@include('layouts.head');
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    @include('layouts.nav');
    @include('layouts.sidebar');
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
@include('layouts.foot');
