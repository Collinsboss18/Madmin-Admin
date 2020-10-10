<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Madmin</title>
    <link rel="stylesheet" href="/assets/css/materialize.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/jquery.js"></script>
    <script src="/assets/js/materialize.min.js"></script>
</head>
<body id="home" class="grey lighten-4">

<!-- Section: Navbar -->
<nav class="blue darken-2">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.html" class="brand-logo">Madmin</a>
            <a href="#" data-activates="side-nav" class="button-collapse show-on-large right">
                <i class="fa fa-bars fa-2x"></i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="index.html">Dashboard</a></li>
                <li><a href="#">Posts</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Posts</a></li>
                <li><a href="#">Comments</a></li>
                <li><a href="#">Users</a></li>
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
                <li><a href="index.html"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="#">Posts</a></li>
                <li><a href="#">Categories</a></li>
                <li><a href="#">Posts</a></li>
                <li><a href="#">Comments</a></li>
                <li><a href="#">Users</a></li>
                <li><div class="divider"></div></li>
                <li><a href="#" class="subheader">Account Controls</a></li>
                <li><a href="#" class="waves-effect">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Section: Stats -->
<main class="container">
    @yield('content')
</main>

<!-- Section: Footer -->
<footer class="section page-footer blue darken-2 white-text center">
    <p>Madmin Admin Panel Copyright &copy; 2020</p>
</footer>

<!-- Modals -->
<div id="post-modal" class="modal">
    <div class="modal-content">
        <h4>Add Post</h4>
        <form action="" method="POST">
            <div class="input-field">
                <input type="text">
                <label>Title</label>
            </div>
            <div class="input-field ">
                <select id="category">
                    <option value="">Select option</option>
                    <option value="1">Web Development</option>
                    <option value="2">Graphic Design</option>
                    <option value="3">Others</option>
                </select>
                <label for="category"></label>
            </div>
            <div class="input-field">
                <textarea name="body" id="body" class="materialize-textarea"></textarea>
                <label for="body">Body</label>
            </div>
        </form>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn blue white-text">Submit</a>
        </div>
    </div>
</div>

<div id="category-modal" class="modal">
    <div class="modal-content">
        <h4>Add Category</h4>
        <form>
            <div class="input-field">
                <input type="text">
                <label>Category</label>
            </div>
        </form>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn blue white-text">Submit</a>
        </div>
    </div>
</div>

<div id="user-modal" class="modal">
    <div class="modal-content">
        <h4>Add User</h4>
        {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminUsersController@store']) !!}
            {{-- {{ csrf_token() }} --}}
            <div class="input-field">
                {!! Form::text('name', null) !!}
                {!! Form::label('name', 'Name') !!}
            </div>
            <div class="input-field">
                {!! Form::email('email', null) !!}
                {!! Form::label('email', 'Email') !!}
            </div>
            <div class="input-field">
                {!! Form::password('password', null) !!}
                {!! Form::label('password', 'Password') !!}
            </div>
            <div class="input-field">
                {!! Form::select('is_active', [1 => 'Active', 0 => 'Not Active' ], 0) !!}
                {!! Form::label('is_active', 'Status') !!}
            </div>
            <div class="input-field">
                {!! Form::select('role_id', ['' => 'Choose Role'] + $roles, null) !!}
                {!! Form::label('role_id', 'User Role') !!}
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>User Image</span>
                    <input name="image" type="file" tabindex="3">
                </div>
                    <div class="file-path-wrapper">
                    <input type="text" class="file-path" tabindex="4">
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Create User', ['class'=>'modal-action modal-close btn blue white-text']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>

<!-- Preloader -->
<div class="loader preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
        <div class="circle-clipper left">
            <div class="circle"></div>
        </div><div class="circle-clipper right">
        <div class="circle"></div>
    </div>
    </div>
</div>


@if(count($errors) > 0)
    <script>
        Materialize.toast('Please fill all field input', 4000);
    </script>
@endif


<script>
    // Todo: Custom JavaScript And JQuery
    // Hide Sections
    $('.section').hide();
    setTimeout(function () {
        // Show Sections
        $('.section').fadeIn();
        $('.loader').fadeOut();
        $(document).ready(function () {
            // Init Side-Nav
            $('.button-collapse').sideNav();
            // Init Modal
            $('.modal').modal();
            // Init Select
            $('select').material_select();
            // Comments Approve & Deny
            $('.approve').click(function (e) {
                Materialize.toast('Comment Approved', 3000);
                e.preventDefault();
            });
            $('.deny').click(function (e) {
                Materialize.toast('Comment Denied', 3000);
                e.preventDefault();
            });
            // Counter
            $('.count').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now))
                    }
                })
            });
            // Quick Todos
            $('#todo-form').submit(function (e) {
                e.preventDefault();
                const output = `<li class="collection-item">
                                    <div>${$('#todo').val()} <a href="#!" class="secondary-content delete"><i class="fa fa-close red-text"></i></a></div>
                                </li>`;
                $('.todos').append(output);
                Materialize.toast('Todo Added', 3000);
            });
            // Delete Todos
            $('.todos').on('click', '.delete', function (e) {
                e.preventDefault();
                $(this).parent().parent().remove();
                Materialize.toast('Todo Added', 3000);
            })
        });
    }, 1000);

</script>
</body>
</html>
