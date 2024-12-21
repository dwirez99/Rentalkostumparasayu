@extends('layouts.mainlayout')

@section('title', 'Edit Category')
    
@section('content')
<h1>Edit Category</h1>
<div class="mt-5">
    <a href="/categories" class="btn btn-primary">Back</a>
</div>
<div>
    <form action="/category-edit/{{ $category->slug }}" method="post">
        @csrf
        @method('put')
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
            <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}"> 
        </div>
    <div class="mt-3"><button class="btn btn-success" type="submit">Update</button></div>
    </form>
</div>
@endsection