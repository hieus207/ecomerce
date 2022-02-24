@extends('layouts.app')
@section('content')
<form action="{{route('category.update',$category->id)}}" method="post">
    @method("put")
    @csrf

    <div class="form-group">
        <label for="catalog_id">Chọn Danh mục</label>
        <select class="form-control" name="catalog_id">
          @foreach ($catalogs as $catalog)
              @if ($of_catalog->catalog_id==$catalog->catalog_id)
              <option value="{{$catalog->catalog_id}}" selected>{{$catalog->title}}</option>
              @else
              <option value="{{$catalog->catalog_id}}">{{$catalog->title}}</option>
              @endif
          @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="name">Tiêu đề Tiểu Mục</label>
        <input type="text"
          class="form-control" name="name" aria-describedby="helpId" value="{{$category->name}}">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Mô tả tiểu mục</label>
        <textarea class="form-control" name="description" cols="10" rows="10">{{$category->description}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
