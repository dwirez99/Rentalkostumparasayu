@extends('layouts.mainlayout')

@section('title', 'Deleted Costume')
    
@section('content')
<h1>Deleted Costume</h1>
<div class="mt-5">
    <a href="/menu-costume" class="btn btn-primary">Back</a>
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
                <th>Code</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedCostume as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration }}</td>
                    <td class="align-middle">{{ $item->cosplay_code }}</td>
                    <td class="align-middle">{{ $item->title }}</td>
                    <td class="align-middle">
                        <a href="/costume-restore/{{ $item->slug }}" class="btn btn-primary">Restore</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection