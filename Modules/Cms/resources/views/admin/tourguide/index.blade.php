@extends('Cms::admin.admin')
@section('content')
    <div class="row"  style="height: 650px">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                <h6 class="text-white text-capitalize ps-3">Bảng hướng dẫn viên du lịch</h6>

                    <button class="btn  ">
                        <a class="text-white" href="{{route('tourguide.create')}}">Thêm mới</a>
                    </button>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã hướng dẫn viên</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Họ tên</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số điện thoại</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa chỉ</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($query as $item)
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm" style="padding-left: 35px">{{$item->id}}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$item->name}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0" style="text-align: center;">{{$item->email}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0" style="text-align: center;">{{$item->phone}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0" style="text-align: center;">{{$item->address}}</p>
                        </td>
                        <td class="align-middle text-center text-sm d-flex justify-content-center">
                          <a href="{{route('tourguide.show', $item->id)}}" class="btn btn-primary" style="margin-right: 5px">Xem</a>
                          <a href="{{route('tourguide.edit', $item->id)}}" class="btn btn-primary">Sửa</a>
                          <form action="{{route('tourguide.destroy', $item->id)}}" method="post" style="margin-left: 5px">
                            @method('DELETE')
                            @csrf
                          <button  type="submit" class="btn btn-primary"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                            >Xóa</button>
                          </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
