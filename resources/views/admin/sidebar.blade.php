<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="admin/assets/images/dashboard/admin.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  
          
            <x-app-layout>
              </x-app-layout>

            
                </div>
              </div>
              
         
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{URl('/redirect')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{'/view_product'}}">Add products</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{'/show_product'}}">Show Products</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{URL('view_category')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Category</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{URL('show_order')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Order Details</span>
            </a>
          </li>

          <li class="nav-item menu-items">
            <a class="nav-link" href="{{URL('feedback')}}">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Customers Feedback</span>
            </a>
          </li>
         
        </ul>
      </nav>