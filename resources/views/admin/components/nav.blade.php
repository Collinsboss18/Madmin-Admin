<nav class="blue darken-2">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.html" class="brand-logo">Madmin</a>
            <a href="#" data-activates="side-nav" class="button-collapse show-on-large right">
                <i class="fa fa-bars fa-2x"></i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="{{ URL::to('admin') }}">Dashboard</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminUsersController@index') }}">Users</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminPostsController@index') }}">Posts</a></li>
                <li><a href="#">Categories</a></li>
            </ul>
            <!-- SideNav -->
            <ul id="side-nav" class="side-nav">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="/assets/img/ocean.jpg" alt="">
                        </div>
                        <a href="#">
                            <img class="circle" src="/assets/img/person1.jpg" alt="">
                        </a>
                        <a href="#">
                            <span class="name white-text">John Doe</span>
                        </a>
                        <a href="#">
                            <span class="email white-text">jdoe@gmail.com</span>
                        </a>
                    </div>
                </li>
                <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashcube"></i> Dashboard</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminUsersController@index') }}">Users</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminPostsController@index') }}">Posts</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Comments</a></li>
                <li><div class="divider"></div></li>
                <li><a href="#" class="subheader">Account Controls</a></li>
                <li><a href="#" class="waves-effect">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
