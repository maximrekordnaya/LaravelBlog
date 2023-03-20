<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:: Blog ::</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
    @vite(['resources/css/app.css'])
</head>
<body>
<div class="edica-loader"></div>
<header class="edica-header blog">
    <div class="container blog">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{route('post.index')}}"><img src="{{asset('assets/images/logo.svg')}}"
                                                                        alt="Edica"></a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav"
                    aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="edicaMainNav">

                <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post.index')}}">Блог</a>
                    </li>
                </ul>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    @auth()
                        <li class="nav-item ">
                            <a class="nav-link" href="{{route('personal.main.index')}}">Особистий кабінет</a>
                        </li>

                        @if(auth()->user()->isAdmin())

                            <li class="nav-item ">
                                <a class="nav-link" href="{{route('admin.main.index')}}">Админка</a>
                            </li>
                        @endif
                        <li class="nav-item ">
                            <form action="{{route('logout')}}" method="POST">
                                @csrf
                                <input type="submit" value="Вийти" class="btn btn-logout">
                            </form>

                        </li>
                    @endauth

                    @guest()

                        <li class="nav-item">
                            <a class="nav-link p-0 pr-2" href="{{route('personal.main.index')}}">
                                <button class="btn btn-success">Вхiд</button>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link p-0" href="{{route('register')}}">
                                <button class="btn btn-danger">Реєстрація</button>
                            </a>
                        </li>

                    @endguest
                </ul>
            </div>
        </nav>


        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <div class="collapse navbar-collapse" id="edicaMainNav">
                <ul class="navbar-nav mx-auto mt-0 mt-lg-0">
                    <div class="row">
                        @foreach($categories as $category)
                            <div class="col-3 text-center m-auto">
                                <li class="nav-item">
                                    <a class="nav-link"
                                       href="{{route('category.post.index', $category->id)}}">{{$category->title}}</a>
                                </li>
                            </div>
                        @endforeach
                    </div>

                </ul>
            </div>
        </nav>
    </div>

    <div class="decor">
        <div class="decor-item decor-color-one item-1 anim-1"></div>
        <div class="decor-item decor-color-two item-2 anim-2"></div>
        <div class="decor-item decor-color-three item-3 anim-3"></div>

        <div class="decor-item decor-color-two item-4 anim-1"></div>
        <div class="decor-item decor-color-three item-5 anim-2"></div>
        <div class="decor-item decor-color-one item-6 anim-3"></div>

        {{--        <div class="decor-item decor-color-yellow item-7"></div>--}}
        <div class="decor-item decor-color-one item-8 anim-2"></div>
        <div class="decor-item decor-color-two item-9 anim-3"></div>
    </div>

</header>


@yield('content')


<footer class="edica-footer mt-3" data-aos="fade-up">
    <div class="container footer-banner" data-aos="fade-up">
        <h1 class="banner-title">Проект у портфоліо</h1>
        <p class="banner-text">Максима Шелкоуса</p>
    </div>
</footer>
<script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
<script src="{{asset('assets/js/main.js')}}"></script>

<script>
    AOS.init({
        duration: 1000
    });
</script>
</body>


</html>
