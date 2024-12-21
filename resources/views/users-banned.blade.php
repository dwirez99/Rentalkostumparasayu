@extends('layouts.mainlayout')

@section('title', 'Banned Users')
    
@section('content')
<h1>Banned User List</h1>
<div class="mt-5">
    <a href="/users" class="btn btn-primary">Back</a>
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
            @foreach ($bannedUsers as $item)
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
                        <a href="/user-restore/{{ $item->slug }}" class="btn btn-info">Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection