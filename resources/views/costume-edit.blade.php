@extends('layouts.mainlayout')

@section('title', 'Edit Costume')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<h1>Edit Kostum</h1>

<div class="mt-5">
    <a href="/menu-costume" class="btn btn-primary">Back</a>
</div>
<div>
    <form action="/costume-edit/{{ $Kostum->slug }}" method="post" enctype="multipart/form-data">
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
            <input type="text" name="kostum_id" id="code" class="form-control" placeholder="id_kostum" value="{{ $Kostum->kostum_id}}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Costume Title" value="{{ $Kostum->title }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label for="currentImage" class="form-label" style="display: block">currentImage</label>
            @if ($Kostum->cover!='')
            <img src="{{ asset('storage/cover/'.$Kostum->cover) }}" alt="" width="300px">
                @else
                <img src="{{ asset('images/img-not-found.png') }}" alt="" width="300px">
            @endif
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan Harga" value="{{$Kostum->harga}}" step="0.01" min="0">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
<label for="currentCategory" class="form-label">currentCategory</label>
<ul>
    @foreach ($Kostum->categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
</ul>
        </div>
    <div class="mt-3"><button class="btn btn-success" type="submit">Update</button></div>
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
