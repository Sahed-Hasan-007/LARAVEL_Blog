<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
        <div class="avatar"><img src="{{ asset('adminPannel/img/me.jpg') }}" alt="..." class="img-fluid rounded-circle"></div>
        <div class="title">
            <h1 class="h5">Admin</h1>
        </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
        <li class="active"><a href="{{ route('home') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{ route('adminViewPost')  }}"> <i class="fa fa-bar-chart"></i>View Post </a></li>
        <li><a href="{{ route('adminViewAddPost')  }}"> <i class="icon-grid"></i>Add Post </a></li>
        <li><a href="{{ route('adminViewUser')  }}"> <i class="icon-grid"></i>View User</a></li>
        <li><a href="{{ route('adminViewAddUser')}}"> <i class="icon-grid"></i>Add User</a></li>
        <li><a href="{{ route('adminViewBlogSite')}}"> <i class="icon-grid"></i>Blog Site</a></li>
    </ul>
</nav>