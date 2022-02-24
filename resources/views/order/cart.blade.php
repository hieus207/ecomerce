
@extends('layouts.app')
@section('content')
{{session()->get('msg')}}
<div class="cart">
    <h1 class="title">Giỏ Hàng</h1>
    @if (!empty($order->user_id))
        <div class="user_id">Mã KH: {{$order->user_id}}</div>
    @else
        <div class="user_id">Mã KH: {{$order->guest_id}}</div>
    @endif

    <div class="order_id">Mã Order: {{$order->id}}</div>

<table class="table">
    <thead>
        <tr>
            <th>Mã Sản Phẩm</th>
            <th>Ảnh Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Khuyến Mại</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
            <th>Xóa bỏ</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @if (($products))
            @foreach ($products as $key => $product)
            <tr>
                <td scope="row">{{$product->id}}</td>
                <td><img src="{{url('images/'.$product->ProductImage()->first()->name)}}" class="img-item" alt=""></td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>0</td>
                <td>
                    <div>
                        <button type="button" class="btn_minus">-</button>
                        <input class="amount" value="{{$odProducts[$key]->amount}}" style="width: 35px">
                        <button type="button" class="btn_plus">+</button>
                    </div>
                    Tồn kho
                    <span class="inventory">{{$product->quantity}}</span>
                </td>
                {{-- <td>tồn kho</td> --}}
                <td class="into_money">{{$product->price*$odProducts[$key]->amount}}</td>
                <td>
                    <form action="{{route('order.rmFromCart')}}" method="post">
                        <input type="text" value="{{$product->id}}" name="product_id" hidden>
                        <input type="text" value="{{$order->id}}" name="order_id" hidden>
                        <button type="button" class="btn btn-danger btn_Rm_Cart">DELETE</button>
                        {{-- btn_Rm_Cart --}}
                    </form>
                </td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="text-right">Tổng cộng: <span id="total_money">0</span>đ</div>

<a name="" id="" class="btn btn-primary float float-right" href="{{route('order.getInfoCart')}}" role="button">Tiếp tục (1/2)</a>
<div class="clearfix"></div>


</div>

@endsection
