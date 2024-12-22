@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')

<h1>Selamat Datang, {{ Auth::user()->username }}</h1>

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

<div class="mt-5">
    <h2>Chart Penyewaan Bulanan</h2>
    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
        // Data chart (bisa diganti dengan data dari controller)
        const labels = @json($chartData['labels']);
        const data = @json($chartData['data']);

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Jenis chart (bar, line, dll.)
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Penyewaan Bulanan',
                    data: data,
                    backgroundColor: 'rgb(135, 177, 255)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
@endsection
