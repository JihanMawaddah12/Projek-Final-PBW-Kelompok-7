@extends('layout.dashboard')
@section('title','UKM UNSYIAH | Tambah Pengurus')
@section('header','Tambah Pengurus')
@section('konten')
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Kepengurusan
</div>
<div class="panel-body">
<form role="form" method="post" action="/ukm/dashboard/Tambah-Pengurus/proses">
{{ csrf_field() }}
<div class="form-group">
<label>Nama</label>
<input class="form-control" type="text" name="nama" autocomplete="off" required />
</div>
<div class="form-group">
<label>Bidang</label>
<input class="form-control" type="text" name="Bidang" autocomplete="off" required />
</div>
<div class="form-group">
<label>Status</label>
 <div class="radio">
<label>
<input type="radio" name="Status" id="Status" value="1" checked="checked">Aktif
</label>
</div>
<div class="radio">
<label>
<input type="radio" name="Status" id="Status" value="0">Tidak Aktif
</label>
</div>

</div>
<button type="submit" name="Selesai" class="btn btn-info">Selesai </button>

                                    </form>
                            </div>
                        </div>
                            </div>

        </div>
    @endsection