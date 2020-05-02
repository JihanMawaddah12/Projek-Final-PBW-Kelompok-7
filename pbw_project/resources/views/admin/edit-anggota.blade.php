@extends('layout.dashboard')
@section('php')
<?php
include('includes/config.php');
?>
@endsection
@section('title', 'UKM UNSYIAH | Edit Book')
@section('header'. 'Sunting')
@section('konten')
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                Sunting Data
            </div>
            <div class="panel-body">
            @foreach($results as $result)
                <form role="form" method="post" action="/ukm/dashboard/Kelola-Anggota/edit={{$result->bookid}}">
                {{ csrf_field() }}                                       
                        <div class="form-group">
                            <label>Nama<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="Nama" value="{{$result->Nama}}" required />
                        </div>
                        <div class="form-group">
                            <label> Bidang<span style="color:red;">*</span></label>
                            <select class="form-control" name="category" required="required">
                                <option value="{{$result->cid}}"> {{$catname=$result->Bidang}}</option>
                                    <?php 
                                    $status=1;
                                    $sql1 = "SELECT * from  tblKepengurusan where Status=:status";
                                    $query1 = $dbh -> prepare($sql1);
                                    $query1-> bindParam(':status',$status, PDO::PARAM_STR);
                                    $query1->execute();
                                    $resultss=$query1->fetchAll(PDO::FETCH_OBJ);
                                    if($query1->rowCount() > 0)
                                    {
                                        foreach($resultss as $row)
                                        {           
                                            if($catname==$row->Bidang)
                                            {
                                                continue;
                                            }
                                            else
                                            {
                                            ?>  
                                                <option value="<?php echo htmlentities($row->id);?>"><?php echo htmlentities($row->CategoryName);?></option>                                                
                                    <?php   }
                                        }
                                    }
                                ?>
                   
                            </select>
                        </div>                     
                        <div class="form-group">
                            <label>NIM<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="NIM" value="<?php echo htmlentities($result->NIM);?>"  required="required" />                            
                        </div>
                        <div class="form-group">
                            <label>Email<span style="color:red;">*</span></label>
                            <input class="form-control" type="text" name="Email" value="<?php echo htmlentities($result->Email);?>"   required="required" />
                        </div>
                        <button type="submit" name="update" class="btn btn-info">Update </button>                                
                </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection