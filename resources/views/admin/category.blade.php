<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">        @include('admin.csslink')
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
               <h1 class="h2_font">Add Category</h1>
      <form action="{{url('/add_category')}}" method="post">
        @csrf
               <input class="input_color" type="text" name="category" placeholder="Enter Category Name">

              <input type="submit" value="Add Category" class="btn btn-primary" name="submit">
              </form>

              <table class="center">
                <tr>
                  <td>Category Name</td>
                  <td>Action</td>
                </tr>
                 @foreach($data as $data)
           
                 <tr>
                  <td>{{$data->category_name}}</td>
                  <td>
                    <a onclick="return confirm('Are you sure to remove this category name form list?')" href="{{url('delete_category',$data->id)}}"><i class="fa fa-remove" style="color: red"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
          </div>
          </div>

        @include('admin.jslink')
  </body>
</html>