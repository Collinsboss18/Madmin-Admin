<div id="post-modal" class="modal">
    <div class="modal-content">
        <h4>Add Post</h4>
        {!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminPostsController@store'], 'files' => true]) !!}
            <div class="input-field">
                <input name='title' type="text">
                <label for="title">Title</label>
            </div>
            <div class="input-field">
                {!! Form::select('category_id', ['' => 'Choose Category'], null) !!}
                {!! Form::label('category_id', 'Category') !!}
            </div>
            <div class="input-field">
                <textarea name="body" id="body" class="materialize-textarea"></textarea>
                <label for="body">Body</label>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span>User Image</span>
                    <input name="photo" type="file" tabindex="3">
                </div>
                    <div class="file-path-wrapper">
                    <input type="text" class="file-path" tabindex="4">
                </div>
            </div>
            <div class="modal-footer">
                {!! Form::submit('Create Post', ['class'=>'modal-action modal-close btn blue white-text']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>
