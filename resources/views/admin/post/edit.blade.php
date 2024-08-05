@extends('admin.layouts.master');
@section('title')
  Sửa bài viết
@endsection

@section('content')
@if (session()->has('error'))
<div class="alert alert-danger">
    {{ session()->get('error') }}
</div>
@endif
<a href="{{route('posts.index')}}">Quay lại</a>
<form action="{{route('posts.update',$post)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-12">
        <h2 class="mt-3 mb-3">Bài Viết</h2>

        <div class="mt-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"
            value="{{old('title')}}{{$post->title}}">
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="category_id" class="form-label">Danh mục:</label>
            <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $id => $name)
                        <option 
                            @if ($post->category_id == $id) selected @endif 
                            value="{{$id}}">{{$name}}
                        </option>
                    @endforeach
            </select>
        </div>

        <div class="mt-3">
            <label for="image" class="form-label">Iamge:</label>
            <input type="file" class="form-control" id="image" placeholder="Enter name" name="image"
            value="{{old('image')}}">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-3">
            <label for="content" class="form-label">Content:</label>
            <textarea name="content" id="content" class="form-control" value="{{old('content')}}" cols="" rows=""
            >{{$post->content}}</textarea>
            @error('content')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>    
        <div class="col-md-12">
            <h2 class="mt-3 mb-3">Gắn Tags</h2>
            <div class="table-responsive">
                @foreach ($post->tags as $tag)
                    
               
                    <label for="name" class="form-label">Tag:</label>
                    <input type="text" class="form-control"  placeholder="Enter name" name="tags[][name]"
                    value="{{old("tags.name")}}{{$tag->name}}">
                    @error("tags.name")
                    <span class="text-danger">{{ $message }}</span>
                    @enderror 
                @endforeach
            </div>
        </div>
       
 <button type="submit" class="mt-3 btn btn-primary">Submit</button>
    
</form>
@endsection