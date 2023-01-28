@extends('frontend.layouts.master')
@section('title', 'Sysmeet | It Solutions')

@if (isset($all_our_help) && sizeof($all_our_help) > 0)
    @section('main-content')
        <!-- page-title -->
        <div class="cmt-page-title-row bg-base-dark cmt-bg cmt-bgimage-yes clearfix">
            <div class="cmt-titlebar-wrapper-bg-layer cmt-bg-layer"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="cmt-page-title-row-inner">
                            <div class="page-title-heading">
                                <h2 class="title">{{ @$single_our_help->title }}</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index.html">Home</a>
                                </span>
                                <span>{{ @$single_our_help->title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end -->


        <!--site-main start-->
        <div class="site-main">


            <div class="cmt-row sidebar cmt-sidebar-left clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-4 widget-area sidebar-left">
                            <aside class="widget widget-nav-menu with-title">
                                <h3 class="widget-title">Departments</h3>
                                <ul>
                                    @foreach ($all_our_help as $help)
                                        <li
                                            class="{{ request()->is('it_solutions/' . $help->slug . '/' . $help->id) ? 'active' : '' }}">
                                            <a
                                                href="{{ route('front.it_solutions', ['slug' => $help->slug, 'id' => $help->id]) }}">{{ $help->sub_title }}</a>
                                        </li>
                                    @endforeach
                                    {{-- <li class="active"><a href="it-consultancy.html"> IT Consultancy </a></li>
                                    <li><a href="experience-design.html"> Experience Design </a></li>
                                    <li><a href="digital-services.html"> Digital Services </a></li>
                                    <li><a href="data-structuring.html"> Data Structuring </a></li>
                                    <li><a href="advisory-services.html"> Advisory Services </a></li>
                                    <li><a href="content-engineering.html"> Content Engineering </a></li> --}}
                                </ul>
                            </aside>
                            <aside class="widget widget-banner with-title">
                                <div
                                    class="cmt-col-bgcolor-yes bg-base-skin text-base-white col-bg-img-five cmt-col-bgimage-yes cmt-bg">
                                    <div class="cmt-col-wrapper-bg-layer cmt-bg-layer bg-base-skin">
                                        <div class="cmt-col-wrapper-bg-layer-inner bg-base-skin"></div>
                                    </div>
                                    <div class="layer-content text-center">
                                        <div class="icon-img mb-25">
                                            <img src="{{ asset('front/assets/images/icon-service.png') }}"
                                                alt="icon-service.png" />
                                        </div>
                                        <h3>For Tommorow We Can Take Action Today!</h3>
                                        <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                                            href="contact-us.html">Join With Us<i class="icon-right"></i></a>
                                    </div>
                                </div>
                            </aside>
                        </div>
                        <div class="col-lg-8 content-area">
                            <div class="cmt-service-single-content-area">
                                <div class="ttm_fatured_image-wrapper mb-40 res-575-mb-20">
                                    <img width="770" height="500" class="img-fluid"
                                        src="{{ asset('/uploads/our_help/' . @$single_our_help->image) }}" alt="services-1">
                                </div>
                                <div class="cmt-service-description">
                                    <h3>{{ @$single_our_help->title }}</h3>
                                    <p>{!! html_entity_decode(@$single_our_help->desc) !!}</p>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured-icon-box icon-align-before-title">
                                                <div class="featured-icon">
                                                    <div
                                                        class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                                        <i class="flaticon-suitcase"></i>
                                                    </div>
                                                </div>
                                                <div class="featured-title">
                                                    <h3>Growing Your Business Quick</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured-icon-box icon-align-before-title">
                                                <div class="featured-icon">
                                                    <div
                                                        class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                                        <i class="flaticon-project"></i>
                                                    </div>
                                                </div>
                                                <div class="featured-title">
                                                    <h3>Leading your business smartly</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-6">
                                            <div class="featured-icon-box icon-align-before-title">
                                                <div class="featured-icon">
                                                    <div
                                                        class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-skincolor cmt-icon_element-size-lg">
                                                        <i class="flaticon-cloud"></i>
                                                    </div>
                                                </div>
                                                <div class="featured-title">
                                                    <h3>Bring with experiences Team</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </div>

        </div>
        <!--site-main end-->
    @endsection
@endif
