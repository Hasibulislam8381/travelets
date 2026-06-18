   <!-- Page Sidebar Start-->
   <div class="sidebar-wrapper" data-layout="stroke-svg">
       <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{ asset($setting->logo) }}"
                   alt=""></a>
           <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
           <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid">
               </i></div>
       </div>
       <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                   src="../assets/images/logo/logo-icon.png" alt=""></a></div>
       <nav class="sidebar-main">
           <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
           <div id="sidebar-menu">
               <ul class="sidebar-links" id="simple-bar">
                   <li class="back-btn"><a href="index.html"><img class="img-fluid"
                               src="../assets/images/logo/logo-icon.png" alt=""></a>
                       <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2"
                               aria-hidden="true"></i></div>
                   </li>
                   <li class="pin-title sidebar-main-title">
                       <div>
                           <h6>Pinned</h6>
                       </div>
                   </li>
                   <li class="sidebar-main-title">
                       <div>
                           <h6 class="lan-1">General</h6>
                       </div>
                   </li>
                   <li class="sidebar-list"> <i class="fa fa-thumb-tack"></i><a
                           class="sidebar-link sidebar-title link-nav {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                           href="{{ route('admin.dashboard') }}">
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                               <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                               <path d="M10 12h4v4h-4z" />
                           </svg>
                           <span>Dashboard</span></a></li>

                   <li class="sidebar-list">
                       <i class="fa fa-thumb-tack"></i>
                       <a class="sidebar-link sidebar-title
        {{ request()->routeIs('admin.system.*') || request()->routeIs('admin.profile.*') || request()->routeIs('admin.social.*') ? 'active' : '' }}"
                           href="#">
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <path d="M4 4m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                               <path
                                   d="M4 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                               <path
                                   d="M14 14m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v4a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                               <path d="M14 7l6 0" />
                               <path d="M17 4l0 6" />
                           </svg>
                           <span>Settings</span>
                       </a>

                       <ul
                           class="sidebar-submenu {{ request()->routeIs('admin.system.*') || request()->routeIs('admin.profile.*') || request()->routeIs('admin.social.*') || request()->routeIs('admin.dynamic_page.*') ? 'd-block' : '' }}">
                           <li>
                               <a class="{{ request()->routeIs('admin.system.*') ? 'active' : '' }}"
                                   href="{{ route('admin.system.index') }}">
                                   System Settings
                               </a>
                           </li>
                           <li>
                               <a class="{{ request()->routeIs('admin.profile.*') ? 'active' : '' }}"
                                   href="{{ route('admin.profile.setting') }}">
                                   Profile Setting
                               </a>
                           </li>
                           <li>
                               <a class="{{ request()->routeIs('admin.social.*') ? 'active' : '' }}"
                                   href="{{ route('admin.social.index') }}">
                                   Social Setting
                               </a>
                           </li>
                           <li>
                               <a class="{{ request()->routeIs('admin.dynamic_page.*') ? 'active' : '' }}"
                                   href="{{ route('admin.dynamic_page.index') }}">
                                   Dynamic Page
                               </a>
                           </li>
                       </ul>
                   </li>
                   {{--
                   <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                           href="#">
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#fefbfb" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <path
                                   d="M4 4m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z" />
                               <path d="M12 4l0 16" />
                           </svg>


                           <span class="lan-7">Page layout</span></a>
                       <ul class="sidebar-submenu">
                           <li><a href="box-layout.html">Boxed</a></li>
                           <li><a href="layout-rtl.html">RTL</a></li>
                           <li><a href="layout-dark.html">Dark Layout</a></li>
                           <li> <a href="hide-on-scroll.html">Hide Nav Scroll</a></li>
                       </ul>
                   </li> --}}
                   <li class="sidebar-main-title">
                       <div>
                           <h6 class="lan-8">Applications</h6>
                       </div>
                   </li>

                   {{-- CMS --}}
                   <li class="sidebar-list">
                       <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.cms.*') ? 'active' : '' }}"
                           href="{{ route('admin.cms.index') }}">

                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <path d="M12 20h9"></path>
                               <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path>
                           </svg>

                           <span>CMS</span>
                       </a>
                   </li>

                   {{-- Hero Section --}}
                   <li class="sidebar-list">
                       <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.hero_section.*') ? 'active' : '' }}"
                           href="{{ route('admin.hero_section.index') }}">

                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                               <path d="M3 9h18"></path>
                               <path d="M9 21V9"></path>
                           </svg>

                           <span>Hero Section</span>
                       </a>
                   </li>
                   <li class="sidebar-list">
                       <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.category.*') ? 'active' : '' }}"
                           href="{{ route('admin.category.index') }}">
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <rect x="3" y="3" width="7" height="7"></rect>
                               <rect x="14" y="3" width="7" height="7"></rect>
                               <rect x="14" y="14" width="7" height="7"></rect>
                               <rect x="3" y="14" width="7" height="7"></rect>
                           </svg>
                           <span>Categories</span>
                       </a>
                   </li>
                   <li class="sidebar-list">
                       <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.product.*') ? 'active' : '' }}"
                           href="{{ route('admin.product.index') }}">
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                               <line x1="3" y1="6" x2="21" y2="6"></line>
                               <path d="M16 10a4 4 0 0 1-8 0"></path>
                           </svg>
                           <span>Products</span>
                       </a>
                   </li>
                   <li class="sidebar-list">
                       <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.team_member.*') ? 'active' : '' }}"
                           href="{{ route('admin.team_member.index') }}">
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                               <circle cx="9" cy="7" r="4"></circle>
                               <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                               <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                           </svg>
                           <span>Team Members</span>
                       </a>
                   </li>
                   {{-- Dorm Bookings --}}
                   {{-- Dorm Bookings --}}
                   <li class="sidebar-list">
                       <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.dorm_booking.*') ? 'active' : '' }}"
                           href="{{ route('admin.dorm_booking.index') }}">
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <path d="M3 21h18"></path>
                               <path d="M5 21V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v16"></path>
                               <path d="M9 11h2v2H9z"></path>
                               <path d="M13 11h2v2h-2z"></path>
                               <path d="M9 7h2v2H9z"></path>
                               <path d="M13 7h2v2h-2z"></path>
                           </svg>
                           <span>Dorm Bookings</span>
                       </a>
                   </li>

                   {{-- Dorm Content --}}
                   <li class="sidebar-list">
                       <a class="sidebar-link sidebar-title {{ request()->routeIs('admin.dorm.*') ? 'active' : '' }}"
                           href="{{ route('admin.dorm.edit') }}">
                           <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"
                               fill="none" stroke="#ffffff" stroke-width="1" stroke-linecap="round"
                               stroke-linejoin="round">
                               <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                               <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                           </svg>
                           <span>Dorm Content</span>
                       </a>
                   </li>
               </ul>
               <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
           </div>
       </nav>
   </div>
   <!-- Page Sidebar Ends-->
