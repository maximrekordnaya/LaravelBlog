<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('post.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-arrow-left"></i>

                    <p>
                        Назад
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('personal.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>

                    <p>
                        Головна
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('personal.liked.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-heart"></i>

                    <p>
                        Лайкнуті пости
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('personal.comment.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-comment"></i>

                    <p>

                        Коментарі
                    </p>
                </a>
            </li>



        </ul>

    </div>

</aside>
