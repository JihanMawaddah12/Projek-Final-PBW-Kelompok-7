<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;

class LoginController extends Controller
{
    public function admin(Request $request){
        $username=$request->input('username');
        $password=md5($request->input('password'));
        $sql ="SELECT UserName,Password FROM admin WHERE UserName=:username and Password=:password";
        include('includes/config.php');
        $query= $dbh-> prepare($sql);
        $query-> bindParam(':username', $username);
        $query-> bindParam(':password', $password);
        $query-> execute();           
        if($query->rowCount() > 0)
        {
            $request->session()->put('alogin',$request->input('username'));            
            return redirect('/ukm/dashboard');        
        }
        else{
            Session::flash('error',"Password atau Username salah");
            return redirect('/ukm');
        }            
    }

    public function mhs(Request $request){
        include('includes/config.php');                           
        $count_my_page = ("studentid.txt");
        $hits = file($count_my_page);
        $hits[0] ++;
        $fp = fopen($count_my_page , "w");
        fputs($fp , "$hits[0]");
        fclose($fp); 
        $StudentId= $hits[0];   
        $fname=$request->input('fullname');
        $NIM=$request->input('NIM');
        $mobileno=$request->input('mobileno');
        $UKM=$request->input('UKM');
        $email=$request->input('email'); 
        $password=md5($request->input('password')); 
        $status=1;
        $sql="INSERT INTO  tblstudents(StudentId,FullName,NIM,MobileNumber,UKM,Email,Password,Status) VALUES(:StudentId,:fname,:NIM,:mobileno,:UKM,:email,:password,:status)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':StudentId',$StudentId);
        $query->bindParam(':fname',$fname);
        $query->bindParam(':NIM',$NIM);
        $query->bindParam(':UKM',$UKM);
        $query->bindParam(':mobileno',$mobileno);
        $query->bindParam(':email',$email);
        $query->bindParam(':password',$password);
        $query->bindParam(':status',$status);
        $query->execute();      
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {                  
            Session::flash('succes',"Kamu telah berhasil mendaftar. Semoga LULUS yaaa ^_^ ."); 
            return redirect('/SignUp');           
        }
        else 
        {          
            Session::flash('error',"Terjadi kesalahan");  
            return redirect('/SignUp');                                 
        }            
    }
    

    public function logout(Request $request){
        $request->session()->forget('alogin');
        return redirect('/ukm');
    }

    public function ubah(Request $request){
        if($request->session()->has('alogin')){ 
            return view('admin.admChangepass');
        } else {
            echo "<script>alert('Anda harus login terlebih dahulu');</script>";
        }
    }
    public function reset(Request $request){
        if($request->session()->has('alogin')){ 
            include('includes/config.php');
            $password=md5($request->input('password'));
            $newpassword=md5($request->input('newpassword'));
            $username=$request->session()->get('alogin');
            $sql ="SELECT Password FROM admin where UserName=:username and Password=:password";
            $query= $dbh -> prepare($sql);
            $query-> bindParam(':username', $username);
            $query-> bindParam(':password', $password);
            $query-> execute();
            $results = $query -> fetchAll();
            if($query -> rowCount() > 0)
            {
                $con="update admin set Password=:newpassword where UserName=:username";
                $chngpwd1 = $dbh->prepare($con);
                $chngpwd1-> bindParam(':username', $username);
                $chngpwd1-> bindParam(':newpassword', $newpassword);
                $chngpwd1->execute();
                Session::flash('msg',"Password Kamu Berhasil di ubah");
                return redirect('/ukm/dashboard/ubah-pass');
            }
            else {
                Session::flash('error',"Password saat ini salah");  
                return redirect('/ukm/dashboard/ubah-pass');
            }
        }else{
            echo "<script>alert('Anda harus login terlebih dahulu');</script>";
        }
    }
    
}
