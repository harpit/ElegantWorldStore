<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <link rel="shortcut icon" href="images/My project (2).png" type="">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Elegant World</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />

      <!-- responsive style -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <link href="home/css/responsive.css" rel="stylesheet" />
      <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>   </head>
      <style>
         table { 
	width: 750px; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #3498db; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 18px;
	}

/* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/


	table { 
	  	width: 100%; 
	}

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}

	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
		/* Label the data */
		content: attr(data-column);

		color: #000;
		font-weight: bold;
	}

}
form{
  display: block;
  width: 100%;
}

button{
  position: relative;
  
  &:before {
    content: '';
    position: absolute;
    right: 16px;
    top: 50%;
    margin-top: -12px;
    width: 24px;
    height: 24px;
    border: 2px solid;
    border-left-color: transparent;
    border-right-color: transparent;
    border-radius: 50%;
    opacity: 0;
    transition: opacity 0.5s;
    animation: 0.8s linear infinite rotate;
  }
  &.sending{
    pointer-events: none;
    cursor: not-allowed;
    
    &:before {
      transition-delay: 0.5s;
      transition-duration: 1s;
      opacity: 1;
    }
  }


@keyframes rotate {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
      </style>
   <body>
   @include('sweetalert::alert')

      <div class="">

         <!-- header section strats -->
       @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{session()->get('message')}}
          </div>
        @endif
      </div>
      <table class="container">
  <thead>
    <tr>
      <th>Title</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Image</th>
      <th>Action</th>

    </tr>
  </thead>
  <tbody>
     <?php $totalprice=0; ?>
  @foreach($cart as $cart)
    <tr>
      <td data-column="title">{{$cart->product_title}}</td>
      <td data-column="quantity">{{$cart->quantity}}</td>
      <td data-column="price">{{$cart->price}}</td>
      <td>
                                 
      <img style="width:100px;height:100px;" data-column="Image" src="/product/{{$cart->image}}"alt="">
                                 
      </td> 
      <td><a href="{{URL('remove_cart',$cart->id)}}" onclick="confirmation(event)"  class="btn btn-danger" title="This product is remove from carts">Remove product</a></td>
  
         </tr>
    <?php $totalprice = $totalprice + $cart->price; ?>

    @endforeach
  </tbody>
</table>
    <center> <button class="btn btn-dark"> Total Price is : {{$totalprice}}</button></center> 

  <div class="row justify-content-center">
  <div class="col-4">
    <br>
    <form>
    <div style="">
    <center><b><h1>Payment Proceed</h1></b><br>



<a href="{{URL('cash_order')}}" class="btn btn-warning">Cash on deliviery</a>

    </center>

    </div>
    </form>
    <br><br><br><br><br>
    
      </div>

  
</div>
</div>
     
<div class="cpy_">
         <p class="mx-auto">© 2023 All Rights Reserved By <a href="{{URL('/')}}">Elegant World</a><br>
         
         
         </p>
      </div>
      <script src="">
        function confirmation(ev){
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          Console.log(urlToRedirect);
          swal({
            title : "Are you sure to cancel this product",
            text : "You will not be able to revert this",
            icon : "waring";
            buttons : true,
            dangerMode : true,
          })
          .then((willcancel) => {
            if (willcancel){
              window.location.href = urlToRedirect;
            }
          })
        }
      </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
      <script>
         $('form').on('submit',function(e){
  e.preventDefault();
  var but = $(this).find('[type="submit"]').toggleClass('sending').blur();
  
  setTimeout(function(){
     but.removeClass('sending').blur();
  },4500);
  
})
      </script>
   </body>
</html>