@extends('layouts.app')
@section('content')
<form action="{{route('post.store')}}" method="post">
    @csrf
    <div class="form-group">
        <label for="title">Tiêu đề Bài Viết</label>
        <input type="text"
          class="form-control" name="title" aria-describedby="helpId" placeholder="">

        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Nội dung Bài Viết</label>
        <textarea class="form-control" name="content" cols="10" rows="10"></textarea>
    </div>

    <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="isshow" value="1" checked>
        Public
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="isshow" value="0">
        Private
        </label>
    </div>

    <div class="form-group">
        <label for="quantity">Danh sách ảnh</label>
        <input type="text"
          class="form-control" name="img_name" id="images" aria-describedby="helpId" placeholder="">
    </div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
       <i class="fa fa-folder-open" aria-hidden="true"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <iframe src="{{url('file/dialog.php?field_id=images')}}" style="width:100%; height:500px; overflow-y:auto; border:none"></iframe>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Thêm</button>
</form>
@endsection


