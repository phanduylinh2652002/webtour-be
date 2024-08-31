@extends('Cms::admin.admin')
@section('content')
<div style="height: 650px">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
        <h3 class="text-white text-capitalize ps-3">Thêm địa điểm</h3>
        <button class="btn  ">
            <a class="text-white" href="{{route('place.index')}}">Quay lại</a>
        </button>
    </div>
    <form role="form" class="text-start" action="{{route('place.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Địa điểm</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Thêm mới</button>
        </div>
    </form>
</div>
@endsection
