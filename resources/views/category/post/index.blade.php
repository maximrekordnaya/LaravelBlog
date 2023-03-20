@extends('layouts.main')
@section('content')


    <main class="blog">
        <div class="container min-height-container">
            <h1 class="edica-page-title" data-aos="fade-up">Блог</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @php $post_counter = 0; @endphp
                    @if($posts->count() == 0)
                        <div class="col">
                        <h2 class="text-center">Постів немає</h2>
                        </div>
                    @else
                    @foreach($posts as $post)
                        <div class="col-6 blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{asset('storage/' . $post->preview_image)}}" alt="blog post">
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
                    @endif

                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -80px;">
                        {{$posts->links()}}
                    </div>
                </div>
            </section>

        </div>

    </main>

@endsection
