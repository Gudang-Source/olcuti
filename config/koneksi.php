<?php
error_reporting(1);
$hostName	= "localhost";
$userName	= "root";
$passWord	= "";
$dataBase	= "cutiol";
$appname 	= "Cuti Online";

$koneksi = mysqli_connect($hostName, $userName, $passWord, $dataBase);
if(mysqli_connect_errno()){
 echo "Gagal Terhubung ".mysqli_connect_error();
}
//mysql_connect($hostName,$userName,$passWord) or die('Koneksi Gagal');
//mysql_select_db($dataBase) or die('Database tidak ditemukan');



?>
