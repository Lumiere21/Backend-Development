@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('superAdmin/users') }}"> Back</a>
        </div>
    </div>
</div>
    <div class="card-body">
        <h5>Reminder: You can only change the Account Role</h5>
        <div class="mb-3">
            <label>First Name</label>
            <p class="form-control">{{ $user->firstName }}</p>
        </div>
        <div class="mb-3">
            <label>Last Name</label>
            <p class="form-control">{{ $user->lastName }}</p>
        </div>
        <div class="mb-3">
            <label>Phone Number</label>
            <p class="form-control">{{ $user->phoneNumber }}</p>
        </div>
        <div class="mb-3">
            <label>Emergency Contact 1</label>
            <p class="form-control">{{ $user->emergencyNumber1 }}</p>
        </div>
        <div class="mb-3">
            <label>Emergency Contact 2</label>
            <p class="form-control">{{ $user->emergencyNumber2 }}</p>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <p class="form-control">{{ $user->address }}</p>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <p class="form-control">{{ $user->email }}</p>
        </div>
        <div class="mb-3">
            <label>Created at</label>
            <p class="form-control">{{ $user->created_at->format('d/m/Y')}}</p>
        </div>

        <form action="{{ url('superAdmin/update-user/'.$user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-control">
                    <option value="1" {{ $user->role == '1'? 'selected':''}}>Super Admin</option>
                    <option value="0" {{ $user->role == '0'? 'selected':''}}>User</option>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary" >{{ __('Update') }}</button>
            </div>
            
        </form>
    </div>
@endsection