@extends('personal.layouts.main')
@section('content')
    <div class="row pt-3">
        <div class="col-12">
            <h2 class="mt-2">
                Редагування коментаря</h2>
            <form action="{{route('personal.comment.update', $comment->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group w-50">
                    <label>Назва</label>
                    <input type="text" class="form-control" name="message" placeholder="Коментар" value="{{$comment->message}}">
                    @error('message')
                    <div class="text-danger">
                        Поле не може бути порожнім
                    </div>
                    @enderror
                    <input type="submit" class="btn btn-block btn-secondary mt-2" value="Оновити">
                </div>

            </form>
        </div>
    </div>
@endsection
