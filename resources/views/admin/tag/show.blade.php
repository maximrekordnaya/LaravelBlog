@extends('admin.layouts.main')
@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center">
            <h2 class="mr-3">{{$tag->title}}</h2>
            <a href="{{route('admin.tag.edit', $tag->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
            <form action="{{route('admin.tag.destroy', $tag->id)}}" method="POST">
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
                            <td>{{$tag->id}}</td>
                        </tr>
                        <tr>
                            <td>Назва</td>
                            <td>{{$tag->title}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>

@endsection
