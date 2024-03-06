<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.csslink')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><style>
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
               <h1 class="h2_font">Product Details</h1> 
               <table class="table table-striped table-responsive">
                 <thead class="text-white">
                             <tr>
                             <td>Product title</td>
                  <td>Description</td>
                  <td>Quantity</td>
                  <td>Category</td>
                  <td>Price</td>
                  <td>Discount Price</td>
                  <td>Product Image</td>
                  <td>Delete</td>
                  <td>Edit</td>

                             </tr>
                         </thead>
                         <tbody>
                         @foreach($product as $product)
                         <tr>

                             <td class="text-white">{{$product->title}}</td>
                             <td class="text-white">{{$product->description}}</td>
                             <td class="text-white">{{$product->quantity}}</td>
                             <td class="text-white">{{$product->category}}</td>
                             <td class="text-white">{{$product->price}}</td>
                             <td class="text-white">{{$product->discount_price}}</td>
                             <td>
                                 <div>
                               <img style="width:100px;height:100px;"  src="/product/{{$product->image}}"alt="">
                                 </div>
                             </td>
                             <td>
                               <a onclick="return confirm('Are you sure to remove this product')" href="{{URl('delete_product' , $product->id)}}"><i class="fa fa-remove" style="color: red"></i></a>
                             </td>
                             <td>
                               <a href="{{URl('update_product', $product->id)}}"><i class="fa fa-edit" style="color: blue"></i></a>
                             </td>

                         </tr>
                      @endforeach
                         </tbody>
                     </table>
             </table>
             </div>
          </div>
          </div>
          </div>
   
</div>
        @include('admin.jslink')
  </body>
  
</html>