@extends('Cms::admin.admin')
@section('content')
<div style="min-height: 650px">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
        <h3 class="text-white text-capitalize ps-3">Sửa Tour</h3>
        <button class="btn  ">
            <a class="text-white" href="{{route('tour.index')}}">Quay lại</a>
        </button>
    </div>
    <form role="form" class="text-start" action="{{route('tour.update', $tour->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Mã tour</label> <br>
          <input type="text" class="form-control" name="id" value="{{$tour->id}}">
        </div>
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Tên tour</label> <br>
          <input type="text" class="form-control" name="name" value="{{$tour->name}}">
        </div>
        <div>
          <p>Loại tour</p>
          <select name="category_id" class="form-control border">
            <option value="">Chọn loại tour</option>
            @foreach($categories as $c)
            <option value="{{ $c->id }}" @if($tour->category_id === $c->id) selected @endif>{{ $c->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Giá tour</label>
            <input type="text" class="form-control" name="price" value="{{$tour->price}}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Giá giảm</label>
            <input type="text" class="form-control" name="discount" value="{{$tour->discount}}">
          </div>
          <div>
            <p >Ảnh</p>
            <input type="file" name="image"/>
            <img src="{{ URL::to('/') }}/images/{{ $tour->image }}" class="img-thumbnail" width="100" />
            <input type="hidden" name="hidden_image" value="{{ $tour->image }}" />
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Các điểm đến</label>
            <input type="text" class="form-control" name="place" value="{{$tour->place}}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Phương tiện</label>
            <input type="text" class="form-control" name="vehicle" value="{{$tour->vehicle}}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Điểm khởi hành</label>
            <input type="text" class="form-control" name="locationStart" value="{{$tour->locationStart}}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Điểm kết thúc</label>
            <input type="text" class="form-control" name="locationEnd" value="{{$tour->locationEnd}}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Thời lượng chuyến đi</label>
            <input type="text" class="form-control" name="quantytiDate" value="{{$tour->quantytiDate}}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Ngày khởi hành</label>
            <input type="text" class="form-control" name="dateStart" value="{{$tour->dateStart}}">
          </div>
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Ngày kết thúc</label>
            <input type="text" class="form-control" name="dateEnd" value="{{$tour->dateEnd}}">
          </div>
          <div class="input-group input-group-outline my-3" style="display: inline">
            <p>Mô tả</p>
            <textarea type="text" class="form-control mt-5" name="description"style="width: 100%;" id="trip">{{$tour->description}}</textarea>
          </div>
          <div class="input-group input-group-outline my-3" style="display: inline">
            <p>Hành trình</p>
            <textarea type="text" class="form-control mt-5" name="trip"style="width: 100%;" id="description">{{$tour->trip}}</textarea>
          </div>
          <div>
            <p class="form-label">Hướng dẫn viên</p>
            <select name="tourGuide_id" class="form-control border">
                <option>Chọn hướng dẫn viên</option>
                @foreach($tourguide as $tg)
                    <option value="{{$tg->id}}" @if ($tour->tour_guide_id == $tg->id) selected @endif>{{$tg->name}}</option>
                @endforeach
            </select>
          </div>
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Sửa</button>
        </div>
    </form>
</div>
@endsection
@section('ckeditor')
    <script>
        ClassicEditor
            .create(document.getElementById('trip'))
            .catch(error =>{
                console.error(error);
            });
            ClassicEditor
            .create(document.getElementById('description'))
            .catch(error =>{
                console.error(error);
            });
    </script>
@endsection
