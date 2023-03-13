@extends('admin.layouts.main')
@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center">
            <h2 class="mr-3">{{$post->title}}</h2>
            <a href="{{route('admin.post.edit', $post->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
            <form action="{{route('admin.post.destroy', $post->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-0 bg-transparent">
                    <i class="fas fa-trash-alt text-danger" role="button"></i>
                </button>
            </form>
        </div>


        <div class="col-12">
            <div class="card mt-3 p-0">

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$post->id}}</td>
                        </tr>
                        <tr>
                            <td>Назва</td>
                            <td>{{$post->title}}</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <td>Контент</td>--}}
{{--                            <td>{{$post->content}}</td>--}}
{{--                        </tr>--}}

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>

@endsection

