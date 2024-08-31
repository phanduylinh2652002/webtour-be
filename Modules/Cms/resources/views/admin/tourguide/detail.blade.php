@extends('Cms::admin.admin')
@section('content')
    <div class="row" style="min-height: 650px">
        <div class="col-12">
            <div class="car my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                      <h6 class="text-white text-capitalize ps-3">Thông tin hướng dẫn viên</h6>
                          <button class="btn  ">
                              <a class="text-white" href="{{route('tourguide.index')}}">Quay lại</a>
                          </button>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Mã hướng dẫn viên</h4>
                        <span>{{$tourguide->id}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Họ tên</h4>
                        <span>{{$tourguide->name}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Ngày sinh</h4>
                        <span>{{$tourguide->birthday}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Giới tính</h4>
                        <span>{{$tourguide->name === \App\Enums\Gender::MALE->value ? 'Nam' : 'Nữ'}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Ảnh tour</h4>
                        <img src="{{URL::to('/')}}/images/{{$tourguide->avatar}}" alt="" width="200px">
                    </div>
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Email</h4>
                        <span>{{$tourguide->email}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Số điện thoại</h4>
                        <span>{{$tourguide->phone}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Địa chỉ</h4>
                        <span>{{$tourguide->address}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
