<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\order;
use App\Models\Contact;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;


class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request){
        $data = new Category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message',"Category Added successfully");
        
    }
    public function delete_category($id){
                $data=Category::find($id);
                $data->delete();
                return redirect()->back()->with('message','Category deleted succsfully');
    }
    public function view_product(){
        $category=Category::all();
        return view('admin.product',compact('category'));
    }
    public function add_product(Request $request){
        $product=new Product;

        $product -> title=$request ->title;
        $product -> description=$request ->description;
        $product -> price=$request ->Price;
        $product -> quantity=$request ->quantity;
        $product -> discount_price=$request ->dis_price;
        $product -> category=$request ->category;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
        $product->save();

        return redirect()->back()->with('message','Product Added Successfully');

    }

    public function show_product(){
        $product = Product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product deleted succsfully');
}
   public function update_product($id){
       $product=Product::find($id);
       $Category = Category::all();

       return view('admin.update',compact('product','Category'));
   }

   public function update_product_confirm(Request $request , $id){
    $product=Product::find($id);

    $product -> title=$request ->title;
    $product -> description=$request ->description;
    $product -> price=$request ->Price;
    $product -> quantity=$request ->quantity;
    $product -> discount_price=$request ->dis_price;
    $product -> category=$request ->category;
    $image=$request->image;
    if ($image) {
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
    }
  
    $product->save();

    return redirect()->back()->with('message','Updated Successfully');


   }
   public function show_order(){
    $order = order::all();
    return view('admin.show_order',compact('order'));
}
   
    public function delivered($id){
        $order = order::find($id);
        $order->delivery_status = 'Delivered';   
        $order->payment_status = 'Paid';   
        $order->save();
        return redirect()->back(); 
    }
    public function Print_pdf($id){
        $order=order::find($id);
        $pdf = PDF::loadview('admin.pdf',compact('order'));
        return $pdf->download('order_details');
    }
    public function searchdata(Request $request){
        if ($request->search) {
            $order =  order::where('name','like','%' .$request->search. '%')->orwhere('product_title','like','%' .$request->search. '%')->orwhere('phone','like','%' .$request->search. '%')->orwhere('email','like','%' .$request->search. '%')->orwhere('description','like','%' .$request->search. '%')->get();
            return view('admin.show_order',compact('order'));

        }
        else{
            return redirect()->back(); 

        }
    }
    public function feedback(){
        $feedback = Contact::all();
        return view('admin.feedback',compact('feedback'));
    }
}
