@extends('Cms::admin.admin')
@section('content')
    <div class="row"  style="height: 650px">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
                <h6 class="text-white text-capitalize ps-3">Bảng hóa đơn</h6>

              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã hóa đơn</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên khách hàng</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày đặt tour</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tổng tiền</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bill as $b)
                    <tr>
                        <td>
                          <div class="d-flex px-2 py-1">
                            <div class="d-flex flex-column justify-content-center">
                              <h6 class="mb-0 text-sm" style="padding-left: 35px">{{$b->id}}</h6>
                            </div>
                          </div>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0">{{$b->name}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0" style="text-align: center;">{{$b->date}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0" style="text-align: center;">{{number_format($b->total)}}</p>
                        </td>
                        <td>
                            <p class="text-xs font-weight-bold mb-0" style="text-align: center;">
                                @if($b->order->status == \App\Enums\Status::PENDING->value)
                                    <button type="button" class="btn btn-outline-secondary btn-sm">Đã đặt</button>
                                @elseif($b->order->status == \App\Enums\Status::CHECK_IN->value)
                                    <button type="button" class="btn btn-outline-info btn-sm">Đang diễn ra</button>
                                @elseif($b->order->status == \App\Enums\Status::CHECK_OUT->value)
                                    <button type="button" class="btn btn-outline-success btn-sm">Đã thanh toán</button>
                                @elseif($b->order->status == \App\Enums\Status::CANCEL->value)
                                    <button type="button" class="btn btn-outline-danger btn-sm">Đã hủy</button>
                                @endif
                            </p>
                        </td>
                        <td class="align-middle text-center text-sm d-flex justify-content-center">
                          <a href="{{url('admin/billdetail', $b->id)}}" class="btn btn-primary" style="margin-right: 5px">Xem</a>
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
