@include('frontend.layouts.head')
@include('frontend.layouts.navebar')
<div class="container">
    <div class="row">
        @yield('content')
    </div>
</div>
@include('frontend.layouts.foot')
