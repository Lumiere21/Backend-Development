@extends('layouts.app')
@section('content')

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="text" name="delete_user_id" id="delete_user_id">
        <h5>Are you sure you want to delete this user?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>View Users</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('superAdmin/dashboard') }}"> Back</a>
                <a class="btn btn-success" href="{{ url('superAdmin/user/create') }}"> Create New User</a>
            </div>
        </div>
        
    </div>
    
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif  

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Roles</th>
                <th>Action</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->firstName }}</td>
                    <td>{{ $item->lastName }}</td>
                    <td>{{ $item->phoneNumber }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->role == '1'? 'Super Admin':'User' }}</td>
                <td>
                    <a href="{{ url('superAdmin/users/'.$item->id) }}" class="btn btn-success">Edit</a>
                    @if ($item->role == '1')
                        {{--<a href="{{ url('superAdmin/users   /'.$item->id) }}" class="btn btn-danger">Delete</a>--}}
                        <button type="button" class="btn btn-danger deleteUserBtn" value="{{ $item->id }}">Delete</button>
                    @endif
                </td>
            </tbody>
            @endforeach 
        </tr>
    </table>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            $('.deleteUserBtn').click(function (e) {
                e.preventDefault();

                var id = $(this).val();
                $('#id').val(id);

                $('#deleteModal').modal('show');
            })
        })
    </script>
@endsection