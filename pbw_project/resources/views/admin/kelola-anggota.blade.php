@extends('layout.dashboard')
@section('title', 'UKM UNSIAH | Kelola Anggota')
@section('header', 'Kelola Anggota')
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
                    Keanggotaan
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Bidang</th>
                                    <th>NIM</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $cnt=1;?>      
                                @foreach($results as $result)                                
                                        <tr class="odd gradeX">
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center">{{$result->Nama}}</td>
                                            <td class="center">{{$result->Bidang}}</td>
                                            <td class="center">{{$result->NIM}}</td>
                                            <td class="center">{{$result->Email}}</td>
                                            <td class="center">

                                            <a href="/ukm/dashboard/Kelola-Anggota/edit={{$result->bookid}}"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button> 
                                            <a href="/ukm/dashboard/Kelola-Anggota/del={{$result->bookid}}" onclick="return confirm('Apakah kamu yakin ingin menghapus?');" >  <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
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