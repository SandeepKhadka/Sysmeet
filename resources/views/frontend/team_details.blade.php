@extends('frontend.layouts.master')
@section('title', 'Sysmeet')
{{-- @section('banner')
    @include('frontend.layouts.banner')
@endsection --}}

@section('main-content')
    @if (isset($member) && $member != null)
        <!-- page-title -->
        <div class="cmt-page-title-row bg-base-dark cmt-bg cmt-bgimage-yes clearfix">
            <div class="cmt-titlebar-wrapper-bg-layer cmt-bg-layer"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="cmt-page-title-row-inner">
                            <div class="page-title-heading">
                                <h2 class="title">{{ $member->first_name . ' ' . $member->last_name }}</h2>
                            </div>
                            <div class="breadcrumb-wrapper">
                                <span>
                                    <a title="Homepage" href="index.html">Home</a>
                                </span>
                                <span>team details</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-title end -->


        <!--site-main start-->
        <div class="site-main">

            <section class="cmt-row clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cmt-team-member-single-content">
                                <div class="cmt-team-member-single-content-area">
                                    <div
                                        class="cmt-bg cmt-col-bgcolor-yes bg-base-grey border-rad_10 spacing-5 overflow-visible">
                                        <div class="cmt-col-wrapper-bg-layer cmt-bg-layer border-rad_10"></div>
                                        <div class="layer-content">
                                            <div class="row g-0">
                                                <div class="col-lg-5">
                                                    <!-- cmt-featured-wrapper -->
                                                    <div class="cmt-featured-wrapper">
                                                        <div
                                                            class="featured-thumbnail mt_100 ml_100 res-991-mt-0 res-991-ml-0">
                                                            <img width="535" height="500" class="img-fluid"
                                                                src="{{ asset('/uploads/member_details/' . $member->photo) }}"
                                                                alt="image">
                                                        </div>
                                                    </div><!-- cmt-featured-wrapper end-->
                                                </div>
                                                <div class="col-lg-7">
                                                    <div class="cmt-team-member-detail">
                                                        <div class="cmt-team-member-single-list">
                                                            <h2 class="cmt-team-member-single-title">{{ $member->first_name . ' ' . $member->last_name }}</h2>
                                                            <h5 class="cmt-team-member-single-position">{{ $member->role }}
                                                            </h5>
                                                            <div class="cmt-short-desc">{{ $member->member_desc }}</div>
                                                            <div class="cmt-team-data">
                                                                <div class="cmt-team-details-wrapper">
                                                                    <ul class="cmt-team-details-list clearfix">
                                                                        <li>
                                                                            <div
                                                                                class="cmt-team-list-title cmt-textcolor-darkgrey">
                                                                                Experience :</div>
                                                                            <div class="cmt-team-list-value">{{ $member->experience }}</div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="cmt-team-list-title cmt-textcolor-darkgrey">
                                                                                Responsibility :</div>
                                                                            <div class="cmt-team-list-value"> {{ $member->responsibility }}
                                                                            </div>
                                                                        </li>
                                                                        {{-- <li>
                                                                            <div
                                                                                class="cmt-team-list-title cmt-textcolor-darkgrey">
                                                                                Fax :</div>
                                                                            <div class="cmt-team-list-value">+1 (234) 567 89
                                                                                00
                                                                            </div>
                                                                        </li> --}}
                                                                        <li>
                                                                            <div
                                                                                class="cmt-team-list-title cmt-textcolor-darkgrey">
                                                                                Phone :</div>
                                                                            <div class="cmt-team-list-value"><a
                                                                                    href="tel:+1(234)5678900">{{ $member->phone }}</a></div>
                                                                        </li>
                                                                        <li>
                                                                            <div
                                                                                class="cmt-team-list-title cmt-textcolor-darkgrey">
                                                                                Email :</div>
                                                                            <div class="cmt-team-list-value"><a
                                                                                    href="mailto:support@Cymolthemes.com">{{ $member->email }}</a>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="cmt-social-links-wrapper">
                                                                <ul class="social-icons circle">
                                                                    <li class="social-facebook">
                                                                        <a target="_blank"
                                                                            href="{{ $member->facebook_link }}"><i
                                                                                class="ti ti-facebook"
                                                                                aria-hidden="true"></i></a>
                                                                    </li>
                                                                    <li class="social-twitter">
                                                                        <a target="_blank"
                                                                            href="{{ $member->twitter_link }}"><i
                                                                                class="ti ti-twitter-alt"
                                                                                aria-hidden="true"></i></a>
                                                                    </li>
                                                                    <li class="social-pinterest">
                                                                        <a target="_blank"
                                                                            href="{{ $member->pinterest_link }}"><i
                                                                                class="ti ti-pinterest-alt"
                                                                                aria-hidden="true"></i></a>
                                                                    </li>
                                                                    <li class="social-instagram">
                                                                        <a target="_blank"
                                                                            href="{{ $member->instagram_link }}"><i
                                                                                class="ti ti-instagram"
                                                                                aria-hidden="true"></i></a>
                                                                    </li>
                                                                    <li class="social-linkedin">
                                                                        <a target="_blank"
                                                                            href="{{ $member->linkedin_link }}"><i
                                                                                class="ti ti-linkedin"
                                                                                aria-hidden="true"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cmt-team-member-content">
                                    <h3>Biography</h3>
                                    <p>{!! html_entity_decode($member->biography) !!}</p>
                                    <div class="row pt-20">
                                        <div class="col-lg-12">
                                            <h3>Professional Skills</h3>
                                        </div>
                                        <div class="col-lg-9">
                                            <p>{!! html_entity_decode($member->prof_skill) !!}</p>
                                            {{-- <div class="row">
                                                <div class="col-lg-4">
                                                    <!-- cmt-fid -->
                                                    <div
                                                        class="cmt-fid inside cmt-fid-view-circle-progress cmt-fid-with-border">
                                                        <div class="cmt-fid-contents">
                                                            <div class="cmt-circle-box" data-digit="85" data-fill="#ff382f"
                                                                data-before="" data-before-type="sup" data-after="%"
                                                                data-after-type="span" data-size="65" data-emptyfill="#fff"
                                                                data-thickness="3" data-linecap="round" data-gradient="">
                                                                <div class="cmt-circle-content">
                                                                    <div class="cmt-circle"></div>
                                                                    <div class="cmt-circle-boxcontent">
                                                                        <div class="cmt-fid-number cmt-textcolor-darkgrey">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h3 class="cmt-fid-title">Communication</h3>
                                                            <div class="cmt-fid-desc">A communtion skills for convey of work
                                                            </div>
                                                        </div>
                                                    </div><!-- cmt-fid end -->
                                                </div>
                                                <div class="col-lg-4">
                                                    <!-- cmt-fid-->
                                                    <div
                                                        class="cmt-fid inside cmt-fid-view-circle-progress cmt-fid-with-border">
                                                        <div class="cmt-fid-contents">
                                                            <div class="cmt-circle-box" data-digit="95"
                                                                data-fill="#ff382f" data-before="" data-before-type="sup"
                                                                data-after="%" data-after-type="span" data-size="65"
                                                                data-emptyfill="#fff" data-thickness="3"
                                                                data-gradient="">
                                                                <div class="cmt-circle-content">
                                                                    <div class="cmt-circle">
                                                                        <div class="cmt-circle-boxcontent">
                                                                            <div
                                                                                class="cmt-fid-number cmt-textcolor-darkgrey">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h3 class="cmt-fid-title">Consulting</h3>
                                                            <div class="cmt-fid-desc">A consultancy skills for the best
                                                                outwork
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- cmt-fid end -->
                                                </div>
                                                <div class="col-lg-4">
                                                    <!-- cmt-fid-->
                                                    <div
                                                        class="cmt-fid inside cmt-fid-view-circle-progress cmt-fid-with-border">
                                                        <div class="cmt-fid-contents">
                                                            <div class="cmt-circle-box" data-digit="65"
                                                                data-fill="#ff382f" data-before="" data-before-type="sup"
                                                                data-after="%" data-after-type="span" data-size="65"
                                                                data-emptyfill="#fff" data-thickness="3"
                                                                data-gradient="">
                                                                <div class="cmt-circle-content">
                                                                    <div class="cmt-circle">
                                                                        <div class="cmt-circle-boxcontent">
                                                                            <div
                                                                                class="cmt-fid-number cmt-textcolor-darkgrey">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <h3 class="cmt-fid-title">Management</h3>
                                                            <div class="cmt-fid-desc">The ability skills for management
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- cmt-fid end -->
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="col-lg-3 mb-12 mt-12">
                                            <!-- col-bg-img-four -->
                                            <div
                                                class="col-bg-img-four cmt-bg cmt-col-bgimage-yes border-rad_10 overflow-hidden bg-base-dark text-base-white pt-30 pb-30 h-100">
                                                <div class="cmt-col-wrapper-bg-layer cmt-bg-layer">
                                                    <div class="cmt-col-wrapper-bg-layer-inner"></div>
                                                </div>
                                                <div
                                                    class="layer-content d-flex flex-column align-items-center justify-content-center">
                                                    <div
                                                        class="cmt-icon cmt-icon_element-fill cmt-icon_element-style-rounded cmt-icon_element-color-white cmt-icon_element-size-md">
                                                        <i class="flaticon-phone-call"></i>
                                                    </div>
                                                    <h2 class="fs-24">Contact Info:</h2>
                                                    <p><strong>Phone: </strong>{{$member->phone}}</p>
                                                    <span class="cmt-dess"><strong>Email: </strong><a
                                                            href="#">{{$member->email}}</a></span>
                                                </div>
                                            </div>
                                            <!-- col-bg-img-four end -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!--site-main end-->
    @endif
@endsection
