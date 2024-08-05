@extends('admin.layouts.master')
@section('title')
  Sửa danh mục {{$category->name}}
@endsection

@section('content')
    <form action="{{route('categories.update',$category)}}" method="post">
        @csrf 
        @method('PUT')
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$category->name}}">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a class="btn btn-danger" href="{{route('categories.index')}}">Quay Về Trang Danh Sách</a>
    </form>
@endsection
