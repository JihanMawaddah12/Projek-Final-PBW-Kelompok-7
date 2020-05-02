@extends('layout.dashboard')

@section('title', 'UKM UNSYIAH | Sunting Data Pengurus')

@section('header', 'Edit Kepengurusan')

@section('konten')
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                Kepengurusan
            </div>
                
            <div class="panel-body">
                @foreach($results as $result)    
                <form role="form" method="post" action="/ukm/dashboard/Kelola-Pengurus/edit={{$result->id}}">                                                                                   
                {{ csrf_field() }}     
                        <div class="form-group">
                            <label>Bidang</label>
                                <input class="form-control" type="text" name="category" value="{{$result->Bidang}}" required />
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            @if($result->Status==1)
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="status" value="1" checked="checked">Aktif
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="status" value="0">Tidak Aktif
                                    </label>
                                </div>
                            @else                                
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="status" value="1">Aktif
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="status" value="0" checked="checked">Tidak AKtif
                                    </label>
                                </div>
                            @endif
                        </div>
                    @endforeach                        
                    
                    <button type="submit" name="update" class="btn btn-info">Update </button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection    
