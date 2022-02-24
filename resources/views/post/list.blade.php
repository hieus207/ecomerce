
@extends('layouts.app')
@section('content')
{{session()->get('msg')}}
<h1>Quản lý bài viết</h1>
<a class="btn btn-primary" href="{{route('post.create')}}" role="button">Tạo</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Danh sách Bài Viết</th>
            <th colspan="2">Hành động</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            <tr>
            {{-- TITLE --}}
            <td scope="row">{{$post->title}}</td>
            {{-- EDIT BUTTON --}}
            <td><a class="btn btn-primary" href="{{route('post.edit',$post->id)}}" role="button">EDIT</a></td>
            {{-- DELETE BUTTON --}}
            <td><form action="{{route('post.destroy',$post->id)}}" method="post">
                @csrf
                @method("delete")
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
            </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{$posts->links()}}
</div>
@endsection
