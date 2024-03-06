<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/product">
    <!-- Required meta tags -->
    @include('admin.csslink')

  </head>
  <body>
  <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.navbar')

        <!-- partial -->
        @include('admin.body')

        @include('admin.jslink')

  </body>
</html>