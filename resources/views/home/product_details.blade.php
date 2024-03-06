<!doctype html>
<html lang="en">
  <head>
  <title>Elegant World</title>
  <link rel="icon" type="image/x-icon" href="/images/My project (2).png">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="images/My project (2).png" type="">
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
     
      <link href="home/css/responsive.css" rel="stylesheet" />

      <link rel="stylesheet" href="/home/css/cart.css">
  <link rel="stylesheet" href="/home/css/style.css"> 
    <!-- Bootstrap CSS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
  <header class="header_section">
            <div class="container">
               <nav class="navbar navbar-expand-lg custom_nav-container ">
                  <a class="navbar-brand" href="{{URL('/')}}"><img width="50" style="heigth:50px" src="../images/My project (2).png" alt="#" /></a>
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
                           <a class="nav-link" href="{{url('show_cart')}}">Carts <i class='fa fa-shopping-basket'> </i></a>
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
         @include('sweetalert::alert')

 
<section id="services" class="services section-bg">
  
     <div class="row row-sm">
         <div class="col-md-6 _boxzoom">
            <div class="zoom-thumb">
              
            </div>
            <div class="_product-images">
               <div class="picZoomer">
               
                               <img class="my_img"  src="/product/{{$product->image}}"alt="">
                                 
            </div>
     </div>
    
         </div>
         <div class="col-md-6">
            <div class="_product-detail-content">
               <p class="_p-name">{{$product->title}}</p>
               <div class="_p-price-box">
                  <div class="p-list">
          


                     @if($product->discount_price!=null)
                        
                        
                        <span class="price"> Rs:{{$product->discount_price}} </span>
                        
                     
                        <span> <del>Rs :  {{$product->price}}  </del>   </span>

                        @else
                        <span> Rs :  {{$product->price}}    </span>
                        @endif
                  </div>

                  <form action="{{url('add_cart',$product->id)}}" method="POST">
                  @csrf
                  <div class="_p-add-cart">
                     <div class="_p-qty">
                        <span>Add Quantity</span>
                        <input type="number" name="quantity" id="number" value="1" />
                     </div>
                  </div>
                  @if($product->quantity > 0 )
                  <h1 style="color:green">In stock</h1>
                  @else
                  <h1 style="color:Red">Out of stock</h1>
                  @endif
                  <div class="_p-features">
                     <span> Description :- </span>
                     {{$product->description}}                       
                  </div>
                     <ul class="spe_ul"></ul>
                     <div class="_p-qty-and-cart">
                        <div class="_p-add-cart">
                     <center> <input type="submit" value="Buy Now"></input></center> 

                          
                       
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
 
</section>

<div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="{{URL('/')}}">Elegant World</a><br>
         
         
         </p>
      </div>



<!-- put jquery before owl carousel -->
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!-- owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
 <script>
    /*!     
        jquery.picZoomer.js
        v 1.0
        David
        http://www.CodingSerf.com
*/

//放大镜控件
;(function($){
	$.fn.picZoomer = function(options){
		var opts = $.extend({}, $.fn.picZoomer.defaults, options), 
			$this = this,
			$picBD = $('<div class="picZoomer-pic-wp"></div>').css({'width':opts.picWidth+'px', 'height':opts.picHeight+'px'}).appendTo($this),
			$pic = $this.children('img').addClass('picZoomer-pic').appendTo($picBD),
			$cursor = $('<div class="picZoomer-cursor"><i class="f-is picZoomCursor-ico"></i></div>').appendTo($picBD),
			cursorSizeHalf = {w:$cursor.width()/2 ,h:$cursor.height()/2},
			$zoomWP = $('<div class="picZoomer-zoom-wp"><img src="" alt="" class="picZoomer-zoom-pic"></div>').appendTo($this),
			$zoomPic = $zoomWP.find('.picZoomer-zoom-pic'),
			picBDOffset = {x:$picBD.offset().left,y:$picBD.offset().top};

		
		opts.zoomWidth = opts.zoomWidth||opts.picWidth;
		opts.zoomHeight = opts.zoomHeight||opts.picHeight;
		var zoomWPSizeHalf = {w:opts.zoomWidth/2 ,h:opts.zoomHeight/2};

		//初始化zoom容器大小
		$zoomWP.css({'width':opts.zoomWidth+'px', 'height':opts.zoomHeight+'px'});
		$zoomWP.css(opts.zoomerPosition || {top: 0, left: opts.picWidth+30+'px'});
		//初始化zoom图片大小
		$zoomPic.css({'width':opts.picWidth*opts.scale+'px', 'height':opts.picHeight*opts.scale+'px'});

		//初始化事件
		$picBD.on('mouseenter',function(event){
			$cursor.show();
			$zoomWP.show();
			$zoomPic.attr('src',$pic.attr('src'))
		}).on('mouseleave',function(event){
			$cursor.hide();
			$zoomWP.hide();
		}).on('mousemove', function(event){
			var x = event.pageX-picBDOffset.x,
				y = event.pageY-picBDOffset.y;

			$cursor.css({'left':x-cursorSizeHalf.w+'px', 'top':y-cursorSizeHalf.h+'px'});
			$zoomPic.css({'left':-(x*opts.scale-zoomWPSizeHalf.w)+'px', 'top':-(y*opts.scale-zoomWPSizeHalf.h)+'px'});

		});
		return $this;

	};
	$.fn.picZoomer.defaults = {
        picHeight: 460,
		scale: 2.5,
		zoomerPosition: {top: '0', left: '380px'},

		zoomWidth: 400,
		zoomHeight: 460
	};
})(jQuery); 



$(document).ready(function () {
     $('.picZoomer').picZoomer();
    $('.piclist li').on('click', function (event) {
        var $pic = $(this).find('img');
        $('.picZoomer-pic').attr('src', $pic.attr('src'));
    });
   
  var owl = $('#recent_post');
              owl.owlCarousel({
                margin:20,
                dots:false,
                nav: true,
                navText: [
                  "<i class='fa fa-chevron-left'></i>",
                  "<i class='fa fa-chevron-right'></i>"
                ],
                autoplay: true,
                autoplayHoverPause: true,
                responsive: {
                  0: {
                    items: 2
                  },
                  600: {
                    items:3
                  },
                  1000: {
                    items:5
                  },
                  1200: {
                    items:4
                  }
                }
  });    
  
        $('.decrease_').click(function () {
            decreaseValue(this);
        });
        $('.increase_').click(function () {
            increaseValue(this);
        });
        function increaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value++;
            $(_this).siblings('input#number').val(value);
        }

        function decreaseValue(_this) {
            var value = parseInt($(_this).siblings('input#number').val(), 10);
            value = isNaN(value) ? 0 : value;
            value < 1 ? value = 1 : '';
            value--;
            $(_this).siblings('input#number').val(value);
        }
    });

 </script>


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
                               
                            