<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class AnggotaController extends Controller
{
    public function tambah(Request $request){        
        $Nama=$request->input('Nama');
        $Bidang=$request->input('Bidang');
        $NIM=$request->input('NIM');
        $Email=$request->input('Email');        
        DB::table('tblKeanggotaan')->insert([
            'Nama' => $Nama,
            'BidId' => $Bidang,
            'NIM' => $NIM,
            'Email' =>$Email
        ]);                
        Session::flash('msg',"Sukses menambah data");        
        return redirect('/ukm/dashboard/Kelola-Anggota');
    }    

    public function edit(Request $request, $ID){
        if($request->session()->has('alogin')){                        
            $Nama=$request->input('Nama');
            $category=$request->input('Bidang');            
            $NIM=$request->input('NIM');
            $Email=$request->input('Email');
            $bookid= $ID;
            DB::table('tblKeanggotaan')
            ->where('id', $bookid)
            ->update([
                'Nama' => $Nama, 
                'BidId' => $category,                
                'NIM' => $NIM,
                'Email' => $Email
                ]);            
            Session::flash('updatemsg',"Berhasil mengubah data");
            return redirect('/ukm/dashboard/Kelola-Anggota');       
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		}
    }

    public function hapus($ID){ 
        $id=$ID;    
        DB::table('tblKeanggotaan')
        ->where('id', $id)
        ->delete();        
        Session::flash('del',"Behasil menghapus data");        
        return redirect('/ukm/dashboard/Kelola-Anggota');       
    }

    public function tAnggota(Request $request){
        if($request->session()->has('alogin')){
            $status=1;        
            $results = DB::table('tblKepengurusan')->where('Status', $status)->get();
            return view('admin.tambah-anggota', ['results' => $results]);
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		}
    }  

    public function kAnggota(Request $request){
        if($request->session()->has('alogin')){            
            $results = DB::table('tblKeanggotaan')
            ->join('tblKepengurusan', 'tblKepengurusan.id', '=', 'tblkeanggotaan.BidId')            
            ->select('tblKeanggotaan.Nama','tblKepengurusan.Bidang','tblKeanggotaan.NIM','tblKeanggotaan.Email','tblKeanggotaan.id as bookid')
            ->get();
            return view('admin.kelola-anggota', ['results' => $results]);
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		}
    }

    public function eAnggota(Request $request, $ID){
        if($request->session()->has('alogin')){                              
            $bookid=$ID;            
            $results = DB::table('tblKeanggotaan')
            ->join('tblKepengurusan', 'tblKepengurusan.id', '=', 'tblKeanggotaan.BidId')
           
            ->where('tblKeanggotaan.id', $bookid)
            ->select('tblKeanggotaan.Nama','tblKepengurusan.Bidang','tblKepengurusan.id as cid','tblKeanggotaan.NIM','tblKeanggotaan.Email','tblKeanggotaan.id as bookid')
            ->get();
            return view('admin.edit-anggota', ['results' => $results]);
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		}
    }      
}
