@extends('layouts.main')
@section('content')


    <main class="blog blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row mb-5">
                    @php $post_counter = 0; @endphp
                    @foreach($posts as $post)
                        <div class="col-sm-12 col-md-6 col-ld-6 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <a href="{{route('post.show', $post->id)}}">
                                <img src="storage/{{$post->preview_image}}" alt="blog post">
                                </a>
                            </div>
                            <p class="blog-post-category">{{$post->category->title}}</p>
                            <div class="row">
                                <div class="col-10">
                                    <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$post->title}}</h6>
                                    </a>
                                </div>
                                <div class="col-2 text-right">
                                    @auth()
                                        <form action="{{route('post.like.store', $post->id)}}" method="post">
                                            @csrf
                                            <span>{{$post->liked_users_count}}</span>

                                            <button type="submit" class="border-0 bg-transparent">
                                                @if(auth()->user()->likedPosts->contains($post->id))
                                                    <i class="fas fa-heart"></i>
                                                @else
                                                    <i class="far fa-heart"></i>
                                                @endif
                                            </button>

                                        </form>
                                    @endauth
                                    @guest()
                                        <div class="">
                                            <span>{{$post->liked_users_count}}</span>
                                            <a href="{{route('login')}}">
                                                <i class="far fa-heart"></i>
                                            </a>
                                        </div>
                                    @endguest
                                </div>

                            </div>
                        </div>
                        @php
                            $post_counter++;
                            if($post_counter>=2){
                                break;}

                        @endphp
                    @endforeach

                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -50px;">
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
                                        <a href="{{route('post.show', $post->id)}}">
                                        <img src="storage/{{$post->preview_image}}" alt="blog post">
                                        </a>
                                    </div>
                                    <p class="blog-post-category">{{$post->category->title}}</p>
                                    <div class="row">
                                        <div class="col-10">
                                            <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                                <h6 class="blog-post-title">{{$post->title}}</h6>
                                            </a>
                                        </div>
                                        <div class="col-2 text-right">
                                            <form action="">
                                                @csrf
                                                @auth()
                                                    <button type="submit" class="border-0 bg-transparent">
                                                        @if(auth()->user()->likedPosts->contains($post->id))
                                                            <i class="fas fa-heart"></i>
                                                        @else
                                                            <i class="far fa-heart"></i>
                                                        @endif
                                                    </button>
                                                @endauth
                                            </form>
                                        </div>
                                    </div>

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
                                    <a href="{{route('post.show', $post->id)}}" class="post-permalink media">
                                        <img src="storage/{{$post->preview_image}}" alt="blog post">
                                        <div class="media-body">
                                            <div class="row">
                                                <h6 class="post-title ml-3">{{$post->title}}</h6>
                                            </div>
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
                                    <a href="{{route('category.post.index', $category->id)}}">
                                    <h6 class="mb-3">{{$category->title}}</h6>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </main>

@endsection
