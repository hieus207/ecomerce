@extends('layouts.app')
@section('content')
<form action="{{route('category.store')}}" method="post">
    @csrf
    <div class="form-group">
      <label for="catalog_id">Danh mục</label>
      <select class="form-control" name="catalog_id">
        @foreach ($catalogs as $catalog)
            <option value="{{$catalog->catalog_id}}">{{$catalog->title}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="name">Tiêu đề Tiểu Mục</label>
        <input type="text"
          class="form-control" name="name" aria-describedby="helpId" placeholder="">

        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Mô tả tiểu mục</label>
        <textarea class="form-control" name="description" cols="10" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection


