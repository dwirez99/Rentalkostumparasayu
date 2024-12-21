@extends('layouts.mainlayout')

@section('title', 'Rent Return')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<h1 class="mb-4">Pengembalian Kostum</h1>

<div class="col-12 col-md-8 offset-md-2 col-lg-6 offset-md-3">
    <div class="mt-5">
        @if (session('message'))
        <div class="alert {{ session('alert-class') }} alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        </div>
    <form action="rent-return" method="post">
        @csrf
        <div class="mb-3">
            <label for="user" class="form-label">User</label>
<select name="user_id" id="user" class="form-control select2">
<option value="">Select User</option>
@foreach ($users as $item)
    <option value="{{ $item->id }}">{{ $item->username }}</option>
@endforeach
</select>
        </div>
        <div class="mb-3">
            <label for="kostum" class="form-label">Kostum</label>
<select name="kostum_id" id="kosta" class="form-control select2">
    <option value="">Pilih Kostum</option>
    @foreach ($kosta as $item)
    <option value="{{ $item->id }}">{{ $item->kostum_id }} {{ $item->title }}</option>
    @endforeach
</select>
        </div>
        <div>
            <button type="submit" class="btn btn-primary w-100">Submit</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>
@endsection
