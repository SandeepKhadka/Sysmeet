<!--footer start-->
<footer class="footer widget-footer bg-base-dark text-base-white clearfix">
    <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
    <div class="second-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                    <div class="widget widget_text clearfix">
                        <div class="footer-logo">
                            @if (isset($logo) && $logo != null)
                                <img id="footer-logo-img" class="img-fluid auto_size" height="42" width="132"
                                    src="{{ asset('/uploads/logo/' . $logo->image) }}" alt="image">
                            @else
                                <h4>Sysmeet</h4>
                            @endif
                        </div>
                        <div class="textwidget widget-text">
                            <p>{{ @$contact->why_contact_us }}</p>
                        </div>
                        @if (isset($social_infos) && sizeof($social_infos) > 0)
                            <div class="widget_social_wrapper social-icons pt-40">
                                <h3 class="fs-18 mb-25">Social Info</h3>
                                <ul class="list-inline">
                                    @foreach ($social_infos as $social)
                                        <li><a href="{{ $social->link }}" rel="noopener"
                                                aria-label="{{ strtolower($social->title) }}" target="new"><i
                                                    class="{{ 'icon-' . strtolower($social->title) }}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
                @if (isset($contact) && $contact != null)
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 widget-area">
                        <div class="widget widget_cta clearfix">
                            <h4>{{ $contact->phone }}</h4>
                            <ul class="widget_contact_wrapper">
                                <li><i class="flaticon-envelope"></i><a
                                        href="mailto:info@example.com.com">{{ $contact->email }}</a>24 x 7 Online
                                    Support</li>
                                <li><i
                                        class="flaticon-pin"></i>{{ $contact->city . ', ' . $contact->street . ', ' . $contact->state . ' ' . $contact->country }}
                                </li>
                            </ul>
                            <div class="g-map">
                                <iframe
                                    src="https://maps.google.com/maps?q={{ ucfirst($contact->city) }}%20Sysmeet%2C%20{{ ucfirst($contact->city) }}%2C%20{{ ucfirst($contact->country) }}&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"
                                    {{-- src="{{"https://maps.google.com/maps?q=" . $contact->location. "&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"}}" --}} title="{{ $contact->location }}"
                                    aria-label="{{ $contact->city . ', ' . $contact->street . ', ' . $contact->state . ' ' . $contact->country }}"></iframe>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 widget-area">
                    <div class="widget multi_widget clearfix">
                        <div class="widget_nav_menu clearfix">
                            <h3 class="widget-title">Quick links</h3>
                            <ul class="menu-footer-quick-links links-1">
                                <li><a href="{{ route('front.home') }}">Home</a></li>
                                <li><a href="{{ route('front.about_us') }}">About us</a></li>
                                <li><a href="{{ route('front.service') }}">Services</a></li>
                                <li><a href="{{ route('front.contact') }}">Contact us</a></li>
                            </ul>
                        </div>
                        <div class="widget_nav_menu clearfix">
                            <h3 class="widget-title">Solutions</h3>
                            <ul class="menu-footer-quick-links links-2">
                                @if (isset($all_our_help) && sizeof($all_our_help) > 0)
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($all_our_help as $help)
                                        @if ($i < 4)
                                            @php
                                                $i = $i + 1;
                                            @endphp
                                            <li
                                                class="{{ request()->is('it_solutions/' . $help->slug . '/' . $help->id) ? 'active' : '' }}">
                                                <a
                                                    href="{{ route('front.it_solutions', ['slug' => $help->slug, 'id' => $help->id]) }}">{{ $help->sub_title }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-text copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (isset($footer) && $footer != null)
                        <span class="cpy-text">{!! html_entity_decode($footer->description) !!}<span class="text-base-skin u1">
                            @else
                                <span class="cpy-text">Copyright © 2022 Sysmeet<span class="text-base-skin u1">
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
<!--footer end-->

<!--back-to-top start-->
<a id="totop" href="#top">
    <i class="icon-angle-up"></i>
</a>
<!--back-to-top end-->
