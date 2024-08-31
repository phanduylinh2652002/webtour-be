@extends('Cms::admin.admin')
@section('content')
    <div style="min-height: 650px">
        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
            <h3 class="text-white text-capitalize ps-3">Cập nhật thông tin hướng dẫn viên</h3>
            <button class="btn  ">
                <a class="text-white" href="{{route('tourguide.index')}}">Quay lại</a>
            </button>
        </div>
        <form role="form" class="text-start" action="{{route('tourguide.update', $tourguide->id)}}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Họ tên</label> <br>
                <input type="text" class="form-control" name="name" value="{{$tourguide->name}}">
            </div>
            @error('name')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="input-group input-group-static my-3">
                <label>Ngày sinh</label>
                <input type="date" class="form-control" name="birthday" value="{{ $tourguide->birthday }}">
            </div>
            @error('birthday')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div>
                <label>Giới tính</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="customRadio1"
                           value="{{ \App\Enums\Gender::MALE->value }}"
                           @if($tourguide->gender === App\Enums\Gender::MALE->value) checked @endif>
                    <label class="custom-control-label" for="customRadio1">Nam</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="customRadio2"
                           value="{{ \App\Enums\Gender::FEMALE->value }}"
                           @if($tourguide->gender === App\Enums\Gender::FEMALE->value) checked @endif>
                    <label class="custom-control-label" for="customRadio2">Nữ</label>
                </div>
                @error('gender')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="{{$tourguide->email}}">
            </div>
            @error('email')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" class="form-control" name="phone" value="{{$tourguide->phone}}">
            </div>
            @error('phone')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="input-group input-group-static my-3">
                <label>Ảnh</label>
                <input type="file" class="form-control" name="avatar">
                <img src="{{ URL::to('/') }}/images/{{ $tourguide->avatar }}" class="img-thumbnail" width="100" />
                <input type="hidden" name="hidden_image" value="{{ $tourguide->avatar }}" />
            </div>
            @error('avatar')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="input-group input-group-outline my-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" name="address" value="{{$tourguide->address}}">
            </div>
            @error('address')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Sửa</button>
            </div>
        </form>
    </div>
@endsection
