@include('frontend.layouts.header')

@section('title', 'GoodGoods - Online Shopping for Electronics, Apparel, Computers, Books, DVDs & more')

<!--page start-->
<div class="page">
    <!-- Navbar -->
    @include('frontend.layouts.navbar')
    <!-- Navbar /- -->

    {{-- <!-- Bannerr -->
    @yield('banner')
    <!-- Bannerr /- --> --}}

    <!-- content -->
    @yield('main-content')
    <!-- content -->

    <!-- Footer -->
    @include('frontend.layouts.footer')
</div><!-- page end -->

@include('frontend.layouts.scripts')
