<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\cart;

use App\Models\order;

use App\Models\Contact;

use RealRashid\SweetAlert\Facades\Alert;

use Session;

use Config;

use Stripe;

use DB;




class HomeController extends Controller
{
    public function index(){
        $producty=Product::paginate(6);
		$total_cart = Cart::all()->count();
        return view('home.userpage',compact('producty','total_cart'));
    }
    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1'){
			$total_product = Product::all()->count();
			$total_order = order::all()->count();
			$total_user = User::all()->count();
			$order = order::all();
			$total_cart = Cart::all()->count();
			$total_revenue = 0;
			foreach($order as $order){
				$total_revenue = $total_revenue + $order->price;
			}
			$total_delivered = order::where('delivery_status','=','Delivered')->get()->count();
			$total_Processing = order::where('delivery_status','=','Processing')->get()->count();

            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_Processing','total_cart'));
        }
        else{
            $producty=Product::paginate(6);
			$total_cart = Cart::all()->count();
            return view('home.userpage',compact('producty','total_cart'));      
		  }
    }
   public function product_details($id){
	   if (Auth::id()) {
		$product=Product::find($id);
		$user_id=Auth::user()->id;
		$cart_count = cart::where('user_id','=',$user_id)->count();
		return view('home.product_details',compact('product','cart_count'));
		Alert::success('Prodcut','ffff');
          return redirect()->back();
          
		
	   }
	   else{
		$product=Product::find($id);
		return view('home.product_details',compact('product'));
	
          
		

	}
     
	  
	   
   }
   public function add_cart(Request $request,$id){
      if (Auth::id()) {
          $user = Auth::user();
          $product = Product::find($id);
          $cart = new cart;
          $cart->name=$user->name;
          $cart->email=$user->email;
          $cart->phone=$user->phone;
          $cart->address=$user->address;
          $cart->user_id=$user->id;
          $cart->Product_title=$product->title;
          if ($product->discount_price!=null) {
            $cart->price=$product->discount_price * $request->quantity;
        }
        else {
            $cart->price=$product->price * $request->quantity;

        }
          $cart->image=$product->image;
          $cart->Product_id=$product->id;
          $cart->Product_title=$product->title;
          $cart->quantity=$request->quantity;
          $cart->save();
		  Alert::success('Product added Succesfully','We have added product to carts
		  ');
          return redirect()->back();
          



          
      }
      else{
          return redirect('login');
      }
}
public function shop(){
	$producty=Product::paginate(9);
	$total_cart = Cart::all()->count();
	return view('home.shop_now' , compact('producty','total_cart'));

}
   public function show_cart(){
       if (Auth::id()) {

        $id=Auth::user()->id;
        $cart=cart::where('user_id','=',$id)->get();
		$total_cart = Cart::all()->count();
        return view('home.show_cart',compact('cart','total_cart'));     
    }
     else {
         return redirect('login');
     }
   }
   public function remove_cart($id){
       $cart=cart::find($id);
       $cart->delete();
	   Alert::info('Order cancel successfully','Your order is cancelled');
       return redirect()->back();
   }

   public function cash_order(){
     $user=Auth::user();
     $userid = $user->id;
     $data = Cart::where('user_id','=',$userid)->get();
     foreach($data as $data){
         $order = new order;

         $order->name = $data->name;
         $order->email = $data->email;
         $order->phone = $data->phone;
         $order->address = $data->address;
         $order->user_id = $data->user_id;

         $order->product_title = $data->product_title;
         $order->price = $data->price;
         $order->quantity = $data->quantity;
         $order->image = $data->image;
         $order->product_id = $data->Product_id;

         $order->payment_status = 'cash on delivery';
         $order->delivery_status = 'Processing';

        $order->save();

        $cart_id=$data->id;
        $cart=cart::find($cart_id);
        $cart->delete();


     }
     return redirect()->back()->with('message','your order details has been submitted . Soon Connect with you ....');

     
   }


  	public function show_order_home(){
		if (Auth::id()) {
			$user = Auth::user();
			$userid = $user->id;
			$order = order::where('user_id','=',$userid)->get();
			$total_cart = Cart::all()->count();
			return view('home.order',compact('order','total_cart'));

		}
		else{
			return redirect ('login');
		}
	
	}
	public function cancel_order($id){
		$order=order::find($id);
		$order->delivery_status = 'You canceled the order';
		$order->save();
		Alert::info('Order cancel successfully','Your order is cancelled');
        return redirect()->back(); 
   }
   public function Contact_us()
   {
	if (Auth::id()) {
		$user = Auth::user();
		$id = $user->id;
		$contact = Contact::where('id','=',$id)->get();
	    $total_cart = Cart::all()->count();
	   return view('home.contactus',compact('total_cart','contact'));
	}
	else{
		return redirect ('login');
	}
   }
   public function store(Request $request)
   {
	   $request->validate([
		   'name' => 'required',
		   'email' => 'required|email',
		   'phone' => 'required|digits:10|numeric',
		   'subject' => 'required',
		   'message' => 'required'
	   ]);
 
	   Contact::create($request->all());
 
	   return redirect()->back()
						->with(['success' => 'Thank you for your Feedback']);
   }
   public function product_search(Request $request){
       $total_cart = Cart::all()->count();
       $search_text = $request->search;
       $producty =  Product::where('title','like','%' .$request->search. '%')->orwhere('description','like','%' .$request->search. '%')->orwhere('category','like','%' .$request->search. '%')->orwhere('price','like','%' .$request->search. '%')->paginate(10);
       return view('home.shop_now',compact('producty','total_cart'));
	
}
public function about_us(){
	$total_cart = Cart::all()->count();
	return view('home.about_us',compact('total_cart'));
}
}

