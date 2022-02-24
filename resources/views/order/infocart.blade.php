@extends('layouts.app')
@section('content')
    {{-- ROUTE ORDER CONFIRM --}}
    <form action="{{route('order.confirmCart')}}" method="POST">
        @csrf
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Họ và tên: </label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="name" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Số Điện Thoại: </label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="phoneNumber" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label for="" class="col-sm-2 col-form-label">Địa Chỉ: </label>
          <div class="col-sm-5">
            <input type="text" class="form-control" name="address" placeholder="">
          </div>
        </div>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Phương thức thanh toán: </label>
            <div class="col-sm-5">
                <select name="paymethod" class="form-control">
                    {{-- LIST PAYMENT METHOD FROM DB --}}
                    @foreach ($payment_methods as $paymethod)
                        <option value="{{$paymethod->id}}">{{$paymethod->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary float float-right" href="#" role="button">Trở Lại</a>
    </form>

@endsection
