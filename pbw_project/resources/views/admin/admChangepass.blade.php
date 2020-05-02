@extends('layout.dashboard')
@section('title', 'UKM UNSYIAH | Ubah Password')
@section('link')
  <style>
    .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
    </style>
    @endsection
@section('script')
<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password baru dan konfrimasi password tidak sesuai  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
@endsection

@section('header', 'Ubah Password')
@section('konten')
@if ($message = Session::get('error'))
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 ">
        <div class="errorWrap"><strong>ERROR</strong>:{{ $message }} </div>
    </div>
@elseif ($message = Session::get('msg'))
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 ">
        <div class="succWrap"><strong>SUKSES</strong>:{{ $message }} </div>
    </div>
@endif
<!--LOGIN PANEL START-->           
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" >
<div class="panel panel-info">
<div class="panel-heading">
Ubah Password
</div>
<div class="panel-body">
<form role="form" method="post" onSubmit="return valid();" name="chngpwd" action="/ukm/dashboard/reset">
{{ csrf_field() }}
<div class="form-group">
<label>Password saat ini</label>
<input class="form-control" type="password" name="password" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Masukkan Password</label>
<input class="form-control" type="password" name="newpassword" autocomplete="off" required  />
</div>

<div class="form-group">
<label>Konfirmasi Password </label>
<input class="form-control"  type="password" name="confirmpassword" autocomplete="off" required  />
</div>

 <button type="submit" name="ubah" class="btn btn-info">Ubah </button> 
</form>
 </div>
</div>
</div>
</div>  
<!---LOGIN PABNEL END-->  

@endsection