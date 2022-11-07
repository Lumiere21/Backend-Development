@extends('layouts.app')

@section('title', 'Admin View Users')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
            <h2>View Users</h2>
            <a class="btn btn-primary" href="{{ url('admin/dashboard') }}"> Back</a>
            <a class="btn btn-success" href="{{ url('admin/users/create') }}"> Add New User</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->firstName }}</td>
                        <td>{{ $user->lastName }}</td>
                        <td>{{ $user->phoneNumber }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if ($user->role =='0')
                                <label class="badge btn-primary">User</label>
                            @elseif ($user->role =='1')
                                <label class="badge btn-success">Admin</label>
                            @else
                                <label class="badge btn-danger">None</label>
                            @endif
                        </td>
                    <td>
                    <a href="{{ url('admin/user/'.$user->id.'/edit') }}" class="btn btn-success">Edit</a>
                    {{-- @if($user->role=='1') --}}
                        <a href="{{ url('admin/user/'.$user->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-danger">Delete</a>
                        {{-- <buttontype="button"class="btnbtn-dangerdeleteUserBtn"value="$user->id">Delete</button>--}}
                    {{-- @endif --}}
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No Users Available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        <div>
            {{ $users->links() }}
        </div>

        {{-- <div class="d-flex">
            {{ $users->links() }}
        </div> --}}
    </div>
    </div>
    </div>
</div>
@endsection