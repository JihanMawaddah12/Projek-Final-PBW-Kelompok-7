<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class PengurusController extends Controller
{
    public function tambah(Request $request){        
        $category=$request->input('Bidang');
        $Nama =$request->input('nama');
        $Status=$request->input('Status');        
        DB::table('tblKepengurusan')->insert([
            'Bidang' => $category,
            'Nama' => $Nama,
            'Status' => $Status        
        ]);                
        Session::flash('msg',"Tambah pengurus sukses");    
        return redirect('/ukm/dashboard/Tambah-Pengurus');
    }

    public function edit(Request $request, $ID){
        if($request->session()->has('alogin')){                        
            $category=$request->input('Bidang');
            $Nama =$request->input('nama');
            $status=$request->input('status');
            $BidId=$ID;
            DB::table('tblKepengurusan')
            ->where('id', $BidId)
            ->update([
                'Bidang' => $category,
                'Nama' => $Nama, 
                'Status' => $status                
                ]);            
            Session::flash('updatemsg',"Berhasil mengubah data");
            return redirect('/ukm/dashboard/Kelola-Pengurus');       
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
        }
    }

    public function hapus($ID){ 
        $id=$ID;    
        DB::table('tblKepengurusan')
        ->where('id', $id)
        ->delete();        
        Session::flash('del',"Behasil menghapus data");        
        return redirect('/ukm/dashboard/Kelola-Pengurus');       
    }

    public function tPengurus(Request $request){
        if($request->session()->has('alogin')){
			return view('admin.tambah-pengurus');
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		}
    }  

    public function ePengurus(Request $request, $ID){
        if($request->session()->has('alogin')){            
            $results = DB::table('tblKepengurusan')
            ->where('id', $ID)
            ->get();
            return view('admin.edit-pengurus', ['results' => $results]);
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		}
    }

    public function kPengurus(Request $request){
        if($request->session()->has('alogin')){            
            $results = DB::table('tblKepengurusan')->get();
            return view('admin.kelola-pengurus', ['results' => $results]);
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		}
    }

}
