@extends('frontend.layouts.master')
@section('title', 'Sysmeet | Our Team')
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
                            <h2 class="title">Our Team</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="index.html">Home</a>
                            </span>
                            <span>Our Team</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    <!--site-main start-->
    <div class="site-main">
        <!--padding_bottom_zero-section-->
        <section class="cmt-row padding_bottom_zero-section clearfix">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <!-- section title -->
                        <div class="section-title style2">
                            <div class="title-header">
                                <h3>Meet Our Team</h3>
                                <h2 class="title">Our powerful team members</h2>
                            </div>
                            @if (isset($team_motto) && $team_motto != null)
                                <div class="title-desc">
                                    <p>{{ $team_motto->team_motto }}</p>
                                </div>
                            @endif
                        </div><!-- section title end -->
                    </div>
                </div>
                @if (isset($member_details) && sizeof($member_details) > 0)
                    <div class="row mb_15">
                        @foreach ($member_details as $member)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <!-- featured-imagebox-team -->
                                <div class="featured-imagebox featured-imagebox-team style1">
                                    <div class="featured-thumbnail">
                                        <img width="535" height="500" class="img-fluid"
                                            src="{{ asset('/uploads/member_details/' . $member->photo) }}"
                                            alt="member image">
                                    </div>
                                    <div class="featured-content">
                                        <div class="team-position">{{ $member->role }}</div>
                                        <div class="featured-title">
                                            <h3><a
                                                    href="team-details.html">{{ $member->first_name . ' ' . $member->last_name }}</a>
                                            </h3>
                                        </div>
                                        <div class="featured-view-more">
                                            <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor"
                                                href="{{route('front.team_details', $member->slug)}}">more details</a>
                                        </div>
                                        <div class="featured-iconbox cmt-media-link">
                                            <div class="media-block">
                                                <div class="media-btn"><i class="icon-plus"></i></div>
                                                <ul class="social-icons list-inline">
                                                    <li class="social-facebook"><a href="{{ $member->facebook_link }}"
                                                            target="new"><i class="ti ti-facebook"></i></a></li>
                                                    <li class="social-twitter"><a href="{{ $member->twitter_link }}"
                                                            target="new"><i class="ti ti-twitter-alt"></i></a></li>
                                                    {{-- <li class="social-pinterest"><a href="{{ $member->pinterest_link }}" target="new"><i
                                                        class="ti ti-pinterest"></i></a></li> --}}
                                                    <li class="social-instagram"><a href="{{ $member->instagram_link }}"
                                                            target="new"><i class="ti ti-instagram"></i></a></li>
                                                    <li class="social-linkedin"><a href="{{ $member->linkedin_link }}"
                                                            target="new"><i class="ti ti-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- featured-imagebox-team end-->
                            </div>
                        @endforeach
                        {{-- <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- featured-imagebox-team -->
                            <div class="featured-imagebox featured-imagebox-team style1">
                                <div class="featured-thumbnail">
                                    <img width="535" height="500" class="img-fluid"
                                        src="https://via.placeholder.com/535x500?text=535x500+team-img02.jpg"
                                        alt="image">
                                </div>
                                <div class="featured-content">
                                    <div class="team-position">Web Designer</div>
                                    <div class="featured-title">
                                        <h3><a href="team-details.html">Ivan Hindshaw</a></h3>
                                    </div>
                                    <div class="featured-view-more">
                                        <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor"
                                            href="team-details.html">more details</a>
                                    </div>
                                    <div class="featured-iconbox cmt-media-link">
                                        <div class="media-block">
                                            <div class="media-btn"><i class="icon-plus"></i></div>
                                            <ul class="social-icons list-inline">
                                                <li class="social-facebook"><a
                                                        href="https://www.facebook.com/cymolthemes.191219"><i
                                                            class="ti ti-facebook"></i></a></li>
                                                <li class="social-twitter"><a href="https://twitter.com/CymolThemes"><i
                                                            class="ti ti-twitter-alt"></i></a></li>
                                                <li class="social-pinterest"><a
                                                        href="https://in.pinterest.com/cymolthemes/"><i
                                                            class="ti ti-pinterest"></i></a></li>
                                                <li class="social-instagram"><a
                                                        href="https://www.instagram.com/cymol_themes/"><i
                                                            class="ti ti-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox-team end-->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- featured-imagebox-team -->
                            <div class="featured-imagebox featured-imagebox-team style1">
                                <div class="featured-thumbnail">
                                    <img width="535" height="500" class="img-fluid"
                                        src="https://via.placeholder.com/535x500?text=535x500+team-img03.jpg"
                                        alt="image">
                                </div>
                                <div class="featured-content">
                                    <div class="team-position">Project Manager</div>
                                    <div class="featured-title">
                                        <h3><a href="team-details.html">Natalia Zox</a></h3>
                                    </div>
                                    <div class="featured-view-more">
                                        <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor"
                                            href="team-details.html">more details</a>
                                    </div>
                                    <div class="featured-iconbox cmt-media-link">
                                        <div class="media-block">
                                            <div class="media-btn"><i class="icon-plus"></i></div>
                                            <ul class="social-icons list-inline">
                                                <li class="social-facebook"><a
                                                        href="https://www.facebook.com/cymolthemes.191219"><i
                                                            class="ti ti-facebook"></i></a></li>
                                                <li class="social-twitter"><a href="https://twitter.com/CymolThemes"><i
                                                            class="ti ti-twitter-alt"></i></a></li>
                                                <li class="social-pinterest"><a
                                                        href="https://in.pinterest.com/cymolthemes/"><i
                                                            class="ti ti-pinterest"></i></a></li>
                                                <li class="social-instagram"><a
                                                        href="https://www.instagram.com/cymol_themes/"><i
                                                            class="ti ti-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox-team end-->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- featured-imagebox-team -->
                            <div class="featured-imagebox featured-imagebox-team style1">
                                <div class="featured-thumbnail">
                                    <img width="535" height="500" class="img-fluid"
                                        src="https://via.placeholder.com/535x500?text=535x500+team-img04.jpg"
                                        alt="image">
                                </div>
                                <div class="featured-content">
                                    <div class="team-position">Consultant Officer</div>
                                    <div class="featured-title">
                                        <h3><a href="team-details.html">Maria Gordian</a></h3>
                                    </div>
                                    <div class="featured-view-more">
                                        <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor"
                                            href="team-details.html">more details</a>
                                    </div>
                                    <div class="featured-iconbox cmt-media-link">
                                        <div class="media-block">
                                            <div class="media-btn"><i class="icon-plus"></i></div>
                                            <ul class="social-icons list-inline">
                                                <li class="social-facebook"><a
                                                        href="https://www.facebook.com/cymolthemes.191219"><i
                                                            class="ti ti-facebook"></i></a></li>
                                                <li class="social-twitter"><a href="https://twitter.com/CymolThemes"><i
                                                            class="ti ti-twitter-alt"></i></a></li>
                                                <li class="social-pinterest"><a
                                                        href="https://in.pinterest.com/cymolthemes/"><i
                                                            class="ti ti-pinterest"></i></a></li>
                                                <li class="social-instagram"><a
                                                        href="https://www.instagram.com/cymol_themes/"><i
                                                            class="ti ti-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox-team end-->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- featured-imagebox-team -->
                            <div class="featured-imagebox featured-imagebox-team style1">
                                <div class="featured-thumbnail">
                                    <img width="535" height="500" class="img-fluid"
                                        src="https://via.placeholder.com/535x500?text=535x500+team-img05.jpg"
                                        alt="image">
                                </div>
                                <div class="featured-content">
                                    <div class="team-position">Product Analyst</div>
                                    <div class="featured-title">
                                        <h3><a href="team-details.html">Anna Konikova</a></h3>
                                    </div>
                                    <div class="featured-view-more">
                                        <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor"
                                            href="team-details.html">more details</a>
                                    </div>
                                    <div class="featured-iconbox cmt-media-link">
                                        <div class="media-block">
                                            <div class="media-btn"><i class="icon-plus"></i></div>
                                            <ul class="social-icons list-inline">
                                                <li class="social-facebook"><a
                                                        href="https://www.facebook.com/cymolthemes.191219"><i
                                                            class="ti ti-facebook"></i></a></li>
                                                <li class="social-twitter"><a href="https://twitter.com/CymolThemes"><i
                                                            class="ti ti-twitter-alt"></i></a></li>
                                                <li class="social-pinterest"><a
                                                        href="https://in.pinterest.com/cymolthemes/"><i
                                                            class="ti ti-pinterest"></i></a></li>
                                                <li class="social-instagram"><a
                                                        href="https://www.instagram.com/cymol_themes/"><i
                                                            class="ti ti-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox-team end-->
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <!-- featured-imagebox-team -->
                            <div class="featured-imagebox featured-imagebox-team style1">
                                <div class="featured-thumbnail">
                                    <img width="535" height="500" class="img-fluid"
                                        src="https://via.placeholder.com/535x500?text=535x500+team-img06.jpg"
                                        alt="image">
                                </div>
                                <div class="featured-content">
                                    <div class="team-position">IT Associative</div>
                                    <div class="featured-title">
                                        <h3><a href="team-details.html">Sarah Rose</a></h3>
                                    </div>
                                    <div class="featured-view-more">
                                        <a class="cmt-btn btn-inline cmt-btn-size-md cmt-btn-color-skincolor"
                                            href="team-details.html">more details</a>
                                    </div>
                                    <div class="featured-iconbox cmt-media-link">
                                        <div class="media-block">
                                            <div class="media-btn"><i class="icon-plus"></i></div>
                                            <ul class="social-icons list-inline">
                                                <li class="social-facebook"><a
                                                        href="https://www.facebook.com/cymolthemes.191219"><i
                                                            class="ti ti-facebook"></i></a></li>
                                                <li class="social-twitter"><a href="https://twitter.com/CymolThemes"><i
                                                            class="ti ti-twitter-alt"></i></a></li>
                                                <li class="social-pinterest"><a
                                                        href="https://in.pinterest.com/cymolthemes/"><i
                                                            class="ti ti-pinterest"></i></a></li>
                                                <li class="social-instagram"><a
                                                        href="https://www.instagram.com/cymol_themes/"><i
                                                            class="ti ti-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- featured-imagebox-team end-->
                        </div> --}}
                    </div>
                @endif
                <!-- row end -->
            </div>
        </section>
        <br>
        {{-- <hr class="container"> --}}
        <!--padding_bottom_zero-section end-->

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
