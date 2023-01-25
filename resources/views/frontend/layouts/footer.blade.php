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
                              <p>An excellent service management in the area of IT providing solutions. High level
                                  efficient solution to businesses growth</p>
                          </div>
                          @if (isset($social_infos) && sizeof($social_infos) > 0)
                              <div class="widget_social_wrapper social-icons pt-40">
                                  <h3 class="fs-18 mb-25">Social Info</h3>
                                  <ul class="list-inline">
                                      @foreach ($social_infos as $social)
                                          <li><a href="{{ $social->link }}" rel="noopener"
                                                  aria-label="{{ strtolower($social->title) }}"><i
                                                      class="{{"icon-". strtolower($social->title) }}"></i></a></li>
                                      @endforeach
                                      {{-- <li><a href="https://twitter.com/CymolThemes" rel="noopener"
                                              aria-label="twitter"><i class="icon-twitter"></i></a></li>
                                      <li><a href="https://www.behance.net/cymolthemes191219" rel="noopener"
                                              aria-label="linkedin"><i class="icon-linkedin"></i></a></li>
                                      <li><a href="https://in.pinterest.com/cymolthemes/" rel="noopener"
                                              aria-label="pinterest"><i class="icon-pinterest"></i></a></li>
                                      <li><a href="https://dribbble.com/cymol_themes" rel="noopener"
                                              aria-label="dribbble"><i class="icon-dribbble"></i></a></li> --}}
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
                                  <li><i class="flaticon-pin"></i>{{ $contact->location }}</li>
                              </ul>
                              <div class="g-map">
                                  <iframe
                                      src="https://maps.google.com/maps?q=Pokhara%20Sysmeet%2C%20Pokhara%2C%20Nepal&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"
                                      {{-- src="{{"https://maps.google.com/maps?q=" . $contact->location. "&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near"}}" --}} title="{{ $contact->location }}"
                                      aria-label="{{ $contact->location }}"></iframe>
                              </div>
                          </div>
                      </div>
                  @endif
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 widget-area">
                      <div class="widget multi_widget clearfix">
                          <!-- <div class="newsletter_widget clearfix">
                            <h3 class="widget-title">Signup for our newsletter</h3>
                            <p>Sign up to our newsletter to get the latest news.</p>
                            <form id="subscribe-form" class="newsletter-form" action="#" data-mailchimp="true">
                                <div class="mailchimp-inputbox clearfix" id="subscribe-content">
                                    <p>
                                        <input type="email" name="email" placeholder="Enter Your Email Address..." required="">
                                    </p>
                                    <p><button class="submit cmt-btn cmt-btn-size-md cmt-btn-shape-rounded cmt-btn-style-border cmt-btn-color-skincolor" type="submit"><i class="icon-right"></i></button></p>
                                </div>
                                <div id="subscribe-msg"></div>
                            </form>
                        </div> -->
                          <div class="widget_nav_menu clearfix">
                              <h3 class="widget-title">Quick links</h3>
                              <ul class="menu-footer-quick-links links-1">
                                  <li><a href="#">About Us</a></li>
                                  <li><a href="#">Meet Our Team</a></li>
                                  <li><a href="#">Services</a></li>
                                  <li><a href="#">Contact us</a></li>
                              </ul>
                          </div>
                          <div class="widget_nav_menu clearfix">
                              <h3 class="widget-title">Solutions</h3>
                              <ul class="menu-footer-quick-links links-2">
                                  <li><a href="#">IT Management</a></li>
                                  <li><a href="#">Mobile App Dev</a></li>
                                  <li><a href="#">Website Dev</a></li>
                                  <li><a href="#">SEO & Digital Marketing</a></li>
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
