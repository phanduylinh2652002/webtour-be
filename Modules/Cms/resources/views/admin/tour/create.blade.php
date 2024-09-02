@extends('Cms::admin.admin')
@section('content')
<div style="min-height: 650px">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
        <h3 class="text-white text-capitalize ps-3">Thêm Tour mới</h3>
        <button class="btn  ">
            <a class="text-white" href="{{route('tour.index')}}">Quay lại</a>
        </button>
    </div>
    <form role="form" class="text-start" action="{{route('tour.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Mã tour</label> <br>
          <input type="text" class="form-control" name="id">
        </div>
        @error('id')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Tên tour</label> <br>
          <input type="text" class="form-control" name="name">
        </div>
        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div>
          <p>Loại tour</p>
          <select name="category_id" class="form-control border">
            <option value="">Chọn loại tour</option>
            @foreach($categories as $category)
                <option value="{{$category->category_id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
        </div>
        @error('category_id')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Giá tour</label>
            <input type="text" class="form-control" name="price">
        </div>
        @error('price')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Giá giảm</label>
            <input type="text" class="form-control" name="discount">
          </div>
        @error('discount')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div>
            <p >Ảnh</p>
            <input type="file" name="image">
          </div>
          @error('image')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Các điểm đến</label>
            <input type="text" class="form-control" name="place">
          </div>
          @error('place')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Phương tiện</label>
            <input type="text" class="form-control" name="vehicle">
          </div>
          @error('vehicle')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Điểm khởi hành</label>
            <input type="text" class="form-control" name="locationStart">
          </div>
          @error('locationStart')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Điểm kết thúc</label>
            <input type="text" class="form-control" name="locationEnd">
          </div>
          @error('locationEnd')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Thời lượng chuyến đi</label>
            <input type="text" class="form-control" name="quantytiDate">
          </div>
          @error('quantytiDate')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Ngày khởi hành</label>
            <input type="text" class="form-control" name="dateStart">
          </div>
          @error('dateStart')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3">
            <label class="form-label">Ngày kết thúc</label>
            <input type="text" class="form-control" name="dateEnd">
          </div>
          @error('dateEnd')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3" style="display: inline">
            <p>Mô tả</p>
            <textarea type="text" class="form-control mt-5" name="description"style="width: 100%;" id="description"></textarea>
          </div>
          @error('description')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div class="input-group input-group-outline my-3" style="display: inline">
            <p>Hành trình</p>
            <textarea type="text" class="form-control mt-5" name="trip"style="width: 100%;" id="trip"></textarea>
          </div>
          @error('trip')
          <div class="text-danger">{{ $message }}</div>
        @enderror
          <div>
            <p class="form-label">Hướng dẫn viên</p>
            <select name="tourGuide_id" class="form-control border">
                <option>Chọn hướng dẫn viên</option>
                @foreach($tourguides as $tg)
                    <option value="{{$tg->tourGuide_id}}">{{$tg->tourGuide_name}}</option>
                @endforeach
            </select>
          </div>
          @error('tourGuide_id')
          <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="text-center">
          <button type="submit" class="btn bg-gradient-primary my-4 mb-2">Thêm mới</button>
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
