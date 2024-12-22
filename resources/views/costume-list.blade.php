@extends('layouts.mainlayout')

@section('title', 'List Costume')

@section('content')
<h1 class="mb-4">List KOSTUM</h1>

<form action="" method="get">
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
<select name="category" id="category" class="form-control">
    <option value="">pilih Kategori</option>
    @foreach ($categories as $item)
        <option value="{{ $item->id }}">{{ $item->name }}</option>>
    @endforeach
</select>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 mb-3">
        <div class="input-group">
            <input type="text" name="title" class="form-control" placeholder="Search Costume Title">
            <button class="btn btn-primary" type="submit">Search</button>
          </div>
    </div>
</div>
</form>

<div class="my-5">
    <div class="row">

        @foreach ($Kostum as $item)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
            <div class="card h-100">
                <img src="{{ $item->cover != null ? asset('storage/cover/'.$item->cover) : asset('images/img-not-found.png') }}" class="card-img-top" draggable="false" alt="Gambar Costume" class="card-img-top">
                <div class="card-body">
                  <h5 class="card-title">{{ $item->title }}</h5>
                  <p class="card-text">Harga : Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                  <p class="card-text">Category : @foreach ($item->categories as $category)
                    {{ $category->name }},
                @endforeach</p>
                 <p class="card-text text-end fw-bold {{ $item->status == 'in stock' ? 'text-success' : 'text-danger' }}">
                    {{ $item->status }}</p>
                </div>
              </div>
        </div>
        @endforeach

    </div>
</div>

@endsection
