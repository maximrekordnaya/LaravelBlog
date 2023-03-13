@extends('personal.layouts.main')
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <h1>Лайки</h1>
        </div>
        <div class="col-12 mt-3">
            <div class="card mt-3 p-0">
                <div class="card-header">
                    <h3 class="card-title">Список лайків</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Назва</th>
                            <th colspan="2" class="text-center">Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td class="text-center"><a href="{{route('admin.category.show', $post->id)}}"
                                                           class="text-info"><i class="fas fa-eye"></i></a></td>

                                <td class="text-center">
                                    <form action="{{route('personal.liked.destroy', $post->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="border-0 bg-transparent">
                                            <i class="fas fa-trash-alt text-danger" role="button"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.col -->
    </div>
@endsection
