 <!-- Main Sidebar Container -->
 {{-- <aside class="main-sidebar sidebar-dark elevation-4" style="background-color: #003459;"> --}}
 <aside class="main-sidebar sidebar-dark elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route(auth()->user()->role) }}" class="brand-link">
         <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text text-dark">SysMeet</span>
     </a>


     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('dist/img/myphoto.jpg') }}" class="img-circle elevation-2" alt="">
             </div>
             <div class="info">
                 <a href="#" class="d-block text-dark">{{ ucfirst(auth()->user()->full_name) }}</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="{{ route(auth()->user()->role) }}"
                         class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <span class="nav-label px-2 text-dark">Dashboard</span>
                     </a>
                 </li>

                 <li class="nav-header">Home</li>
                 <li class="nav-item">
                     <a href="{{ route('logo.index') }}" class="nav-link {{ request()->is('admin/logo') ? 'active' : '' }}">
                         <i class="fas fa-globe nav-icon"></i>
                         <span class="nav-label px-2 text-dark">Logo</span>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link {{ request()->is('admin/*_banner') ? 'active' : '' }}">
                         <i class="nav-icon fa fa-image"></i>
                         <p class="nav-label px-2 text-dark">
                             Banner
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('main_banner.index') }}"
                                 class="nav-link {{ request()->is('admin/main_banner') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">Main Banner</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('outer_banner.index') }}"
                                 class="nav-link {{ request()->is('admin/statistics_banner') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">Statistics Banner</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('how_it_works.index') }}"
                         class="nav-link {{ request()->is('admin/how_it_works') ? 'active' : '' }}">
                         <i class="far fa-question-circle nav-icon"></i>
                         <p class="nav-label px-2 text-dark">How It Works</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('our_partner.index') }}"
                         class="nav-link {{ request()->is('admin/our_partner') ? 'active' : '' }}">
                         <i class="fas fa-handshake-alt nav-icon"></i>
                         <p class="nav-label px-2 text-dark">Our Partner</p>
                     </a>
                 </li>

                 <li class="nav-header">Services</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link {{ request()->is('admin/service*') ? 'active' : '' }}">
                         <i class="nav-icon fab fa-servicestack"></i>
                         <p class="nav-label px-2 text-dark">
                             Our Services
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('service.index') }}"
                                 class="nav-link {{ request()->is('admin/service') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">Service</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('service_list.index') }}"
                                 class="nav-link {{ request()->is('admin/service_list') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">Service List</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('service_our_help.index') }}"
                                 class="nav-link {{ request()->is('admin/service_our_help') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">Our Help</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-header">About</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link {{ request()->is('admin/about*') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-address-card"></i>
                         <p class="nav-label px-2 text-dark">
                             About
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('about_us.index') }}"
                                 class="nav-link {{ request()->is('admin/about/about_us') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">About us</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('why_choose_us.index') }}"
                                 class="nav-link {{ request()->is('admin/about/why_choose_us') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">Why choose us</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('services_choose.index') }}"
                                 class="nav-link {{ request()->is('admin/about/services_choose_us') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">Services to choose us</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-header">Team</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link {{ request()->is('admin/our_team*') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-users-cog"></i>
                         <p class="nav-label px-2 text-dark">
                             Our Team
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('member_details.index') }}"
                                 class="nav-link {{ request()->is('admin/our_team/member_details') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">Member Details</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('team_motto.index') }}"
                                 class="nav-link {{ request()->is('admin/our_team/team_motto') ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p class="nav-label px-2 text-dark">Team Motto</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-header">Contact</li>
                 <li class="nav-item">
                    <a href="#" class="nav-link {{ request()->is('admin/contact*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-phone"></i>
                        <p class="nav-label px-2 text-dark">
                            Contact
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('contact_us.index') }}"
                                class="nav-link {{ request()->is('admin/contact_us') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="nav-label px-2 text-dark">Contact us</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('messages.index') }}"
                                class="nav-link {{ request()->is('admin/contact/messages') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="nav-label px-2 text-dark">Messages</p>
                            </a>
                        </li>
                    </ul>
                </li>

                 <li class="nav-header">Footer</li>
                 <li class="nav-item">
                     <a href="{{ route('social_info.index') }}" class="nav-link {{ request()->is('admin/social_info') ? 'active' : '' }}">
                         <i class="fas fa-people-arrows nav-icon"></i>
                         <p class="nav-label px-2 text-dark">Social Info</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('footer.index') }}" class="nav-link {{ request()->is('admin/footer') ? 'active' : '' }}">
                         <i class="fas fa-grip-lines nav-icon"></i>
                         <p class="nav-label px-2 text-dark">Footer</p>
                     </a>
                 </li>

                 <li class="nav-header">System</li>
                 <li class="nav-item">
                     <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('admin/user') ? 'active' : '' }}">
                         <i class="nav-icon fas fa-users"></i>
                         <p class="nav-label px-2 text-dark">
                             Users
                         </p>
                     </a>
                 </li>
         </nav>
         <!-- sidebar -->
     </div>
     <!-- sidebar -->
     <!-- /.sidebar -->
 </aside>
