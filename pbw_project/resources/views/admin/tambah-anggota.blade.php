@extends('layout.dashboard')
@section('title', 'UKM UNSYIAH| Tambah Anggota')
@section('header', 'Tambah Anggota')
@section('konten')
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Keanggotaan
</div>
<div class="panel-body">
<form role="form" method="post" action="/ukm/dashboard/Tambah-Anggota/proses">
{{ csrf_field() }}
<div class="form-group">
<label>Nama<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="Nama" autocomplete="off"  required />
</div>

<div class="form-group">
<label> Bidang<span style="color:red;">*</span></label>
<select class="form-control" name="Bidang" required="required">
<option value=""> Pilih Bidang</option>

    @foreach($results as $result)
        <option value="{{ $result->id }}">{{ $result->Bidang }}</option>    
    @endforeach
</select>
</div>


<div class="form-group">
<label>NIM<span style="color:red;">*</span></label>
<input class="form-control" type="text" name="NIM"  required="required" autocomplete="off"  />
<p class="help-block">Masukkan NIM Anda</p>
</div>

 <div class="form-group">
 <label>Email<span style="color:red;">*</span></label>
 <input class="form-control" type="text" name="Email" autocomplete="off"   required="required" />
 </div>
<button type="submit" name="add" class="btn btn-info">Add </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
@endsection