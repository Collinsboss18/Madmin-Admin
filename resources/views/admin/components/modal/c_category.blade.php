<div id="category-modal" class="modal">
    <div class="modal-content">
        <h4>Add Category</h4>
        {!! Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminCategoriesController@store']]) !!}
        <div class="input-field">
            <input name="name" type="text">
            <label>Category</label>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-action modal-close btn blue white-text">Submit</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>
