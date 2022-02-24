
@extends('layouts.app')
@section('content')
<h1>Danh sách Sản Phẩm</h1>
    <div class="list-item d-flex flex-wrap justify-content-start">
    @foreach ($products as $product)
            <div class="item mr-3 col-md-3">
                <form action="{{route('order.addToCart')}}" method="POST">
                    @csrf
                    <input type="text" value="{{$product->id}}" name="product_id" hidden>
                    <div class="">
                        <img src="{{url('images/'.$product->ProductImage()->first()->name)}}" class="img-item" alt="">
                    </div>

                    <div class="content">
                        <div class="name-item">
                            {{$product->name}}
                        </div>

                        <div class="price-item">
                            {{$product->price}}
                        </div>

                        <button type="button" class="btn btn_Add_Cart btn-primary">Add to cart</button>
                    </div>
                </form>
            </div>

    @endforeach
    </div>

<div>
    {{$products->links()}}
</div>
@endsection
