@extends('layouts.main')

@section('content')
<div class="container min-height-container pt-5 blog">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Верифікуйте свій обліковий запис</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Нове верифікаційне посилання надіслано на ваш емейл
                        </div>
                    @endif

                        Для того щоб продовжити, перевірте свій емейл на наявність верифікаційне посилання.
                        Якщо ви не отримали посилання, то
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">відправте її ще раз</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
