@extends('layouts.admin')

@section('content')

<!-- Section: Stats -->
<section class="section section-stats center">
    <div class="row">
        <div class="col s12 m6 l3">
            <div class="card-panel blue lighten-1 white-text center">
                <i class="fa fa-superscript fa-2x"></i>
                <h5>Monthly Visitors</h5>
                <h3 class="count">300</h3>
                <div class="progress grey lighten-1">
                    <div class="determinate white" style="width: 40%;"></div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card-panel center">
                <i class="fa fa-edit fa-2x"></i>
                <h5>Blog Posts</h5>
                <h3 class="count">{{ count($posts) > 0 ? count($posts) : 'No Post' }}</h3>
                <div class="progress grey lighten-1">
                    <div class="determinate blue lighten-1" style="width: 20%;"></div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card-panel blue lighten-1 white-text center">
                <i class="fa fa-comments fa-2x"></i>
                <h5>Categories</h5>
                <h3 class="count">{{ count($categories) > 0 ? count($categories) : 'No Category' }}</h3>
                <div class="progress grey lighten-1">
                    <div class="determinate white" style="width: 40%;"></div>
                </div>
            </div>
        </div>
        <div class="col s12 m6 l3">
            <div class="card-panel center">
                <i class="fa fa-users fa-2x"></i>
                <h5>Users</h5>
                <h3 class="count">{{ count($users) > 0 ? count($users) : 'No User' }}</h3>
                <div class="progress grey lighten-1">
                    <div class="determinate blue" style="width: 30%;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fixed Action Button -->
<div class="fixed-action-btn">
    <a class="btn-floating btn-large red">
        <i class="fa fa-plus"></i>
    </a>
    <ul>
        <li>
            <a title="Create Post" href="#post-modal" class="modal-trigger btn-floating blue"><i class="fa fa-pencil"></i></a>
        </li>
        <li>
            <a title="Create Category" href="#category-modal" class="modal-trigger btn-floating blue"><i class="fa fa-folder"></i></a>
        </li>
        <li>
            <a title="Create User" href="#user-modal" class="modal-trigger btn-floating blue"><i class="fa fa-user"></i></a>
        </li>
    </ul>
</div>

@include('admin.components.modal.c_category')
@include('admin.components.modal.c_post')
@include('admin.components.modal.c_user')

@endsection
