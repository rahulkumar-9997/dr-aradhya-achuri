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
                  <li class="{{ request()->routeIs('dashboard') || request()->routeIs('get-daily-visitors') ? 'active' : '' }}">
                     <a href="{{ route('dashboard') }}" class="firsta">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti ti-layout-grid fs-16 me-2"></i>
                        <span>Dashboard</span>
                     </a>
                  </li>
                  <!-- <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-layout-grid-add fs-16 me-2"></i>
                        <span>Manage Menus</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('menus.index') }}">All Menus</a></li>
                        <li><a href="{{ route('menus.create') }}">Create Menu</a></li>
                     </ul>
                  </li> -->
                  <!-- <li class="submenu">
                     <a href="javascript:void(0);">
                        <i class="ti ti-brand-apple-arcade fs-16 me-2"></i>
                        <span>Manage Pages</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul>
                        <li><a href="{{ route('pages.index') }}">All Pages</a></li>
                        <li><a href="{{ route('pages.create') }}">Create Page</a></li>
                     </ul>
                  </li> -->
                  
                  <li  class="submenu {{ request()->routeIs('manage-blog.*') ? 'active' : '' }}">
                     <a href="javascript:void(0);" class="firsta">
                        <span class="shape1"></span>
                        <span class="shape2"></span>
                        <i class="ti ti-brand-blogger fs-16 me-2"></i>
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
                        <i class="ti ti-brand-appgallery fs-16 me-2"></i>
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
                        <i class="ti ti-brand-apple fs-16 me-2"></i>
                        <span>Manage Testimonials</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul style="{{ request()->routeIs('manage-testimonials.*') ? 'display:block;' : '' }}">
                        <li><a href="{{ route('manage-testimonials.index') }}">Testimonials</a></li>
                     </ul>
                  </li>    
                  <li class="submenu {{ request()->routeIs('manage-services.*') || request()->routeIs('services.reorder') ? 'active' : '' }}">
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
                        <i class="ti ti-users fs-16 me-2"></i>
                        <span>Manage Lead</span>
                        <span class="menu-arrow"></span>
                     </a>
                     <ul style="{{ request()->routeIs('manage-lead.*') ? 'display:block;' : '' }}">
                        <li><a href="{{ route('manage-lead.index') }}">Leads</a></li>
                     </ul>
                  </li>                
                  
                  

                  

               </ul>
            </li>
         </ul>
      </div>
   </div>
</div>
<!-- /Sidebar -->