@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar bg-light p-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('notifications.create') }}">Notifications</a>
                </li>
            </ul>
        </div>
        <div class="col-md-10 mt-4">
            <h1 class="display-4">Dashboard</h1>
            <p class="lead">Welcome to your dashboard!</p>
            </div>
    </div>
</div>
@endsection
