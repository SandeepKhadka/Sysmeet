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
                                    <li class="mega-menu-item active">
                                        <a href="#" class="mega-menu-link">Home</a>
                                    </li>
                                    <li class="mega-menu-item">
                                        <a href="#" class="mega-menu-link">Company</a>
                                        <ul class="mega-submenu">
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="our-team.html">Our Team</a></li>
                                            <li><a href="team-details.html">Team Details</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-item">
                                        <a href="services-1.html" class="mega-menu-link">Services</a>
                                    </li>
                                    <li class="mega-menu-item">
                                        <a href="#" class="mega-menu-link">IT Solutions</a>
                                        <ul class="mega-submenu">
                                            <li><a href="it-consultancy.html">IT Consultancy</a></li>
                                            <li><a href="experience-design.html">Experience Design</a></li>
                                            <li><a href="digital-services.html">Digital Services</a></li>
                                            <li><a href="data-structuring.html">Data Structuring</a></li>
                                            <li><a href="advisory-services.html">Advisory Services</a></li>
                                            <li><a href="content-engineering.html">Content Engineering</a></li>
                                        </ul>
                                    </li>
                                    <li class="mega-menu-item">
                                        <a href="contact-us.html">Contact us</a>
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
