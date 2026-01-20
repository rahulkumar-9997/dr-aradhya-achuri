<!-- Sidebar -->
<div class="sidebar" id="sidebar">
   <!-- Logo -->
   <div class="sidebar-logo active">
      <a href="{{ route('dashboard') }}" class="logo logo-normal">
         <img src="{{asset('backend/assets/back-img/logo.png')}}" alt="Img">
      </a>
      <a href="{{ route('dashboard') }}" class="logo logo-white">
         <img src="{{asset('backend/assets/back-img/logo.png')}}" alt="Img">
      </a>
      <a href="{{ route('dashboard')}}" class="logo-small">
         <img src="{{asset('backend/assets/back-img/fav.png')}}" alt="Img">
      </a>
   </div>
   <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
         <ul>
            <li class="submenu-open">
               <ul>
                  <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                     <a href="{{ route('dashboard') }}" class="firsta">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti ti-dashboard fs-16 me-2"></i>
                        <span>Dashboard</span>
                     </a>
                  </li>
                  <li class="{{ request()->routeIs('banner-services.*') ? 'active' : '' }}">
                     <a href="{{ route('banner-services.index') }}" class="firsta">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti ti-photo fs-16 me-2"></i>
                        <span>Home Banner</span>
                     </a>
                  </li>

                  <li class="submenu {{ request()->routeIs('manage-blog.*') ? 'active' : '' }}">
                     <a href="javascript:void(0);" class="firsta">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti ti-article fs-16 me-2"></i>
                        <span>Manage Blog</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul style="{{ request()->routeIs('manage-blog.*') ? 'display:block;' : '' }}">
                        <li><a href="{{ route('manage-blog.index') }}">Blog</a></li>
                     </ul>
                  </li>

                  <li class="submenu {{ request()->routeIs('manage-gallery.*') ? 'active' : '' }}">
                     <a href="javascript:void(0);" class="firsta">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti ti-photo fs-16 me-2"></i>
                        <span>Manage Gallery</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul style="{{ request()->routeIs('manage-gallery.*') ? 'display:block;' : '' }}">
                        <li><a href="{{ route('manage-gallery.index') }}">Gallery</a></li>
                     </ul>
                  </li>

                  <li class="submenu {{ request()->routeIs('manage-testimonials.*') ? 'active' : '' }}">
                     <a href="javascript:void(0);" class="firsta">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti ti-message-circle-2 fs-16 me-2"></i>
                        <span>Manage Testimonials</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul style="{{ request()->routeIs('manage-testimonials.*') ? 'display:block;' : '' }}">
                        <li><a href="{{ route('manage-testimonials.index') }}">Testimonials</a></li>
                     </ul>
                  </li>

                  <li class="submenu {{ request()->routeIs('manage-services.*') ? 'active' : '' }}">
                     <a href="javascript:void(0);" class="firsta">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti ti-apps fs-16 me-2"></i>
                        <span>Manage Services</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul style="{{ request()->routeIs('manage-services.*') ? 'display:block;' : '' }}">
                        <li><a href="{{ route('manage-services.index') }}">Services</a></li>
                     </ul>
                  </li>

                  <li class="submenu {{ request()->routeIs('manage-lead.*') ? 'active' : '' }}">
                     <a href="javascript:void(0);" class="firsta">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti ti-users-group fs-16 me-2"></i>
                        <span>Manage Lead</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul style="{{ request()->routeIs('manage-lead.*') ? 'display:block;' : '' }}">
                        <li><a href="{{ route('manage-lead.index') }}">Dashboard</a></li>
                        <li><a href="{{ route('manage-lead.form.index') }}">Form</a></li>
                     </ul>
                  </li>
               </ul>
            </li>
         </ul>
      </div>
   </div>
</div>
<!-- /Sidebar -->