@extends('layouts.mainlayout')

@section('title', 'Deleted Category')
    
@section('content')
<h1>Deleted Category</h1>
<div class="mt-5">
    <a href="categories" class="btn btn-primary">Back</a>
</div>

<div class="mt-5">
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
</div>
@endif

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
            @foreach ($deletedCategories as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">
                        <a href="category-restore/{{ $item->slug }}" class="btn btn-primary">Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection