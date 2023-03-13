@extends('personal.layouts.main')
@section('content')
    <div class="row pt-3">
        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('personal.liked.index')}}" class="aaa">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Лайкнуті пости</span>
                        <span class="info-box-number">{{auth()->user()->likedPosts()->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('personal.comment.index')}}">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-sticky-note"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Прокоментовані пости</span>
                        <span class="info-box-number">{{auth()->user()->comments()->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->

        <!-- /.col -->
    </div>
@endsection
