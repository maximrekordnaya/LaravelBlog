@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-2">Додавання користувача</h2>

                <form action="{{route('admin.user.store')}}" method="POST">
                    @csrf
                    <div class="form-group w-50">
                        <div class="form-group">
                            <label>Назва</label>
                            <input type="text" class="form-control" name="name" placeholder="Ім'я користувача">
                            @error('name')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Емейл</label>
                            <input type="text" class="form-control" name="email" placeholder="Емейл">
                            @error('email')
                            <div class="text-danger">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label>Пароль</label>--}}
{{--                            <input type="text" class="form-control" name="password" placeholder="Пароль">--}}
{{--                            @error('password')--}}
{{--                            <div class="text-danger">--}}
{{--                                {{$message}}--}}
{{--                            </div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}

                        <div class="form-group mt-3">
                            <label>Виберіть роль</label>
                            <select class="form-control" name="role_id">
                                @foreach($roles as $id => $role)
                                    <option value="{{$id}}"
                                        {{$id == old('role_id') ? 'selected': ''}}

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

                        <input type="submit" class="btn btn-block btn-secondary mt-2" value="Додати">
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
