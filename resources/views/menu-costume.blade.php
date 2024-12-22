@extends('layouts.mainlayout')

@section('title', 'Menu Costume')

@section('content')
<h1>Menu Costume</h1>
<div class="mt-5">
    <a href="costume-add" class="btn btn-primary me-3">Add Costume</a>
    <a href="costume-deleted" class="btn btn-secondary">View Deleted Data</a>
</div>

<div class="mt-5">
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
                <th>Kode Kostum</th>
                <th>Judul</th>
                <th>Harga</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Kostum as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->kostum_id }}</td>
                    <td class="align-middle">{{ $item->title }}</td>
                    <td class="align-middle">{{ $item->harga }}</td>
                    <td>@foreach ($item->categories as $category)
                        {{ $category->name }} <br>
                    @endforeach</td>
                    <td class="align-middle">{{ $item->status }}</td>
                    <td class="align-middle">
                        <a href="/costume-edit/{{ $item->slug }}" class="btn btn-warning">Edit</a>
                        <a href="/costume-delete/{{ $item->slug }} " onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
