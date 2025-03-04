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
        <li class="active"><a href="{{ route('adminHome') }}"> <i class="icon-home"></i>Home </a></li>
        <li><a href="{{ route('adminViewPost')  }}"> <i class="fa fa-bar-chart"></i>View Post </a></li>
        <li><a href="{{ route('adminViewAddPost')  }}"> <i class="icon-grid"></i>Add Post </a></li>
        <li><a href="{{ route('adminViewUser')  }}"> <i class="icon-grid"></i>View User</a></li>
        <li><a href=""> <i class="icon-grid"></i>Add User</a></li>
        
        <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li>
    </ul><span class="heading">Extras</span>
    <ul class="list-unstyled">
        <li> <a href="#"> <i class="icon-settings"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-writing-whiteboard"></i>Demo </a></li>
        <li> <a href="#"> <i class="icon-chart"></i>Demo </a></li>
    </ul>
</nav>