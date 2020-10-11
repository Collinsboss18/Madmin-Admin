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
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Is Active</th>
                                <th>Date Reg.</th>
                                <th>Chg. Role</th>
                                <th>Chg. Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($users)
                                @php $a = 1; @endphp
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $a }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name }}</td>
                                        <td>@if($user->is_active)
                                            <i class="fa fa-check-circle fa-2x green-text" />
                                            @else
                                            <i class="fa fa-close fa-2x red-text" />
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if($user->is_active)
                                            <a href="{{ URL::to('admin/users/'. $user->id .'/toggle_active') }}" class="btn btn-small orange waves-effect waves-light lighten-2">Disable User</a>
                                            @else
                                            <a href="{{ URL::to('admin/users/'. $user->id .'/toggle_active') }}" class="btn btn-small blue waves-effect waves-light lighten-2">Enable User</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->role_id === 1)
                                            <a href="{{ URL::to('admin/users/'. $user->id .'/toggle_admin') }}" class="btn btn-small blue waves-effect waves-light lighten-3">Rmv Admin</a>
                                            @else
                                            <a href="{{ URL::to('admin/users/'. $user->id .'/toggle_admin') }}" class="btn btn-small orange waves-effect waves-light lighten-2">Make Admin</a>
                                            @endif
                                        </td>
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
    <a title="Create User" href="#user-modal" class="modal-trigger btn-floating btn-large blue"><i class="fa fa-plus"></i></a>
</div>


<!-- Modals -->
@include('admin.components.modal.c_user')
@endsection
