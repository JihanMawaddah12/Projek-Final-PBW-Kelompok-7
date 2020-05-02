@extends('layout.login')
@section('title', 'UKM UNSYIAH')
@section('header','UKM LOGIN FORM')
@section('konten')     
    <div class="row">

        @if ($message = Session::get('error'))
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <div class="alert alert-danger" >
                    <strong>{{ $message }}</strong>                    
                </div>
            </div>
        @endif    

    </div>

<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
 LOGIN FORM
</div>
<div class="panel-body">
<form method="post" action="/ukm/proses">
{{ csrf_field() }}

<div class="form-group">
<label>Masukkan Username</label>
<input class="form-control" type="text" name="username" autocomplete="off" required />
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" autocomplete="off" required />
</div>
 <div class="form-group">
<label>Kode verifikasi : </label>
<input type="text"  name="vercode" maxlength="5" autocomplete="off" required style="width: 150px; height: 25px;" />&nbsp;<img src="captcha.php">
</div>  

 <button type="submit" name="login" class="btn btn-info">LOGIN </button>
</form>
 </div>
</div>
</div>
</div>  
@endsection        

