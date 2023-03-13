@extends('admin.layouts.main')
@section('content')

    <div class="row">
        <div class="col-12">
            <h2>Користувачі</h2>
        </div>
        <div class="col-12">
            <a href="{{route('admin.user.create')}}" class="btn btn-block btn-secondary w-25">Додати користувача</a>
        </div>

        <div class="col-12">
            <div class="card mt-3 p-0">
                <div class="card-header">
                    <h3 class="card-title">Список користувачів</h3>

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
                            <th>Ім'я користувача</th>
                            <th colspan="3" class="text-center">Дії</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td class="text-center"><a href="{{route('admin.user.show', $user->id)}}"
                                                           class="text-info"><i class="fas fa-eye"></i></a></td>
                                <td class="text-center"><a href="{{route('admin.user.edit', $user->id)}}"
                                                           class="text-success"><i class="fas fa-pen"></i></a></td>
                                <td class="text-center">
                                    <form action="{{route('admin.user.destroy', $user->id)}}" method="POST">
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

    </div>

@endsection
