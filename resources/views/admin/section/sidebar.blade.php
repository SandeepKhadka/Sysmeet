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
                     <a href="{{ route(auth()->user()->role) }}" class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 <li class="nav-header">Home</li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="fas fa-globe nav-icon"></i>
                         <p>Logo</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link {{ (request()->is('admin/*_banner')) ? 'active' : '' }}">
                         <i class="nav-icon fa fa-image"></i>
                         <p>
                             Banner
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('main_banner.index') }}" class="nav-link {{ (request()->is('admin/main_banner')) ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Main Banner</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('outer_banner.index') }}" class="nav-link {{ (request()->is('admin/outer_banner')) ? 'active' : '' }}">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Outer Banner</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-question-circle"></i>
                         <p>
                             How It Works
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Work Process</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="fas fa-handshake-alt nav-icon"></i>
                         <p>Our Partner</p>
                     </a>
                 </li>

                 <li class="nav-header">Services</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fab fa-servicestack"></i>
                         <p>
                             Our Services
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Service</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Service List</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Our Help</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-header">About</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-address-card"></i>
                         <p>
                             About
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>About us</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Why choose us</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-header">Team</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-users-cog"></i>
                         <p>
                             Our Team
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Member Details</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Member Skills</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Overall Team</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-header">Contact</li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="fas fa-phone nav-icon"></i>
                         <p>Contact us</p>
                     </a>
                 </li>

                 <li class="nav-header">Footer</li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="fas fa-people-arrows nav-icon"></i>
                         <p>Social Info</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="fas fa-grip-lines nav-icon"></i>
                         <p>Footer</p>
                     </a>
                 </li>

                 <li class="nav-header">System</li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
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
