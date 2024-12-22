<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kostum;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $rentlogs = RentLogs::with(['user', 'kosta'])->get();
        $costumecount = Kostum::count();
        $categorycount = Category::count();
        $usercount = User::count();
// Mengambil data penyewaan bulanan untuk chart
        $rentalData = RentLogs::selectRaw("DATE_FORMAT(rent_date, '%Y-%m') as month, COUNT(*) as total_rentals")
        ->groupBy('month')
        ->orderBy('month')
        ->get();
     // Siapkan data untuk chart.js
        $chartData = [
            'labels' => $rentalData->pluck('month'),
            'data' => $rentalData->pluck('total_rentals')
        ];
        //dd($chartData);
    return view('dashboard', [
        'costume_count' => $costumecount,
        'category_count' => $categorycount,
        'user_count' => $usercount,
        'rent_logs' => $rentlogs,
        'chartData' => $chartData

    ]);
    }
}
