@extends('admin.layouts.main')
@section('content')
    <div class="row pt-3">
        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('admin.user.index')}}" class="aaa">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Користувачі</span>
                        <span class="info-box-number">
                  {{$data['user_q']}}

                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('admin.post.index')}}">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-sticky-note"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Пости</span>
                        <span class="info-box-number">{{$data['post_q']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('admin.category.index')}}">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-th-list"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Категорії</span>
                        <span class="info-box-number">{{$data['category_q']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <a href="{{route('admin.tag.index')}}">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tags" style="color: white"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Теги</span>
                        <span class="info-box-number">{{$data['tag_q']}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
@endsection
