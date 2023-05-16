<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;



use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use PDF;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;
use Illuminate\Support\Facades\Notification;
class AdminController extends Controller
{
    public function view_category(){
        // lấy tất cả dữ liệu và lưu trữ nó trong biên data
        if(Auth::id()){
            $data = category::all();
            return view('admin.category', compact('data'));
        } 
        else{
            return redirect('login');
        }
    }
    public function add_category(Request $request){
        $data = new category;
        $data->category_name=$request->category;

        $data->save();
        return redirect()->back()->with('message_add','Category Added Successfully');
    }

    public function delete_category($id){
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message_delete','Category Deleted Successfully');;
    }

    public function view_product() {
        $category = category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request) {
        $product = new product;
        // gọi từ bên cơ sở dữ liệu = yêu cầu tgiá trị của product.blade.php
        $product->title= $request->title;
        $product->description= $request->description;
        $product->price= $request->price;
        $product->quantity= $request->quantity;
        $product->discount_price= $request->dis_price;
        $product->category= $request->category;

        //gọi biến image và lưu trữ hình ảnh trong biến đó
        $image = $request->image;
        //lưu hình ảnh tại biến $imagename
        $imagename=time().'.'.$image->getClientOriginalExtension();
        //đén nơi lưu hình ảnh trong thư mục product
        $request->image->move('product', $imagename);
        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('message_add_product', 'Product Added Successfully');
    }

    public function show_product(){
        //lấy dữ liệu từ bảng sản phẩm và gửi nó đến trang show_product

        //lấy dữ liệu từ bảng sản phẩm
        $product= product::all();
        return view('admin.show_product', compact('product'));
    }

    //$id để tìm đến $id bên web.php
    public function delete_product($id){
        //tim id và lưu vào bộ nhớ cache
        $product= product::find($id);
        //xóa sản phẩm có id vừa tìm được
        $product->delete();
        //xóa xong ở lại trên cùng 1 trang
        return redirect()->back()->with('message_delete_show_product', 'Product Delete Successfully');

    }

    public function update_product($id){
            $product=product::find($id);
            return view('admin.show_product', compact('product'));

    }

    public function add_product_from_show(Request $request){
        $validator = Validator::make($request->all(), [
            'title'=>'required|max:191',
            'description'=>'required|max:191',
            'category'=>'required|max:191',
            'quantity'=>'required|max:191',
            'price'=>'required|max:191',
            'discount_price'=>'required|max:191',
            
        ]);
        // $product = new Product();
        if ($validator->fails()) {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),
            ]);
        }
        else{
            $product = new Product;
            $product->title = $request->input('title');
            $product->description = $request->input('description');
            $product->category = $request->input('category');
            $product->quantity = $request->input('quantity');
            $product->price = $request->input('price');
            $product->discount_price = $request->input('discount_price');
          
            $product->save();
            return response()->json([
                'status'=>200,
                'message'=>'Product Addded Successfully',
            ]);
        }
    }

    // public function fetchproduct(){
    //     $product = Product::all();
    //     return response()->json([
    //         'product'=>$product,
    //     ]);
    // }

        public function order() {
            $order = order::all();

            return view('admin.order', compact('order'));
        }

        public function delivered($id) {
            //tìm id sản phẩm 
            $order = order::find($id);
            //khi ai đó bấm vào delivered thì sẽ đổi từ processing thành delivered
            $order->delivery_status = "Delivered";

            $order->payment_status='Paid';

            $order->save();

            return redirect()->back();

        }

        public function print_pdf($id) {
            $order= order::find($id);
            $pdf=PDF::loadview('admin.pdf', compact('order'));
            return $pdf -> download('order_details.pdf');
        }

        public function send_email($id) {
            //lây dữ liệu cho 1 id cụ thể và lưu trữ nó trong $order
            $order= order::find($id);
            return view('admin.email_info', compact('order'));
        }

        public function send_user_email(Request $request , $id){

            //tìm sản phẩm cụ thể bằng cách sử dụng id
            $order = order::find($id);

            //khi bấm vào submit thì toàn bộ dữ liệu sẽ lưu trong biến $details
            $details = [
                'greeting'=>$request->greeting,
                'firstline'=>$request->firstline,
                'body'=>$request->body,
                'button'=>$request->button,
                'url'=>$request->url,
                'lastline'=>$request->lastline,
                

            ];

            //gửi chi tiết $details tới trang SendEmailNotification và nó sẽ tự đồng gửi email
            Notification::send($order, new SendEmailNotification($details));
            

            return redirect()->back();

        }

        public function searchdata(Request $request) {
            $searchText= $request->search;
            $order= order::where('quantity', 'LIKE',"%$searchText%")->orwhere('product_title', 'LIKE',"%$searchText%")->orwhere('payment_status', 'LIKE',"%$searchText%")->get();
            return view('admin.order', compact('order'));
        }


}
