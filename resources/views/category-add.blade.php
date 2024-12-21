@extends('layouts.mainlayout')

@section('title', 'Add Category')

@section('content')
<h1>Tambah Kategori Baru</h1>
<div class="mt-5">
    <a href="categories" class="btn btn-primary">Kembali</a>
</div>
<div>
    <form action="category-add" method="post">
        @csrf
        <div class="mt-5 w-50">
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



            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Category Name">
        </div>
    <div class="mt-3"><button class="btn btn-success" type="submit">Save</button></div>
    </form>
</div>
@endsection
