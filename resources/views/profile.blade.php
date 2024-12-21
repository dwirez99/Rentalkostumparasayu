@extends('layouts.mainlayout')

@section('title', 'Profile')
    
@section('content')
<h1>Welcome {{ Auth::user()->username }}</h1>

<div class="row mt-5">
    <div class="col-lg-4 col-md-4 mb-4">
        <h3>User Info</h3>
<div class="card mt-3" >
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach($errors->all() as $error)
             <li>{{ $error }}</li>
             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            @endforeach
        </ul>
    </div>
@endif
      <div class="mb-3">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" readonly value="{{ Auth::user()->username }}">
       </div>
       <div class="mb-3">
        <label for="" class="form-label">Phone</label>
        <input type="text" class="form-control" readonly value="{{ Auth::user()->phone }}">
       </div>
       <div class="mb-4">
        <label for="" class="form-label">Address</label>
        <textarea readonly name="" id="" cols="30" rows="7" class="form-control" style="resize: none">{{ Auth::user()->address }}</textarea>
       </div>
       <div class="mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Edit Profile</button>
       
    </div>
    </div>
  </div>
    </div>
    <div class="col-lg-8 col-md-8">
        <h3>Your Rent Log</h3>
        <x-rent-log-table :rentlog='$rent_logs' />
    </div>
</div>
  <form action="" method="post">
    @csrf
    @method('put')
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           
            <div class="mb-3">
              <label for="username" class="col-form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="{{ Auth::user()->username }}" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="col-form-label">Phone</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}" required>
              </div>
            <div class="mb-3">
              <label for="address" class="col-form-label">Address</label>
              <textarea name="" id="" cols="30" rows="7" class="form-control" style="resize: none">{{ Auth::user()->address }}</textarea>
            </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>


@endsection