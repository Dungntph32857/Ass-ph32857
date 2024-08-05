@extends('client.layouts.master')
@include('client.components.first-section')
@section('content')
<div class="page-wrapper">
    <div class="blog-top clearfix">
        <h4 class="pull-left">Recent News <a href="#"><i class="fa fa-rss"></i></a></h4>
    </div><!-- end blog-top -->

    <div class="blog-list clearfix">
       
        @foreach ($posts->take(4) as $post)
            <div class="blog-box row">
                <div class="col-md-4 mt-4">
                    <div class="post-media">
                        <a href="{{route('chi-tiet',$post)}}" title="">
                            <img src="{{asset($post->image)}}" alt="" class="img-fluid">
                            <div class="hovereffect"></div>
                        </a>
                    </div><!-- end media -->
                </div><!-- end col -->

                <div class="blog-meta big-meta col-md-8">
                    <h4><a href="{{route('chi-tiet',$post)}}" title="">{{$post->title}}</a></h4>
                    <p></p>
                    <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html"
                            title="">{{$post->category->name}}</a></small>     
                    <small><a href="tech-single.html" title="">{{$post->created_at}}</a></small>
                    <small><a href="tech-author.html" title="">Admin</a></small>
                    <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i>
                            1114</a></small>
                </div><!-- end meta -->
                
            </div><!-- end blog-box -->
        @endforeach
        <hr class="invis">
{{--  -----------------------------------  --}}
        {{--  <div class="blog-box row">
            <div class="col-md-4">
                <div class="post-media">
                    <a href="tech-single.html" title="">
                        <img src="/client/upload/tech_blog_02.jpg" alt="" class="img-fluid">
                        <div class="hovereffect"></div>
                    </a>
                </div><!-- end media -->
            </div><!-- end col -->

            <div class="blog-meta big-meta col-md-8">
                <h4><a href="tech-single.html" title="">A device you can use both headphones and
                        usb</a></h4>
                <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et
                    pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim
                    nibh, maximus ac felis nec, maximus tempor odio.</p>
                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html"
                        title="">Technology</a></small>
                <small><a href="tech-single.html" title="">21 July, 2017</a></small>
                <small><a href="tech-author.html" title="">by Matilda</a></small>
                <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i>
                        4412</a></small>
            </div><!-- end meta -->
        </div><!-- end blog-box -->

        <hr class="invis">

        <div class="blog-box row">
            <div class="col-md-4">
                <div class="post-media">
                    <a href="tech-single.html" title="">
                        <img src="/client/upload/tech_blog_03.jpg" alt="" class="img-fluid">
                        <div class="hovereffect"></div>
                    </a>
                </div><!-- end media -->
            </div><!-- end col -->

            <div class="blog-meta big-meta col-md-8">
                <h4><a href="tech-single.html" title="">Two brand new laptop models from ABC
                        computer</a></h4>
                <p>Aenean interdum arcu blandit, vehicula magna non, placerat elit. Mauris et
                    pharetratortor. Suspendissea sodales urna. In at augue elit. Vivamus enim
                    nibh, maximus ac felis nec, maximus tempor odio.</p>
                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html"
                        title="">Development</a></small>
                <small><a href="tech-single.html" title="">20 July, 2017</a></small>
                <small><a href="tech-author.html" title="">by Matilda</a></small>
                <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i>
                        2313</a></small>
            </div><!-- end meta -->
        </div><!-- end blog-box -->  --}}
{{--  ---------------------  --}}
        <hr class="invis">

        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="https://ngocdiep.vn/wp-content/uploads/2021/08/tin-tuc.jpg" alt="" class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row -->

        <hr class="invis">

        @foreach ($posts->skip(4)->take(4) as $post)
     
        <div class="blog-box row">
            <div class="col-md-4 mt-4">
                <div class="post-media">
                    <a href="{{route('chi-tiet',$post)}}" title="">
                        <img src="{{asset($post->image)}}" alt="" class="img-fluid">
                        <div class="hovereffect"></div>
                    </a>
                </div><!-- end media -->
            </div><!-- end col -->

            <div class="blog-meta big-meta col-md-8">
                <h4><a href="{{route('chi-tiet',$post)}}" title="">{{$post->title}}</a></h4>
                <p></p>
                <small class="firstsmall"><a class="bg-orange" href="tech-category-01.html"
                        title="">{{$post->category->name}}</a></small>
                <small><a href="tech-single.html" title="">{{$post->created_at}}</a></small>
                <small><a href="tech-author.html" title="">Admin</a></small>
                <small><a href="tech-single.html" title=""><i class="fa fa-eye"></i>
                        1114</a></small>
            </div><!-- end meta -->
        </div><!-- end blog-box -->
        
    @endforeach

        <hr class="invis">

    </div><!-- end blog-list -->
</div><!-- end page-wrapper -->

<hr class="invis">

<div class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-start">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div><!-- end col -->
</div><!-- end row -->

@endsection