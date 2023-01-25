 <!-- START decfoxSlider 1 REVOLUTION SLIDER 6.5.9 -->

 <p class="rs-p-wp-fix"></p>
 <rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery">
     <rs-module id="rev_slider_1_1" style="" data-version="6.5.9">
         <rs-slides>
             <rs-slide data-key="rs-1" data-title="Slide">
                 @if (isset($first_banner) && $first_banner != null)
                     <img src="{{ asset('/uploads/main_banner/' . $first_banner->image) }}" title="slider-img-01.jpg"
                         width="1920" height="694" class="rev-slidebg tp-rs-img" data-no-retina>
                     <rs-layer id="slider-1-slide-1-layer-0" data-type="text" data-color="#ff382f" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,0,0;yo:164px,164px,80px,67px;"
                         data-text="w:normal;s:16;l:25,25,25,20;fw:700;" data-frame_0="y:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="st:190;sp:1200;sR:190;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:7610;" style="z-index:9;font-family:'Lato', sans-serif;">
                         {{ @$first_banner->sub_title }}
                     </rs-layer>
                     <rs-layer id="slider-1-slide-1-layer-1" data-type="text" data-color="#05255f" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,0,0;yo:202px,202px,104px,90px;"
                         data-text="w:normal;s:66,66,58,50;l:76,76,80,60;fw:700;" data-frame_0="y:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="st:310;sp:1200;sR:310;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:7490;" style="z-index:10;font-family:'Lato', sans-serif;">
                         @php
                             $upper_string = '';
                             $arr = explode(' ', trim($first_banner->title));
                             if (isset($arr[2])) {
                                 $upper_string = $arr[0] . ' ' . $arr[1] . ' ' . $arr[2];
                             } elseif (isset($arr[1])) {
                                 $upper_string = $arr[0] . ' ' . $arr[1];
                             } else {
                                 $upper_string = $arr[0];
                             }
                             if (strlen($upper_string) > 14) {
                                 $upper_string = $arr[0] . ' ' . $arr[1];
                             }
                             if (strlen($upper_string) > 14) {
                                 $upper_string = $arr[0];
                             }
                         @endphp
                         {{-- {{$arr[0].' '.$arr[1].' '.$arr[2]}} --}}
                         {{-- {{$first_banner->title}} --}}
                         {{ $upper_string }}
                     </rs-layer>
                     <rs-layer id="slider-1-slide-1-layer-2" data-type="text" data-color="#05255f" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,0,1px;yo:279px,279px,171px,148px;"
                         data-text="w:normal;s:66,66,58,50;l:76,76,80,60;fw:700;" data-frame_0="y:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="st:440;sp:1200;sR:440;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:7360;" style="z-index:11;font-family:'Lato', sans-serif;">
                         @php
                             $first_banner->title = trim(str_replace($upper_string, '', $first_banner->title));
                         @endphp
                         {{ $first_banner->title }}
                     </rs-layer>
                     <rs-layer id="slider-1-slide-1-layer-3" data-type="text" data-color="#676b72" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,0,666px;yo:367px,367px,256px,233px;"
                         data-text="w:normal;s:16,16,16,9;l:20,20,20,12;" data-vbility="t,t,t,f" data-frame_0="y:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="st:680;sp:1200;sR:680;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:7120;" style="z-index:12;font-family:'Lato', sans-serif;">
                         {{ @$first_banner->summary }}
                     </rs-layer>
                     <a id="slider-1-slide-4-layer-5" href="contact-us.html"
                         class="rs-layer cmt-btn btn-default cmt-icon-btn-left cmt-btn-size-md cmt-btn-color-dark"
                         data-type="text" data-color="#05255f" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,15px,15px;y:t,t,t,m;yo:426px,426px,310px,80px;"
                         data-text="w:normal;s:16,16,16,14;l:25,25,20,20;fw:600;fs:i;" data-frame_0="y:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="st:1140;sp:500;sR:1140;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:7360;" style="z-index:15;font-family:'Lato', sans-serif;"><i
                             class="icon-right text-center"></i><span>see more projects</span>
                     </a>
                     <rs-layer id="slider-1-slide-1-layer-8" data-type="shape" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:35px,35px,0,0;y:m;yo:0,0,0,0;"
                         data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                         data-dim="w:566px,566px,475px,392px;h:455px,455px,335px,269px;"
                         data-border="bos:solid,solid,none,none;boc:#ff382f;bow:0,0,0,4px;" data-frame_0="x:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="sp:800;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:8200;" style="z-index:8;background-color:rgba(255,255,255,0.8);">
                     </rs-layer>
             </rs-slide>
             @endif
             @if (isset($second_banner) && $second_banner != null)
                 <rs-slide data-key="rs-4" data-title="Slide"
                     data-thumb="https://via.placeholder.com/1920x694/616161/818181?text=1920x694+slider-mainbg-002.jpg"
                     data-anim="ei:d;eo:d;s:d;r:0;t:fade;sl:d;">
                     <img src="{{ asset('/uploads/main_banner/' . $second_banner->image) }}" title="slider-img-02.jpg"
                         width="1920" height="694" class="rev-slidebg tp-rs-img" data-no-retina>
                     <rs-layer id="slider-1-slide-4-layer-0" data-type="text" data-color="#ff382f" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,0,0;yo:179px,179px,80px,67px;"
                         data-text="w:normal;s:16;l:25,25,25,20;fw:700;" data-frame_0="y:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="st:190;sp:1200;sR:190;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:7610;" style="z-index:9;font-family:'Lato', sans-serif;">
                         {{ @$second_banner->sub_title }}
                     </rs-layer>
                     <rs-layer id="slider-1-slide-4-layer-1" data-type="text" data-color="#05255f" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,0,0;yo:217px,217px,104px,90px;"
                         data-text="w:normal;s:66,66,58,50;l:76,76,80,60;fw:700;" data-frame_0="y:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="st:310;sp:1200;sR:310;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:7490;" style="z-index:10;font-family:'Lato', sans-serif;">
                         @php
                             $second_string = '';
                             $arr = explode(' ', trim($second_banner->title));
                             if (isset($arr[2])) {
                                 $second_string = $arr[0] . ' ' . $arr[1] . ' ' . $arr[2];
                             } elseif (isset($arr[1])) {
                                 $second_string = $arr[0] . ' ' . $arr[1];
                             } else {
                                 $second_string = $arr[0];
                             }
                             if (strlen($second_string) > 14) {
                                 $second_string = $arr[0] . ' ' . $arr[1];
                             }
                             if (strlen($second_string) > 14) {
                                 $second_string = $arr[0];
                             }
                         @endphp
                         {{-- {{$arr[0].' '.$arr[1].' '.$arr[2]}} --}}
                         {{-- {{$first_banner->title}} --}}
                         {{ $second_string }}
                     </rs-layer>
                     <rs-layer id="slider-1-slide-4-layer-2" data-type="text" data-color="#05255f" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,0,1px;yo:294px,294px,171px,148px;"
                         data-text="w:normal;s:66,66,58,50;l:76,76,80,60;fw:700;" data-frame_0="y:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="st:440;sp:1200;sR:440;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:7360;" style="z-index:11;font-family:'Lato', sans-serif;">
                         @php
                             $second_banner->title = trim(str_replace($second_string, '', $second_banner->title));
                         @endphp
                         {{ $second_banner->title }}
                     </rs-layer>
                     <rs-layer id="slider-1-slide-4-layer-3" data-type="text" data-color="#676b72" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,0,666px;yo:382px,382px,256px,233px;"
                         data-text="w:normal;s:16,16,16,9;l:20,20,20,12;" data-vbility="t,t,t,f"
                         data-frame_0="y:-100%;" data-frame_0_mask="u:t;" data-frame_1="st:680;sp:1200;sR:680;"
                         data-frame_1_mask="u:t;" data-frame_999="o:0;st:w;sR:7120;"
                         style="z-index:12;font-family:'Lato', sans-serif;">
                         {{ $second_banner->summary }}
                     </rs-layer>
                     <a id="slider-1-slide-4-layer-5" href="contact-us.html"
                         class="rs-layer cmt-btn btn-default cmt-icon-btn-left cmt-btn-size-md cmt-btn-color-dark"
                         data-type="text" data-color="#05255f" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:71px,71px,15px,15px;y:t,t,t,m;yo:426px,426px,310px,80px;"
                         data-text="w:normal;s:16,16,16,14;l:25,25,20,20;fw:600;fs:i;" data-frame_0="y:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="st:1140;sp:500;sR:1140;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:7360;" style="z-index:15;font-family:'Lato', sans-serif;"><i
                             class="icon-right text-center"></i><span>see more projects</span>
                     </a>
                     <rs-layer id="slider-1-slide-4-layer-8" data-type="shape" data-rsp_ch="on"
                         data-xy="x:l,l,c,c;xo:35px,35px,0,0;y:m;yo:5px,5px,0,0;"
                         data-text="w:normal;s:20,20,12,7;l:0,0,15,9;"
                         data-dim="w:566px,566px,475px,392px;h:455px,455px,335px,275px;"
                         data-border="bos:solid,solid,none,none;boc:#ff382f;bow:0,0,0,4px;" data-frame_0="x:-100%;"
                         data-frame_0_mask="u:t;" data-frame_1="sp:800;" data-frame_1_mask="u:t;"
                         data-frame_999="o:0;st:w;sR:8200;" style="z-index:8;background-color:rgba(255,255,255,0.8);">
                     </rs-layer>
                 </rs-slide>
             @endif

         </rs-slides>
     </rs-module>
     {{-- {{dd($main_banner)}} --}}
 </rs-module-wrap>



 <!-- END REVOLUTION SLIDER -->

 <!--site-main start-->
 <div class="site-main">


     <!--bg-base-dark-->
     {{-- {{dd($our_help)}} --}}
     @if (isset($our_help) && sizeof($our_help) > 0)
         <section class="cmt-row bg-base-dark cmt-bg cmt-bgimage-yes bg-img1 clearfix">
             <div class="cmt-row-wrapper-bg-layer cmt-bg-layer bg-base-dark"></div>
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <!-- section title -->
                         <div class="section-title style2 res-991-mb_20">
                             <div class="title-header">
                                 <h3>Our Company</h3>
                                 <h2 class="title">How can we help you?</h2>
                             </div>
                             <div class="title-desc">
                                 <p>Devfox delivers digital transformations and technology services from ideation to
                                     execution, enabling Global 20K clients. The collaborative approach that creates
                                     customized solutions across the digital value chain.</p>
                             </div>
                         </div><!-- section title end -->
                         <div class="pb-60 res-991-p-0"></div>
                     </div>
                 </div>
             </div>
         </section>
     @endif

     <!--bg-base-dark end-->


     <!--padding_zero-section-->
     <section class="cmt-row padding_zero-section clearfix">
         <div class="container">
             <div class="row mt_140 res-991-mt-40">
                 @if (isset($our_help) && $our_help != null)
                     @foreach ($our_help as $help)
                         <div class="col-lg-4 col-md-4 col-sm-12">
                             <!--featured-imagebox-services-->
                             <div class="featured-imagebox featured-imagebox-services style1">
                                 <!-- featured-thumbnail -->
                                 <div class="featured-thumbnail">
                                     <a href="it-consultancy.html"><img width="740" height="500"
                                             class="img-fluid auto_size"
                                             src="{{ asset('/uploads/our_help/' . $help->image) }}"
                                             alt="image"></a>
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
                 {{-- <div class="col-lg-4 col-md-4 col-sm-12">
                     <!--featured-imagebox-services-->
                     <div class="featured-imagebox featured-imagebox-services style1">
                         <!-- featured-thumbnail -->
                         <div class="featured-thumbnail">
                             <a href="experience-design.html"><img width="740" height="500"
                                     class="img-fluid auto_size"
                                     src="https://via.placeholder.com/740x500?text=740x500+services-02.jpg"
                                     alt="image"></a>
                         </div><!-- featured-thumbnail end-->
                         <div class="featured-content">
                             <div class="ser_category">Our expertise</div>
                             <div class="featured-title">
                                 <h3>Why partner with us</h3>
                             </div>
                             <div class="ser_num"></div>
                             <div class="ser_readmore"><a href="experience-design.html"
                                     class="cmt-btn cmt-btn-size-md cmt-icon-btn-right cmt-btn-color-skincolor btn-inline">Discover
                                     Now<i class="icon-right"></i></a></div>
                         </div>
                     </div><!-- featured-imagebox-services end-->
                 </div>
                 <div class="col-lg-4 col-md-4 col-sm-12">
                     <!--featured-imagebox-services-->
                     <div class="featured-imagebox featured-imagebox-services style1">
                         <!-- featured-thumbnail -->
                         <div class="featured-thumbnail">
                             <a href="digital-services.html"><img width="740" height="500"
                                     class="img-fluid auto_size"
                                     src="https://via.placeholder.com/740x500?text=740x500+services-03.jpg"
                                     alt="image"></a>
                         </div><!-- featured-thumbnail end-->
                         <div class="featured-content">
                             <div class="ser_category">Our customers</div>
                             <div class="featured-title">
                                 <h3>Client success stories</h3>
                             </div>
                             <div class="ser_num"></div>
                             <div class="ser_readmore"><a href="digital-services.html"
                                     class="cmt-btn cmt-btn-size-md cmt-icon-btn-right cmt-btn-color-skincolor btn-inline">Discover
                                     Now<i class="icon-right"></i></a></div>
                         </div>
                     </div><!-- featured-imagebox-services end-->
                 </div> --}}
             </div>
         </div>
     </section>
     <!--padding_zero-section end-->


     <!--about-section-->
     @if (isset($about_us) && $about_us != null)
         <section class="cmt-row about-section clearfix">
             <div class="container">
                 <!-- row -->
                 <div class="row align-items-center">
                     <div class="col-xl-6 col-md-12">
                         <div class="ttm_single_image-wrapper d-table border-rad_5 overflow-hidden">
                             <img width="1140" height="1300" class="img-fluid"
                                 src="{{ asset('/uploads/about_us/' . $about_us->image) }}" alt="single-01">
                         </div>
                         <!-- <div class="d-table bg-base-skin text-base-white position-relative mt_20 ml-30 pl-30 pr-30 pt-10 pb-10 border-rad_5">
                        <div class="fs-16 lh-sm"><strong>410+</strong> Total Projects Complete</div>
                    </div> -->
                     </div>
                     <div class="col-xl-6">
                         <div class="res-1199-pt-40">
                             <!-- section title -->
                             <div class="section-title">
                                 <div class="title-header">
                                     <h3>About Our Company</h3>
                                     <h2 class="title">{{ $about_us->title }}</h2>
                                 </div>
                                 <div class="title-desc">
                                     <p>
                                         {!! html_entity_decode($about_us->description) !!}
                                     </p>
                                 </div>
                             </div><!-- section title end -->
                             {{-- <div class="row pt-15 res-991-pt-0">
                             <div class="col-lg-6 col-md-6 col-sm-12">
                                 <h3 class="fs-20">Custom Development</h3>
                                 <p>Our expert designer team will deliver enriched website with capabilities that grow
                                     business faster</p>
                                 <div class="cmt-horizontal_sep width-100 mt-25 pb-20"></div>
                                 <h3 class="fs-20">Software Development</h3>
                                 <p>Custom software will help create the necessary tools to effectively complete monitor
                                     improvement</p>
                             </div>
                             <div class="col-lg-6 col-md-6 col-sm-12">
                                 <div class="d-table border-rad_5 overflow-hidden mb-15 res-991-mb-0 res-767-mt-30">
                                     <div class="ttm_single_image-wrapper text-start">
                                         <img width="810" height="519" class="img-fluid"
                                             src="https://via.placeholder.com/810x519?text=810x519+single-img-02.jpg"
                                             alt="single-02">
                                         <div class="bg-base-dark text-left pt-15 pb-15 pl-25 pr-25">
                                             <p class="mb-5"><img src="images/star-01.png" alt="rate-star"></p>
                                             <p class="text-base-white lh-base mb-0">Rated 4.7 out of 5 based on
                                                 <br>over<strong><span class="text-base-skin"> 1000+
                                                         Reviews</span></strong>
                                             </p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div> --}}
                         </div>
                     </div>
                 </div><!-- row end -->
             </div>
         </section>
     @endif
     <!--about-section end-->


     <!-- services-section -->
     @if (isset($statistics_banner) && $statistics_banner != null)
         <section class="cmt-row services-section bg-img2 cmt-bgimage-yes cmt-bg clearfix"
             style="background-image: url('{{ asset('/uploads/outer_banner/' . @$statistics_banner->image) }}')">
             <div class="container">
                 <!-- row -->
                 <div class="row">
                     <div class="col-lg-12">
                         <!-- section title -->
                         <div class="section-title title-style-center_text res-991-mb_20">
                             <div class="title-header">
                                 <h3>Our Statistics</h3>
                                 <h2 class="title text-base-white">{{$statistics_banner->title}}</h2>
                             </div>
                         </div><!-- section title end -->
                     </div>
                     <div class="col-lg-9">
                     </div>
                     <div class="col-lg-3">
                         <a id="slider-1-slide-4-layer-5" href="contact-us.html"
                             class="rs-layer cmt-btn btn-default cmt-icon-btn-left cmt-btn-size-md cmt-btn-color-dark"
                             data-type="text" data-color="#05255f" data-rsp_ch="on"
                             data-xy="x:l,l,c,c;xo:71px,71px,15px,15px;y:t,t,t,m;yo:426px,426px,310px,80px;"
                             data-text="w:normal;s:16,16,16,14;l:25,25,20,20;fw:600;fs:i;" data-frame_0="y:-100%;"
                             data-frame_0_mask="u:t;" data-frame_1="st:1140;sp:500;sR:1140;" data-frame_1_mask="u:t;"
                             data-frame_999="o:0;st:w;sR:7360;" style="z-index:15;font-family:'Lato', sans-serif;"><i
                                 class="icon-right text-center"></i><span>see our works</span>
                         </a>
                         <div class="pt-130 pb-100 res-991-p-0"></div>
                     </div>
                 </div>
                 <!-- row end -->
             </div>
         </section>
     @endif
     <!-- services-section end-->


     <!-- padding_zero-section -->
     @if (isset($service_lists) && sizeof($service_lists) > 0)
         <section class="cmt-row padding_zero-section clearfix">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div
                             class="cmt-bg cmt-col-bgcolor-yes bg-base-white cmt-bg spacing-1 border-rad_10 overflow-visible mb_15">
                             <div class="row">
                                 <div class="col-lg-6">
                                     <!-- section title -->
                                     <div class="section-title">
                                         <div class="title-header">
                                             <h3>our services</h3>
                                             <h2 class="title">We provide IT & Business solutions</h2>
                                         </div>
                                     </div><!-- section title end -->
                                 </div>
                                 {{-- <div class="col-lg-6">
                                 <p>We enable the world’s leading companies with cutting-edge digital & IT service as a
                                     competitive advantage ahead of schedule.</p>
                                 <ul
                                     class="cmt-list cmt-bordered-lists cmt-list-style-icon cmt-list-icon-color-skincolor text-base-dark">
                                     <li><i class="fas fa-arrow-right"></i><span class="cmt-list-li-content">Connect
                                             to a wide range of API’s that will innovate and increase customer</span>
                                     </li>
                                     <li><i class="fas fa-arrow-right"></i><span class="cmt-list-li-content">Visitors
                                             can browse with peace of mind without exposing any personal data.</span>
                                     </li>
                                 </ul>
                             </div> --}}
                             </div>
                             <div class="row">
                                 @foreach ($service_lists as $service)
                                     <div class="col-lg-3 col-md-6 col-sm-6">
                                         <!--featured-icon-box-->
                                         <div class="featured-icon-box icon-align-top-content style1">
                                             <div class="bg_icon"><i class="flaticon flaticon-cloud"></i></div>
                                             <div class="featured-icon">
                                                 <div
                                                     class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-darkgrey cmt-icon_element-size-lg">
                                                     <i class="{{ 'flaticon flaticon-' . $service->tag }}"></i>
                                                 </div>
                                             </div>
                                             <div class="featured-title">
                                                 <h3>{{ $service->title }}</h3>
                                             </div>
                                             <div class="featured-hover-content">
                                                 <div class="featured-title">
                                                     <h3>{{ $service->title }}</h3>
                                                 </div>
                                                 <div class="featured-desc">
                                                     <p>{{ $service->summary }}</p>
                                                 </div>
                                                 <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                                                     href="it-consultancy.html">More Details<i
                                                         class="icon-right"></i></a>
                                             </div>
                                         </div><!-- featured-icon-box end-->
                                     </div>
                                 @endforeach
                                 {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                                 <!--featured-icon-box-->
                                 <div class="featured-icon-box icon-align-top-content style1">
                                     <div class="bg_icon"><i class="flaticon flaticon-server"></i></div>
                                     <div class="featured-icon">
                                         <div
                                             class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-darkgrey cmt-icon_element-size-lg">
                                             <i class="flaticon flaticon-world-1"></i>
                                         </div>
                                     </div>
                                     <div class="featured-title">
                                         <h3>Website Development</h3>
                                     </div>
                                     <div class="featured-hover-content">
                                         <div class="featured-title">
                                             <h3>Website Development</h3>
                                         </div>
                                         <div class="featured-desc">
                                             <p>The process of creating responsive and beautiful websites.
                                             </p>
                                         </div>
                                         <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                                             href="experience-design.html">More Details<i class="icon-right"></i></a>
                                     </div>
                                 </div><!-- featured-icon-box end-->
                             </div>
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                 <!--featured-icon-box-->
                                 <div class="featured-icon-box icon-align-top-content style1">
                                     <div class="bg_icon"><i class="flaticon flaticon-layout"></i></div>
                                     <div class="featured-icon">
                                         <div
                                             class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-darkgrey cmt-icon_element-size-lg">
                                             <i class="flaticon flaticon-layout"></i>
                                         </div>
                                     </div>
                                     <div class="featured-title">
                                         <h3>Mobile App Development</h3>
                                     </div>
                                     <div class="featured-hover-content">
                                         <div class="featured-title">
                                             <h3>Mobile App Dev</h3>
                                         </div>
                                         <div class="featured-desc">
                                             <p>It is a Practice of creating mobile apps.</p>
                                         </div>
                                         <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                                             href="digital-services.html">More Details<i class="icon-right"></i></a>
                                     </div>
                                 </div><!-- featured-icon-box end-->
                             </div>
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                 <!--featured-icon-box-->
                                 <div class="featured-icon-box icon-align-top-content style1">
                                     <div class="bg_icon"><i class="flaticon flaticon-data-management"></i></div>
                                     <div class="featured-icon">
                                         <div
                                             class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-darkgrey cmt-icon_element-size-lg">
                                             <i class="flaticon flaticon-data-management"></i>
                                         </div>
                                     </div>
                                     <div class="featured-title">
                                         <h3>Management services</h3>
                                     </div>
                                     <div class="featured-hover-content">
                                         <div class="featured-title">
                                             <h3>Management services</h3>
                                         </div>
                                         <div class="featured-desc">
                                             <p>The robust solution needs to be deliver a wide range of features.</p>
                                         </div>
                                         <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                                             href="data-structuring.html">More Details<i class="icon-right"></i></a>
                                     </div>
                                 </div><!-- featured-icon-box end-->
                             </div>
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                 <!--featured-icon-box-->
                                 <div class="featured-icon-box icon-align-top-content style1">
                                     <div class="bg_icon"><i class="flaticon flaticon-gear"></i></div>
                                     <div class="featured-icon">
                                         <div
                                             class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-darkgrey cmt-icon_element-size-lg">
                                             <i class="flaticon flaticon-gear"></i>
                                         </div>
                                     </div>
                                     <div class="featured-title">
                                         <h3>Cloud Services</h3>
                                     </div>
                                     <div class="featured-hover-content">
                                         <div class="featured-title">
                                             <h3>Cloud Services</h3>
                                         </div>
                                         <div class="featured-desc">
                                             <p>Infrastructure, platforms, and software that are by third-party</p>
                                         </div>
                                         <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                                             href="advisory-services.html">More Details<i class="icon-right"></i></a>
                                     </div>
                                 </div><!-- featured-icon-box end-->
                             </div>
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                 <!--featured-icon-box-->
                                 <div class="featured-icon-box icon-align-top-content style1">
                                     <div class="bg_icon"><i class="flaticon flaticon-mission"></i></div>
                                     <div class="featured-icon">
                                         <div
                                             class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-darkgrey cmt-icon_element-size-lg">
                                             <i class="flaticon flaticon-mission"></i>
                                         </div>
                                     </div>
                                     <div class="featured-title">
                                         <h3>SEO and Digital Marketing</h3>
                                     </div>
                                     <div class="featured-hover-content">
                                         <div class="featured-title">
                                             <h3>SEO and Digital Marketing</h3>
                                         </div>
                                         <div class="featured-desc">
                                             <p>Any activities designed to optimize and promote the webistes.
                                             </p>
                                         </div>
                                         <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                                             href="content-engineering.html">More Details<i
                                                 class="icon-right"></i></a>
                                     </div>
                                 </div><!-- featured-icon-box end-->
                             </div>
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                 <!--featured-icon-box-->
                                 <div class="featured-icon-box icon-align-top-content style1">
                                     <div class="bg_icon"><i class="flaticon flaticon-communities"></i></div>
                                     <div class="featured-icon">
                                         <div
                                             class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-darkgrey cmt-icon_element-size-lg">
                                             <i class="flaticon flaticon-communities"></i>
                                         </div>
                                     </div>
                                     <div class="featured-title">
                                         <h3>IT Consulting</h3>
                                     </div>
                                     <div class="featured-hover-content">
                                         <div class="featured-title">
                                             <h3>IT Consulting</h3>
                                         </div>
                                         <div class="featured-desc">
                                             <p>A management of Computer repairs maintenance of networks.</p>
                                         </div>
                                         <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                                             href="it-consultancy.html">More Details<i class="icon-right"></i></a>
                                     </div>
                                 </div><!-- featured-icon-box end-->
                             </div>
                             <div class="col-lg-3 col-md-6 col-sm-6">
                                 <!--featured-icon-box-->
                                 <div class="featured-icon-box icon-align-top-content style1">
                                     <div class="bg_icon"><i class="flaticon flaticon-support"></i></div>
                                     <div class="featured-icon">
                                         <div
                                             class="cmt-icon cmt-icon_element-onlytxt cmt-icon_element-color-darkgrey cmt-icon_element-size-lg">
                                             <i class="flaticon flaticon-support"></i>
                                         </div>
                                     </div>
                                     <div class="featured-title">
                                         <h3>24/7 Support</h3>
                                     </div>
                                     <div class="featured-hover-content">
                                         <div class="featured-title">
                                             <h3>24/7 Support</h3>
                                         </div>
                                         <div class="featured-desc">
                                             <p>Range of customer services to assist client in making effective</p>
                                         </div>
                                         <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                                             href="experience-design.html">More Details<i class="icon-right"></i></a>
                                     </div>
                                 </div><!-- featured-icon-box end-->
                             </div> --}}
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </section>
     @endif
     <!-- padding_zero-section end-->

     <!--step-section-->
     <section class="cmt-row step-section bg-base-grey mt_250 clearfix">
         <div class="container">
             <!-- row -->
             <div class="row">
                 <div class="col-lg-12">
                     <div class="pt-200 pb-50"></div>
                 </div>
             </div>
             @if (isset($how_it_works) && sizeof($how_it_works) > 0)
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
                                 <div class="bg_icon"><i class="flaticon flaticon-cloud-server"></i></div>
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
             @endif
             {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                     <!-- featured-icon-box -->
                     <div class="featured-icon-box icon-align-top-content style2">
                         <div class="bg_icon"><i class="flaticon flaticon-leader"></i></div>
                         <div class="featured-icon">
                             <div
                                 class="cmt-icon cmt-icon_element-fill cmt-icon_element-style-rounded cmt-icon_element-color-white cmt-icon_element-size-lg">
                                 <div class="cmt-num"><span class="number"></span></div>
                             </div>
                         </div>
                         <div class="featured-content">
                             <div class="featured-title">
                                 <h3>Request Meet Up</h3>
                             </div>
                             <div class="featured-desc">
                                 <p>We will set up meeting with experts for your business</p>
                             </div>
                             <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-skincolor"
                                 href="contact-us.html">view more<i class="icon-right"></i></a>
                         </div>
                     </div><!-- featured-icon-box end-->
                 </div>
                 <div class="col-lg-3 col-md-6 col-sm-6">
                     <!-- featured-icon-box -->
                     <div class="featured-icon-box icon-align-top-content style2">
                         <div class="bg_icon"><i class="flaticon flaticon-web-coding"></i></div>
                         <div class="featured-icon">
                             <div
                                 class="cmt-icon cmt-icon_element-fill cmt-icon_element-style-rounded cmt-icon_element-color-white cmt-icon_element-size-lg">
                                 <div class="cmt-num"><span class="number"></span></div>
                             </div>
                         </div>
                         <div class="featured-content">
                             <div class="featured-title">
                                 <h3>Receive Custom Plan</h3>
                             </div>
                             <div class="featured-desc">
                                 <p>Get your work done according to your flexibility</p>
                             </div>
                             <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-skincolor"
                                 href="contact-us.html">view more<i class="icon-right"></i></a>
                         </div>
                     </div><!-- featured-icon-box end-->
                 </div>
                 <div class="col-lg-3 col-md-6 col-sm-6">
                     <!-- featured-icon-box -->
                     <div class="featured-icon-box icon-align-top-content style2">
                         <div class="bg_icon"><i class="flaticon flaticon-briefing"></i></div>
                         <div class="featured-icon">
                             <div
                                 class="cmt-icon cmt-icon_element-fill cmt-icon_element-style-rounded cmt-icon_element-color-white cmt-icon_element-size-lg">
                                 <div class="cmt-num"><span class="number"></span></div>
                             </div>
                         </div>
                         <div class="featured-content">
                             <div class="featured-title">
                                 <h3>Execute Submissions</h3>
                             </div>
                             <div class="featured-desc">
                                 <p>Your work is under progress by our experts team</p>
                             </div>
                             <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-skincolor"
                                 href="blog.html">view more<i class="icon-right"></i></a>
                         </div>
                     </div><!-- featured-icon-box end-->
                 </div> --}}
         </div>
 </div>
 </section>
 <!--padding_top_zero-section end-->


 <!-- bg-base-dark -->
 @if (isset($member_details) && sizeof($member_details) > 0)
     <section class="cmt-row bg-base-dark cmt-bg cmt-bgimage-yes bg-img3 clearfix">
         <div class="cmt-row-wrapper-bg-layer cmt-bg-layer bg-base-dark"></div>
         <div class="container">
             <div class="row">
                 <div class="col-lg-12">
                     <!-- section title -->
                     <div class="section-title style2 res-991-mb_20">
                         <div class="title-header">
                             <h3>Meet Our Team</h3>
                             <h2 class="title">Our powerful team members</h2>
                         </div>
                         @if (isset($team_motto) && $team_motto != null)
                             <div class="title-desc">
                                 <p>{{ $team_motto->team_motto }}. &nbsp; <a href="our-team.html"
                                         class="cmt-btn cmt-btn-size-md cmt-btn-color-skincolor btn-inline btn-underline">
                                         More Team Members</a></p>
                             </div>
                         @endif
                     </div><!-- section title end -->
                     <div class="pb-100 pt-60 res-991-p-0"></div>
                 </div>
             </div>
         </div>
     </section>
     <!-- bg-base-dark end-->


     <!-- team-section -->
     <section class="cmt-row team-section padding_zero-section cmt-bg clearfix">
         <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
         <div class="container">
             <!-- row -->
             <div class="row slick_slider mt_240 res-991-mt-40"
                 data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "arrows":false, "dots":false, "autoplay":true, "infinite":true, "responsive": [{"breakpoint":992,"settings":{"slidesToShow": 3}}, {"breakpoint":778,"settings":{"slidesToShow": 2}}, {"breakpoint":575,"settings":{"slidesToShow": 1}}]}'>
                 @foreach ($member_details as $member)
                     <div class="cmt-box-col-wrapper col-lg-3">
                         <!-- featured-imagebox-team -->
                         <div class="featured-imagebox featured-imagebox-team style1">
                             <div class="featured-thumbnail">
                                 <img class="img-fluid" width="535" height="500"
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
                                         href="team-details.html">more details</a>
                                 </div>
                                 <div class="featured-iconbox cmt-media-link">
                                     <div class="media-block">
                                         <div class="media-btn"><i class="icon-plus"></i></div>
                                         <ul class="social-icons list-inline">
                                             <li class="social-facebook"><a href="{{ $member->facebook_link }}"><i
                                                         class="ti ti-facebook"></i></a></li>
                                             <li class="social-twitter"><a href="{{ $member->twitter_link }}"><i
                                                         class="ti ti-twitter-alt"></i></a></li>
                                             {{-- <li class="social-pinterest"><a href="{{ $member->pinterest_link }}"><i
                                                         class="ti ti-pinterest"></i></a></li> --}}
                                             <li class="social-instagram"><a href="{{ $member->instagram_link }}"><i
                                                         class="ti ti-instagram"></i></a></li>
                                             <li class="social-linkedin"><a href="{{ $member->linkedin_link }}"><i
                                                         class="ti ti-linkedin"></i></a></li>
                                         </ul>
                                     </div>
                                 </div>
                             </div>
                         </div><!-- featured-imagebox-team end-->
                     </div>
                 @endforeach
                 {{-- <div class="cmt-box-col-wrapper col-lg-3">
                     <!-- featured-imagebox-team -->
                     <div class="featured-imagebox featured-imagebox-team style1">
                         <div class="featured-thumbnail">
                             <img class="img-fluid" width="535" height="500"
                                 src="https://via.placeholder.com/535x500?text=535x500+team-img02.jpg" alt="image">
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
                 <div class="cmt-box-col-wrapper col-lg-3">
                     <!-- featured-imagebox-team -->
                     <div class="featured-imagebox featured-imagebox-team style1">
                         <div class="featured-thumbnail">
                             <img class="img-fluid" width="535" height="500"
                                 src="https://via.placeholder.com/535x500?text=535x500+team-img03.jpg" alt="image">
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
                 <div class="cmt-box-col-wrapper col-lg-3">
                     <!-- featured-imagebox-team -->
                     <div class="featured-imagebox featured-imagebox-team style1">
                         <div class="featured-thumbnail">
                             <img class="img-fluid" width="535" height="500"
                                 src="https://via.placeholder.com/535x500?text=535x500+team-img04.jpg" alt="image">
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
                 </div> --}}
             </div><!-- row end -->
         </div>
     </section>
 @endif
 <!-- team-section end -->

 <br>
 <br>
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
