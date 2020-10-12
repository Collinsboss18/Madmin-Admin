@extends('layouts.admin')

@section('content')
<!-- Section: Recent Post & Todo -->
<section class="section section-recent" style="margin-bottom: 100px;">
    <div class="row">
        <div class="col m8 offset-m2">
            <!-- CARD WITH IMAGE -->
            @if($post)
                <div class="card">
                    <div class="card-image hoverable">
                        <img style="height: 50vh;" src="{{ $post->photo->file }}">
                    </div>
                    <div class="card-content">
                        <h4>Edit Post</h4>
                    {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminPostsController@update', $post->id], 'files' => true]) !!}
                        <div class="input-field">
                            <input name='title' type="text" value="{{ $post->title }}">
                            <label for="title">Title</label>
                        </div>
                        <div class="input-field">
                            {!! Form::select('category_id', $category ? $category :'', $post->category_id) !!}
                            {!! Form::label('category_id', 'Category') !!}
                        </div>
                        <div class="input-field">
                            <textarea name="body" id="body" class="materialize-textarea">{{ $post->body }}</textarea>
                            <label for="body">Body</label>
                        </div>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Image</span>
                                <input name="photo" type="file" tabindex="3">
                            </div>
                                <div class="file-path-wrapper">
                                <input type="text" class="file-path" tabindex="4">
                            </div>
                        </div>
                        <div class="input-field">
                            {!! Form::submit('Update Post', ['class'=>'btn blue white-text']) !!}
                        </div>
                    {!! Form::close() !!}
                    {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminPostsController@destroy', $post->id]]) !!}
                        <input type="submit" value="Delete Post" style="margin-top: 10px;" class="btn red lighten-2">
                    {!! Form::close() !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection
