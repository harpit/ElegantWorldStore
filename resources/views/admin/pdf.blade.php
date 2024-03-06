<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a class="" href=""><img width="50" style="heigth:200px" src="images/My project (2).png" alt="#" /></a><span><h1> <b>ELEGANT WORLD</b> </h1></span>
 <hr>
 <br>
        <center><h1>Customer Details</h1></center><br>
<b>Customer ID</b>  : {{$order->user_id}} <br>
<b>Customer Name</b>  : {{$order->name}} <br>
<b>Customer Email</b>  : {{$order->email}} <br>
<b>Customer Address</b>  : {{$order->address}} <br>

       <center><h1>Product Details</h1></center><br>

<b>Product Name</b>  : {{$order->product_title}}<br>
<b>Product Price</b>  : {{$order->price}} <br>
<b>Product Quantity</b>  : {{$order->quantity}}<br>
<b>Payment Status</b>  : {{$order->payment_status}}<br>
<b>Product ID</b>  : {{$order->product_id}}<br><br>

<center><h1>THANK YOU ! </h1></center>




</body>
</html>