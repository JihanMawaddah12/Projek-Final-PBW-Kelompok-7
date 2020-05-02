<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function admlogin(){
        return view('adminlogin');
    }
    public function mhsSign(){
        return view('mhsSign');
    }
    public function admdash(Request $request){
        if($request->session()->has('alogin')){
			return view('admin.admindash');
		}else{
			echo "<script>alert('Anda harus login terlebih dahulu');</script>";
		}
    }
}
