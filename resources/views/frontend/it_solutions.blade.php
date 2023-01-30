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
                                            href="{{ route('front.contact') }}">Join With Us<i class="icon-right"></i></a>
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

            <!--padding_bottom_zero-section -->
            <section class="cmt-row padding_top_zero-section clearfix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <!-- col-img-img-two -->
                            <div class="cmt-bg cmt-col-bgimage-yes col-bg-img-two pt-60 res-991-pt-0">
                                <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                                <div class="layer-content">
                                    @if (isset($quotes) && sizeof($quotes) > 0)
                                        <div class="slick_slider"
                                            data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows":false, "autoplay":true, "dots":false, "infinite":true, "responsive":[{"breakpoint":992,"settings":{"slidesToShow": 1}},{"breakpoint":840,"settings":{"slidesToShow": 1}}]}'>
                                            <!-- testimonials -->
                                            @foreach ($quotes as $quote)
                                                <div class="testimonials cmt-testimonial-box-view-style1">
                                                    <div class="testimonial-content">
                                                        <div class="testimonial-quote-icon">
                                                            <i class="icon-quote-right-alt"></i>
                                                        </div>
                                                        <blockquote class="testimonial-text">{{ $quote->quote }}
                                                        </blockquote>
                                                        <div class="testimonial-caption">
                                                            <h3>{{ $quote->quote_by }}</h3>
                                                            <label>{{ $quote->role }}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- testimonials end -->
                                        </div>
                                    @endif
                                    <div class="cmt-horizontal_sep width-100 mt-40 mb-70 res-991-mt-15 res-991-mb-35">
                                    </div>
                                    <div class="row g-0">
                                        <div class="col-lg-8">
                                            <!-- section title -->
                                            <div class="section-title">
                                                <div class="title-header">
                                                    <h3>Let’s get started</h3>
                                                    <h2 class="title">Are you ready to get <span
                                                            class="text-base-skin">IT</span> Solutions?</h2>
                                                </div>
                                            </div><!-- section title end -->
                                            <div class="row mt_15">
                                                <div class="col-lg-5 col-sm-6">
                                                    <div class="featured-icon-box icon-align-before-title">
                                                        <div class="featured-icon">
                                                            <div
                                                                class="cmt-icon cmt-icon_element-fill cmt-icon_element-style-round cmt-icon_element-color-grey cmt-icon_element-size-xs">
                                                                <i class="fas fa-check"></i>
                                                            </div>
                                                        </div>
                                                        <div class="featured-title">
                                                            <h3 class="fs-18 fw-normal">Experts around the world</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="featured-icon-box icon-align-before-title">
                                                        <div class="featured-icon">
                                                            <div
                                                                class="cmt-icon cmt-icon_element-fill cmt-icon_element-style-round cmt-icon_element-color-grey cmt-icon_element-size-xs">
                                                                <i class="fas fa-check"></i>
                                                            </div>
                                                        </div>
                                                        <div class="featured-title">
                                                            <h3 class="fs-18 fw-normal">Best Practice for industry</h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="cmt-btn btn-default cmt-icon-btn-left cmt-btn-size-md cmt-btn-color-dark mt-50 res-991-mt-30"
                                                href="{{ route('front.contact') }}"><i class="icon-right"></i><span>see
                                                    more
                                                    plans</span></a>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="res-991-mt-30 ml_60 res-991-ml-0">
                                                <img width="443" height="285" class="img-fluid"
                                                    src="{{ asset('/front/assets/images/single-img-icons.png') }}"
                                                    alt="single-img-icons">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- col-img-bg-img-two end-->
                        </div>
                    </div>
                </div>
            </section>
            <!--padding_bottom_zero-section end -->
        </div>
        <!--site-main end-->
    @endsection
@endif
