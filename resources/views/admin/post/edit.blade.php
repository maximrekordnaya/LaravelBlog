@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-2">Редагування посту</h2>


            <form action="{{route('admin.post.update', $post->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group w-50">
                    <div class="form-group mt-3">
                        <label>Назва</label>
                        <input type="text" class="form-control" name="title" placeholder="Назва посту"
                               value="{{$post->title}}">
                        @error('title')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label>Виберіть категорію</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    {{$category->id == $post->category_id ? 'selected': ''}}
                                >
                                    {{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <form method="post">
                            <textarea id="summernote" name="content">{{$post->content}}</textarea>
                        </form>
                        @error('content')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputFile">Виберіть картинку для прев'ю</label>
                        <div class="w-25 mb-3">
                            <img src="{{asset('storage/' . $post->preview_image)}}" alt="preview_image" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                                <label class="custom-file-label">Виберіть картинку</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Завантажити</span>
                            </div>
                        </div>
                        @error('preview_image')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="exampleInputFile">Виберіть головну картинку</label>
                        <div class="w-25 mb-3">
                            <img src="{{asset('storage/' . $post->main_image)}}" alt="main_image" class="w-50">
                        </div>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="main_image">
                                <label class="custom-file-label">Виберіть картинку</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Завантажити</span>
                            </div>
                        </div>
                        @error('main_image')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label>Multiple</label>
                        <select class="select2" multiple="multiple" name="tag_ids[]" data-placeholder="Select a State" style="width: 100%;">
                            @foreach($tags as $tag)
                                <option
                                    {{ is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? 'selected': '' }}
                                    value="{{$tag->id}}">{{$tag->title}}</option>
                            @endforeach
                        </select>
                        @error('tag_ids')
                        <div class="text-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-block btn-secondary mt-2" value="Оновити">
                </div>

            </form>
            </div>
        </div>
    </div>

@endsection
