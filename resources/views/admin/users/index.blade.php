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
                                @foreach($users as $user)
                                    @php $a = 1; @endphp
                                    <tr>
                                        <td>{{ $a }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td></td>
                                        <td>@if($user->is_active)
                                            <i class="fa fa-check-circle fa-2x green-text" />
                                            @else
                                            <i class="fa fa-close fa-2x red-text" />
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at->diffForHumans() }}</td>
                                        <td>
                                            @if($user->is_active)
                                            <a href="#" class="btn btn-small orange waves-effect waves-light lighten-2">Disable User</a>
                                            @else
                                            <a href="#" class="btn btn-small blue waves-effect waves-light lighten-2">Enable User</a>
                                            @endif
                                        </td>
                                        <td><a href="#" class="btn btn-small blue waves-effect waves-light lighten-2">Make Admin</a></td>
                                    </tr>
                                    @php $a = +1; @endphp
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
@endsection
