@extends('Cms::admin.admin')
@section('content')
    <div style="min-height: 650px">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
            <h3 class="text-white text-capitalize ps-3">Thêm hướng dẫn viên</h3>
            <button class="btn  ">
                <a class="text-white" href="{{route('tourguide.index')}}">Quay lại</a>
            </button>
        </div>
        <form role="form" class="text-start" action="{{route('tourguide.store')}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Họ tên</label> <br>
                <input type="text" class="form-control" name="name">
            </div>
            @if ($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
            <div class="input-group input-group-static my-3">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name="birthday">
            </div>
            @if ($errors->has('birthday'))
                <p class="text-danger">{{ $errors->first('birthday') }}</p>
            @endif
            <div>
                <label>Giới tính</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="customRadio1"
                           value="{{ \App\Enums\Gender::MALE->value }}">
                    <label class="custom-control-label" for="customRadio1">Nam</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="customRadio2"
                           value="{{ \App\Enums\Gender::FEMALE->value }}">
                    <label class="custom-control-label" for="customRadio2">Nữ</label>
                </div>
                @if ($errors->has('gender'))
                    <p class="text-danger">{{ $errors->first('gender') }}</p>
                @endif
            </div>
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            @if ($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="phone">
            </div>
            @if ($errors->has('phone'))
                <p class="text-danger">{{ $errors->first('phone') }}</p>
            @endif
            <div class="input-group input-group-static my-3">
                <label>Ảnh</label>
                <input type="file" class="form-control" name="avatar">
            </div>
            @if ($errors->has('avatar'))
                <p class="text-danger">{{ $errors->first('avatar') }}</p>
            @endif
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="address">
            </div>
            @if ($errors->has('address'))
                <p class="text-danger">{{ $errors->first('address') }}</p>
            @endif
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Thêm mới</button>
            </div>
        </form>
    </div>
@endsection
