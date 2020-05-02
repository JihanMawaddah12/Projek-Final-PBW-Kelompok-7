@yield('php')
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="/../admin/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="/../admin/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="/../admin/assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    @yield('link')
</head>
<body>
@yield('script')
    <!------MENU SECTION START-->
<?php include('admin/includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
    <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">@yield('header')</h4>
            </div>
        </div>
             
<!--LOGIN PANEL START-->           
@yield('konten')
<!---LOGIN PABNEL END-->            
             
 
    </div>
</div>
     <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('admin/includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="/../admin/assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="/../admin/assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="/../admin/assets/js/custom.js"></script>
</body>
</html>
