@extends('layouts.app')
@section('content')
<form action="{{route('catalog.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Tiêu đề Danh Mục</label>
        <input type="text"
          class="form-control" name="title" aria-describedby="helpId" placeholder="">

        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Mô tả danh mục</label>
        <textarea class="form-control" name="content" cols="10" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection


