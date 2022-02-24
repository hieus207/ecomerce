
@extends('layouts.app')
@section('content')
{{session()->get('msg')}}
<h1>Quản lý Sản Phẩm</h1>
<a class="btn btn-primary" href="{{route('product.create')}}" role="button">Tạo</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Danh sách Sản Phẩm</th>
            <th>Thuộc Tiểu Mục</th>
            <th colspan="2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
            {{-- TITLE --}}
            <td scope="row">{{$product->name}}</td>
            <td>{{$product->Category->name}}</td>
            {{-- EDIT BUTTON --}}
            <td><a class="btn btn-primary" href="{{route('product.edit',$product->id)}}" role="button">EDIT</a></td>
            {{-- DELETE BUTTON --}}
            <td><form action="{{route('product.destroy',$product->id)}}" method="post">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">delete</button>
            </form>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{$products->links()}}
</div>
@endsection
