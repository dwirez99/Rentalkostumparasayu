@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

<h1>Welcome, {{ Auth::user()->username }}</h1>

<div class="row mt-5">
    <div class="col-lg-4">
       <div class="card-data costume">
        <div class="row">
            <div class="col-6"><i class="bi bi-shop"></i></div>
            <div class="col-6 d-flex flex-column justify-content-center">
                <div class="card-desc">Kostum</div>
                <div class="card-count">{{ $costume_count }}</div>
            </div>
        </div>
       </div>
    </div>
    <div class="col-lg-4">
        <div class="card-data categories">
         <div class="row">
             <div class="col-6"><i class="bi bi-card-list"></i></div>
             <div class="col-6 d-flex flex-column justify-content-center">
                 <div class="card-desc">Kategori</div>
                 <div class="card-count">{{ $category_count }}</div>
             </div>
         </div>
        </div>
     </div>
     <div class="col-lg-4">
        <div class="card-data users">
         <div class="row">
             <div class="col-6"><i class="bi bi-people"></i></div>
             <div class="col-6 d-flex flex-column justify-content-center">
                 <div class="card-desc">Users</div>
                 <div class="card-count">{{ $user_count }}</div>
             </div>
         </div>
        </div>
     </div>
</div>

<div class="mt-5">
    <h2>Riwayat Sewa</h2>
    <x-rent-log-table :rentlog='$rent_logs' />
</div>
@endsection
