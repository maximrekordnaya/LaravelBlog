@extends('admin.layouts.main')
@section('content')

    <div class="row">
        <div class="col-12 d-flex align-items-center">
            <h2 class="mr-3">{{$category->title}}</h2>
            @if($category->title !== $category::UNCATEGORIZES_TITLE)
            <a href="{{route('admin.category.edit', $category->id)}}" class="text-success"><i class="fas fa-pen"></i></a>
            <form action="{{route('admin.category.destroy', $category->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="border-0 bg-transparent">
                    <i class="fas fa-trash-alt text-danger" role="button"></i>
                </button>
            </form>
            @endif
        </div>


        <div class="col-12">
            <div class="card mt-3 p-0">

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$category->id}}</td>
                        </tr>
                        <tr>
                            <td>Назва</td>
                            <td>{{$category->title}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

    </div>

@endsection
