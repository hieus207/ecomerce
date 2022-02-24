@extends('layouts.app')
@section('content')
<form action="{{route('tag.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Tên thẻ (Tag)</label>
        <input type="text"
          class="form-control" name="name" aria-describedby="helpId" placeholder="">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Mô tả</label>
        <textarea class="form-control" name="description" cols="10" rows="10"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection


