@extends('layout.dashboard')
@section('title','UKM UNSYIAH | Kelola Pengurus')
@section('header','Kelola Pengurus')
@section('konten')
     <div class="row">

        @if ($message = Session::get('msg'))
            <div class="col-md-6">
                <div class="alert alert-success" >
                    <strong>{{ $message }}</strong>                    
                </div>
            </div>
        @endif

        @if ($message = Session::get('updatemsg'))
            <div class="col-md-6">
                <div class="alert alert-success" >
                    <strong>{{ $message }}</strong>                     
                </div>
            </div>
        @endif


        @if ($message = Session::get('del'))
            <div class="col-md-6">
                <div class="alert alert-success" >
                    <strong>{{ $message }}</strong>                    
                </div>
            </div>
        @endif

    </div>        
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Data Pengurus
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Bidang</th>
                                            <th>Status</th>
                                            <th>Tanggal dibuat</th>
                                            <th>Tanggal Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $cnt=1; ?>
                                        @foreach($results as $result)                                                                            
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center">{{$result->Nama}}</td>
                                            <td class="center">{{$result->Bidang}}</td>
                                            <td class="center">
                                            @if($result->Status==1)
                                                <span class="btn btn-success btn-xs">Aktif</span>
                                            @else
                                                <span class="btn btn-danger btn-xs">Tidak Aktif</span>
                                            @endif
                                            </td>
                                            <td class="center">{{$result->CreationDate}}</td>
                                            <td class="center">{{$result->UpdationDate}}</td>
                                            <td class="center">

                                                <a href="/ukm/dashboard/Kelola-Pengurus/edit={{$result->id}}"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                                <a href="/ukm/dashboard/Kelola-Pengurus/del={{$result->id}}" onclick="return confirm('Kamu Yakin Ingin Menghapus?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Hapus</button>
                                            </td>
                                        </tr>
                                        <?php $cnt=$cnt+1;?>                                      
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
@endsection