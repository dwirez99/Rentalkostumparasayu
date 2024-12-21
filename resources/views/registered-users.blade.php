@extends('layouts.mainlayout')

@section('title', 'Registered User')
    
@section('content')
<h1>New Registered User List</h1>
<div class="mt-5">
    <a href="/users" class="btn btn-primary me-3">Back</a>
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
            @foreach ($registeredUsers as $item)
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
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection