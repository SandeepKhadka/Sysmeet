@extends('frontend.layouts.master')
@section('title', 'Sysmeet | Contact')
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
                            <h2 class="title">Contact Us</h2>
                        </div>
                        <div class="breadcrumb-wrapper">
                            <span>
                                <a title="Homepage" href="index.html">Home</a>
                            </span>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title end -->

    @if (isset($contact) && $contact != null)
        <!--site-main start-->
        <div class="site-main">
            <section class="cmt-row conatct-section bg-img6 clearfix">
                <div class="container">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- section-title -->
                            <div class="section-title title-style-center_text">
                                <div class="title-header">
                                    <h3>Let us Know How We can Help You</h3>
                                    <h2 class="title">Drop us a line and let’s talk.</h2>
                                </div>
                            </div><!-- section-title end -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <!-- featured-icon-box -->
                            <div
                                class="featured-icon-box icon-align-before-content p-25 bg-base-white border border-color border-rad_5">
                                <div class="featured-icon">
                                    <div
                                        class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-darkgrey cmt-icon_element-size-sm cmt-icon_element-style-round">
                                        <i class="flaticon flaticon-phone-call"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h2 class="fs-15 fw-normal bodyfont-color mb-5">Phone Number</h2>
                                        <h3 class="fs-24 text-base-skin mb-0">{{ $contact->phone }}</h3>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- featured-icon-box -->
                            <div
                                class="featured-icon-box icon-align-before-content p-25 bg-base-white border border-color border-rad_6">
                                <div class="featured-icon">
                                    <div
                                        class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-darkgrey cmt-icon_element-size-sm cmt-icon_element-style-round">
                                        <i class="flaticon flaticon-envelope"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h2 class="fs-15 fw-normal bodyfont-color mb-0">Any Quetions? Email us</h2>
                                        <h3 class="fs-15 fw-500 mb-0">{{ $contact->email }}</h3>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end -->
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <!-- featured-icon-box -->
                            <div
                                class="featured-icon-box icon-align-before-content p-25 bg-base-white border border-color border-rad_6">
                                <div class="featured-icon">
                                    <div
                                        class="cmt-icon cmt-icon_element-fill cmt-icon_element-color-darkgrey cmt-icon_element-size-sm cmt-icon_element-style-round">
                                        <i class="flaticon flaticon-pin"></i>
                                    </div>
                                </div>
                                <div class="featured-content">
                                    <div class="featured-title">
                                        <h2 class="fs-15 fw-500 mb-0">
                                            {{ $contact->city . ', ' . $contact->street . ', ' . $contact->state . ' ' . $contact->country }}
                                        </h2>
                                    </div>
                                </div>
                            </div><!-- featured-icon-box end -->
                        </div>
                    </div>
                </div>
            </section>

            <section class="cmt-row padding_top_zero-section bg-layer-equal-height clearfix">
                <div class="container">
                    <!-- row end -->
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div
                                class="cmt-bg cmt-col-bgcolor-yes bg-base-dark cmt-bg border-rad_5 overflow-hidden spacing-6">
                                <div class="cmt-col-wrapper-bg-layer cmt-bg-layer bg-base-dark">
                                    <div class="cmt-col-wrapper-bg-layer-inner"></div>
                                </div>
                                <div class="layer-content">
                                    <!-- section title -->
                                    <div class="section-title">
                                        <div class="title-header">
                                            <h3>Need Some Advice?</h3>
                                            <h2 class="title">Feel free to contact Devfox!</h2>
                                        </div>
                                        <div class="title-desc">
                                            <p>{{ $contact->why_contact_us }}</p>
                                        </div>
                                    </div><!-- section title end -->
                                    <div class="g-map mt-30" id="map">
                                        <iframe
                                            src="https://maps.google.com/maps?q={{ ucfirst($contact->city) }}%20Sysmeet%2C%20{{ ucfirst($contact->city) }}%2C%20{{ ucfirst($contact->country) }}&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"
                                            {{-- src="{{"https://maps.google.com/maps?q=" . $contact->location. "&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"}}" --}} title="{{ $contact->location }}"
                                            aria-label="{{ $contact->city . ', ' . $contact->street . ', ' . $contact->state . ' ' . $contact->country }}"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="pl-10 res-991-pl-0 res-991-pt-40">
                                <!-- section title -->
                                <div class="section-title">
                                    <div class="title-header">
                                        <h3>Need Some Advice?</h3>
                                        <h2 class="title">Contact Us To Learn More.</h2>
                                    </div>
                                </div><!-- section title end -->
                                <form action="#" class="query_form wrap-form clearfix" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>
                                                <span class="text-input"><input name="name" type="text" value=""
                                                        placeholder="First Name" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <span class="text-input"><input name="name" type="text" value=""
                                                        placeholder="Last Name" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <span class="text-input"><input name="email" type="text" value=""
                                                        placeholder="Email Address" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <span class="text-input"><input name="phone" type="text" value=""
                                                        placeholder="Phone" required="required"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label>
                                                <span class="text-input select-option">
                                                    <select name="menu-232">
                                                        <option value="Experience Design">Experience Design</option>
                                                        <option value="IT Consultancy">IT Consultancy</option>
                                                    </select>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <label>
                                                <span class="text-input">
                                                    <textarea name="message" rows="4" placeholder="Message goes here" required="required"></textarea>
                                                </span>
                                            </label>
                                        </div>
                                        <div class="col-md-12">
                                            <button
                                                class="submit cmt-btn btn-default cmt-icon-btn-left cmt-btn-size-md cmt-btn-color-dark mt-5"
                                                type="submit"><i class="icon-right"></i><span>Send
                                                    Message</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    @endif
    <!--site-main end-->

@endsection
