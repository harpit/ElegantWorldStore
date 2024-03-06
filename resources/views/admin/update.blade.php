<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/product">
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
  .input_color{
    color:black;

  }
  .center{
    margin:auto;
    width:50%;
    text-align: center;
    margin-top:30px;
    border:1px solid pink;
  }
  label{
      display:inline-block;
      width:200px
  }
  .div_space{
      padding-bottom:20px
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
               <h1 class="h2_font">Update Product Details</h1>

               <form action="{{URL('/update_product_confirm',$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="div_space">
               <label>Product Title : </label>
               <input type="text" class="input_color" name="title" placeholder="Product title"  Required="" value="{{$product->title}}">
               </div>

               <div class="div_space">
               <label>Product description : </label>
               <input type="text" class="input_color" name="description" placeholder="Product description" Required="" value="{{$product->description}}">
               </div>

               <div class="div_space">
               <label>Product Price : </label>
               <input type="number" class="input_color" name="Price" placeholder="Product price" Required="" value="{{$product->price}}">
               </div>

               <div class="div_space">
               <label>Discount Price : </label>
               <input type="number" class="input_color" name="dis_price" placeholder="How much discount on it!" value="{{$product->discount_price}}">
               </div>

               <div class="div_space">
               <label>Product quantity : </label>
               <input type="number" class="input_color" name="quantity" min="0" placeholder="Product Quantity" Required="" value="{{$product->quantity}}">
               </div>

               <div class="div_space">
               <label>Product Category : </label>
               <select class="input_color" name="category" Required="">
               <option value="{{$product->category}}" selected="">{{$product->category}}</option>
               @foreach($Category as $catagory)
               <option value="{{$catagory->category_name}}" class="input_color">{{$catagory->category_name}}</option>
               @endforeach
               </select>
               </div>

               <div class="div_space">
               <label>Current Product Image : </label>
               <center><img style="width:100px;height:100px;" src="/product/{{$product->image}}" alt=""></center>
               </div>

               <div class="div_space">
               <label>Change Product Image : </label>
               <input type="file" name="image">
               </div>

               <div class="div_space">
               <input type="submit" value="Update Product" class="btn btn-primary">
               </div>
            </div>
          </div>
          </form>
          </div>
          </div>

        @include('admin.jslink')
  </body>
</html>