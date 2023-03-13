@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-2">Редагування категорії</h2>


            <form action="{{route('admin.category.update', $category->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group w-50">
                    <label>Назва</label>
                    <input type="text" class="form-control" name="title" placeholder="Назва категорії" value="{{$category->title}}">
                    @error('title')
                        <div class="text-danger">
                            Поле не може бути порожнім
                        </div>
                    @enderror
                    <input type="submit" class="btn btn-block btn-secondary mt-2" value="Оновити">
                </div>

            </form>
            </div>
        </div>
    </div>

@endsection
