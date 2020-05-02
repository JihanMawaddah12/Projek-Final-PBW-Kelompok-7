@extends('layout.dashboard')
@section('php')
<?php
include('includes/config.php');
?>
@endsection
@section('title','UKM UNSYIAH | UKM Dash Board')
@section('header','UKM DASHBOARD')
@section('konten')
           <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="alert alert-success back-widget-set text-center">
                  <i class="fa fa-user fa-5x"></i>
                    <?php 
                    $sql ="SELECT id from tblKeanggotaan ";
                    $query = $dbh -> prepare($sql);
                    $query->execute();
                    $results=$query->fetchAll(PDO::FETCH_OBJ);
                    $listdbooks=$query->rowCount();
                    ?>
                <h3><?php echo htmlentities($listdbooks);?></h3>
                    Jumlah Anggota
                </div>
              </div>
                  <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="alert alert-info back-widget-set text-center">
                      <i class="fa fa-user fa-5x"></i>
                        <?php 
                        $sql ="SELECT id from tblKepengurusan ";
                        $query = $dbh -> prepare($sql);
                        $query->execute();
                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                        $listdbooks=$query->rowCount();
                        ?>
                <h3><?php echo htmlentities($listdbooks);?></h3>
                    Jumlah Pengurus
                    </div>
                  </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                      <div class="alert alert-info back-widget-set text-center">
                        <i class="fa fa-users fa-5x"></i>
                          <?php 
                          $sql ="SELECT id from tblstudents ";
                          $query = $dbh -> prepare($sql);
                          $query->execute();
                          $results=$query->fetchAll(PDO::FETCH_OBJ);
                          $listdbooks=$query->rowCount();
                          ?>
                <h3><?php echo htmlentities($listdbooks);?></h3>
                    Jumlah peserta
                      </div>
                    </div>
                      <div class="col-md-10 col-sm-8 col-xs-12 col-md-offset-1">
                        <div id="carousel-example" class="carousel slide slide-bdr" data-ride="carousel" >
                          <div class="carousel-inner">
                            <div class="item active">
                              <img src="../assets/img/putroe.jpg" alt="" />
                            </div>
                              <div class="item">
                                <img src="../assets/img/phang.jpg" alt="" />
                              </div>
                                <div class="item">
                                  <img src="../assets/img/putroe phang.jpg" alt="" />
                                </div>
                          </div>
                          <!--INDICATORS-->
                          <ol class="carousel-indicators">
                            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example" data-slide-to="1"></li>
                            <li data-target="#carousel-example" data-slide-to="2"></li>
                          </ol>
                          <!--PREVIUS-NEXT BUTTONS-->
                          <a class="left carousel-control" href="#carousel-example" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                          <a class="right carousel-control" href="#carousel-example" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                      </div>
                    </div>
                  </div>
                  @endsection       