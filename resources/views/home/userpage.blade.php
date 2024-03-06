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
      <link rel="shortcut icon" href="images/My project (2).png" type="">
      <title>Elegant World</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <link href="home/css/responsive.css" rel="stylesheet" />

      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>   
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      </head>
       
     <body>
        
     @include('sweetalert::alert')

      <div class="hero_area">
         <!-- header section strats -->
       @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
        @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
    @include('home.why')
      <!-- end why section -->
      
      
      
      <!-- product section -->
@include('home.product')
      <!-- end product section -->

      <!-- Reply and comment system -->

      <div class="heading_container heading_center">
               <h2>
                  Share your Experience 
               </h2>
            </div>
@include('home.contactForm')
    
             
        

    
      <!-- client section -->
    @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->
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