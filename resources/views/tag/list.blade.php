
@extends('layouts.app')
@section('content')
{{session()->get('msg')}}
<h1>Quản lý Tag</h1>
<a class="btn btn-primary" href="{{route('tag.create')}}" role="button">Tạo</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Danh sách Thẻ (Tag)</th>
            <th colspan="2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tags as $tag)
            <tr>
            {{-- TITLE --}}
            <td scope="row">{{$tag->name}}</td>
            {{-- EDIT BUTTON --}}
            <td><a class="btn btn-primary" href="{{route('tag.edit',$tag->id)}}" role="button">EDIT</a></td>
            {{-- DELETE BUTTON --}}
            <td><form action="{{route('tag.destroy',$tag->id)}}" method="post">
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
    {{$tags->links()}}
</div>
@endsection
