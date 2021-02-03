<nav class="blue darken-2">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/home" class="brand-logo">Madmin</a>
            <a href="#" data-activates="side-nav" class="button-collapse show-on-large right">
                <i class="fa fa-bars fa-2x"></i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li class=""><a href="{{ URL::to('admin') }}">Dashboard</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminUsersController@index') }}">Users</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminPostsController@index') }}">Posts</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminCategoriesController@index') }}">Categories</a></li>
            </ul>
            <!-- SideNav -->
            <ul id="side-nav" class="side-nav">
                <li>
                    <div class="user-view">
                        <div class="background">
                            <img src="/assets/img/ocean.jpg" alt="">
                        </div>
                        <a href="#">
                            @isset(Auth::user()->photo_id)
                                @isset($profile)
                                    @foreach($profile as $photo => $file)
                                        <img class="circle" src="{{ $file->file }}" alt="">
                                    @endforeach
                                @endisset
                            @endisset
                            @if(empty(Auth::user()->photo_id))
                                <img class="circle" src="/assets/img/person1.png" alt="">
                            @endif
                        </a>
                        <a href="#">
                            <span class="name white-text">{{ Auth::user()->name }}</span>
                        </a>
                        <a href="#">
                            <span class="email white-text">{{ Auth::user()->email }}</span>
                        </a>
                    </div>
                </li>
                <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashcube"></i> Dashboard</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminUsersController@index') }}">Users</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminPostsController@index') }}">Posts</a></li>
                <li><a href="{{ URL::action('App\Http\Controllers\AdminCategoriesController@index') }}">Categories</a></li>
                <li><div class="divider"></div></li>
                <li><a href="#" class="subheader">Account Controls</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
