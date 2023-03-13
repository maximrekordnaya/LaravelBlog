@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-2">Редагування користувача</h2>


                <form action="{{route('admin.user.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group w-50">
                        <div class="form-group">
                            <label>Ім'я користувача</label>
                            <input type="text" class="form-control" name="name" placeholder="Ім'я користувача"
                                   value="{{$user->name}}">
                            @error('name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Емейл</label>
                            <input type="text" class="form-control" name="email" placeholder="Емейл" value="{{$user->email}}">
                            @error('email')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                        </div>

                        <div class="form-group mt-3">
                            <label>Виберіть роль</label>
                            <select class="form-control" name="role_id">
                                @foreach($roles as $id => $role)
                                    <option value="{{$id}}"
                                        {{$id == $user->role ? 'selected': ''}}
                                    >
                                        {{$role}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
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
