
@extends('layouts.app')
@section('content')
{{session()->get('msg')}}
<div class="cart">
    <h1 class="title">Đơn Hàng</h1>
    @if (!empty($order->user_id))
        <div class="user_id">Mã KH: {{$order->user_id}}</div>
    @else
        <div class="user_id">Mã KH: {{$order->guest_id}}</div>
    @endif

    <div class="order_id">Mã Đơn Hàng: {{$order->id}}</div>

    <div class="customer_name">Tên Khách Hàng: {{$order->customer_name}}</div>
    <div class="phone_number">Số Điện Thoại: {{$order->phone_number}}</div>
    <div class="address">Địa chỉ giao hàng: {{$order->address}}</div>
    <div class="pay_method">Phương thức thanh toán: {{$payment_method}}</div>

<table class="table">
    <thead>
        <tr>
            <th>Mã Sản Phẩm</th>
            <th>Tên Sản Phẩm</th>
            <th>Giá</th>
            <th>Khuyến Mại</th>
            <th>Số Lượng</th>
            <th>Thành Tiền</th>
        </tr>
    </thead>
    <tbody class="tbody">
        @if (($products))
            @foreach ($products as $key => $product)
            <tr>
                <td scope="row">{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>0</td>
                <td>
                    <div>
                        <input class="amount" value="{{$odProducts[$key]->amount}}" style="width: 35px" disabled>
                    </div>
                </td>
                {{-- <td>tồn kho</td> --}}
                <td class="into_money">{{$product->price*$odProducts[$key]->amount}}</td>
            </tr>
            @endforeach
        @endif
    </tbody>
</table>
<div class="text-right">Tổng cộng: <span id="total_money">{{$totalAmount}}</span>đ</div>
<form action="{{route('order.buyCart',)}}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary">Đặt Hàng</button>
    <div class="clearfix"></div>
</form>




</div>

@endsection
