<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kostum;
use App\Models\Category;
use App\Models\RentLogs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $rentlogs = RentLogs::with(['user', 'kosta'])->get();
        $costumecount = Kostum::count();
        $categorycount = Category::count();
        $usercount = User::count();
    return view('dashboard', [
        'costume_count' => $costumecount,
        'category_count' => $categorycount,
        'user_count' => $usercount,
        'rent_logs' => $rentlogs
    ]);
    }
}