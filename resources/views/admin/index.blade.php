@extends('layouts.admin')

@section('content')


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
@endsection
