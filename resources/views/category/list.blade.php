
@extends('layouts.app')
@section('content')
{{session()->get('msg')}}
<h1>Quản lý tiểu mục</h1>
<a class="btn btn-primary" href="{{route('category.create')}}" role="button">Tạo</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Danh sách Tiểu Mục</th>
            <th>Thuộc Danh Mục</th>
            <th colspan="2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
            {{-- TITLE --}}
            <td scope="row">{{$category->name}}</td>
            <td>{{$category->Catalog->title}}</td>
            {{-- EDIT BUTTON --}}
            <td><a class="btn btn-primary" href="{{route('category.edit',$category->id)}}" role="button">EDIT</a></td>
            {{-- DELETE BUTTON --}}
            <td><form action="{{route('category.destroy',$category->id)}}" method="post">
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
    {{$categories->links()}}
</div>
@endsection
