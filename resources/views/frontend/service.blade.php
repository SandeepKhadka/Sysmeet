@extends('frontend.layouts.master')
@section('title', 'Sysmeet')
{{-- @section('banner')
    @include('frontend.layouts.banner')
@endsection --}}

@section('main-content')
    <!-- page-title -->
    <div class="cmt-page-title-row bg-base-dark cmt-bg cmt-bgimage-yes clearfix">
        <div class="cmt-titlebar-wrapper-bg-layer cmt-bg-layer"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="cmt-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">Service</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="index.html">Home</a>
                            </span>
                            <span>Service</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->


    <!--site-main start-->
    <div class="site-main">


        @if (isset($service) && $service != null)
            <section class="cmt-row about-section clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row align-items-center">
                        <div class="col-xl-12">
                            <!-- section title -->
                            <div class="section-title style2 res-991-pb-15">
                                <div class="title-header">
                                    <h3>Our Services</h3>
                                    <h2 class="title">{{ $service->title }}</h2>
                                </div>
                                <div class="title-desc">
                                    <p>{{ $service->summary }}</p>
                                    {{-- <a href="services-2.html"
                                    class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-skincolor">view
                                    More<i class="icon-right"></i></a> --}}
                                </div>
                            </div><!-- section title end -->
                        </div>
                    </div>
                    @if (isset($service_lists) && sizeof($service_lists) > 0)
                        <div class="row mb_15">
                            @foreach ($service_lists as $service)
                                @if (isset($service->tag) && $service->tag != null)
                                    <div class="col-lg-4 col-md-6 col-sm-6">
                                        <!--featured-icon-box-->
                                        <div class="featured-icon-box icon-align-before-content style4">
                                            <div class="featured-icon">
                                                <div
                                                    class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-size-xl cmt-icon_element-color-skincolor">
                                                    <i class="{{ 'flaticon-' . $service->tag }}"></i>
                                                </div>
                                            </div>
                                            <div class="featured-content">
                                                <span class="number"></span>
                                                <div class="featured-title">
                                                    @if (isset($service->description) && $service->description != null)
                                                        <h3><a
                                                                href="{{ route('front.service_lists', ['slug' => $service->slug, 'id' => $service->id]) }}">{{ $service->title }}</a>
                                                        </h3>
                                                    @else
                                                        <h3><a href="#">{{ $service->title }}</a></h3>
                                                    @endif
                                                </div>
                                                <div class="featured-desc">
                                                    <p>{{ $service->summary }}</p>
                                                </div>
                                            </div>
                                        </div><!-- featured-icon-box end-->
                                    </div>
                                @endif
                            @endforeach

                            {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                                    <!--featured-icon-box-->
                                    <div class="featured-icon-box icon-align-before-content style4">
                                        <div class="featured-icon">
                                            <div
                                                class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-size-xl cmt-icon_element-color-skincolor">
                                                <i class="flaticon-cyber-security"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <span class="number"></span>
                                            <div class="featured-title">
                                                <h3><a href="experience-design.html">Effective data</a></h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>A safe and structured is keys</p>
                                            </div>
                                        </div>
                                    </div><!-- featured-icon-box end-->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <!--featured-icon-box-->
                                    <div class="featured-icon-box icon-align-before-content style4">
                                        <div class="featured-icon">
                                            <div
                                                class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-size-xl cmt-icon_element-color-skincolor">
                                                <i class="flaticon-server"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <span class="number"></span>
                                            <div class="featured-title">
                                                <h3><a href="digital-services.html">IT Threat Security</a></h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Take safety to the next level.</p>
                                            </div>
                                        </div>
                                    </div><!-- featured-icon-box end-->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <!--featured-icon-box-->
                                    <div class="featured-icon-box icon-align-before-content style4">
                                        <div class="featured-icon">
                                            <div
                                                class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-size-xl cmt-icon_element-color-skincolor">
                                                <i class="flaticon-award"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <span class="number"></span>
                                            <div class="featured-title">
                                                <h3><a href="data-structuring.html">Cloud Services</a></h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Our scalable cloud migration</p>
                                            </div>
                                        </div>
                                    </div><!-- featured-icon-box end-->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <!--featured-icon-box-->
                                    <div class="featured-icon-box icon-align-before-content style4">
                                        <div class="featured-icon">
                                            <div
                                                class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-size-xl cmt-icon_element-color-skincolor">
                                                <i class="flaticon-mission"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <span class="number"></span>
                                            <div class="featured-title">
                                                <h3><a href="advisory-services.html">E-Commerce</a></h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Direct to consumer commerce</p>
                                            </div>
                                        </div>
                                    </div><!-- featured-icon-box end-->
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <!--featured-icon-box-->
                                    <div class="featured-icon-box icon-align-before-content style4 active">
                                        <div class="featured-icon">
                                            <div
                                                class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-size-xl cmt-icon_element-color-skincolor">
                                                <i class="flaticon-world"></i>
                                            </div>
                                        </div>
                                        <div class="featured-content">
                                            <span class="number"></span>
                                            <div class="featured-title">
                                                <h3><a href="content-engineering.html">Digital Security</a></h3>
                                            </div>
                                            <div class="featured-desc">
                                                <p>Create resilient cyber security</p>
                                            </div>
                                        </div>
                                    </div><!-- featured-icon-box end-->
                                </div> --}}
                        </div>
                        <!-- row end -->
                    @endif
                </div>
            </section>
        @endif



        <section class="cmt-row bg-base-dark cmt-bg cmt-bgimage-yes bg-img5 clearfix">
            <div class="cmt-row-wrapper-bg-layer cmt-bg-layer bg-base-dark"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title style2 res-991-mb_20">
                            <div class="title-header">
                                <h3>Our company</h3>
                                <h2 class="title">How can we help you?</h2>
                            </div>
                            <div class="title-desc">
                                <p>Every IT team is different, based on the culture & needs of its company, the experience &
                                    skills of the team members. Types of systems on which they are working. Here's the
                                    Devfox's work force</p>
                            </div>
                        </div><!-- section title end -->
                        <div class="pb-60 res-991-p-0"></div>
                    </div>
                </div>
            </div>
        </section>


        <section class="cmt-row padding_zero-section clearfix">
            <div class="container">
                <div class="row mt_160 res-991-mt-40">
                    @if (isset($our_help) && $our_help != null)
                        @foreach ($our_help as $help)
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <!--featured-imagebox-services-->
                                <div class="featured-imagebox featured-imagebox-services style1">
                                    <!-- featured-thumbnail -->
                                    <div class="featured-thumbnail">
                                        <a href="it-consultancy.html"><img width="740" height="500"
                                                class="img-fluid auto_size"
                                                src="{{ asset('/uploads/our_help/' . $help->image) }}" alt="image"></a>
                                    </div><!-- featured-thumbnail end-->
                                    <div class="featured-content">
                                        <div class="ser_category">{{ $help->sub_title }}</div>
                                        <div class="featured-title">
                                            <h3>{{ $help->title }}</h3>
                                        </div>
                                        <div class="ser_num"></div>
                                        <div class="ser_readmore"><a href="it-consultancy.html"
                                                class="cmt-btn cmt-btn-size-md cmt-icon-btn-right cmt-btn-color-skincolor btn-inline">Discover
                                                Now<i class="icon-right"></i></a></div>
                                    </div>
                                </div><!-- featured-imagebox-services end-->
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="mt-25 text-center text-base-dark">Stop wasting time and money on technology. <a
                                href="{{ route('front.about_us') }}"
                                class="cmt-btn cmt-btn-size-md cmt-btn-color-skincolor btn-inline btn-underline">Explore
                                our company</a></div>
                    </div>
                </div>
            </div>
        </section>


        <!--step-section-->
        @if (isset($how_it_works) && sizeof($how_it_works) > 0)
            <section class="cmt-row step-section clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section title -->
                            <div class="section-title title-style-center_text">
                                <div class="title-header">
                                    <h3>how it works</h3>
                                    <h2 class="title">Start your new skill in easy steps</h2>
                                </div>
                            </div><!-- section title end -->
                        </div>
                    </div>
                    <div class="row row-equal-height mb_12">
                        @foreach ($how_it_works as $work)
                            <div class="col-lg-3 col-md-6 col-sm-6">
                                <!-- featured-icon-box -->
                                <div class="featured-icon-box icon-align-top-content style2">
                                    <div class="featured-icon">
                                        <div
                                            class="cmt-icon cmt-icon_element-fill cmt-icon_element-style-rounded cmt-icon_element-color-white cmt-icon_element-size-lg">
                                            <div class="cmt-num"><span class="number"></span></div>
                                        </div>
                                    </div>
                                    <div class="featured-content">
                                        <div class="featured-title">
                                            <h3>{{ $work->title }}</h3>
                                        </div>
                                        <div class="featured-desc">
                                            <p>{{ $work->summary }}</p>
                                        </div>
                                        <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-skincolor"
                                            href="contact-us.html">view more<i class="icon-right"></i></a>
                                    </div>
                                </div><!-- featured-icon-box end-->
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!--padding_top_zero-section end-->

        <!--padding_bottom_zero-section -->
        <section class="cmt-row padding_top_zero-section clearfix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <!-- col-img-img-two -->
                        <div class="cmt-bg cmt-col-bgimage-yes col-bg-img-two pt-60 res-991-pt-0">
                            <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                            <div class="layer-content">
                                <div class="slick_slider"
                                    data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "arrows":false, "autoplay":true, "dots":false, "infinite":true, "responsive":[{"breakpoint":992,"settings":{"slidesToShow": 1}},{"breakpoint":840,"settings":{"slidesToShow": 1}}]}'>
                                    <!-- testimonials -->
                                    <div class="testimonials cmt-testimonial-box-view-style1">
                                        <div class="testimonial-content">
                                            <div class="testimonial-quote-icon">
                                                <i class="icon-quote-right-alt"></i>
                                            </div>
                                            <blockquote class="testimonial-text">We are still not sure how we got here, but
                                                we’re excited about where we’re going. Their innovators & engineer makes
                                                things easy and in a timely matter.</blockquote>
                                            <div class="testimonial-caption">
                                                <h3>Victor Wilson</h3>
                                                <label>Web Developer</label>
                                            </div>
                                        </div>
                                    </div><!-- testimonials end -->
                                    <!-- testimonials -->
                                    <div class="testimonials cmt-testimonial-box-view-style1">
                                        <div class="testimonial-content">
                                            <div class="testimonial-quote-icon">
                                                <i class="icon-quote-right-alt"></i>
                                            </div>
                                            <blockquote class="testimonial-text">An excellent and hard working. Thanks to
                                                them, we were able to achieve our goal on time, and we look forward to
                                                continue working with them in the future.</blockquote>
                                            <div class="testimonial-caption">
                                                <h3>Aenna Bell</h3>
                                                <label>IT Manager</label>
                                            </div>
                                        </div>
                                    </div><!-- testimonials end -->
                                    <!-- testimonials -->
                                    <div class="testimonials cmt-testimonial-box-view-style1">
                                        <div class="testimonial-content">
                                            <div class="testimonial-quote-icon">
                                                <i class="icon-quote-right-alt"></i>
                                            </div>
                                            <blockquote class="testimonial-text">An excellent and hard working. Thanks to
                                                them, we were able to achieve our goal on time, and we look forward to
                                                continue working with them in the future.</blockquote>
                                            <div class="testimonial-caption">
                                                <h3>Er. john Martin</h3>
                                                <label>WordPress Expert</label>
                                            </div>
                                        </div>
                                    </div><!-- testimonials end -->
                                </div>
                                <div class="cmt-horizontal_sep width-100 mt-40 mb-70 res-991-mt-15 res-991-mb-35"></div>
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
                                            href="contact-us.html"><i class="icon-right"></i><span>see more
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
