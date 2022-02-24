<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaymentMethod;
use App\Models\Product;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class OrderController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }

    public function show($id)
    {
        //


    }

    public function buyCart(Request $request){
        if(Auth()->user()){
            $order = Order::where('user_id',Auth()->user()->id)->where('status',0)->first();
        }
        else if($request->session()->has('guest_id')){

            $guest_id = $request->session()->get('guest_id');
            // get order follow guest id
            $order = Order::where('guest_id',$guest_id)->where('status',0)->first();

        }
        if(empty($order)){
            return redirect(route('order.edtCart'));
        }
        $order->status = 1;
        $order->save();
        return redirect(route('welcome'));
    }
    public function confirmCart(Request $request){
        if(Auth()->user()){
            $order = Order::where('user_id',Auth()->user()->id)->where('status',0)->first();
        }
        else if($request->session()->has('guest_id')){

            $guest_id = $request->session()->get('guest_id');
            // get order follow guest id
            $order = Order::where('guest_id',$guest_id)->where('status',0)->first();

        }
        if(empty($order)){
            return redirect(route('order.edtCart'));
        }

        $products = Product::whereIn('id',OrderProduct::where('order_id',$order->id)->orderBy('created_at','ASC')->pluck('product_id'))->get();
        // dd($products);
        $prodImg = array();
        foreach($products as $product){
            array_push($prodImg,$product->ProductImage()->first());
        }
        // dd($idProducts);
        // $order->save();
        $odProducts = OrderProduct::where('order_id',$order->id)->get();

        $totalAmount =0;
        foreach($odProducts as $od){
            $price=Product::find($od->product_id)->price;
            $totalAmount+=$od->amount*$price;

        }

        $order->customer_name = $request->name;
        $order->phone_number = $request->phoneNumber;
        $order->address = $request->address;
        $order->payment_method=$request->paymethod;
        $order->total=$totalAmount;
        $payment_method = PaymentMethod::find($request->paymethod)->first()->name;
        // $payment_method->Order()->save($order);
        $order->save();
        return view('order.confirm',compact('order','products','odProducts','totalAmount','payment_method'));
    }

    public function getInfoCart(Request $request){
        $payment_methods = PaymentMethod::all();
        return view('order.infocart',compact('payment_methods'));
    }

    public function saveCart(Request $request){
        $order_id = $request->order_id;
        $product_ids=$request->product_ids;
        $amounts=$request->amounts;
        $order = Order::find($order_id);
        for($i=0; $i<sizeof($product_ids); $i++){
            $orderProduct = OrderProduct::where('order_id',$order_id)->where('product_id',$product_ids[$i])->get()->first();

            $orderProduct->amount=$amounts[$i];

            $orderProduct->save();

        }

        return response()->json(['status' => 'OK', 'action' => 'saveCart','order_id' => $order_id]);
    }

    public function edtCart(Request $request){
        if(Auth()->user()){
            $order = Order::where('user_id',Auth()->user()->id)->where('status',0)->first();
            if(empty($order))
                {
                    $order = new Order();
                    $order->user_id=Auth()->user()->id;
                    $order->save();
                }

        }
        else
        if($request->session()->has('guest_id')){

            $guest_id = $request->session()->get('guest_id');
            // get order follow guest id
            $order = Order::where('guest_id',$guest_id)->where('status',0)->first();

            if(empty($order))
                {
                    $order = new Order();
                    $order->guest_id=$guest_id;
                    $order->save();
                }
        }

        $products = Product::whereIn('id',OrderProduct::where('order_id',$order->id)->orderBy('created_at','ASC')->pluck('product_id'))->get();
        // dd($products);
        $prodImg = array();
        foreach($products as $product){
            array_push($prodImg,$product->ProductImage()->first());
        }
        // dd($idProducts);
        // $order->save();
        $odProducts = OrderProduct::where('order_id',$order->id)->get();
        if($request->type=="api"){
            return json_encode(array($products,$order,$prodImg));
        }
        else
            return view('order.cart',compact('order','products','odProducts'));

    }

    public function addToCart(Request $request){
        // $request->product_id!!
        if(Auth()->user()){
            $order = Order::where('user_id',Auth()->user()->id)->where('status',0)->first();
            if(empty($order))
                {
                    $order = new Order();
                    $order->user_id=Auth()->user()->id;
                    $order->save();
                }

        }
        else
        if($request->session()->has('guest_id')){

            $guest_id = $request->session()->get('guest_id');
            // get order follow guest id
            $order = Order::where('guest_id',$guest_id)->where('status',0)->first();

            if(empty($order))
                {
                    $order = new Order();
                    $order->guest_id=$guest_id;
                    $order->save();
                }
        }
        // $product = Product::find($request->product_id);
        $odProduct = OrderProduct::where('order_id',$order->id)->where('product_id',$request->product_id)->first();
        if(empty($odProduct))
        {
            $odProduct = new OrderProduct();
            $odProduct->order_id=$order->id;
            // 23 = request->product_id
            $odProduct->product_id=$request->product_id;

        }

        // THEM VAO PRODUCT
        $order->OrderProduct()->save($odProduct);
        $products = Product::whereIn('id',OrderProduct::where('order_id',$order->id)->pluck('product_id'))->get();
        // dd($idProducts);
        // $order->save();

        // return view('order.cart',compact('order','products'));
        return response()->json(['status' => 'OK', 'action' => 'addToCart','order_id',$order->id]);


    }

    public function rmFromCart(Request $request)
    {
        // request->order_id,product_id!!
        // if($request->session()->has('guest_id')){
        //     $guest_id = $request->session()->get('guest_id');
        if(OrderProduct::where('order_id',$request->order_id)->where('product_id',$request->product_id)->delete())
            return response()->json(['status' => 'OK', 'action' => 'rmFromCart']);
        else
            return response()->json(['status' => 'OK', 'action' => 'rmFromCart']);
        // }

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

}
