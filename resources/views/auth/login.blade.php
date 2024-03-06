<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Elegant World</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>   
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      </head>
       
     <body>
     

      <div class="hero_area">
         <!-- header section strats -->
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
                           <a class="nav-link" href="{{url('Shop_now')}}">Shop Now</a>
                        </li>
                       
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('contact-us')}}">Contact</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="{{url('show_cart')}}">Carts <i class='fas fa-shopping-basket'> </i></a>
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
                    <li class="nav-item px-2">
                        <a href="{{route('login')}}" class="nav-link text-danger"><i class="fas fa-user-lock"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link text-success"><i class="fas fa-user"></i> Register</a>
                    </li>
                    @endauth

                         @endif
                       
                   
                     </ul>
                  </div>
               </nav>
            </div>
         </header>


                  <!-- end header section -->

         <link rel="stylesheet" href="{{asset('css/app.css')}}">
         
         <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        <div class="heading_container heading_center">
               <h2>
               Login<span></span>
               </h2>
        </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus/>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password"/>
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <input type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Login') }}
                </x-jet-button>
            </div> 
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
<script src="{{mix('js/app.js')}}"></script>
 

      <div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="{{URL('/')}}">Elegant World</a><br>
         
         
         </p>
      </div>
       
     
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
