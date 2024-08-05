<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">

            <div class="first-slot">
                @foreach ($posts->take(1) as $post)
                <div class="masonry-box post-media">
                    <img src="{{asset($post->image)}}" alt=""  style="width: 788px; height: 420px;" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html"
                                        title="">{{$post->category->name}}</a></span>
                                <h4><a href="tech-single.html" title="">{{$post->title}}</a></h4>
                                <small><a href="tech-single.html" title="">{{$post->created_at}}</a></small>
                                <small><a href="tech-author.html" title="">by Amanda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
                @endforeach
            </div><!-- end first-side -->

            <div class="second-slot">
                @foreach ($posts->skip(1)->take(1) as $post)
                <div class="masonry-box post-media">
                    <img src="{{asset($post->image)}}" alt=""  style="width: 394px; height: 420px;" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html"
                                        title="">{{$post->category->name}}</a></span>
                                <h4><a href="tech-single.html" title="">{{$post->title}}</a></h4>
                                <small><a href="tech-single.html" title="">{{$post->created_at}}</a></small>
                                <small><a href="tech-author.html" title="">by Amanda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
                @endforeach
            </div><!-- end second-side -->

            <div class="last-slot">
                @foreach ($posts->skip(2)->take(1) as $post)
                <div class="masonry-box post-media">
                    <img src="{{asset($post->image)}}" alt=""  style="width: 394px; height: 420px;" class="img-fluid">
                    <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html"
                                        title="">{{$post->category->name}}</a></span>
                                <h4><a href="tech-single.html" title="">{{$post->title}}</a></h4>
                                <small><a href="tech-single.html" title="">{{$post->created_at}}</a></small>
                                <small><a href="tech-author.html" title="">by Amanda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
                @endforeach
            </div><!-- end second-side -->
        </div><!-- end masonry -->
    </div>
</section>