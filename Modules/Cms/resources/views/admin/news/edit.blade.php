@extends('Cms::admin.admin')
@section('content')
<div style="min-height: 650px">
    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between">
        <h3 class="text-white text-capitalize ps-3">Sửa tin tức</h3>
        <button class="btn  ">
            <a class="text-white" href="{{route('news.index')}}">Quay lại</a>
        </button>
    </div>
    <form role="form" class="text-start" action="{{route('news.update', $news->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="input-group input-group-outline my-3">
          <label class="form-label">Tên tin tức</label> <br>
          <input type="text" class="form-control" name="name" value="{{$news->name}}">
        </div>
          <div>
            <p >Ảnh</p>
            <input type="file" name="image">
          </div>

          <div class="input-group input-group-outline my-3" style="display: inline">
            <p>Hành trình</p>
            <textarea type="text" class="form-control mt-5" name="description"style="width: 100%;" id="desc">{{$news->description}}</textarea>
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
            .create(document.getElementById('desc'))
            .catch(error =>{
                console.error(error);
            });
    </script>
@endsection
