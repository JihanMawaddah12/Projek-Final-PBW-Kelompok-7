<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function list(Request $request){
        if($request->session()->has('alogin')){
			$results = DB::table('tblstudents')->get();
            return view('admin.daftarmhs', ['results' => $results]);
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		}        
    }
    public function action0($ID){
        $id=$ID;
        $status=0;
        DB::table('tblstudents')
        ->where('id', $id)
        ->update(['Status' => $status]);        
        return redirect('/ukm/dashboard/daftar-mahasiswa');
    }
    public function action1($ID){
        $id=$ID;
        $status=1;
        DB::table('tblstudents')
        ->where('id', $id)
        ->update(['Status' => $status]);        
        return redirect('/ukm/dashboard/daftar-mahasiswa');
    }      
}
