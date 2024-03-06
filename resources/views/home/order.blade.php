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
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

      <div class="hero_area">
         <!-- header section strats -->
       @include('home.header')
         <!-- end header section -->
         <table class="container">
  <thead>
    <tr>
      <th>Product Title</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Payment Status</th>
      <th>Delivery Status</th>
      <th>Image</th>
      <th>Cancel Order</th>



    </tr>
  </thead>
  <tbody>
  @foreach($order as $order)
    <tr>
      <td data-column="Title">{{$order->product_title}}</td>
      <td data-column="Quantity">{{$order->quantity}}</td>
      <td data-column="Price">{{$order->price}}</td>
      <td data-column="Payment Status">{{$order->payment_status}}</td>
      <td data-column="Delivery Status">{{$order->delivery_status}}</td>

      <td data-column="Image">
                                 
      <img style="width:100px;height:100px;"  src="/product/{{$order->image}}"alt="">
                                 
      </td> 
  <td>
  @if($order->delivery_status == 'Processing')

      <a href="{{URL('cancel_order',$order->id)}}"  onclick="confirmation(event)"  class="btn btn-danger">Cancel Order <i class='fa fa-trash-alt'></i></a>
      @else
      <h3>Not Allowed</h3>
          @endif
</td>
         </tr>

    @endforeach
  </tbody>
</table>      
     

      <!-- footer end -->
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
   </body>
</html>