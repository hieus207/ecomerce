
@extends('layouts.app')
@section('content')
{{session()->get('msg')}}
<h1>Quản lý danh mục</h1>
<a class="btn btn-primary" href="{{route('catalog.create')}}" role="button">Tạo</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Danh sách Danh Mục</th>
            <th colspan="2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($catalogs as $catalog)
            <tr>
            {{-- TITLE --}}
            <td scope="row">{{$catalog->title}}</td>
            {{-- EDIT BUTTON --}}
            <td><a class="btn btn-primary" href="{{route('catalog.edit',$catalog->catalog_id)}}" role="button">EDIT</a></td>
            {{-- DELETE BUTTON --}}
            <td><form action="{{route('catalog.destroy',$catalog->catalog_id)}}" method="post">
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
    {{$catalogs->links()}}
</div>
@endsection
