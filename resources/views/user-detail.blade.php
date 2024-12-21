@extends('layouts.mainlayout')

@section('title', 'User Detail')
    
@section('content')
<h1>Detail User</h1>
<div class="mt-5">
    <a href="/users" class="btn btn-primary me-3">Back to Approved User</a>
</div>

<div class="mt-5">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    </div>

<div class="my-5 w-25">
   <div class="mb-3">
    <label for="" class="form-label">Username</label>
    <input type="text" class="form-control" readonly value="{{ $user->username }}">
   </div>
   <div class="mb-3">
    <label for="" class="form-label">Phone</label>
    <input type="text" class="form-control" readonly value="{{ $user->phone }}">
   </div>
   <div class="mb-3">
    <label for="" class="form-label">Address</label>
    <textarea name="" id="" cols="30" rows="7" class="form-control" style="resize: none">{{ $user->address }}</textarea>
   </div>
   <div class="mb-3">
    <label for="" class="form-label">Status</label>
    <input type="text" class="form-control" readonly value="{{ $user->status }}">
   </div>
   <div>
    @if ($user->status == 'inactive')
   <a href="/user-approve/{{ $user->slug }}" class="btn btn-info me-3">Approve User</a>
   @endif
</div>
</div>

<div class="mt-5">
    <h3>User Rent Log</h3>
    <x-rent-log-table :rentlog='$rent_logs' />
</div>

@endsection