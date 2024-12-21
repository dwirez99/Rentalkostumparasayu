@extends('layouts.mainlayout')

@section('title', 'Add Costume')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<h1>Add New Costume</h1>

<div class="mt-5">
    <a href="/menu-costume" class="btn btn-primary">Back</a>
</div>
<div>
    <form action="costume-add" method="post" enctype="multipart/form-data">
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


<div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" name="kostum_id" id="code" class="form-control" placeholder="Kostum Code" value="{{ old('Kostum_code') }}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Costume Title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Cetegory</label>
            <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    <div class="mt-3"><button class="btn btn-success" type="submit">Save</button></div>
</div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.select-multiple').select2();
});
</script>
@endsection
