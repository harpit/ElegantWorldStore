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
        
          <div class="div_center">
               <h1 class="h2_font">Customer's Feedback</h1> 
                
             </div>
             <div style="color:white" class="col-lg-4">
             @foreach($feedback as $feedback)
                      <h2>Name : {{$feedback->name}}</h2>
                      <h2>Email : {{$feedback->email}}</h2>
                      <h2>Phone : {{$feedback->phone}}</h2>
                      <h2>Subject : {{$feedback->subject}}</h2>
                      <h2>Message : {{$feedback->message}}</h2>
                      <br>
                      <hr>
            @endforeach
            </div>
          </div>
          </div>
   
</div>
        @include('admin.jslink')
  </body>
  
</html>