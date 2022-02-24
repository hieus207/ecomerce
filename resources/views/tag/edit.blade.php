@extends('layouts.app')
@section('content')
<form action="{{route('tag.update',$tag->id)}}" method="post">
    @method("put")
    @csrf

    <div class="form-group">
        <label for="name">Tên Thẻ (Tag)</label>
        <input type="text"
          class="form-control" name="name" aria-describedby="helpId" value="{{$tag->name}}">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" name="description" cols="10" rows="10">{{$tag->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
