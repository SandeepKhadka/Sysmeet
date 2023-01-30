<!--header start-->
<header id="masthead" class="header cmt-header-style-01">

    <!-- site-header-menu -->
    <div id="site-header-menu" class="site-header-menu">
        <div class="site-header-menu-inner cmt-stickable-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!--site-navigation -->
                        <div class="site-navigation d-flex align-items-center justify-content-between">
                            <!-- site-branding -->
                            <div class="site-branding me-auto">
                                @if (isset($logo) && $logo != null)
                                    <img id="footer-logo-img" class="img-fluid auto_size" height="42" width="132"
                                        src="{{ asset('/uploads/logo/' . $logo->image) }}" alt="image">
                                @else
                                    <h4>Sysmeet</h4>
                                @endif
                            </div><!-- site-branding end -->
                            <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                <span class="menubar-box">
                                    <span class="menubar-inner"></span>
                                </span>
                            </div>
                            <!-- menu -->
                            <nav class="main-menu menu-mobile" id="menu">
                                <ul class="menu">
                                    <li class="mega-menu-item {{ request()->is('/') ? 'active' : '' }}">
                                        <a href="{{ route('front.home') }}" class="mega-menu-link">Home</a>
                                    </li>
                                    <li class="mega-menu-item {{ request()->is('company*') ? 'active' : '' }}">
                                        <a href="#" class="mega-menu-link">Company</a>
                                        <ul class="mega-submenu">
                                            <li class="{{ request()->is('company/about_us') ? 'active' : '' }}"><a
                                                    href="{{ route('front.about_us') }}">About Us</a></li>
                                            @if (isset($member_details) && sizeof($member_details) > 0)
                                                <li class="{{ request()->is('company/our_team') ? 'active' : '' }}"><a
                                                        href="{{ route('front.our_team') }}">Our Team</a></li>
                                            @endif
                                            {{-- <li class="{{ request()->is('company/team_details') ? 'active' : '' }}"><a href="{{route('front.team_details')}}">Team Details</a></li> --}}
                                        </ul>
                                    </li>
                                    {{-- <li class="mega-menu-item {{ request()->is('service') ? 'active' : '' }}">
                                        <a href="{{ route('front.service') }}" class="mega-menu-link">Services</a>
                                    </li> --}}
                                    <li class="mega-menu-item {{ request()->is('service*') ? 'active' : '' }}">
                                        <a href="{{ route('front.service') }}" class="mega-menu-link">Services</a>
                                        <ul class="mega-submenu">
                                            @if (isset($all_service_lists) && sizeof($all_service_lists) > 0)
                                                @foreach ($all_service_lists as $service)
                                                    @if (isset($service->description) && $service->description != null)
                                                        <li
                                                            class="{{ request()->is('service/' . $service->slug . '/' . $service->id) ? 'active' : '' }}">
                                                            <a
                                                                href="{{ route('front.service_lists', ['slug' => $service->slug, 'id' => $service->id]) }}">{{ $service->title }}</a>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    <li class="mega-menu-item {{ request()->is('it_solutions*') ? 'active' : '' }}">
                                        <a href="#" class="mega-menu-link">IT Solutions</a>
                                        <ul class="mega-submenu">
                                            @if (isset($all_our_help) && sizeof($all_our_help) > 0)
                                                @foreach ($all_our_help as $help)
                                                    <li
                                                        class="{{ request()->is('it_solutions/' . $help->slug . '/' . $help->id) ? 'active' : '' }}">
                                                        <a
                                                            href="{{ route('front.it_solutions', ['slug' => $help->slug, 'id' => $help->id]) }}">{{ $help->sub_title }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </li>
                                    <li class="mega-menu-item {{ request()->is('contact') ? 'active' : '' }}">
                                        <a href="{{ route('front.contact') }}">Contact us</a>
                                    </li>
                                </ul>
                            </nav><!-- menu end -->
                            <!-- header_extra -->
                            <div class="header_extra d-flex flex-row align-items-center">
                                <div class="header_search">
                                    <a href="#" class="btn-default search_btn"><i class="icon-search-1"></i></a>
                                    <div class="header_search_content">
                                        <div class="header_search_content_inner">
                                            <a href="#" class="close_btn"><i class="icon-cancel-2"></i></a>
                                            <form id="searchbox" method="get" action="#">
                                                <input class="search_query" type="text" id="search_query_top"
                                                    name="s" placeholder="Type Your Search..." value="">
                                                <button type="submit" class="btn close-search"><i
                                                        class="icon-search-1"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- header_extra end -->
                        </div><!-- site-navigation end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- site-header-menu end-->
</header>
<!--header end-->
