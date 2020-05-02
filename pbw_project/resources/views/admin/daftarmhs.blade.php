@extends('layout.dashboard')
@section('title','UKM UNSYIAH | Kelola Peserta')
@section('link')
<link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
@endsection
@section('header','Kelola Peserta')
@section('konten')
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                Peserta
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>StudentId</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM </th>
                                <th>Email </th>
                                <th>Nomor HP</th>
                                <th>Tanggal Daftar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $cnt=1;?>         
                                @foreach($results as $result)                                     
                                    <tr class="odd gradeX">
                                        <td class="center"><?php echo htmlentities($cnt);?></td>
                                        <td class="center">{{ $result->StudentId }}</td>
                                        <td class="center">{{ $result->Fullname }}</td>
                                        <td class="center">{{ $result->NIM }}</td>
                                        <td class="center">{{ $result->Email }}</td>
                                        <td class="center">{{ $result->MobileNumber }}</td>
                                        <td class="center">{{ $result->RegDate }}</td>
                                        <td class="center">
                                            @if($result->Status==1)            
                                                <?php echo htmlentities("Lunas");?>
                                            @else             
                                                <?php echo htmlentities("Belum Lunas");?>
                                            @endif
                                            </td>
                                        <td class="center">

                                            @if($result->Status==1)
                                                <a href="/ukm/dashboard/daftar-mahasiswa/inid={{$result->id}}" onclick="return confirm('Apakah anda yakin mahasiswa ini belum lunas?');" >  <button class="btn btn-danger"> Belum Lunas</button>
                                            @else
                                                <a href="/ukm/dashboard/daftar-mahasiswa/id={{$result->id}}" onclick="return confirm('Apakah Anda yakin Mahasiswa ini sudah lunas?');"><button class="btn btn-primary"> Lunas</button>                                     
                                            @endif
                                        </td>
                                    </tr>
                                    <?php $cnt=$cnt+1; ?>    
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