@extends('layouts.app')
@section('content')
<form action="{{route('product.update',$product->id)}}" method="post">
    @method("put")
    @csrf

    <div class="form-group">
        <label for="category_id">Chọn Tiểu mục</label>
        <select class="form-control" name="category_id">
          @foreach ($categories as $category)
              @if ($of_category->id==$category->id)
              <option value="{{$category->id}}" selected>{{$category->name}}</option>
              @else
              <option value="{{$category->id}}">{{$category->name}}</option>
              @endif
          @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="name">Tên Sản phẩm</label>
        <input type="text"
          class="form-control" name="name" aria-describedby="helpId" value="{{$product->name}}">

        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Mô tả Sản phẩm</label>
        <textarea class="form-control" name="description" cols="5" rows="5">{{$product->description}}</textarea>
    </div>

    <div class="form-group">
        <label for="specification">Thông số kỹ thuật</label>
        <textarea class="form-control" name="specification" cols="10" rows="10">{{$product->specification}}</textarea>
    </div>

    <div class="form-group">
        <label for="price">Giá</label>
        <input type="text"
          class="form-control" name="price" aria-describedby="helpId" value="{{$product->price}}">
    </div>

    <div class="form-group">
        <label for="quantity">Số lượng hàng</label>
        <input type="text"
          class="form-control" name="quantity" aria-describedby="helpId" value="{{$product->quantity}}">
    </div>

    <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="status" value="1" checked>
        Public
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
        <input type="radio" class="form-check-input" name="status" value="0">
        Private
        </label>
    </div>

    <div class="form-group">
        <label for="tags_id">Tags</label>
        @php
            $tagsId = $product->Tags()->pluck('id')->toArray();
        @endphp
        <select multiple class="form-control" name="tags_id[]">
            @foreach ($tags as $tag)
                @if (in_array($tag->id,$tagsId))
                <option value="{{$tag->id}}" selected>{{$tag->name}}</option>
                @else
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endif
            @endforeach
        </select>
    </div>

    @php
        $img_list="[";
        foreach ($product->ProductImage()->pluck('name') as $img) {
            $img_list.='"'.$img.'",';
        }
        $img_list.="]";

    @endphp
    <div class="form-group">
        <label for="quantity">Danh sách ảnh</label>
        <input type="text"
        {{-- ["vlcsnap-2021-02-10-14h50m51s474.png","vlcsnap-2021-02-10-14h50m51s474 (4).png","vlcsnap-2021-02-10-14h50m51s474 (3).png"] --}}
          class="form-control" name="image_list" id="images" aria-describedby="helpId" placeholder="" value="{{$img_list}}">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Sửa</button>
</form>
@endsection
