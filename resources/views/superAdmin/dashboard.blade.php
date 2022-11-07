@extends('layouts.app')

@section('title', 'Super Admin Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Super Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}  

                
                </div>
                <a href="{{ url('superAdmin/users') }}">Manage Users</a>
            </div>
        </div>
    </div>
</div>
@endsection
