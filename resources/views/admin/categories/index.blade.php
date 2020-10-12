@extends('layouts.admin')

@section('content')
<!-- Section: Recent Post & Todo -->
<section class="section section-recent">
    <div class="row">
        <div class="col m12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">MadMin Users</span>
                    <table class="striped responsive-table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($categories)
                                @php $a = 1; @endphp
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $a }}</td>
                                        <td>{{ $category->name}}</td>
                                        <td>{{ $category->created_at->diffForHumans() }}</td>
                                        <td><a href="{{ URL::action('App\Http\Controllers\AdminCategoriesController@edit', $category->id) }}" class="btn btn-small orange waves-effect waves-light lighten-2">Edit</a></td>
                                    </tr>
                                    @php $a++ @endphp
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Fixed Action Button -->
<div class="fixed-action-btn">
    <a title="Create User" href="#category-modal" class="modal-trigger btn-floating btn-large blue"><i class="fa fa-plus"></i></a>
</div>


<!-- Modals -->
@include('admin.components.modal.c_category')
@endsection
