@extends('layouts.admin')

@section('content')
<!-- Section: Recent Post & Todo -->
<section class="section section-recent" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col m8 offset-m2">
            <!-- CARD WITH IMAGE -->
            @if($category)
                <div class="card">
                    <div class="card-content">
                        <h4>Edit Category</h4>
                        {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminCategoriesController@update', $category->id]]) !!}
                            <div class="input-field">
                                <input name="name" type="text" value="{{ $category->name }}">
                                <label>Category</label>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="modal-action modal-close btn blue white-text">Update Category</button>
                            </div>
                        {!! Form::close() !!}
                        {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminCategoriesController@destroy', $category->id]]) !!}
                            <input type="submit" value="Delete Category" style="margin-top: 10px;" class="btn red lighten-2">
                        {!! Form::close() !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection
