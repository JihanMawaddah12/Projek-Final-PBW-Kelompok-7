@extends('layout.login')

@section('title','UKM UNSYIAH | Mahasiswa Signup')
@section('script')
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password dan konfirmasi password tidak sesuai  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script> 
@endsection   

@section('header','MAHASISWA SIGNUP')
@section('konten')
<div class="row">

        @if ($message = Session::get('succes'))
            <div class="col-md-9 col-md-offset-1">
                <div class="alert alert-success" >
                    <strong>{{ $message }}</strong>                    
                </div>
            </div>
        @endif    

        @if ($message = Session::get('error'))
            <div class="col-md-9 col-md-offset-1">
                <div class="alert alert-danger" >
                    <strong>{{ $message }}</strong>                    
                </div>
            </div>
        @endif  
    </div>

             <div class="row">
           
<div class="col-md-9 col-md-offset-1">
               <div class="panel panel-danger">
                        <div class="panel-heading">
                           SINGUP FORM
                        </div>
                        <div class="panel-body">
                            <form name="signup" method="post" onSubmit="return valid();" action="/SignUp/proses">
                            {{ csrf_field() }}
<div class="form-group">
<label>NAMA LENGKAP</label>
<input class="form-control" type="text" name="fullname" autocomplete="off" required />
</div>

<div class="form-group">
<label>NIM :</label>
<input class="form-control" type="text" name="NIM" maxlength="20" autocomplete="off" required />
</div>

<div class="form-group">
<label>NOMOR HP :</label>
<input class="form-control" type="text" name="mobileno" maxlength="12" autocomplete="off" required />
</div>

<div class="form-group">
<label>UKM :</label>
<input class="form-control" type="text" name="UKM" maxlength="12" autocomplete="off" required />
</div>
                                        
<div class="form-group">
<label>EMAIL</label>
<input class="form-control" type="email" name="email" id="emailid" onBlur="checkAvailability()"  autocomplete="off" required  />
   <span id="user-availability-status" style="font-size:12px;"></span> 
</div>

<div class="form-group">
<label>PASSWORD</label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
<label>KOMFIRMASI PASSWORD </label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
</div>
 <div class="form-group">
<label>VERIFIKASI KODE : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>                                
<button type="submit" name="signup" class="btn btn-danger" id="submit">REGISTRASI </button>

                                    </form>
                            </div>
                        </div>
                            </div>
        </div>
        @endsection    