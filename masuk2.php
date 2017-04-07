<?php
include 'config/koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title><?php echo $appname; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <!--<link href="starter-template.css" rel="stylesheet">-->
    <style>
      body {
        padding-top: 50px;
      }
      .starter-template {
        padding: 40px 15px;
        text-align: center;
      }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $appname; ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <!--
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
          -->
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
<br>
<div class="row">
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">Form Login Akun</div>
      <div class="panel-body">

      <form class="form-horizontal" action="cek_login_hrd.php" method="post" id="form">
          <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">NIP</label>
            <div class="col-sm-7">
              <input name="UserName" type="text" placeholder="Nomor Induk Pegawai" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="form-field-1">Password</label>
            <div class="col-sm-7">
              <input type="password" name="PassWord" placeholder="Password" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">&nbsp;</label>
            <div class="col-sm-8">
              <button class="btn btn-primary" type="submit" name="submit" value=""><i class="fa fa-sign-in"></i> Login</button>
              <button class="btn btn-success" type="reset" name="reset" value="" onclick="goBack()"><i class="fa fa-reply"></i>  Kembali</button>
            </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="form-field-1">&nbsp;</label>
            <div class="col-sm-8">
              <div class="well">

              </div>
            </div>
            </div>
        </form>

    </div>

    </div>
    </div>
    </div>
    </div>


    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
<script>
function goBack() {
    window.history.back();
}
</script>
