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

      <div class="starter-template">
        <h2>Selamat Datang, Aplikasi Cuti Online</h2>
        <p class="lead">Sistem Cuti Online BKDSDM Luwu Timur ini diperuntukkan bagi ASN yang akan mengajukan permohonan Cuti secara online</p>
      </div>
      <p align="center">Jika anda belum mempunyai akun klik :</p>
        <p align="center"><a href="register.php" name="" class="btn btn-primary btn-lg"><i class="fa fa-pencil"></i> Daftar Disini</a>
      </p>
      <br>
      <p align="center">atau jika anda sudah mempunyai akun klik :</p>
        <p align="center"><a href="masuk.php" name="" class="btn btn-success btn-lg"><i class="fa fa-key"></i> Masuk</a>
                          <a href="masuk2.php" name="" class="btn btn-success btn-lg"><i class="fa fa-key"></i> Admin</a>
                          <a href="index.php" name="" class="btn btn-warning btn-lg"><i class="fa fa-reply"></i> Kembali</a>
      </p>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
  </body>
</html>
