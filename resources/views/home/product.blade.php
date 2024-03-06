<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="images/My project (2).png" type="">
   <link href="home/css/style.css" rel="stylesheet" />
      <link href="home/css/responsive.css" rel="stylesheet" />
   <title>Elegant World</title>
</head>
<body>
   
<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <form action="{{URL('product_search')}}" method="get">
                @csrf
                <input type="text" style="color:black" name="search" placeholder="search">
                <input type="submit" value="search" class="btn btn-outline-primary">
              </form>
            </div>
            @if(Auth::id())

            <a class="btn btn-dark w-1" style="background-color:#f7444e;  border: 2px solid #f7444e;" href="{{url('show_cart')}}"><i class='fa fa-shopping-basket'> Orders</i> [ {{$total_cart}} ]</a>
            @else
            <a class="btn btn-dark w-1" style="background-color:#f7444e;  border: 2px solid #f7444e;" href="{{url('show_cart')}}"><i class='fa fa-shopping-basket'> Orders</i></a>

            @endif

            <div class="row">


               @forelse($producty as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div>
                  @if($products->quantity > 0 )
                  <h1 style="color:green;background-color:Lavender;font-size:29px">In stock</h1>
                  @else
                  <h1 style="color:Red;background-color:#EAEED6;font-size:29px">Out of stock</h1>
                  @endif
                  </div>
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           Details
                           </a>
                           <form action="{{url('add_cart',$products->id)}}" method="post">
                              @csrf
                              <input type="number" name="quantity" id="" value="1" min="1">
                              <input type="submit" value="Buy Now">
                           </form> 
                        
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>
                    

                        @if($products->discount_price!=null)
                        <h6  style="color:black">
                        
                        Rs : {{$products->discount_price}}
                        
                        </h6> 
                        <h6 style="text-decoration:line-through;color:grey">
                           Rs : {{$products->price}}
                        </h6>

                        @else
                        <h6 style="color:black">
                           Rs : {{$products->price}}
                        </h6>
                        @endif
                        
                       
                     </div>
                  </div>
               
               </div>
               
                        @empty
                             
                             <center> <tr style="color:white">No data found.... <br> <b><h3>Please use another words</h3></b></tr></center> 
                              
                        
             @endforelse
           
             <div class="d-flex justify-content-center">
             {{ $producty->links() }}</div>

         </div>
      </section>
</body>
</html>