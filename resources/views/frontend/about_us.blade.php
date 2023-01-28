@extends('frontend.layouts.master')
@section('title', 'Sysmeet | About us')
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
                            <h2 class="title">about us</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="index.html">Home</a>
                            </span>
                            <span>about us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->


    <!--site-main start-->
    <div class="site-main">
        @if (isset($about_us) && $about_us != null)
            <section class="cmt-row about-section clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row align-items-center">
                        <div class="col-xl-6 col-md-12 col-sm-12">
                            <div class="ttm_single_image-wrapper d-table border-rad_5 overflow-hidden">
                                <img width="1140" height="1300" class="img-fluid"
                                    src="{{ asset('/uploads/about_us/' . $about_us->image) }}" alt="about_us_image">
                            </div>
                            {{-- <div
                            class="d-table bg-base-skin text-base-white position-relative mt_20 ml-30 pl-30 pr-30 pt-10 pb-10 border-rad_6">
                            <div class="fs-16 lh-sm"><strong>410+</strong> Total Projects Complete</div>
                        </div> --}}
                        </div>
                        <div class="col-xl-6">
                            <div class="pl-20 res-1199-pt-40 mb-20 res-1199-mb-0 res-1199-pl-0">
                                <!-- section title -->
                                <div class="section-title">
                                    <div class="title-header">
                                        <h3>About us</h3>
                                        <h2 class="title">{{ $about_us->title }}</h2>
                                    </div>
                                    <div class="title-desc">
                                        <p>{!! html_entity_decode($about_us->description) !!}</p>
                                    </div>
                                </div><!-- section title end -->
                                {{-- <div class="d-sm-flex pt-15 pb-40">
                                    <div class="d-flex res-575-mb-30">
                                        <div class="pl-10 bg-base-skin"></div>
                                        <div class="bg-base-grey d-flex justify-content-center flex-column p-20">
                                            <h2 class="fs-20">We are giving worldclass services Since <span
                                                    class="text-base-skin">1987</span></h2>
                                        </div>
                                    </div>
                                    <div
                                        class="ttm_single_image-wrapper text-start flex-grow-0 flex-shrink-0 flex-basis-auto">
                                        <img width="520" height="240" class="img-fluid"
                                            src="https://via.placeholder.com/520x240?text=520x240+single-img-03.jpg"
                                            alt="single-03">
                                    </div>
                                </div> --}}
                                <a class="cmt-btn btn-default cmt-icon-btn-left cmt-btn-size-md cmt-btn-color-dark"
                                    href="project-style-01.html"><i class="icon-right"></i><span>contact us</span></a>
                            </div>
                        </div>
                    </div><!-- row end -->
                </div>
            </section>
        @endif

        @if (isset($why_choose_us) && $why_choose_us != null)
            <section class="cmt-row padding_bottom_zero-section clearfix">
                <div class="container">
                    <div class="row g-0">
                        <div class="col-lg-12">
                            <div class="row g-0">
                                <div class="col-lg-7 col-md-12">
                                    <div
                                        class="cmt-bg cmt-col-bgcolor-yes bg-base-dark cmt-bg cmt-left-span spacing-2 res-1199-pl-15">
                                        <div class="cmt-col-wrapper-bg-layer cmt-bg-layer bg-base-dark">
                                            <div class="cmt-col-wrapper-bg-layer-inner"></div>
                                        </div>
                                        <div class="layer-content">
                                            <!-- section title -->
                                            <div class="section-title">
                                                <div class="title-header">
                                                    <h3>why choose us</h3>
                                                    <h2 class="title">{{ $why_choose_us->title }}
                                                    </h2>
                                                </div>
                                            </div><!-- section title end -->
                                            @if (isset($services_choose) && sizeof($services_choose))
                                                <div class="pt-5">
                                                    <!-- featured-icon-box -->
                                                    @foreach ($services_choose as $service)
                                                        <div
                                                            class="featured-icon-box icon-align-before-content icon-ver_align-top style3 pb-5">
                                                            <div class="featured-icon">
                                                                <div
                                                                    class="cmt-icon cmt-icon_element-fill cmt-icon_element-style-rounded cmt-icon_element-color-skincolor cmt-icon_element-size-xs">
                                                                    <i class="number"></i>
                                                                </div>
                                                            </div>
                                                            <div class="featured-content">
                                                                <div class="featured-title">
                                                                    <h3>{{ $service->title }}</h3>
                                                                </div>
                                                                <div class="featured-desc">
                                                                    <p>{{ $service->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    @endforeach
                                                    <!-- featured-icon-box end -->
                                                    <!-- featured-icon-box -->
                                                    {{-- <div
                                                        class="featured-icon-box icon-align-before-content icon-ver_align-top style3 mb-0">
                                                        <div class="featured-icon">
                                                            <div
                                                                class="cmt-icon cmt-icon_element-fill cmt-icon_element-style-rounded  cmt-icon_element-color-skincolor cmt-icon_element-size-xs">
                                                                <i class="number"></i>
                                                            </div>
                                                        </div>
                                                        <div class="featured-content">
                                                            <div class="featured-title">
                                                                <h3>Core Networking Services</h3>
                                                            </div>
                                                            <div class="featured-desc">
                                                                <p>Networking and structured cabling services, firewall,
                                                                    VPN,
                                                                    router, switch and wireless configuration for
                                                                    residences.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <!-- featured-icon-box end -->
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-12">
                                    <!-- col-img-img-one -->
                                    <div class="cmt-bg cmt-col-bgimage-yes col-bg-img-one cmt-right-span z-index-2 mr_200 res-991-mr-0"
                                        style="background-image: url('{{ asset('/uploads/why_choose_us/' . $why_choose_us->image) }}')">
                                        <div class="cmt-col-wrapper-bg-layer cmt-bg-layer"></div>
                                        <div class="layer-content">
                                        </div>
                                    </div><!-- col-img-bg-img-one end-->
                                    <img class="img-fluid cmt-equal-height-image w-100"
                                        src="{{ asset('/uploads/why_choose_us/' . $why_choose_us->image) }}" alt="bg-image">
                                </div>
                            </div><!-- row end -->
                        </div>
                    </div>
                </div>
            </section>
        @endif


        {{-- <section class="cmt-row padding_zero-section bg-layer-equal-height clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div
                            class="d-table bg-base-white p-50 pt-45 pb-45 res-991-p-30 border-rad_5 z-index-2 position-relative box-shadow mt_130 res-991-mt-30">
                            <div class="d-md-flex cmt-vertical_sep align-items-center">
                                <div class="pr-20 mr-20 border-end res-575-pr-0 res-575-mr-0">
                                    <h2 class="fs-22 mb-0">Delivering business solutions for the<span
                                            class="text-base-skin"><i> web and mobile</i> </span>world Bring your ideas to
                                        life</h2>
                                </div>
                                <div
                                    class="d-flex align-items-center pl-20 res-767-pl-0 res-767-mt-30 flex-grow-0 flex-shrink-0 flex-basis-auto">
                                    <div class="cmt-play-icon-btn animated">
                                        <div class="cmt-play-icon-animation">
                                            <a href="https://youtu.be/7e90gBu4pas" target="_self" class="cmt_prettyphoto">
                                                <div
                                                    class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-skincolor cmt-icon_element-size-md cmt-icon_element-style-rounded">
                                                    <i class="fas fa-play"></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="pl-30">
                                        <h3 class="fs-20 mb-0">Watch the Video</h3>
                                        <p class="mb-0">Sed do eiusmod tempor</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}


        <!--padding_bottom_zero-section -->
        <section class="cmt-row padding_zero-section clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- col-img-img-two -->
                        <div class="cmt-bg cmt-col-bgimage-yes col-bg-img-two spacing-3">
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
                                            <blockquote class="testimonial-text">We are still not sure how we got here, but
                                                we’re excited about where we’re going. Their innovators & engineer makes
                                                things easy. I'm referring them to my others partners</blockquote>
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
                                            <blockquote class="testimonial-text">Our team discussed every single detail to
                                                make sure Creatives Planet is the most versatile and unique theme created so
                                                far. I recommend DevFox to others</blockquote>
                                            <div class="testimonial-caption">
                                                <h3>Er. john Martin</h3>
                                                <label>WordPress Expert</label>
                                            </div>
                                        </div>
                                    </div><!-- testimonials end -->
                                </div>
                                <div class="cmt-horizontal_sep width-100 mt-40"></div>
                            </div>
                        </div><!-- col-img-bg-img-two end-->
                    </div>
                </div>
            </div>
        </section>
        <!--padding_bottom_zero-section end -->

        <!--partner-section-->
        @if (isset($our_partners) && sizeof($our_partners) > 0)
            <section class="cmt-row partner-section bg-img4 clearfix">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-12">
                            <div class="d-sm-flex align-items-center justify-content-between border-bottom res-991-mt-40">
                                <h3 class="fs-26 mb-20">Our Partners</h3>
                            </div>
                            <!-- slick_slider -->
                            <div class="slick_slider"
                                data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "arrows":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":1200,"settings":{"slidesToShow": 5}}, {"breakpoint":1024,"settings":{"slidesToShow": 4}}, {"breakpoint":777,"settings":{"slidesToShow": 3}},{"breakpoint":575,"settings":{"slidesToShow": 2}},{"breakpoint":380,"settings":{"slidesToShow": 1}}]}'>
                                @foreach ($our_partners as $partner)
                                    <div class="client-box">
                                        <div class="cmt-client-logo-tooltip">
                                            <div class="cmt-client-logo-tooltip-inner">
                                                <div class="client-thumbnail">
                                                    <img width="152" height="60" class="img-fluid"
                                                        src="{{ asset('/uploads/our_partner/' . $partner->image) }}"
                                                        alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="client-box">
                         <div class="cmt-client-logo-tooltip">
                             <div class="cmt-client-logo-tooltip-inner">
                                 <div class="client-thumbnail">
                                     <img width="128" height="60" class="img-fluid"
                                         src="https://via.placeholder.com/128x60?text=128x60+client-02.png"
                                         alt="image">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="client-box">
                         <div class="cmt-client-logo-tooltip">
                             <div class="cmt-client-logo-tooltip-inner">
                                 <div class="client-thumbnail">
                                     <img width="142" height="60" class="img-fluid"
                                         src="https://via.placeholder.com/142x60?text=142x60+client-03.png"
                                         alt="image">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="client-box">
                         <div class="cmt-client-logo-tooltip">
                             <div class="cmt-client-logo-tooltip-inner">
                                 <div class="client-thumbnail">
                                     <img width="182" height="61" class="img-fluid"
                                         src="https://via.placeholder.com/182x61?text=182x61+client-04.png"
                                         alt="image">
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="client-box">
                         <div class="cmt-client-logo-tooltip">
                             <div class="cmt-client-logo-tooltip-inner">
                                 <div class="client-thumbnail">
                                     <img width="142" height="60" class="img-fluid"
                                         src="https://via.placeholder.com/142x60?text=142x60+client-03.png"
                                         alt="image">
                                 </div>
                             </div>
                         </div>
                     </div> --}}
                            </div><!-- cmt-client end -->
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!--partner-section end-->
    </div>
    <!--site-main end-->
@endsection
