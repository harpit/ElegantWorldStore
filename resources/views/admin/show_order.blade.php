<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.csslink')
<style>
  .div_center{
    text-align:center;
    padding-top: 40px;
    color:white;
  }
  .h2_font{
    color:white;
    font-size:40px;
    padding-bottom:40px;
  }
  
 
</style>
  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')
     
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          @if(session()->has('message'))
          <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
          {{session()->get('message')}}
          </div>
        @endif

          <div class="div_center">
               <h1 class="h2_font">Order Details</h1> 
               <div>
        <form action="{{URL('search')}}" method="get">
                @csrf
                <input type="text" style="color:black" name="search" placeholder="search">
                <input type="submit" value="search" class="btn btn-outline-primary">
              </form>
        </div>
        <br>
        <div class="container pr-5">
               <table class="table table-striped table-responsive">
                 <thead class="text-white">
                             <tr>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Phone</td>
                  <td>Address</td>
                  <td>Price</td>
                  <td>Product title</td>
                  <td>Quantity</td>
                  <td>Delivery status</td>
                  <td>Payment Status</td>
                  <td>Image</td>
                  <td>Delivered</td>
                  <td>Print PDF</td>
                             </tr>
                         </thead>
                         <tbody>
                         @forelse($order as $order)
                         <tr>

                             <td class="text-white">{{$order->name}}</td>
                             <td class="text-white">{{$order->email}}</td>
                             <td class="text-white">{{$order->phone}}</td>
                             <td class="text-white">{{$order->address}}</td>
                             <td class="text-white">{{$order->price}}</td>
                             <td class="text-white">{{$order->product_title}}</td>
                             <td class="text-white">{{$order->quantity}}</td>
                             <td class="text-white">{{$order->delivery_status}}</td>
                             <td class="text-white">{{$order->payment_status}}</td>

                             <td>
                                 <div>
                               <img style="width:100px;height:100px;"  src="/product/{{$order->image}}"alt="">
                                 </div>
                             </td>

                             <td>
                                 @if($order->delivery_status == "Processing")
                                 <a href="{{URL('delivered',$order->id)}}" class="btn btn-primary" onclick="return confirm('Are you Sure this Product is delivered?')"  >Delivered</a>
                                 @else
                                 <button disabled="disabled" style="color:green">Delivered</button>
                                 @endif
                             </td>
                             <td>
                            <a href="{{URL('Print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                            </td>
 @empty
                             
                           <center> <tr style="color:white">No data found <br> <b><h3>Note : Data is search by Name , Email , Phone_no , Product_title </h3></b></tr></center> 
                             
                          
                         </tr>
                         <br>
                        
                      @endforelse
                         </tbody>
                     </table>
                    </div>
             </div>
          </div>
          </div>
          </div>
   
</div>
        @include('admin.jslink')
  </body>
  
</html>