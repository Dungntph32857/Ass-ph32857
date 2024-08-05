@extends('admin.layouts.master')
@section('title')
  Thêm Danh Mục
@endsection

@section('content')
    <form action="{{route('categories.store')}}" method="post">
        @csrf 

        <div class="mb-3 mt-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a class="btn btn-danger" href="{{route('categories.index')}}">Quay Về Trang Danh Sách</a>
    </form>
@endsection
