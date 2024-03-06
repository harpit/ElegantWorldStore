 <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{URL('/')}}"><img width="50" style="heigth:50px" src="images/My project (2).png" alt="#" /></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class=""> </span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav">
                        <li class="nav-item active">
                           <a class="nav-link" href="{{URL('/')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('about_us')}}">About Us</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('Shop_now')}}">Shop Now <i class='fa fa-shopping-cart'></i></a>
                        </li>
                       
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('contact-us')}}">Contact</a>
                        </li>
                        <li class="nav-item">
                        @if(Auth::id())
                        <a class="nav-link" href="{{url('show_cart')}}">Carts <i class='fa fa-shopping-basket'> {{$total_cart }} </i></a>

                         @else
                         <a class="nav-link" href="{{url('show_cart')}}">Carts <i class='fa fa-shopping-basket'> </i></a>

                           @endif
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_order_home')}}">All Orders</a>
                        </li>
                        <form class="form-inline">
                           <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                           <i class="fa fa-search" aria-hidden="true"></i>
                           </button>
                        </form>
                   
                       
                             @if (Route::has('login'))

                             @auth
                    <li class="nav-item px-2">
                    <x-app-layout>

                    </x-app-layout>                    
                  </li>
                     @else
                    <li class="nav-item ">
                        <a href="{{route('login')}}" class="nav-link text-danger"><i class="fa fa-user-lock"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link text-success"><i class="fa fa-user"></i> Register</a>
                    </li>
                    @endauth

                         @endif
                       
                   
                     </ul>
                  </div>
               </nav>
            </div>
         </header>


         