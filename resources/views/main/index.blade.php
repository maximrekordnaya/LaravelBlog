@extends('layouts.main')
@section('content')


    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @php $post_counter = 0; @endphp
                    @foreach($posts as $post)
                        <div class="col-6 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="storage/{{$post->preview_image}}" alt="blog post">
                            </div>
                            <p class="blog-post-category">{{$post->category->title}}</p>
                            <a href="#!" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                        @php
                            $post_counter++;
                            if($post_counter>=2){
                                break;}

                        @endphp
                    @endforeach

                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -80px;">
                        {{$posts->links()}}
                    </div>
                </div>
            </section>
            <div class="row">


                <div class="col-md-8">
                    <section>
                        <div class="row blog-post-row">


                            @foreach($posts_random as $post)

                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="storage/{{$post->preview_image}}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{$post->category->title}}</p>
                                    <a href="#!" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$post->title}}</h6>
                                    </a>
                                </div>

                            @endforeach
                        </div>


                    </section>
                </div>


                <div class="col-md-4 sidebar" data-aos="fade-left">

                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярні пости</h5>
                        <ul class="post-list">
                            @foreach($posts_liked as $post)
                                <li class="post">
                                    <a href="#!" class="post-permalink media">
                                        <img src="storage/{{$post->preview_image}}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{$post->title}}</h6>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget-title">Категорії</h5>
                        @foreach($categories as $category)
                        <div class="row">
                            <div class="col-12">
                                <h3>{{$category->title}}</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
