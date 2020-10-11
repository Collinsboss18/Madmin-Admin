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
        {!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminUsersController@store'], 'files' => true]) !!}
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
                    <input name="photo" type="file" tabindex="3">
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
