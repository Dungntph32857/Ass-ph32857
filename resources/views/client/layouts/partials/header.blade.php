<div class="container-fluid">
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="tech-index.html"><img src="/client/images/version/tech-logo.png" alt=""></a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('/')}}">Home</a>
                </li>
                <li // new--------------------------------------------------------
                    class="nav-item dropdown has-submenu menu-large hidden-md-down hidden-sm-down hidden-xs-down">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Tin Tức</a>
                    <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                        <li>
                            <div class="container">
                                <div class="mega-menu-content clearfix">
                                    <div class="tab">
                                        {{--  ------------Danh Mục--------------  --}}
                                        @foreach ($categories as $category) 

                                        {{--  <button class="tablinks active"
                                            onclick="openCategory(event, 'cat01')">{{$category->name}}</button>  --}}
                                            <button class="tablinks {{ isset($category_id) && $category_id == $category->id ? 'active' : '' }}"
                                                onclick="openCategory(event, 'cat{{ $category->id }}', {{ $category->id }})">
                                                    {{ $category->name }}
                                            </button>
                                        

                                        @endforeach

                                    </div>

                                    <div class="tab-details clearfix">
                                        {{--  ------Hiển thị Danh Mục Tương Ứng-----------  --}}
                                        <div id='cat{{ $category->id }}', {{ $category->id }}' class="tabcontent active">
                                            <div class="row">
                                                @foreach ($posts->take(4) as $post)
                                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                                        <div class="blog-box">
                                                            <div class="post-media">
                                                                <a href="{{route('chi-tiet',$post)}}" title="">
                                                                    <img src="{{asset($post->image)}}" alt=""
                                                                        class="img-fluid">
                                                                    <div class="hovereffect">
                                                                    </div><!-- end hover -->
                                                                    <span class="menucat">
                                                                        @foreach ($post->tags as $tag)
                                                                        <ul>
                                                                          <li>Tag bài viết: {{$tag->name}} </li>
                                                                        </ul>
                                                                        @endforeach
                                                                    </span>
                                                                </a>
                                                            </div><!-- end media -->
                                                            <div class="blog-meta">
                                                                <h4><a href="{{route('chi-tiet',$post)}}" title="">{{$post->title}}</a></h4>
                                                            </div><!-- end meta -->
                                                        </div><!-- end blog-box -->
                                                    </div> 
                                                @endforeach
                                                

                                
                                            </div><!-- end row -->
                                        </div>
                                      
                                    </div><!-- end tab-details -->
                                </div><!-- end mega-menu-content -->
                            </div>
                        </li>
                    </ul>
                </li> 
                
                <li class="nav-item">
                    <a class="nav-link" href="tech-category-01.html">Dụng Cụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tech-category-02.html">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tech-category-03.html">Reviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="tech-contact.html">Liên Hệ</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-2">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-rss"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-android"></i></a>
                </li>
                @if (Route::has('login'))
                <li class="nav-item">
                        @auth
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <button class=" nav-link btn btn-primary" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="nav-link" ><i class="fa fa-user-circle" aria-hidden="true"></i></a>
                        @endauth
                </li>
                       
                   
                 @endif
            </ul>
        </div>
    </nav>
</div><!-- end container-fluid -->