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
                <a href="{{route('admin.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>

                    <p>
                        Головна
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>

                    <p>
                        Користувачі
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.post.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-sticky-note"></i>

                    <p>
                        Пости
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.category.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>

                    <p>
                        Категорії
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.tag.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>

                    <p>
                        Теги
                    </p>
                </a>
            </li>


        </ul>
    </div>
</aside>
