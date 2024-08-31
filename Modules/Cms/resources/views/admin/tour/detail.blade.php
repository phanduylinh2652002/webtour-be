@extends('admin.admin')
@section('content')
    <div class="row" style="min-height: 650px">
        <div class="col-12">
            <div class="car my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                      <h6 class="text-white text-capitalize ps-3">Chi tiết Tour</h6>
                          <button class="btn  ">
                              <a class="text-white" href="{{route('tour.index')}}">Quay lại</a>
                          </button>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Mã tour</h4>
                        <span>{{$tours->tour_id}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Loại tour</h4>
                        <span>{{$category->category_name}}</span>
                    </div>
                    <div class="mt-2" style="margin-left: 15px">
                        <h4>Tên tour</h4>
                        <span>{{$tours->tour_name}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Ảnh tour</h4>
                        <img src="{{URL::to('/')}}/images/{{$tours->tour_image}}" alt="" width="200px">
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Giá tour</h4>
                        <span>{{number_format($tours->tour_price)}} VNĐ</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Giá giảm</h4>
                        <span>{{number_format($tours->tour_discount)}} VNĐ</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Hướng dẫn viên</h4>
                        <span>{{$tourGuide->tourGuide_name}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Các điểm đến</h4>
                        <span>{{$tours->tour_place}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Phương tiện</h4>
                        <span>{{$tours->tour_vehicle}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Điểm khởi hành</h4>
                        <span>{{$tours->tour_locationStart}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Điểm đến</h4>
                        <span>{{$tours->tour_locationEnd}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Thời lượng tour</h4>
                        <span>{{$tours->tour_quantytiDate}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Ngày khởi hành</h4>
                        <span>{{$tours->tour_dateStart}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Ngày kết thúc</h4>
                        <span>{{$tours->tour_dateEnd}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Mô tả</h4>
                        <span>{{$tours->tour_description}}</span>
                    </div>
                    <div class="info_group mt-2" style="margin-left: 15px">
                        <h4>Hành trình</h4>
                        <span>{{$tours->tour_trip}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection