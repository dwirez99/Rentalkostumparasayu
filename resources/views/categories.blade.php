@extends('layouts.mainlayout')

@section('title', 'Categories')
    
@section('content')
<h1>Category List</h1>

<div class="mt-5">
    <a href="category-add" class="btn btn-primary me-3">Add Category</a>
    <a href="category-deleted" class="btn btn-secondary">View Deleted Data</a>
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
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">
                        <a href="category-edit/{{ $item->slug }}" class="btn btn-warning">Edit</a>
                        <a href="category-delete/{{ $item->slug }} " onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection