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
                {!! Form::select('role_id', ['' => 'Choose Role'] +  $roles ? $roles : '', null) !!}
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
