<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar-->
    <nav class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
<<<<<<< HEAD
            <li class="nav-item">
                {{--                ссылка на главную страницу, admin.user.index - имя роута--}}
=======
            <li class="nav-item">                
>>>>>>> 261de0c (24/03/2023)
                <a href="{{ route('admin.main.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Главная</p>
                </a>
            </li>
<<<<<<< HEAD
            <li class="nav-item">
                {{--                ссылка на пользователей, admin.user.index - имя роута--}}
=======
            <li class="nav-item">               
>>>>>>> 261de0c (24/03/2023)
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Пользователи</p>
                </a>
            </li>
<<<<<<< HEAD
            <li class="nav-item">                
                <a href="{{ route('admin.post.index') }}" class="nav-link">
=======
            <li class="nav-item">
                <a href="{{ route('admin.product.index') }}" class="nav-link">
>>>>>>> 261de0c (24/03/2023)
                    <i class="nav-icon fas fa-clipboard"></i>
                    <p>Товары</p>
                </a>
            </li>
            <li class="nav-item">
                {{--                ссылка на категории, admin.category.index - имя роута--}}
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th-list"></i>
                    <p>Категории</p>
                </a>
            </li>
            <li class="nav-item">               
                <a href="{{ route('admin.tag.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>Тэги</p>
                </a>
            </li>
            <li class="nav-item">               
                <a href="{{ route('admin.color.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>Цвета</p>
                </a>
            </li>
        </ul>
        </div>
    </nav>
</aside>
