@extends('layouts.main')
@section('content')

    <main class="blog-post blog">
        <div class="container mb-5">
            <h1 class="edica-page-title aos-init aos-animate" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta aos-init aos-animate" data-aos="fade-up"
               data-aos-delay="200">{{$date->translatedFormat('F j, Y')}}</p>
            <section class="blog-post-featured-img aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-12">
                        <p>{!! $post->content !!}</p>
                    </div>
                    <div class="col-2 ">
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
                                    <a href="{{route('login')}}" style="color:black">
                                        <i class="far fa-heart"></i>
                                    </a>
                                </div>
                            @endguest
                    </div>

                </div>


            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count()>0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4 aos-init aos-animate" data-aos="fade-up">Подібні пости</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{asset('storage/' . $relatedPost->preview_image)}}" alt="related post"
                                         class="post-thumbnail">
                                    <p class="post-category">{{$relatedPost->category->title}}</p>
                                    <a href="{{route('post.show', $relatedPost->id)}}"><h5
                                            class="post-title">{{$relatedPost->title}}</h5></a>

                                </div>
                            @endforeach
                        </div>
                    </section>
                    @endif


                    <section class="">
                        <h2 class="section-title mb-5 aos-init aos-animate" data-aos="fade-up">Коментарi ({{$post->comments()->count()}})</h2>
                        @foreach($post->comments as $comment)
                            <div class="card-comment mb-3 p-2" style=" border: #f6f6e1 1px solid; border-radius: 1px">
                                <div class="mb-2 "><strong>{{$comment->user->name}}</strong></div>
                                {{$comment->message}}
                                <div class="mb-2 text-right"><i>{{$comment->DataAsCarbon->diffForHumans()}}</i></div>
                            </div>
                        @endforeach

                    </section>

                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5 aos-init aos-animate" data-aos="fade-up">Додати коментар</h2>
                            <form action="{{route('post.comment.store', [$post->id])}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12 aos-init aos-animate" data-aos="fade-up">
                                        <input type="hidden" value="{{$post->id}}">
                                        <textarea name="message" id="message" class="form-control"
                                                  placeholder="Коментар"
                                                  rows="10"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 aos-init aos-animate" data-aos="fade-up">
                                        <input type="submit" value="Відправити" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>

@endsection
