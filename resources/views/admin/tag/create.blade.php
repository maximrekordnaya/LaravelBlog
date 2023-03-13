@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mt-2">Додавання тегу</h2>

            <form action="{{route('admin.tag.store')}}" method="POST">
                @csrf
                <div class="form-group w-50">
                    <label>Назва</label>
                    <input type="text" class="form-control" name="title" placeholder="Назва тегу">
                    @error('title')
                        <div class="text-danger">
                            Поле не може бути порожнім
                        </div>
                    @enderror
                    <input type="submit" class="btn btn-block btn-secondary mt-2" value="Додати">
                </div>

            </form>
            </div>
        </div>
    </div>

@endsection
