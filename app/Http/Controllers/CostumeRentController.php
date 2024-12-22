<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kostum;
use App\Models\RentLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CostumeRentController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive' )->get();
        $Kostums = Kostum::all();
       return view('costume-rent', ['users' => $users, 'kosta' => $Kostums]);
    }
    public function store(Request $request)
    {
        //dd($request->all());
        //carbon berfungsi mengambil data tanggal today
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        //mencari costume status
   $statuskostum = Kostum::findOrFail($request->kostum_id)->only('status');
        //dd($request->all());
        //dd($statuskostum);

//mencari costume status yang outstock
   if($statuskostum['status'] != 'in stock') {
    //costum yang outstock gagal pinjam
    Session::flash('message', 'Cannot rent, the costume is not available');
Session::flash('alert-class', 'alert-danger');
    return redirect('costume-rent');
}
else {
    //mencari user yang sudah rental lebih dari 3 dan belum mengembalikan costume
    $count = RentLogs::where('user_id', $request->user_id)->where('actual_return_date', null)
    ->count();
   if($count >= 3) {
    //jika sudah meminjam 3 costume dan blm mengembalikan costume 1 pun
    Session::flash('message', 'Cannot rent, user has reach limit of costume');
Session::flash('alert-class', 'alert-danger');
    return redirect('costume-rent');
}
else {
   //jika tidak dalam kondisi diatas
   //simpan dan update data ke database
    try {
                DB::beginTransaction();
                //proses tambah ke rentlog

                // Ambil harga untuk 3 hari dari tabel Kostum
                $kostum = Kostum::findOrFail($request->kostum_id);
                $harga = $kostum->harga;

                $request['total_harga'] = $harga;
                
                RentLogs::create($request->all());
                //proses update status kostum
                $Kostum = Kostum::findOrFail($request->kostum_id);
                $Kostum->status = 'out stock';
                $Kostum->save();
                //dd($Kostum);
                DB::commit();
                Session::flash('message', 'Rent costume is success');
        Session::flash('alert-class', 'alert-success');
            return redirect('costume-rent');
            } catch (\Throwable $th) {
                DB::rollback();
                dd($th);
            }

}
   }

}

public function returnCostume()
{
    $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive' )->get();
        $Kostums = Kostum::all();
    return view('rent-return', ['users' => $users, 'kosta' => $Kostums]);
}
public function saveRentCostume(Request $request)
{
    $rent = RentLogs::where('user_id', $request->user_id)->where('kostum_id', $request->kostum_id)
    ->where('actual_return_date','=', null);
    $rentData = $rent->first();
    $countData = $rent->count();
    if($countData == 1) {
        $rentData->actual_return_date = Carbon::now()->toDateString();
        $Kostum = Kostum::findOrFail($request->kostum_id);
                $Kostum->status = 'in stock';
                $Kostum->save();
        $rentData->save();
        Session::flash('message', 'The costume is returned success');
Session::flash('alert-class', 'alert-success');
    return redirect('rent-return');
    }
    else {
        Session::flash('message', 'User is not rent the costume');
        Session::flash('alert-class', 'alert-danger');
            return redirect('rent-return');
    }
}

    }



