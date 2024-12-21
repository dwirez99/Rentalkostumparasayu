@extends('layouts.mainlayout')

@section('title', 'Users')
    
@section('content')
<h1>Approved User List</h1>
<div class="mt-5">
    <a href="/registered-users" class="btn btn-primary me-3">New Registered User</a>
    <a href="/users-banned" class="btn btn-secondary">View Banned User</a>
</div>

<div class="mt-5">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    </div>

<div class="my-5">
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->username }}</td>
                    <td class="align-middle">
                        @if ($item->phone)
                        {{ $item->phone }}
                        @else 
                        - 
                        @endif
                    </td>
                    <td class="align-middle">
                        <a href="/user-detail/{{ $item->slug }}" class="btn btn-info">Detail</a>
                        <a href="/user-destroy/{{ $item->slug }}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Ban User</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection